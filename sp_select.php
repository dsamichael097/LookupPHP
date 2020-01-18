/************************************
*									*
*	Calling Stored Procedures		*
*									*
************************************/

<?php
	$conn = openCon();
	
	$query = "CALL storedProcedureName";
	
	//Store the returned result in response
	$response = mysqli_query($conn,$query);
	
	//If the rows are returned
	if($response){
		//Fetch one row at a time from response array
		while($row = mysqli_fetch_array($response)){
			//A single row at a time is fetched into $row, and the required results can
			// be obtained from the $row array using
			// $row["someKey"];
		}
	}
	else{
		echo mysqli_error($conn);
	}
	
	closeCon($conn);
?>