<?php

namespace App\Adapters\Ebay\Trading\Requests;

use App\Adapters\Ebay\Trading\Requests\AbstractRequest;
use App\Adapters\Ebay\Xml\XmlObject;

class getSessionID extends AbstractRequest{

  public function sendRequest($ruName){
    $xmlData = [
      "element" => "GetSessionIDRequest",
      "attributes" => ["xmlns" => "urn:ebay:apis:eBLBaseComponents"],
      "children" => [
        ["element" => "RuName", "value" => $ruName]
      ]
    ];
    $xmlObject = new XmlObject($xmlData);

    $this->requester->setBodyString( $xmlObject->toXML() );

    // below return is not properly implemented, proof of concept
    return (String)$this->requester->makeRequest("GetSessionID")->getBody();
  }

}
?>
