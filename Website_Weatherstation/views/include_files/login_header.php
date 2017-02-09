<?php
    session_start();
?>
<!doctype html>
<!--  the header for the log-in page
-->
<html lang="en">
<header class="standard_header">
	<meta charset="utf-8">
        <link rel="shortcut icon" type="image/x-icon" href="http://localhost/Website_Weatherstation/images/favicon.ico">
	<title>Online Weather App</title>
	<meta name="description" content="Weather App showing ">
	<meta name="author" content="Bold Brothers inc">

	<link rel="stylesheet" type="text/css" href="http://localhost/Website_Weatherstation/CSS/main.css">

	<h1>ONLINE WEATHER APP</h1>
          <!-- library for creating the graph -->
    <script type = "text/javascript" src = "./include_files/canvasjs.min.js"> </script>

    <!-- code for the graph (Base/layout by CanvasJS, used for non-commercial
         purposes per the terms of service by
         Hendrik, Sam, Brendan, Johan and Gerard. -->
    <script type = "text/javascript" src = "./include_files/graph.js"> </script>

    <!-- library for the parser -->
    <script type = "text/javascript" src = "./include_files/papaparse.js"> </script>

    <!-- libraries for jquery -->
    <script type = "text/javascript" src = "./include_files/jquery-3.1.1.js"> </script>
    <script type = "text/javascript" src = "./include_files/jquery.csv.js"> </script>

</header>