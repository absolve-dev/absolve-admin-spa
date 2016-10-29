<?php

namespace App\Adapters\Ebay\Trading;

use App\Adapters\Ebay\Trading\HttpHeadersProvider;
use App\Adapters\Ebay\Trading\GuzzleRequester;

abstract class AbstractXmlRequest{
  protected $requester;
  public function __construct(
    HttpHeadersProvider $headersProvider = null){
      $this->requester = new GuzzleRequester($headersProvider);
  }
  abstract public function makeRequest();
}

?>
