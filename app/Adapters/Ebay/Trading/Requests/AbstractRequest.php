<?php

namespace App\Adapters\Ebay\Trading\Requests;

use App\Adapters\Ebay\Trading\HttpHeadersProvider;
use App\Adapters\Ebay\Trading\GuzzleRequester;

use App\Adapters\Ebay\Xml\XmlBuilderInterface;
use App\Adapters\Ebay\Xml\XmlBuilderViaSimpleXml;

abstract class AbstractRequest{
  protected $requester;
  public function __construct(
    HttpHeadersProvider $headersProvider = null){
      $this->requester = new GuzzleRequester($headersProvider);
  }

}

?>
