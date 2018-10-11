<?php
$dsn = env('DB_DSN');
$userName = env('DB_USER');
$pWord = env('DB_PASS');
try {
	$db = new PDO($dsn, $userName, $pWord); 
} catch (PDOExeption $e) {
	die("Cannot connect to the database");
}
?>