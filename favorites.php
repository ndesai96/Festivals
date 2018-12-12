<?php
	
	session_start();

	include './nav/nav.php';
	include './modal/modal.php';
	include './general.php';

	writeHead();
	writeBody();
	writeFavorites();
	writeBottom();

	function writeFavorites() {

		print <<<FAVORITES

		<div class="container">
			<h1>Favorites</h1>


		</div>

FAVORITES;

	}
	
?>

