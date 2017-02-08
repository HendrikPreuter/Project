<?php include 'include_files/header.php'; 

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

?>

<body class="body">
	<div class="create_user">
		<form action="http://localhost/Website_Weatherstation/controller/admin_controller.php" method="post">

			<p style="padding-left: 25px;">First name: <input type="text" placeholder="First name" name="fname"><p>

			<p style="padding-left: 25px;">Last name: <input type="text" placeholder="Last name" name="lname"><p>

			<p style="padding-left: 53px;">Email: <input type="text" placeholder="email" name="new_email" required><p>

			<p style="padding-left: 30px;">Password: <input type="password" placeholder="password" name="new_psswrd" required></p>

			<p style="padding-left: 45px;">Admin: <input type="checkbox" name="new_admin" value=1></p>

			<input type="hidden" name="function" value="create">

			<p style="text-align: center;"><button type="submit">Create</button></p>
		</form>
	</div>

	<div class="remove_user_form">
			<table border="1" class="remove_table">
				<tr>
					<td>Last name</td>
					<td>First name</td>
					<td>Emailadress</td>
					<td>Option</td>
				</tr>
				<?php
				global $connection;
				if (!$connection) {
					$connection = GetConnection();
				}
				session_start();
				if ($stmt = mysqli_prepare($connection, "SELECT id, last_name, first_name, email FROM users WHERE email!=?")) {

					mysqli_stmt_bind_param($stmt, "s", $_SESSION["email"]);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $id_user, $lname, $fname, $email);
					while(mysqli_stmt_fetch($stmt)) {
						?>
							<tr> 
								<form action="http://localhost/Website_Weatherstation/controller/admin_controller.php" method="post">
									<td><?php echo $lname;?></td>
									<td><?php echo $fname;?></td>
									<td><?php echo $email;?></td>
									<td><input type="hidden" name="remove_id" value="<?php echo $id_user;?>">
										<input type="hidden" name="function" value="remove">
										<input type="submit" name="remove" value="remove"></td>
								</form>
							</tr>

						<?php
					}

					mysqli_stmt_close($stmt);

				}
				?>
			</table>
	</div>

</body>

<?php include 'include_files/footer.php'; ?>