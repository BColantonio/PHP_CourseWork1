<?php
require_once("db.php");
require_once("databaseCommands.php");

	$url = filter_input(INPUT_POST, "url", FILTER_SANITIZE_URL) ?? 	filter_input (INPUT_GET, "url", FILTER_SANITIZE_URL) ?? null;
	$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING) ?? 
		filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) ?? null;		

	if (!isset($url))
	{
		include("mainForm.php");
	}
	
	elseif (preg_match ("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $url))
	{
		include("mainForm.php");
		$date = date("m.d.y");
		$urlAddReturn = addUrl($db, $url, $date);
		if(is_string($urlAddReturn)) {
			echo "<br>" . $urlAddReturn . "<br>";
		} else {
			include("curl.php");
			addSites($db, $urlAddReturn, $links, $length);
			echo "<br>Links for: " . $url . " " . $date . "<br>";
		}
		//include("curl.php");
		
	}
	else if (!preg_match ("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $url))
	{
		include("mainForm.php");
		
		echo "* The url entered is incorrect or has already been recorded in the database.";
	}
		
	switch($action){
		
		case "List":
			{
				include("siteListing.php");
			}
	}
		
require_once("footer.php");
?>