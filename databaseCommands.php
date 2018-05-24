<?php
	
	function addUrl($db, $url, $date)
	{
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
			$last_id = $db->lastInsertId();
			$count = $stmt->rowCount();
			return $last_id;
			}catch (PDOException $e) {
				exit("There was a problem adding the site");
			}
	}
/******************************************************************************************************************************/	
	function addSites($db, $last_id, $links)
	{
		foreach ($links as $link)
		{
			echo $i++
			var_dump($links);
			$sql = "INSERT INTO `sitelinks` (site_id, link) VALUES (:site_id, :link)";
			try{
				$stmt = $db->prepare($sql);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//bind parameter to placeholder
				$stmt->bindParam(":site_id", $last_id, PDO::PARAM_STR);
				$stmt->bindParam(":link", $link, PDO::PARAM_STR);
				$stmt->execute();
				$count = $stmt->rowCount();
				return $count;
			}catch (PDOException $e) {
				exit("There was a problem adding the site");
			}
		}
	}
	/*^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^/*