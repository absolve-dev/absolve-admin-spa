<?php

namespace App\Adapters\Ebay\Trading\XmlRequests;

use App\Adapters\Ebay\Trading\AbstractXmlRequest;
use App\Adapters\Ebay\Xml\XmlObject;
use App\Adapters\Ebay\Xml\XmlResponse;

// use SimpleXMLElement to build the response
use SimpleXMLElement;

class getSessionIDRequester extends AbstractXmlRequest{

  // this is the only method that needs ruName so fuck it
  // this is just going to be implemented here
  protected $ruName = "";
  public function setRuName($value){
    $this->ruName = $value;
  }
  public function getRuName(){
    return $this->ruName ?: env("EBAY_RU_NAME");
  }

  public function makeRequest(){
    $xmlData = [
      "element" => "GetSessionIDRequest",
      "attributes" => ["xmlns" => "urn:ebay:apis:eBLBaseComponents"],
      "children" => [
        ["element" => "RuName", "value" => $this->getRuName()]
      ]
    ];
    $xmlObject = new XmlObject($xmlData);

    $this->requester->setBodyString( $xmlObject->toXML() );

    $response = $this->requester->makeRequest("GetSessionID");
    // below return is not properly implemented, proof of concept
    return new XmlResponse($response);
  }

}
?>
