<?php
	
	$connect = connectDB();

	$user = mysqli_real_escape_string($connect, $_POST["user"]);
	$pass = mysqli_real_escape_string($connect, md5($_POST["pass"]));

	$sql = "select * from users where user='".$user."'";
	$result = mysqli_query($connect, $sql);
	mysqli_close($connect);
	
	if ($result->num_rows == 0) {
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

	function connectDB() {
		
		$host = "fall-2018.cs.utexas.edu";
		$user = "cs329e_mitra_nrd483";
		$pwd = "Flight8toast8class";
		$dbs = "cs329e_mitra_nrd483";
		$port = "3306";
		$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);
		if (empty($connect)) {
	  		die("mysqli_connect failed: " . mysqli_connect_error());
		}
		return $connect;
	}

?>