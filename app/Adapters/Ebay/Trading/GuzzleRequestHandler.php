<?php

namespace App\Adapters\Ebay\Trading;

use GuzzleHttp\Client;

// for handling all the shit related to making requests
class GuzzleRequestHandler extends AbstractRequestHandler{

  public function makeRequest(){
    $body = $this->getBody();
    $callName = $this->getCallName();
    $headersProvider = $this->getHeadersProvider();

    // shit would have failed by now if shit was unavailable
    $headersProvider->setCallName($callName);
    $contentLength = strlen($body);
    $headersProvider->setContentLength($contentLength);
    $headers = $headersProvider->getHeaders();

    $guzzleClient = new Client();

    $requestOptions = [
      "headers" => $headers,
      "body" => $body,
    ]; //var_dump($requestOptions);

    // there should probably be a try-catch somewhere around here; will create when necessary
    $endpoint = $this->getEndpoint();
    $promise = $guzzleClient->requestAsync($this->httpMethod, $endpoint, $requestOptions);
    $result = $promise->wait();

    return $result;
  }

}

?>
