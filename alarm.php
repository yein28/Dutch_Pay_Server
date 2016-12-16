<?php
	include ("dbconfig.php");
	mysqli_set_charset($con, "utf8");

	$id = $_POST['id'];
	$sql = "SELECT * FROM book WHERE rent='$id';";

	$result = mysqli_query($con, $sql);
	
	if( mysqli_num_rows($result) > 0 ){
		echo "exist";
	} else {
		echo "no_exist";
	}

	mysqli_close($con);
?>
