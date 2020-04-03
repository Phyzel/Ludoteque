<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcceuilController extends Controller
{
    public function index(){
    	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api-v3.igdb.com/games",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "fields *;\n where rating >= 95;\n limit 100;",
		  CURLOPT_COOKIE => "__cfduid=d599ec3eb18222476661024a6491866311583393057",
		  CURLOPT_HTTPHEADER => array(
		    "user-key: 75e8822280a5ef41668c9e8b95c2e535"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		$response = json_decode($response);

		$jaquette=[];
		$nameJaquette=[];
		$key=rand(0, 57);
		$increment=0;
		while ($increment < 18) {
			$id_game = $response[$key]->id;
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
			if (is_null($game[0])==false) {
				$response[$increment] = $response[$key];
				$jaquette[$increment] = [$game[0]];
				$increment++;
			}
			$key++;
		}

		//dd($jaquette);
		return view( 'acceuil', [
			'response' => $response,
			'game' => $jaquette
		]);
    } 
}
