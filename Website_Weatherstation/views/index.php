<?php include './include_files/login_header.php'; ?>
<?php include './include_files/footer.php'; ?>

<body class="body">
	<div class="login_div">
		<h2>Login please</h2>
		<form action="http://localhost/Website_Weatherstation/controller/auth_controller.php" method="post">

			<p style="padding-left: 53px;">Email: <input type="text" placeholder="email" name="email" required><p>

			<p style="padding-left: 30px;">Password: <input type="password" placeholder="password" name="psswrd" required></p>

			<p style="text-align: center;"><button type="submit">Login</button></p>
		</form>
	</div>
    


</body>

