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

  public function isSuccess(){
    return (String) $this->Ack === "Success";
  }

  public function __get($name){
    // shit will grab from the SimpleXMLElement
    // grab only fro the direct children
    foreach($this->responseXml->children() as $child){
      if($child->getName() === $name){
        return (String)$child;
      }
    }
    return null;
  }
}

?>
