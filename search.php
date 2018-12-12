<?php
	
	session_start();

	include './nav/nav.php';
	include './modal/modal.php';
	include './general.php';

	writeHead();
	writeBody();
	writeSearch();
	writeBottom();

	function writeSearch() {

		print <<<SEARCH

		<div class="container">
			<h1>Search</h1>


		</div>

SEARCH;

	}
	
?>

