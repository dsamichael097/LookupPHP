/************************************
*									*
*	Establish Database Connection	*
*									*
************************************/								

<?php

	//Function to open a connection to database
	function openCon(){
		//Database connection Parameters
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "root";
		$db = "quizphp";
		
		//Connect to the database
		$conn = new mysqli($dbhost,$dbuser,$dbpass,$db);
		
		//If connection fails
		if($conn === false)
			die("ERROR: Could not connect. " . $conn -> connect_error);
		
		return $conn;
	}
	
	//Function to close a connection to database
	function closeCon($conn){
		$conn -> close();
	}
?>

/********************************
*								*
*	Use Existing Connection		*
*								*
********************************/

<?php
	// To import the file only once
	require_once('../DatabaseConnections/db.php');
	$conn = openCon();
	
	//To close the connection
	closeCon($conn);
?>

/************************************
*									*
*	Create and Destroy Sessions		*
*									*
************************************/

<?php

	//start the session and should be the first line in the php file
	session_start();
	
	//To create session variables
	$_SESSION["mobNo"] = $mobNo;

	//Remove all session variables
	session_unset();
	
	//Destroy the session
	session_destroy();
	
?>

	