<?php

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