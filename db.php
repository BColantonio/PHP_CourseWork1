<?php
$dsn = "mysql:host=localhost;dbname=phpclassspring2018";
$userName = "PHPClassSpring2018";
$pWord = "SE266";
try {
	$db = new PDO($dsn, $userName, $pWord); 
} catch (PDOExeption $e) {
	die("Cannot connect to the database");
}
?>