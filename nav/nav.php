<?php

	function writeNav($loggedin) {

		if ($loggedin == "true") {
			print <<<NAV

		<div class="nav-custom">

            <div class="logo">
                <a href=""><img class="logo" src="img/logo-2.png"></a>
            </div>

            <div class="nav-links">

                <ul>
                    <li><a href="./pages/search.html">Search</a></li>
                    <li><a href="./pages/favorites.html">Favorites</a></li>
                    <li><a href="./pages/about.html">About Us</a></li>
                </ul>

            </div>

            <div class="nav-spacer"></div>

            <div class="nav-login">

                <ul>
                    <li><a href="">Hi, username!</a></li>
                    <li><a href="">Log Out</a></li>
                </ul>

            </div>

        </div>
		
NAV;
		}

		else {
			print <<<NAV

		<div class="nav-custom">

            <div class="logo">
                <a href=""><img class="logo" src="img/logo-2.png"></a>
            </div>

            <div class="nav-links">

                <ul>
                    <li><a href="./pages/search.html">Search</a></li>
                    <li><a href="./pages/favorites.html">Favorites</a></li>
                    <li><a href="./pages/about.html">About Us</a></li>
                </ul>

            </div>

            <div class="nav-spacer"></div>

            <div class="nav-login">

                <ul>
                    <li><a href="javascript:viewModalSignIn();">Log In</a></li>
                    <li><a href="javascript:viewModalRegister();">Register</a></li>
                </ul>

            </div>

        </div>
		
NAV;
	    }

	}

?>