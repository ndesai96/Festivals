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

			<table class="table">
	            <tr>
	                <td class="name-title"><p class="name">Neil Desai<p>
	                <p class="mail"><a href="mailto:neildesai@utexas.edu" target="_top">Send Mail</a><p>
	                </td>
	                <td class="bio">Neil is a travel enthusiast. He has traveled to many regions around the world, and has experience in planning big trips.</td>
	                <td class="profilepic"><img src="./img/neil.jpg"></td>
	            </tr>
	            <tr>
	                <td class="name-title"><p class="name">Nabeel Masood</p>
	                <p class="mail"><a href="mailto:nmasood96@utexas.edu" target="_top">Send Mail</a></p>
	                </td>
	                <td class="bio">Nabeel loves to immerse in the cultures of the places he travels to. He has traveled to many regions and learned about the ways of the people.</td>
	                <td class="profilepic"><img src="./img/nabeel.jpg"></td>
	            </tr>
	            <tr>
	                <td class="name-title"><p class="name">Aparna Kakarlapudi</p>
	                <p class="mail"><a href="mailto:apkakarlapudi@utexas.com" target="_top">Send Mail</a></p>
	                </td>
	                <td class="bio">Aparna loves travelling to new places and learning about them! She has taken trips to countries such as Iceland and India and loves to plan and organize trips. </td>
	                <td class="profilepic"><img src="./img/aparna.jpg"></td>
	            </tr>
            </table>

		</div>

ABOUT;

	}
	
?>

