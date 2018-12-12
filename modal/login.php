<?php
	
	include '../db.php'

	$connect = connectDB();

	$user = mysqli_real_escape_string($connect, $_POST["user"]);
	$pass = mysqli_real_escape_string($connect, md5($_POST["pass"]));

	$table = "users";
	$sql = "select * from dinner where user='".$user."'";
	$result = mysqli_query($connect, $sql);
	mysqli_close($connect);
	
	if ($results->num_rows === 0) {
		$response = "false";
	}

	else {
		$row = $result->fetch_row();

		if ($row[1] == $pass) {
			$response = "true";
		}

		else {
			$response = "false";
		}
	}
	
	$result->free();
	echo $response;

?>