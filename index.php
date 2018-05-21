<?php
require_once("db.php");

	$url = filter_input(INPUT_POST, "url", FILTER_SANITIZE_URL) ?? 	filter_input (INPUT_GET, "url", FILTER_SANITIZE_URL) ?? null;
	
	if (preg_match ("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $url))
	{
		//include("mainForm.php");
		echo $url;
	}
	else if (!preg_match ("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $url))
	{
		include("mainForm.php");
		
		echo "* The url entered is incorrect or has already been recorded in the database.";
	}

require_once("footer.php");
?>