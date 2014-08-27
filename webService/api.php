<?php

	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	if (isset($_GET["search"])){
		$search = ($_GET["search"]);
		$url = "https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=f012b5873ca976c2dbc75379fd0dd899&text=".$search."&sort=relevance&format=rest&api_sig=f6d71e54d75d921ccce3c4e73868dcef";	
	}
	else{
		$url = "https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=f012b5873ca976c2dbc75379fd0dd899&text=guadalajara&sort=relevance&format=rest&api_sig=f6d71e54d75d921ccce3c4e73868dcef";	
	}
	
	
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