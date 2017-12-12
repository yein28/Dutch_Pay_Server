<?php
	include("dbconfig.php");
	mysqli_set_charset($con, "utf8");

	if( !$con )
		echo "Failed to connect DB";
	
	$id=$_POST['id'];
	
	$query="SELECT rate FROM member WHERE id='$id'";

	$result=mysqli_query($con,$query);
	$num_row=mysqli_num_rows($result);

	
	if( $num_row==0 ){
		echo "fail";
	}else{
		$rate = mysqli_fetch_array($result);
		echo $rate[0];	
	}
	
	mysqli_close($con);
?>
