<?php
	
	session_start();

	include './nav/nav.php';
	include './modal/modal.php';
	include './general.php';

	writeHead();
	writeBody();
	writeFestival();
	writeBottom();

	function writeFestival() {

		$festival = $_GET['festival'];

		print <<<FESTIVAL

		<div class="container">
			<h1>$festival</h1>


		</div>

FESTIVAL;

	}
	
?>

