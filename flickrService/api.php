<?php

	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	if(isset($_GET["filter"])){
		$url = "https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=d31b0fb59fcc91253ca0898627743553&text=".$_GET["filter"]."&sort=relevance&format=rest";	
	}
	else{
		$url = "https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=d31b0fb59fcc91253ca0898627743553&text=guadalajara&sort=relevance&format=rest";		
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