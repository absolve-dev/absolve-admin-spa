<?php

namespace App\Adapters\Ebay\Trading;

use Exception;

abstract class AbstractHeadersProvider{

  const EBAY_COMPATIBILITY_LEVEL_HEADER = "X-EBAY-API-COMPATIBILITY-LEVEL";
  const EBAY_DEV_ID_HEADER = "X-EBAY-API-DEV-NAME";
  const EBAY_APP_ID_HEADER = "X-EBAY-API-APP-NAME";
  const EBAY_CERT_ID_HEADER = "X-EBAY-API-CERT-NAME";
  const EBAY_CALL_NAME_HEADER = "X-EBAY-API-CALL-NAME";
  const EBAY_SITE_ID_HEADER = "X-EBAY-API-SITEID";

  // this is as of 27 oct 2016...
  const EBAY_COMPATIBILITY_LEVEL_DEFAULT = 967;
  const EBAY_SITE_ID_DEFAULT = 0;

  public function __construct(AbstractKeysetProvider $keysetProvider = null){
    $this->keysetProvider = $keysetProvider;
  }

  protected $keysetProvider;
  public function setKeysetProvider(AbstractKeysetProvider $keysetProvider = null){
    // setKeysetProvider with no arg = default
    $this->keysetProvider = $keysetProvider ?: new DefaultKeysetProvider;
  }

  protected $callName;
  public function setCallName($value){
    $this->callName = $value;
  }
  public function getCallName(){
    $callName = $this->callName;
    if(!$callName){ throw new Exception("Headers Provider: A 'call name' is required."); }
    return $callName;
  }

  protected $contentLength;
  public function setContentLength($value){
    $this->contentLength = $value;
  }
  public function getContentLength(){
    $contentLength = $this->contentLength;
    if(!$contentLength){ throw new Exception("Headers Provider: A 'content length' is required."); }
    return $contentLength;
  }

  public function getHeaders(){
    $allHeaders = [];

    // add necessary af text/xml content type
    $allHeaders["Content-Type"] = "text/xml";
    $allHeaders["Content-Length"] = $this->getContentLength();

    // KEYSET REQUIRED CLUB
    if($keysetProvider = $this->keysetProvider){
      $allHeaders[AbstractHeadersProvider::EBAY_DEV_ID_HEADER] =
        $keysetProvider->getDevId();
      $allHeaders[AbstractHeadersProvider::EBAY_APP_ID_HEADER] =
        $keysetProvider->getAppId();
      $allHeaders[AbstractHeadersProvider::EBAY_CERT_ID_HEADER] =
        $keysetProvider->getCertId();
    }

    // ALWAYS REQUIRED CLUB
    // use false as first operand to go straight to default
    $allHeaders[AbstractHeadersProvider::EBAY_COMPATIBILITY_LEVEL_HEADER] =
      false ?: AbstractHeadersProvider::EBAY_COMPATIBILITY_LEVEL_DEFAULT;
    $allHeaders[AbstractHeadersProvider::EBAY_SITE_ID_HEADER] =
      false ?: AbstractHeadersProvider::EBAY_SITE_ID_DEFAULT; // 0 is US
    // call name must have been provided so nuke
    $allHeaders[AbstractHeadersProvider::EBAY_CALL_NAME_HEADER] =
      $this->getCallName();

    return $allHeaders;
  }

}

?>
