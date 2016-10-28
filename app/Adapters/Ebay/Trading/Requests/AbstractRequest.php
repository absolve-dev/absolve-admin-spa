<?php

namespace App\Adapters\Ebay\Trading\Requests;

use App\Adapters\Ebay\Trading\HttpHeadersProvider;
use App\Adapters\Ebay\Trading\GuzzleRequester;

use App\Adapters\Ebay\Xml\XmlBuilderInterface;
use App\Adapters\Ebay\Xml\XmlBuilderViaSimpleXml;

abstract class AbstractRequest{
  protected $requester, $xmlBuilder;
  public function __construct(
    HttpHeadersProvider $headersProvider = null,
    XmlBuilderInterface $xmlBuilder = null){
      $this->requester = new GuzzleRequester($headersProvider);
      $this->xmlBuilder = $xmlBuilder ?: new XmlBuilderViaSimpleXml;
  }
}

?>
