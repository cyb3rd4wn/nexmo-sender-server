<?php
	if(isset($_REQUEST["api_key"]) && isset($_REQUEST["api_secret"])){
		$api_key	= $_REQUEST["api_key"];
		$api_secret	= $_REQUEST["api_secret"];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://rest.nexmo.com/account/numbers?api_key=$api_key&api_secret=$api_secret");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		curl_close ($ch);
		die($server_output);
	}else{
		$output	= array();
		$output['messages'][0]["status"] 		= 911;
		$output['messages'][0]["error-text"]	= "NO DATA!!";
		die(json_encode($output));
	}
?>