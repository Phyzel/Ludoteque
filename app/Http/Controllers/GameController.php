<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{

    public function index(Request $game){
    	$game_name = $game->input("name");
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api-v3.igdb.com/games",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "fields *;\nwhere name=\"".$game_name."\" & aggregated_rating >= 1;\n limit 25;",
		  CURLOPT_COOKIE => "__cfduid=d599ec3eb18222476661024a6491866311583393057",
		  CURLOPT_HTTPHEADER => array(
		    "user-key: 75e8822280a5ef41668c9e8b95c2e535"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		$response = json_decode($response);

		$id_game = $response[0]->id;
		$curl_rate = curl_init();

		curl_setopt_array($curl_rate, array(
		  CURLOPT_URL => "https://api-v3.igdb.com/age_ratings",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "fields *;\nwhere id = ".$id_game.";",
		  CURLOPT_COOKIE => "__cfduid=d599ec3eb18222476661024a6491866311583393057",
		  CURLOPT_HTTPHEADER => array(
		    "user-key: 75e8822280a5ef41668c9e8b95c2e535"
		  ),
		));

		$rate = curl_exec($curl_rate);
		$err_rate = curl_error($curl_rate);
		$rate = json_decode($rate);

		if($rate[0]->rating == "1" || $rate[0]->rating == "6" || $rate[0]->rating == "7"){
			$rate = "https://pegi.info/themes/pegi/public-images/pegi/pegi3.png";
		} else {
			if($rate[0]->rating == "2" || $rate[0]->rating == "8" || $rate[0]->rating == "9"){
				$rate = "https://pegi.info/themes/pegi/public-images/pegi/pegi7.png";
			} else {
				if($rate[0]->rating == "3" || $rate[0]->rating == "10"){
					$rate = "https://pegi.info/themes/pegi/public-images/pegi/pegi12.png";
				} else {
					if($rate[0]->rating == "4" || $rate[0]->rating == "11"){
						$rate = "https://pegi.info/themes/pegi/public-images/pegi/pegi16.png";
					} else {
						if($rate[0]->rating == "5" || $rate[0]->rating == "12"){
							$rate = "https://pegi.info/themes/pegi/public-images/pegi/pegi18.png";
						}
					}
				}
			}
		};

		$id_platforms = $response[0]->platforms;
		$id_game = $response[0]->id;

		$curl_art = curl_init();

		curl_setopt_array($curl_art, array(
		  CURLOPT_URL => "https://api-v3.igdb.com/covers",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "fields *;\nwhere game = ".$id_game.";",
		  CURLOPT_COOKIE => "__cfduid=d599ec3eb18222476661024a6491866311583393057",
		  CURLOPT_HTTPHEADER => array(
		    "user-key: 75e8822280a5ef41668c9e8b95c2e535"
		  ),
		));

		$game = curl_exec($curl_art);
		$err_art = curl_error($curl_art);
		$game = json_decode($game);
		// Requete curl vers les platforms
		foreach ($id_platforms as $id_platforms => $value) {
			# code...
			// Requete curl vers le jeu
			$curl_platform = curl_init();

			curl_setopt_array($curl_platform, array(
			  CURLOPT_URL => "https://api-v3.igdb.com/platforms",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_POSTFIELDS => "fields *;\nwhere id = ".$value.";",
			  CURLOPT_COOKIE => "__cfduid=d599ec3eb18222476661024a6491866311583393057",
			  CURLOPT_HTTPHEADER => array(
			    "user-key: 75e8822280a5ef41668c9e8b95c2e535"
			  ),
			));
			//ajouter pour chaques platforms
			$platform = curl_exec($curl_platform);
			$err_platform = curl_error($curl_platform);
			$platform = json_decode($platform);
		}

		// Requete curl vers les artworks
		$curl_screenshot = curl_init();

		curl_setopt_array($curl_screenshot, array(
		  CURLOPT_URL => "https://api-v3.igdb.com/screenshots",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "fields *;\nwhere game = ".$id_game.";",
		  CURLOPT_COOKIE => "__cfduid=d599ec3eb18222476661024a6491866311583393057",
		  CURLOPT_HTTPHEADER => array(
		    "user-key: 75e8822280a5ef41668c9e8b95c2e535"
		  ),
		));

		$screenshots = curl_exec($curl_screenshot);
		$err_screenshot = curl_error($curl_screenshot);
		$screenshots = json_decode($screenshots);


		if ($err_screenshot) {
		  echo "cURL Error #:" . $err_screenshot;
		}

		/*
		<OPTION value="48">Playstation 4
        <OPTION value="9">Playstation 3
        <OPTION value="8">Playstation 2
        <OPTION value="7">Playstation
        <OPTION value="46">Playstation Vita
        <OPTION value="38">Playstation Portable
        <OPTION value="49">Xbox One
        <OPTION value="12">Xbox 360
        <OPTION value="11">Xbox
        <OPTION value="130">Switch
        <OPTION value="37">3DS
        <OPTION value="41">Wii U
        <OPTION value="20">DS
        <OPTION value="5">Wii
        <OPTION value="24">GameBoy Advance
        <OPTION value="22">Gamecube
        <OPTION value="4">Nintendo 64
        <OPTION value="6">PC
        */

		if ($err_art) {
		  echo "cURL Error #:" . $err_art;
		} 

		if ($err_rate) {
		  echo "cURL Error #:" . $err_rate;
		}

		if ($err_platform) {
		  echo "cURL Error #:" . $err_platform;
		}

		if ($err) {
		  echo "cURL Error #:" . $err;
		}

		curl_close($curl_platform);
		curl_close($curl_screenshot);
		curl_close($curl_art);

		return view( 'games', [
			'response' => $response,
			'game' => $game,
			'screenshots' => $screenshots,
			'platform' => $platform,
			'rate' => $rate
		]);
    }
}
