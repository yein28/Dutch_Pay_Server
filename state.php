<?php
	include("dbconfig.php");
	mysqli_set_charset($con, "utf8");

	if( !$con )
	echo "Failed to connect DB";

	$id=$_POST['var'];

	$query="SELECT rate FROM member WHERE id='$id'";
	$res=mysqli_query($con,$query) or die("fail");
	$row=mysqli_fetch_array($res);

	$query2="SELECT SUM(money) FROM book where loan='$id'";
	$res2=mysqli_query($con,$query2) or die("fail");
	$row2=mysqli_fetch_array($res2);

	if( is_null($row2[0]))
		$row2[0]=0;

	$query3="SELECT SUM(money) FROM book where debt='$id'";
	$res3=mysqli_query($con,$query3) or die("fail");
	$row3=mysqli_fetch_array($res3);

	if( is_null($row3[0]))
		$row3[0]=0;

	echo $row[0]."/".$row2[0]."/".$row3[0];
	mysqli_close($con);
?>
