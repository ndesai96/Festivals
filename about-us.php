<?php
	
	session_start();

	include './nav/nav.php';
	include './modal/modal.php';
	include './general.php';

	writeHead();
	writeBody();
	writeAbout();
	writeBottom();

	function writeAbout() {

		print <<<ABOUT

		<div class="container">
			<h1>About Us</h1>


		</div>

ABOUT;

	}
	
?>

