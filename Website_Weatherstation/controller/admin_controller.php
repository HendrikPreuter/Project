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


	function CreateUser(){
		
		global $connection;
		if (!$connection) {
			$connection = GetConnection();
		}


		$email = $_POST["new_email"];
		$password = password_hash($_POST["new_psswrd"], PASSWORD_DEFAULT);
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		if (!$_POST["new_admin"]) {
			$new_admin = 0;
		} else {
			$new_admin = 1;
		}
		echo $new_admin;

		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !$password) {
			CloseConnection();
			header("Location: http://localhost:8000/views/admin.php");
		}

		$stmt = mysqli_prepare($connection, "INSERT INTO users (first_name, last_name, email, password, admin) VALUES (?, ?, ?, ?, ?)");

		mysqli_stmt_bind_param($stmt, "ssssi", $fname, $lname, $email, $password, $new_admin);
		mysqli_stmt_execute($stmt);


		
		

		mysqli_stmt_close($stmt);
		CloseConnection();

		header("Location: http://localhost:8000/views/admin.php");


	}


	function RemoveUser(){

		global $connection;
		if (!$connection) {
			$connection = GetConnection();
		}

		$id_remove = $_POST["remove_id"];

		$stmt = mysqli_prepare($connection, "DELETE FROM users WHERE id=?");

		mysqli_stmt_bind_param($stmt, "s", $id_remove);
		mysqli_stmt_execute($stmt);

		mysqli_stmt_close($stmt);
		CloseConnection();

		header("Location: http://localhost:8000/views/admin.php");

	}




	switch ($_POST["function"]) {
		case 'create':
			CreateUser();
			break;
		
		case 'remove':
			RemoveUser();
			break;

		default:
			header("Location: http://localhost:8000/views/admin.php");
			break;
	}
	/*function LogIn() {

		global $connection;
		if (!$connection) {
			$connection = GetConnection();
		}


		$email = $_POST["email"];
		$password = $_POST["psswrd"];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			CloseConnection();
			header("Location: http://localhost:8000/views/index.php");
		}
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
			header("Location: http://localhost:8000/views/graph_page.php");
		}



	}


	Login();
	*/

	/*$test_email = 'samikroon@gmail.com';
	$test_password = 'jemoeder1995';

	$hashed_password = password_hash($test_password, PASSWORD_DEFAULT);

	mysqli_query($connection, "INSERT INTO users(email, password, first_name, last_name)
		VALUES('$test_email', '$hashed_password', 'Sam', 'Kroon')");
	echo "finish";
	*/


	
?>