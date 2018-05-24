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
		
		//match page links
		preg_match_all("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/",$result, $match);
		
		$links = array_unique($match[0]);
		
		$length = count ($links);
		
		$body = "<body>" . PHP_EOL;
		for ($i = 0; $i < $length; $i++)
			{
				if(isset($links[$i]))
				{
					$body .= "<a href='" . $links[$i] . "'>" . $links[$i] . "</a><br>" . PHP_EOL;
				}
			}
		$body .= "</tbody>" . PHP_EOL;
		
		curl_close($curl);
		
		echo $body;
	
?>
		