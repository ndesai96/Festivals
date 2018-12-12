<?php

	include './nav/nav.php';
	include './modal/modal.php';

	writeTop();
	writeNav("false");
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

		<link rel="stylesheet" href="./css/navbar.css">

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

