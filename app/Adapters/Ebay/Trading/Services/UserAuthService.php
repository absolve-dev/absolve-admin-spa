<?php

namespace App\Adapters\Ebay\Trading\Services;

use App\Adapters\Ebay\Trading\XmlRequests\GetSessionIDRequester;

class UserAuthService{

  protected $getSessionIDRequester;
  public function __construct(
    $getSessionIDRequester = null
  ){
    $this->getSessionIDRequester = $getSessionIDRequester ?: new GetSessionIDRequester;
  }

  public function getSessionID(){
    $response = $this->getSessionIDRequester->makeRequest();
    return $response->isSuccess() ? $response->SessionID : null;
  }

  public function getAuthNAuthUrl($paramSessionID = null){
    // correct way to build as of today, 29 oct 2016
    $baseUrl = env("EBAY_AUTH_BASE_PATH");
    $ruName = env("EBAY_RU_NAME");
    $sessionID = $paramSessionID ?: $this->getSessionID();
    return $baseUrl . "?SignIn&runame=$ruName&SessID=$sessionID";
  }
}

?>
