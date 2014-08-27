<?php

function get_twitter_feeds ($username) {
	$jsonFileName = "$username.json";

	$jsonTempFileName = "$username.json.tmp";

	//$jsonURL = "https://api.twitter.com/1/statuses/user_timeline.json?screen_name=$username&include_entities=true";
	
	//have we fetched twitter data in the last half hour?

	if( file_missing_or_old( $jsonFileName, 1 )){

		//get new data from twitter

		$jsonData = save_remote_file( $username, $jsonFileName );

	} else{

		//already have file, get the data out of it

		$jsonData = get_json_data_from_file( $jsonFileName );

	}
	
	if( $jsonData == ""){

		//delete the json file so it will surely be downloaded on next page view

		if( file_exists( dirname(__FILE__) ."/". $jsonFileName )){

			unlink( dirname(__FILE__) ."/". $jsonFileName );

		}

		//get the backup data

		$jsonData = get_json_data_from_file( $jsonTempFileName );

	} else{

		//good file, create a backup

		if( file_exists( dirname(__FILE__) . "/" . $jsonFileName )){

			copy( dirname(__FILE__) . "/" . $jsonFileName, dirname(__FILE__) . "/" . $jsonTempFileName );

		}

	}
	
	if ($jsonData) {
		if( $tweets = json_decode( $jsonData )){

			return $tweets;

		} else{

			//tweets is null

			return false;

		}
	}
	else {
		return false;
	}
}

function save_remote_file( $username, $fileName ){
	require 'tmh/tmhOAuth.php';
	require 'tmh/tmhUtilities.php';
	//to do if already registered credit card

	$oauth_access_token = "46524738-5UZAtAjJK1uqFyV8hVITKVm2ZSZPqVQyJQggM8sM";
	$oauth_access_token_secret = "pneuLAxDuXNcdjRf8EAKrQGNud2oaO2K3X1hnoWgg";
	$consumer_key = "ov52D3RztiEEAiuInaWtCg";
	$consumer_secret = "CxwAWgfcw9Uw7qTrKzPAStZjtktPHyxz9K37T53pA";
	$tmhOAuth = new tmhOAuth(array(
			'consumer_key'    => $consumer_key,
			'consumer_secret' => $consumer_secret,
			'user_token'      => $oauth_access_token,
			'user_secret'     => $oauth_access_token_secret,
			'curl_ssl_verifypeer' => FALSE
	));

	$tmhOAuth->request(
			'GET',
			'https://api.twitter.com/1.1/statuses/user_timeline.json',
			array(
					'screen_name' => $username
			)
	);

	$response = $tmhOAuth->response['response'];

	if( !$response ){

		//GET failed

		return false;

	} else{

		//save the body of the response in $fileName

		$filePath = dirname(__FILE__) ."/". $fileName;

		$fp = fopen( $filePath, "w");

		fwrite( $fp, $response );

		fclose( $fp );

		//that worked out well

		return $response;

	}

}

function get_json_data_from_file( $jsonFileName ){

	$fileName = dirname(__FILE__) ."/". $jsonFileName;

	$jsonData = "";

	if( file_exists( $fileName )){

		$theFile = fopen( $fileName, "r" );

		$jsonData = fread( $theFile, filesize( $fileName ));

		fclose( $theFile );

	}

	return $jsonData;

}


function file_missing_or_old( $fileName, $ageInHours ){

	$fileName = dirname(__FILE__) ."/". $fileName;

	if( !file_exists( $fileName )){

		return true;

	} else{

		$fileModified = filemtime( $fileName );

		$today = time( );

		$hoursSince = round(($today - $fileModified)/3600, 3);

		if( $hoursSince > $ageInHours ){

			return true;

		} else{

			return false;

		}

	}

}

if (isset($_GET['username']) && $_GET['username']) {
	$tweets = get_twitter_feeds ($_GET['username']);
	echo json_encode($tweets);
	exit;
}

//$tweets = get_twitter_feeds ('johnmbarrows');
//var_dump($tweets);
?>