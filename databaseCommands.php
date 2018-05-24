<?php
	
	function addUrl($db, $url, $date)
	{
		$checksql = "SELECT * FROM `sites` WHERE site=:site";
		$count = 0;
		try{
			$stmt = $db->prepare($checksql);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//bind parameter to placeholder
			$stmt->bindParam(":site", $url, PDO::PARAM_STR);
			$stmt->execute();
			$count = $stmt->rowCount();
		}catch (PDOException $e) {
			exit("There was a problem reading the database");
		}
		if ($count == 0){
		$sql = "INSERT INTO `sites` (site, date) VALUES (:site, :date)";
		
		try{
			//prepare
			$stmt = $db->prepare($sql);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//bind parameter to placeholder
			$stmt->bindParam(":site", $url, PDO::PARAM_STR);
			$stmt->bindParam(":date", $date, PDO::PARAM_STR);
			//execute
			$stmt->execute();
			$last_id = (int)$db->lastInsertId();
			$count = $stmt->rowCount();
			return $last_id;
			}catch (PDOException $e) {
				exit("There was a problem adding the site");
			}
		}else{
			return $url . " exists already. Try again.";
		}
	}
	function addSites($db, $last_id, $links)
	{
		foreach ($links as $link)
		{
			$sql = "INSERT INTO `sitelinks` (site_id, link) VALUES (:site_id, :link)";
			try{
				$stmt = $db->prepare($sql);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//bind parameter to placeholder
				$stmt->bindParam(":site_id", $last_id, PDO::PARAM_STR);
				$stmt->bindParam(":link", $link, PDO::PARAM_STR);
				$stmt->execute();
			}catch (PDOException $e) {
				exit("There was a problem adding the site");
			}
		}
	}
	
	function returnURL ($db)
	{
		$sql = "SELECT * FROM `sites`";
		
		try{
			//prepare
			$stmt = $db->prepare($sql);
			//execute
			$stmt->execute();
			//retrieve
			$urls = $stmt->fetchALL(PDO::FETCH_ASSOC);
			//$count = $stmt->rowCount();
			/*?><p><?php
			print ("$count links retrieved/stored.");?>
			</p><?php*/
			return $urls;
		} catch(PDOException $e) {
		exit("There was a problem retrieving the sites");
		}
		
	}
	
	function returnLinks ($db, $id)
	{
		$sql = "SELECT * FROM `sitelinks` WHERE site_id=:site_id";
		
		$count = 0;
		try{
			$stmt = $db->prepare($sql);
			//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//bind parameter to placeholder
			$stmt->bindParam(":site_id", $id, PDO::PARAM_INT);
			$stmt->execute();
			$links = $stmt->fetchALL(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();
			?><p><?php
			print ("$count links retrieved/stored.");?>
			</p><?php
			return $links;
		}catch (PDOException $e) {
			exit("There was a problem reading the database");
		}
		
	}