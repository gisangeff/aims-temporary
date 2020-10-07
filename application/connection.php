<?php
class connection {

	function connect() {
		//connection
		try {
			$conn = new PDO("mysql:host=localhost;dbname=aims", 'root', '');
			//set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $conn;

		}
		catch(PDOExceoption $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}

}