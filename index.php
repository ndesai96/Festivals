<?php
	
	session_start();

	include './nav/nav.php';
	include './modal/modal.php';
	include './general.php';

	writeHead();
	writeBody();
	writeIndex();
	writeBottom();

	function writeIndex() {

		print <<<INDEX

		<div class="container">
			<h1>Index</h1>


		</div>

INDEX;

	}
	
?>

