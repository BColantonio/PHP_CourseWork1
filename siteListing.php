<?php 
	include("databaseCommands.php");
	include("db.php");
	if (!isset($dropDown)){$dropDown = "";}
	$options = returnURL($db);
	foreach ($options as $option)
	{
		$dropDown .= "<option value=" . $option['site_id'] . ">" . PHP_EOL; 
		$dropDown .= $option["site"];
		$dropDown .= "</option>" . PHP_EOL;
	}
	$id = filter_input(INPUT_GET, "siteId", FILTER_SANITIZE_NUMBER_INT) ?? null;
	?>

<a href="index.php">Site Entry</a> | <a href="siteListing.php">Site Listing</a><br /><h1>Sites App</h1>
	<form method="get" action="siteListing.php">
		<select name="siteId">
			<option value>Choose a site</option>
			<?php echo $dropDown;?>
		</select>
		<input type="submit">
	</form>
	<section>
		Choose a site, please!
		<?php 
		if(isset($id))
		{
			$id += 0;
			echo $id . "<br>";
			$returnedLinks = returnLinks ($db, $id);
			var_dump($returnedLinks);
			if (!isset($displayLinks)){$displayLinks = "";}
			foreach($returnedLinks as $link)
			{
				$displayLinks .= "<br><a href=" . $link["link"] . ">" . $link["link"] . "</a>" . PHP_EOL;
			}
			echo $displayLinks;
		}
		?>
	</section>
	
<?php 
include("footer.php");
?>
	
	

