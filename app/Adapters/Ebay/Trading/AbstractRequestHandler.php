<?php

namespace App\Adapters\Ebay\Trading;

use Exception;

// handles everything to make a request
// like the headers, body, and shit like that
// and also sending that shit out
abstract class AbstractRequestHandler{
  protected $httpMethod = "POST"; // default

  // get will throw an error if that shit is falsey
  protected $headersProvider;
  public function setHeadersProvider(AbstractHeadersProvider $value){
    $this->headersProvider = $value;
  }
  public function getHeadersProvider(){
    $headersProvider = $this->headersProvider ?: new DefaultHeadersProvider;
    return $headersProvider;
  }

  // get will throw an error if that shit is falsey
  protected $body;
  public function setBody($value){
    $this->body = $value;
  }
  public function getBody(){
    $body = $this->body;
    if(!$body){ throw new Exception("Request Handler: A 'body' is required."); }
    return $body;
  }

  // get will throw an error if that shit is falsey
  protected $callName;
  public function setCallName($value){
    $this->callName = $value;
  }
  public function getCallName(){
    $callName = $this->callName;
    if(!$callName){ throw new Exception("Request Handler: A 'call name' is required."); }
    return $callName;
  }

  protected function getEndpoint(){
    $endpoint = env("EBAY_BASE_ENDPOINT", "https://api.ebay.com/ws/api.dll");
    return $endpoint;
  }

  abstract public function makeRequest();
}

?>
