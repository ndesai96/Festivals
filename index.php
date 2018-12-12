<?php
	
	session_start();

	include './nav/nav.php';
	include './modal/modal.php';

	if (isset($_POST["user"])) {
		$_SESSION["logged_in"] = "true";
		$_SESSION["user"] = $_POST["user"];
	}

	else if (isset($_POST["logoutButton"])) {
		$_SESSION["logged_in"] = "false";
		session_destroy();
	}

	writeTop();

	if ($_SESSION["logged_in"] == "true") {
		writeNav($_SESSION["user"]);
	}

	else {
		writeNav("false");
	}
	
	writeModal();
	writeBottom();

	function writeTop() {

		print <<<TOP
<html>
	<head>
		<title> Festival Finder </title>

		<link rel="stylesheet" href="./index.css">

		<link rel="stylesheet" href="./css/modal.css">
		<script type="text/javascript" src="./js/modal.js"></script>

		<link rel="stylesheet" href="./css/nav.css">

		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
					
TOP;

	}

	function writeBottom() {

		print <<<BOTTOM
	</body>
</html>
BOTTOM;
	
	}
	
?>

