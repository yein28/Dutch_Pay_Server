<?php
	include("dbconfig.php");
	mysqli_set_charset($con, "utf8");

	if( !$con )
		echo "Failed to connect DB";
	
	$id =$_POST['id'];

	$query="SELECT * FROM book WHERE rent='$id'";
//	$query="SELECT * FROM book WHERE rent='t'";
	
	$result=mysqli_query($con,$query);
	$num_row=mysqli_num_rows($result);
	
	$arr=array();

	if( $num_row==0 ){
		echo "not exists";
	}else{
		while( $row=mysqli_fetch_array($result) ) {
			$query2="SELECT rate FROM member where id='$row[1]'";
			$res2 = mysqli_query($con,$query2);
			$rate = mysqli_fetch_array($res2);
			array_push(
				$arr,
				array( 'id'=>$row[1], 'rate'=>$rate[0], 'money'=>$row[3] ,'date'=>$row[4],
				'bank'=>$row[5], 'account'=>$row[6])
			);
		}
		echo urldecode(json_encode(array("result"=>$arr)));
	}
	mysqli_close($con);
?>
