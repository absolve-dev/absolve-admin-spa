<?php

namespace App\Adapters\Ebay\Trading;

interface HttpHeadersProvider{

  const EBAY_COMPATIBILITY_LEVEL_HEADER = "X-EBAY-API-COMPATIBILITY-LEVEL";
  const EBAY_DEV_ID_HEADER = "X-EBAY-API-DEV-NAME";
  const EBAY_APP_ID_HEADER = "X-EBAY-API-APP-NAME";
  const EBAY_CERT_ID_HEADER = "X-EBAY-API-CERT-NAME";
  const EBAY_CALL_NAME_HEADER = "X-EBAY-API-CALL-NAME";
  const EBAY_SITE_ID_HEADER = "X-EBAY-API-SITEID";

  // this is as of 27 oct 2016...
  const EBAY_COMPATIBILITY_LEVEL_DEFAULT = 967;

  public function getAllHeadersForCall($callName, $contentLength);

}

?>
