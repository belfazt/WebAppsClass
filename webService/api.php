<?php

	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	$url = "https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=10e93e713dd6b58254bb75310e29f43b&text=guadalajara&sort=relevance&format=rest&api_sig=bfaf4db05f5090473ec6d053252dc16b";	
	
	// create curl resource 
	$ch = curl_init();

	
	curl_setopt($ch, CURLOPT_URL, $url);
	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

	// $output contains the output string 
	$output = curl_exec($ch);

	$xml = simplexml_load_string($output);
	$json = json_encode($xml);

	echo $json;

	// close curl resource to free up system resources 
	curl_close($ch);


	$m = new MongoClient();
	$db = $m->jsonAPI;
	$collection = $db->flickr;
	$doc = json_decode($json,true);
	$doc = $doc ["photos"]["photo"];
	foreach ($doc as $item) {
		$collection->insert($item["@attributes"]);
	}

?>