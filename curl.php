<?php
		$links = array();
		//create a new cURL resource
		$curl = curl_init();
		
		//set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		
		
		//grab URL and pass it to the browser
		$result = curl_exec($curl);
		
		//array_unique($links);
		
		//match page links
		preg_match_all("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/",$result, $match);
		
		$links = array_unique($match[0]);
		
		print_r($links);
				
		/* //parse_str($match, $links);
		$match = array_map("unserialize", array_unique(array_map("serialize", $match)));
		
		var_dump($match);
		//var_dump($result);
		var_dump($links[0]);
		
		//var_dump(array_unique($match));
			
		//var_dump($links);
		/* $links[1] = $match[1];
		echo ($links[1]); */
		
		//close cURL resource, and free up system resources */
		curl_close($curl);
	
?>