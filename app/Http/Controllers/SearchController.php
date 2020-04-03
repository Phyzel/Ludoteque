<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $game){
    	$game_name = $game->input('name');


		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api-v3.igdb.com/games",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "fields *;\nwhere name=*\"".$game_name."\"*;",
		  CURLOPT_COOKIE => "__cfduid=d599ec3eb18222476661024a6491866311583393057",
		  CURLOPT_HTTPHEADER => array(
		    "user-key: 75e8822280a5ef41668c9e8b95c2e535"
		  ),
		));

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		}
		return view( 'games', [
			'response' => $response,
			'game' => $game,
			'screenshots' => $screenshots
		]);

    }
}
