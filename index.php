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

		<div class="container index-page">

			<div class="description">
            
                <h1>Find an Experience</h1>
                
                <p>Festival Finder allows you to find your destination. If you want to travel the world and immerse yourself in the beautiful cultures around the globe, we provide you with all of the information you need. Create an account to see people's experiences.</p>
                
            </div>
            
            <div class="index-festivals">
                
                <div class="index-festival-type">
                
                    <h3>Music</h3>
                    <img src="img/acl-1.jpg">
                    
                </div>
                
                <div class="index-festival-type">
                
                    <h3>Culture</h3>
                    <img src="img/holi-1.jpg">
                    
                </div>
                
                <div class="index-festival-type">
                
                    <h3>Food</h3>
                    <img src="img/pizzafest.png">
                    
                </div>
            
            </div>

		</div>

INDEX;

	}
	
?>

