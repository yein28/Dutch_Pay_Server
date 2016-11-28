<?php
	$con=mysqli_connect("localhost", "root", "1q2w3e4r", "mobile");
	mysqli_set_charset($con, "utf8");

	if( !$con )
		echo "Failed to connect DB";
	
	$id=$_POST['id'];
	$pwd=$_POST['pwd'];
	
	$query="SELECT * FROM member WHERE id='$id'";
	
	$result=$mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);
	$num_row=$result->num_rows;
	
	echo $num_row;
#	if( $num_row=1 ){
#		echo "ok";
#	}else{
#		echo "존재하지 않는 id입니다";
#	}
	
	mysqli_close($con);
?>
