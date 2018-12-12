<?php
	
	session_start();

	include './nav/nav.php';
	include './modal/modal.php';
	include './general.php';

	writeHead();
	writeBody();
	writeSearch();
	writeBottom();

	function retrieveAll() {

		$connect = connectDB();
		$sql = "SELECT name, city, country, category, startDate, endDate, images FROM festivals ORDER BY name";
		$result = mysqli_query($connect, $sql);
		mysqli_close($connect);
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}

		return $rows;

	}

	function writeSearch() {

		print <<<SEARCH
		<div class="container">
			<h1>Search</h1>		
SEARCH;

		writeSearchForm();

		print <<<COLLECTION
			<div class="festivalCollection">
COLLECTION;

		$festivals = retrieveAll();
		
		foreach ($festivals as $festival) {
			$name = $festival['name'];
			$city = $festival['city'];
			$country = $festival['country'];
			$category = $festival['category'];
			
			$startDate = $festival['startDate'];
			$endDate = $festival['endDate'];
			$startDate = date_create_from_format('n/j/y', $startDate);
			$startDate = date_format($startDate,"F j, Y");
			$endDate = date_create_from_format('n/j/y', $endDate);
			$endDate = date_format($endDate,"F j, Y");
			
			$images = explode(',', $festival['images']);

			writeFestivalCard($name, $city, $country, $category, $startDate, $endDate, $images[0]);
		}

		print <<<BOTTOM
			</div>
		</div>
BOTTOM;

	}

	function writeFestivalCard($name, $city, $country, $category, $startDate, $endDate, $image) {


		print <<<CARD

				<div class="festivalCard">
	                <div class="favorite">
	                    <img src="./img/favorite.png">
	                </div>
	                <div class="festivalImg">
	                    <a href=""><img src="./img/$image"></a>
	                </div>
	                <div class="festivalContent">
	                    <h2 class="festivalName">$name</h2>
	                    <h4 class="festivalRegion">$city, $country</h4>
	                    <h4 class="festivalCategory">$category</h4>
	                    <div class="spacer"></div>
	                    <h4 class="festivalDates">$startDate - $endDate</h4>
	                </div>
	            </div>

CARD;

	}   
/*
<div class="festivalCard">
    <div class="favorite">
        <img src="../img/favorite.png">
    </div>
    <div class="festivalImg">
        <a href=""><img src="../img/holi-1.jpg"></a>
    </div>

    <div class="festivalContent">
        <h2 class="festivalName">Holi</h2>
        <h4 class="festivalRegion">Mathura, India</h4>
        <h4 class="festivalCategory">Culture</h4>
        <div class="spacer"></div>
        <h4 class="festivalDates">March 20th, 2019 - March 21st, 2019</h4>
    </div>
</div>
*/

	function writeSearchForm() {

		print <<<FORM

			<form class="searchForm" method="post">
                <select name="category">
                    <option value="" selected>Any Category</option>
                    <option value="art">Art</option>
                    <option value="culture">Culture</option>
                    <option value="history">History</option>
                    <option value="film">Film</option>
                    <option value="food">Food</option>
                    <option value="music">Music</option>
                </select>
                <select name="region">
                    <option value="" selected>Any Region</option>
                    <option value="africa">Africa</option>
                    <option value="asia">Asia</option>
                    <option value="australia">Australia</option>
                    <option value="europe">Europe</option>
                    <option value="na">North America</option>
                    <option value="sa">South America</option>
                </select>
                <select name="time">
                    <option value="" selected>Any Season</option>
                    <option value="spring">Spring</option>
                    <option value="summer">Summer</option>
                    <option value="fall">Fall</option>
                    <option value="winter">Winter</option>
                </select>
                <input class="button searchBtn" type="submit" value="Search" />
                <input class="button searchBtn" type="reset" value="Reset" />
            </form>

FORM;

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

