<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbName ="ing3s2project";

	$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

	$conn or die("<p>Error connecting to database: " .
		mysql_connect_error() . "</p>");