<?php
	include("dbconfig.php");
	mysqli_set_charset($con, "utf8");

	if( !$con )
		echo "Failed to connect DB";
	
	$type=$_POST['type'];
	$id =$_POST['id'];
	
	if( $type = 'loan' ){

	}
	else if( $type = 'rent' ){

	}
	else{

	}

	$query="SELECT * FROM member WHERE id='$id'";
	
	$result=mysqli_query($con,$query);
	$num_row=mysqli_num_rows($result);
	
	if( $num_row==0 ){
		echo "not exists";
	}else{
		$query2="SELECT pwd,rate FROM member WHERE id='$id'";
		$result2=mysqli_query($con, $query);
		$row=mysqli_fetch_array($result2);
		if( $row[2]==$pwd ){
			echo "success/".$row[3];
		}else{
			echo "fail";
		}
	}
	
	mysqli_close($con);
?>
