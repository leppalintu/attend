<?php
	$host = "localhost";
	$dbname = "kiisu";
	$user = "kutsu";
	$password = "koerasaba";
	$conn = new PDO("mysql:host=$host;dbname=$dbname;", $user, $password);
	if($conn == true){
		echo "connect to db works";
	} else {
		echo "peetis db connect: err";
	}
?>