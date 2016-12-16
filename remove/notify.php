<?php 
 	if(isset($_POST["Token"])) {
		$token = $_POST["Token"];
		
		include("dbconfig.php");
 		mysqli_set_charset($con, "utf8");
		
		$sql = "INSERT INTO user(Token) Values ('$token') ON DUPLICATE KEY UPDATE Token = '$token';";

		mysqli_query($con, $sql);

		mysqli_close($con);
	}
?>
