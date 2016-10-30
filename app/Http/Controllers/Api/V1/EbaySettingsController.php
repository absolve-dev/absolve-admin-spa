<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EbaySettings;

use App\Adapters\Ebay\Trading\Services\UserAuthService;

class EbaySettingsController extends Controller
{
    //
    public function getIndex(Request $request){
      // tfw you grab the root and you expect it to get you the current user's shit
      $ebaySettings = EbaySettings::firstOrCreate([
        "user_id" => $this->getCurrentTokenUserId($request)
      ]);
      return \Response::json($ebaySettings);
    }

    public function postUpdate(Request $request){
      $ebaySettings = EbaySettings::firstOrCreate([
        "user_id" => $this->getCurrentTokenUserId($request)
      ]);
      $ebaySettings->update([
        "auth_token" => $request->input("auth_token")
      ]);
      return \Response::json($ebaySettings);
    }

    public function getAuthUrl(Request $request){
      $ebaySettings = EbaySettings::firstOrCreate([
        "user_id" => $this->getCurrentTokenUserId($request)
      ]);
      // must save "current session id"
      $userAuthService = new UserAuthService;
      $sessionID = $userAuthService->getSessionID();
      $ebaySettings->update([
        "session_id" => $sessionID
      ]);
      $authUrl = $userAuthService->getAuthNAuthUrl($sessionID);
      return \Response::json($authUrl);
    }

    public function getAuthAccept(Request $request){
      $ebaySettings = EbaySettings::firstOrCreate([
        "user_id" => $this->getCurrentTokenUserId($request)
      ]);
      $userAuthService = new UserAuthService;
      $userAuthToken = $userAuthService->fetchTokenFromSessionID($ebaySettings->session_id);
      $ebaySettings->update([
        "auth_token" => $userAuthToken
      ]);
      return \Response::json();
    }
}
