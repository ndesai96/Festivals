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
SEARCH;

		writeSearchForm();

		print <<<COLLECTION
			<div class="festivalCollection">
COLLECTION;

		if (isset($_POST["searchBtn"])) {
			$val = array();
			
			echo "Showing all ";

			$category = $_POST["category"];
			if ($category != "") {
				$val[] = "category='".$category."'";
				echo $category." ";
			}

			echo "festivals ";

			$region = $_POST["region"];
			if ($region != "") {
				$val[] = "continent='".$region."'";
				echo "in ".$region." ";
			}

			$season = $_POST["season"];
			if ($season != "") {
				$val[] = "season='".$season."'";
				echo "during ".$season;
			}

			echo "<br>";
			echo "<br>";

			$val = implode(',', $val);
			if ($val != "") {
				$val = " WHERE ".$val;
			}

			$festivals = retrieveSome($val);
		}

		else {
			$festivals = retrieveAll();
		}

		writeFestivals($festivals);

		print <<<BOTTOM
			</div>
		</div>
BOTTOM;

	}

	function retrieveSome($val) {

		$connect = connectDB();
		$sql = "SELECT name, city, country, category, startDate, endDate, images FROM festivals".$val." ORDER BY name";
		$result = mysqli_query($connect, $sql);
		mysqli_close($connect);
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}

		return $rows;

	}


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

	function writeFestivals($festivals) {
		
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
	}

	function writeFestivalCard($name, $city, $country, $category, $startDate, $endDate, $image) {

		print <<<CARD

				<div class="festivalCard">
	                <div class="favorite">
	                    <img src="./img/favorite.png">
	                </div>
	                <div class="festivalImg">
	                    <a href="./festival.php?festival=$name"><img src="./img/$image"></a>
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

	function writeSearchForm() {

		print <<<FORM

			<form class="searchForm" method="post">
                <select name="category">
                    <option value="" selected>Any Category</option>
                    <option value="Art">Art</option>
                    <option value="Culture">Culture</option>
                    <option value="History">History</option>
                    <option value="Film">Film</option>
                    <option value="Food">Food</option>
                    <option value="Music">Music</option>
                    <option value="Sports">Sports</option>
                </select>
                <select name="region">
                    <option value="" selected>Any Region</option>
                    <option value="Africa">Africa</option>
                    <option value="Asia">Asia</option>
                    <option value="Australia">Australia</option>
                    <option value="Europe">Europe</option>
                    <option value="North America">North America</option>
                    <option value="South America">South America</option>
                </select>
                <select name="season">
                    <option value="" selected>Any Season</option>
                    <option value="Spring">Spring</option>
                    <option value="Summer">Summer</option>
                    <option value="Fall">Fall</option>
                    <option value="Winter">Winter</option>
                </select>
                <input name="searchBtn" class="button searchBtn" type="submit" value="Search" />
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

