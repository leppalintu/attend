<?php 
    // Development Connection
    // $host = '127.0.0.1';
    // $db = 'attendance_db';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';

    //Remote Database Connection
    $host = 'localhost';
    $db = 'kiisu';
    $user = 'kutsu';
    $pass = 'koerasaba';
  #  $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    if($pdo == true){
		echo "connect to db works";
	} else {
		echo "peetis db connect: err";
	}
    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);
   
#    $user->insertUser("admin","password");
?>