<?php
	
	$connect = connectDB();

	$user = mysqli_real_escape_string($connect, $_POST["user"]);
	$pass = mysqli_real_escape_string($connect, md5($_POST["pass"]));

	$val = "'".$user."'";
	$sql = "select * from users where user=".$val;
	$result = mysqli_query($connect, $sql);

	if ($result->num_rows != 0) {
		$response = "false";
	}

	else {
		$val = "('".$user."','".$pass."')";
		$sql = "INSERT into users (user, pass) values ".$val;
		mysqli_query($connect, $sql);
		$response="true";
	}

	$result->free();
	mysqli_close($connect);
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