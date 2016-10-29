<?php

namespace App\Adapters\Ebay\Xml;

use GuzzleHttp\Psr7\Response;
use SimpleXMLElement;

class XmlResponse{
  protected $responseXml;
  public function __construct(Response $responseObject){
    // strip this response object clean
    $this->responseXml = new SimpleXMLElement($responseObject->getBody()->__toString());
  }

  public function getResponseXml(){
    return $this->responseXml;
  }
}

?>
