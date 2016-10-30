<?php

namespace App\Adapters\Ebay\Trading\XmlRequests;

use App\Adapters\Ebay\Trading\AbstractXmlRequest;
use App\Adapters\Ebay\Xml\XmlObject;
use App\Adapters\Ebay\Xml\XmlResponse;

class FetchTokenRequester extends AbstractXmlRequest{

  protected $sessionID = "";
  public function setSessionID($value){
    $this->sessionID = $value;
  }
  public function getSessionID(){
    return $this->sessionID;
  }

  public function makeRequest(){
    if(!$this->sessionID){
      throw new \Exception("A Session ID is required to 'Fetch Token'.");
    }
    $xmlData = [
      "element" => "FetchTokenRequest",
      "attributes" => ["xmlns" => "urn:ebay:apis:eBLBaseComponents"],
      "children" => [
        ["element" => "SessionID", "value" => $this->getSessionID()]
      ]
    ];
    $xmlObject = new XmlObject($xmlData);

    $this->requester->setBodyString( $xmlObject->toXML() );

    $response = $this->requester->makeRequest("FetchToken");
    // below return is not properly implemented, proof of concept
    return new XmlResponse($response);
  }

}
?>
