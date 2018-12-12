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

		print <<<FESTIVAL

		<div class="container">
			<h1>Festival</h1>


		</div>

FESTIVAL;

	}
	
?>

