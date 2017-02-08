<!doctype html>
<!-- the header for all the pages, here it checks if you are logged in, if this is not the case, you get redirected to the log-in page immediately-->

<?php
	session_start();
	if (!$_SESSION["email"]) {
		header("Location: http://localhost/Website_Weatherstation/views/Visibility.php/views/index.php");
	}
?>

<html lang="en">
<header class="standard_header">
	<meta charset="utf-8">
        <link rel="shortcut icon" type="image/x-icon" href="http://localhost/Website_Weatherstation/images/favicon.ico">
	<a href="http://localhost/Website_Weatherstation/views/graph_page.php" class="button">Graph page</a>
    		<?php 
    			if ($_SESSION["admin"]) {
    				?><a href="http://localhost/Website_Weatherstation/views/admin.php" class="button"><span>Administration</span></a><?php
    			}
    		?>
	<title>Online Weather App</title>
	<meta name="description" content="Weather App showing ">
	<meta name="author" content="Bold Brothers inc">

	<link rel="stylesheet" type="text/css" href="http://localhost/Website_Weatherstation/CSS/main.css">

	<h1>ONLINE WEATHER APP</h1>

</header>