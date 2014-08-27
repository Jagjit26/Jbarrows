<?php

function get_twitter_feeds ($username) {
	$jsonFileName = "$username.json";

	$jsonTempFileName = "$username.json.tmp";

	$jsonURL = "https://api.twitter.com/1/statuses/user_timeline.json?screen_name=$username&include_entities=true";
	
	//have we fetched twitter data in the last hour?

	if( file_missing_or_old( $jsonFileName, 1 )){

		//get new data from twitter

		$jsonData = save_remote_file( $jsonURL, $jsonFileName );

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
	
	if( $tweets = json_decode( $jsonData )){

		return $tweets;

	} else{

		//tweets is null

		return false;

	}
}

function save_remote_file( $url, $fileName ){

	$response = file_get_contents( $url );

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

?>