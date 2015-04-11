<?php
    include_once 'session.php';
    
    $host = "localhost";
	$username = "root";
	$pass = "root";
	$database = "charity";
    
    $conn = new mysqli($host, $username, $pass, $database);
    if($conn->connect_error)
	{
		die();
	}
?>