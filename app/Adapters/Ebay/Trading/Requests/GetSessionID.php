<?php

namespace App\Adapters\Ebay\Trading\Requests;

use App\Adapters\Ebay\Trading\Requests\AbstractRequest;

class getSessionID extends AbstractRequest{

  public function sendRequest($headersProvider = null){
    $this->requester->setBodyString(
      '<?xml version="1.0" encoding="utf-8"?><GetSessionIDRequest xmlns="urn:ebay:apis:eBLBaseComponents"><ErrorLanguage>en_US</ErrorLanguage><WarningLevel>High</WarningLevel><RuName>Absolve_Games-AbsolveG-absolv-rbiwmkb</RuName></GetSessionIDRequest>'
    );
    // below return is not properly implement, proof of concept
    return (String)$this->requester->makeRequest("GetSessionID")->getBody();
  }

}
?>
