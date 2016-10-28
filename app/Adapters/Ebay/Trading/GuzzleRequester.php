<?php

namespace App\Adapters\Ebay\Trading;

use App\Adapters\Ebay\Trading\HttpHeadersViaDefaults;

use GuzzleHttp\Client;

// can be refactored to an interface if/when required
class GuzzleRequester{

  const DEFAULT_ENDPOINT = "https://api.sandbox.ebay.com/ws/api.dll";

  protected $headersProvider;
  public function __construct(HttpHeadersProvider $headersProvider = null){
    $this->headersProvider = $headersProvider ?: new HttpHeadersViaDefaults;
  }

  protected $httpMethod = "POST"; // this is the default
  public function setHttpMethod($value){
    $this->$httpMethod = $value;
  }

  protected $bodyString;
  public function setBodyString($bodyString){
    $this->bodyString = $bodyString;
  }

  public function makeRequest($callName, $endpoint = null){
    // requires guzzle use, so fuck it i guess.
    $guzzleClient = new Client();

    // assoc array of headers to be included
    $headersArray = $this->headersProvider->getAllHeadersForCall($callName, strlen($this->bodyString));

    $requestOptions = [
      "headers" => $headersArray,
      "body" => $this->bodyString,
    ];
    var_dump($requestOptions);

    // guzzle-specific if im not mistaken?
    $endpoint = $endpoint ?: GuzzleRequester::DEFAULT_ENDPOINT;
    $promise = $guzzleClient->requestAsync($this->httpMethod, $endpoint, $requestOptions);
    $result = $promise->wait();

    return $result;
  }

}

?>
