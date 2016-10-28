<?php

namespace App\Adapters\Ebay\Trading;

class HttpHeadersViaDefaults implements HttpHeadersProvider{

  protected $appKeyset;

  // the only shit this really needs to be complete is a damn call name.
  public function __construct(AppKeysetProvider $appKeysetProvider = null){
    // app keyset only passed if theyre required
    $this->appKeyset = $appKeysetProvider;
  }

  public function getAllHeadersForCall($callName){
    $allHeaders = [];

    // set these fuckers one by one,
    // because i might need to throw that ass in an exception

    // KEYSET REQUIRED CLUB
    if($appKeyset = $this->appKeyset){
      // blows up if any of the creds are missing
      $allHeaders[HttpHeadersProvider::EBAY_DEV_ID_HEADER] =
        $appKeyset->getDevId() ?: $this->nukeWith("Ebay API credentials missing: Dev ID.");
      $allHeaders[HttpHeadersProvider::EBAY_APP_ID_HEADER] =
        $appKeyset->getAppId() ?: $this->nukeWith("Ebay API credentials missing: App ID.");
      $allHeaders[HttpHeadersProvider::EBAY_CERT_ID_HEADER] =
        $appKeyset->getCertId() ?: $this->nukeWith("Ebay API credentials missing: Cert ID.");
    }
    // ALWAYS REQUIRED CLUB
    // need to find good defaults for these friends

    // use false as first operand to go straight to default
    $allHeaders[HttpHeadersProvider::EBAY_COMPATIBILITY_LEVEL_HEADER] =
      false ?: HttpHeadersProvider::EBAY_COMPATIBILITY_LEVEL_DEFAULT;
    $allHeaders[HttpHeadersProvider::EBAY_SITE_ID_HEADER] =
      false ?: 0;
    // call name must have been provided so nuke
    $allHeaders[HttpHeadersProvider::EBAY_CALL_NAME_HEADER] =
      $callName ?: $this->nukeWith("No Ebay API call name provided.");

    return $allHeaders;

  }

  protected function nukeWith($exceptionString){
    throw new Exception($exceptionString);
  }

}

?>
