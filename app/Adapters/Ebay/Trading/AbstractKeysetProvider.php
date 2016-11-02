<?php

namespace App\Adapters\Ebay\Trading;

use Exception;

// use an abstract class to provide default methods
abstract class AbstractKeysetProvider{
  public function getAppId(){
    $appId = env("EBAY_APP_ID", false);
    if(!$appId){ throw new Exception("Ebay Keyset: App ID is required."); }
    return $appId;
  }
  public function getDevId(){
    $devId = env("EBAY_DEV_ID", false);
    if(!$devId){ throw new Exception("Ebay Keyset: Dev ID is required."); }
    return $devId;
  }
  public function getCertId(){
    $certId = env("EBAY_CERT_ID", false);
    if(!$certId){ throw new Exception("Ebay Keyset: Cert ID is required."); }
    return $certId;
  }
}

?>
