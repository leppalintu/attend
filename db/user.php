<?php
	class user{
		private $db;
		function __construct($conn){
			$this->db = $conn;
		}
		public function getUser($username,$passord){
			try{
				$sql= "select * from users where username = :username AND password = :password";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(':username', $username);
				$stmt->bindparam(':password', $password);
				$stmt->execute();
				$result = $stmt->fetch();
				return $result;
			}catch (PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}
	}
?>