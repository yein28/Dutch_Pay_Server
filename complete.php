<?php
	include("dbconfig.php");
	mysqli_set_charset($con, "utf8");
	
	if(!$con)
		echo "Failed to connect DB";

	$value = $_POST['json'];
	//$value = '{"loan":"test","date":"2016\/12\/20","bank":"test","account":"5","item":[{"rent":"hease2","money":"2500"},{"rent":"t","money":"2000"}]}';
	$decode =json_decode($value, true);

	$loan = $decode['loan'];
	$date = $decode['date'];
	$bank = $decode['bank'];
	$account = $decode['account'];

	$item = $decode['item'];
	foreach($item as $key=>$value){
		$rent = $value['rent'];
		$money = $value['money'];
		$query="insert into book(loan, rent, money, date, bank, account) ";
		$query.="values( '$loan', '$rent', '$money', '$date', '$bank', '$account');";
			
		mysqli_query($con,$query) or die("fail");
	}
	echo "success";
	mysqli_close($con);
?>
