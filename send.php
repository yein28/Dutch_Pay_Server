<?php 
	function send_notification ($tokens, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array (
			'registration_ids' => $tokens,
			'data' => $message
			);
		$headers = array (
			'Authorization:key =' . GOOGLE_API_KEY,
			'Content-Type: application/json'
			);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

		$result = curl_exec($ch);

		if ($result === FALSE){
			die('Curl failed: '. curl_error($ch));
		}

		curl_close($ch);
		return $result;
	}

	include("dbconfig.php");
	mysqli_set_charset($con, "utf8");

	$id = $_POST['id'];
	$query="update member set rate=rate-0.5 where id='$id';";
	mysqli_query($con,$query);

	$sql = "select token from member where id='$id';";
	$result = mysqli_query($con, $sql);
	$tokens = array();

	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$tokens[] = $row["token"];
		}
	}
	mysqli_close($con);

	$myMessage = "'빌린 돈'을 확인해보세요!";		

	$message = array("message" => $myMessage);
	$message_status = send_notification($tokens,  $message);
	echo $message_status;	
?>
