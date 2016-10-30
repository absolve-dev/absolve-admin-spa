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

    public function getAuthUrl(){
      $userAuthService = new UserAuthService;
      $sessionID = $userAuthService->getSessionID();
      $authUrl = $userAuthService->getAuthNAuthUrl($sessionID);
      return \Response::json($authUrl);
    }
}
