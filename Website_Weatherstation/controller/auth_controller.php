<?php

	$connection = false;


	function GetConnection() {
		global $connection;
		if ($connection) {
			return $connection;
		}
		
		$server = 'localhost';
		$db_username = 'root';
		$db_password = 'FourTwenty420';
		$db = 'weather_application';
		
		$connection = mysqli_connect($server, $db_username, $db_password, $db) or die('Could not connect to the database.');

		return $connection;
	}


	function CloseConnection() {
		global $connection;
		if ($connection) {
			mysqli_close($connection);
		}
		$connection = false;
	}




	function LogIn() {

		global $connection;
		if (!$connection) {
			$connection = GetConnection();
		}


		$email = $_POST["email"];
		$password = $_POST["psswrd"];

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			CloseConnection();
			header("Location: http://localhost/Website_Weatherstation/views/index.php");

		if ($stmt = mysqli_prepare($connection, "SELECT password, admin FROM users WHERE email=?")) {

			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $result_hash, $admin_bool);
			mysqli_stmt_fetch($stmt);

			mysqli_stmt_close($stmt);

		}

		if (password_verify($password, $result_hash)) {
			session_start();
			$_SESSION["email"] = $email;
			$_SESSION["admin"] = $admin_bool;
			header("Location: http://localhost/Website_Weatherstation/views/graph_page.php");
		} else {
			header("Location: http://localhost/Website_Weatherstation/views/index.php");
		}

		



	}


	Login();

	/*$test_email = 'samikroon@gmail.com';
	$test_password = 'jemoeder1995';

	$hashed_password = password_hash($test_password, PASSWORD_DEFAULT);

	mysqli_query($connection, "INSERT INTO users(email, password, first_name, last_name)
		VALUES('$test_email', '$hashed_password', 'Sam', 'Kroon')");
	echo "finish";
	*/


	
?>