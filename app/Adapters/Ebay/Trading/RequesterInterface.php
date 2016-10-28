<?php

namespace App\Adapters\Ebay\Trading;

interface RequesterInterface{
  public function setBodyString($bodyString);
  public function makeRequest($callName, $endpoint);
}

?>
