<?php

namespace App\Adapters\Ebay\Trading;

class AppKeysetViaEnv implements AppKeysetProvider{

  public function getAppId(){
    return env("EBAY_APP_ID");
  }
  public function getDevId(){
    return env("EBAY_DEV_ID");
  }
  public function getCertId(){
    return env("EBAY_CERT_ID");
  }

}

?>
