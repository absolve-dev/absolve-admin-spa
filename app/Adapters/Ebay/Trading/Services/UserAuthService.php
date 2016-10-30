<?php

namespace App\Adapters\Ebay\Trading\Services;

use App\Adapters\Ebay\Trading\XmlRequests\GetSessionIDRequester;
use App\Adapters\Ebay\Trading\XmlRequests\FetchTokenRequester;

class UserAuthService{

  protected $getSessionIDRequester, $fetchTokenRequester;
  public function __construct(
    $getSessionIDRequester = null,
    $fetchTokenRequester = null
  ){
    $this->getSessionIDRequester = $getSessionIDRequester ?: new GetSessionIDRequester;
    $this->fetchTokenRequester = $fetchTokenRequester ?: new FetchTokenRequester;
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

  public function fetchTokenFromSessionID($sessionID){
    $this->fetchTokenRequester->setSessionID($sessionID);
    $response = $this->fetchTokenRequester->makeRequest();
    return $response->isSuccess() ? $response->eBayAuthToken : null;
  }
}

?>
