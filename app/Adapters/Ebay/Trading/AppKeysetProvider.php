<?php

namespace App\Adapters\Ebay\Trading;

interface AppKeysetProvider{

  public function getAppId();
  public function getDevId();
  public function getCertId();

}

?>
