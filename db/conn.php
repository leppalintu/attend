<?php
	$host = '127.0.0.1';
	$db = 'kiisu';
	$user = 'kutsu';
	$pass = 'koerasaba';

	$dsn = "mysql:host=$host;dbname=$db";
	try{
		$pdo = new PDO($dsn, $user, $pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
		throw new PDOException($e->getMessage());
	}
	require_once 'user.php';
?>