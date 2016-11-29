<?php
	# password validate check rutine demand
	include("dbconfig.php");
	mysqli_set_charset($con, "utf8");

	if( !$con )
		echo "Failed to connect DB";
	
	$id=$_POST['id'];
	$pwd=$_POST['pwd'];
	
	$query="SELECT * FROM member WHERE id='$id'";
	
	$result=mysqli_query($con,$query);
	$num_row=mysqli_num_rows($result);
	
	if( $num_row==0 ){
		$query2="insert into member(id,pwd) values('$id', '$pwd')";
		mysqli_query($con,$query2);
		echo "success";
	}else{
		echo "already exists";	
	}
	
	mysqli_close($con);
?>
