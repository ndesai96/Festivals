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
		$festival = retrieveFestival($festival);
		$festival = $festival[0];

		$name = $festival['name'];
		$category = $festival['category'];
		$city = $festival['city'];
		$region = $festival['region'];
		$country = $festival['country'];
		$continent = $festival['continent'];
		$season = $festival['season'];
		$description = $festival['description'];
		
		$startDate = $festival['startDate'];
		$endDate = $festival['endDate'];
		$startDate = date_create_from_format('n/j/y', $startDate);
		$startDate = date_format($startDate,"F j, Y");
		$endDate = date_create_from_format('n/j/y', $endDate);
		$endDate = date_format($endDate,"F j, Y");
		
		$images = explode(',', $festival['images']);

		print <<<FESTIVAL

		<div class="container">
			<h1>$name</h1>

			

FESTIVAL;

		writeCarousel($images);

		print <<<BOTTOM

			<div class="information">
				<p>$category Festival during the $season season</p>
	            <p>$city, $region, $country</p>
	            <p>$startDate - $endDate</p>
	            <p>$description</p>
            </div>

		</div>

BOTTOM;

	}

	function writeCarousel($images) {

		print <<<CAROUSEL

			<div id="myCarousel" class="carousel slide" data-ride="carousel">
                
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="./img/$images[0]" alt="img0">
                    </div>
                    <div class="item">
                        <img src="./img/$images[1]" alt="img1">
                    </div>
                    <div class="item">
                        <img src="./img/$images[2]" alt="img2">
                    </div>
                </div>

                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	                <span class="sr-only">Previous</span>
	            </a>
	            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	                <span class="sr-only">Next</span>
	            </a>
            </div>

CAROUSEL;

	}

	function retrieveFestival($festival) {

		$connect = connectDB();
		$sql = "SELECT * FROM festivals WHERE name='".$festival."'";
		$result = mysqli_query($connect, $sql);
		mysqli_close($connect);
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}

		return $rows;

	}

	function connectDB() {
		
		$host = "fall-2018.cs.utexas.edu";
		$user = "cs329e_mitra_nrd483";
		$pwd = "Flight8toast8class";
		$dbs = "cs329e_mitra_nrd483";
		$port = "3306";
		$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);
		if (empty($connect)) {
	  		die("mysqli_connect failed: " . mysqli_connect_error());
		}
		return $connect;
	}
	
?>

