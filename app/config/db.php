<?php

	function dbConnect(){
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'titanium';

		try {
			$conn = new mysqli($host, $user, $pass, $db);
		} catch (Exception $e) {
			die("Nie udało się połączyć z bazą danych.<br>".$e->getMessage()."<br>Numer błędu: ".$e->getCode());
		}

		if ($conn->connect_errno) {
			die("Błędne połączenie z db: ".$conn->connect_errno);
		}

		return $conn;
	}
?>