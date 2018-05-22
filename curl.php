<?php
		$links = array();
		//create a new cURL resource
		$curl = curl_init();
		
		//set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		
		
		//grab URL and pass it to the browser
		$data = curl_exec($curl);
		
		//array_unique($links);
		
		//match page links
		preg_match_all("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/",$data, $match);
				
		//parse_str($match, $links);
		$match = array_map("unserialize", array_unique(array_map("serialize", $match)));
		
		var_dump($match);
		//var_dump($data);
		var_dump($links);
		
		//var_dump(array_unique($match));
			
		//var_dump($links);
		/* $links[1] = $match[1];
		echo ($links[1]); */
		
		//close cURL resource, and free up system resources
		curl_close($curl);
	
?>