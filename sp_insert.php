/************************************
*									*
*	Calling Stored Procedures		*
*									*
************************************/

<?php

	//create connection to the database
	$conn = openCon();
	
	//Insert values in the database
	$query = "CALL storedProcedureName(?,?)";
	
	//Create the prepared statement using mysqli_prepare(conn,query) function
	$p_stmt = mysqli_prepare($conn,$query);
	
	//Bind the parameters to the question marks in the query
	// The question marks are binded to the parameters using the appropriate data type
	// i stands for integer
	// d for double
	// b for blob
	// s for everything else
	mysqli_stmt_bind_param($p_stmt,"ss",$mobNo,$name);
	
	// Execute the query
	mysqli_stmt_execute($p_stmt);
	
	// Store the no. of rows affected
	$affected_rows = mysqli_stmt_affected_rows($p_stmt);
	
	// For an insert query, the no. of rows affected should always be 1
	if($affected_rows == 1){
		//Store the mobile no. in session to identify the user on different pages
		$_SESSION["mobNo"] = $mobNo;
		header('location: somePage.php');
	}
	else
		echo mysqli_error($conn);
	
	//Close the statement and connection
	mysqli_stmt_close($p_stmt);
	closeCon($conn);
?>