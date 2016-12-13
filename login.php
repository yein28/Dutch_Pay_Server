<?php
	// login
	include("dbconfig.php");
	mysqli_set_charset($con, "utf8");

	if( !$con )
		echo "Failed to connect DB";
	
	$id=$_POST['id'];
	$pwd=$_POST['pwd'];
	
	$query="SELECT * FROM member WHERE id='$id'";
	
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);
	$num_row=mysqli_num_rows($result);
	
	if( $num_row==0 ){
		echo "not exists";
	}else{
		if( $row[2]==$pwd ){
			echo "success";
		}else{
			echo "fail";
		}
	}
	
	mysqli_close($con);
?>
