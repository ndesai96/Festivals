var xhr;

if (window.ActiveXObject) {
	xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

else if (window.XMLHttpRequest) {
	xhr = new XMLHttpRequest();
}

function validateLogin(event) {

	event = event || window.event;
	var form = document.getElementById("loginForm");
	var user = form.user.value;
  	var pass = form.pass.value;

  	if (user == "" || pass == "") {
		document.getElementById('errorLogin').innerHTML = "Please fill out all input fields"; 
	}

	else {
		var url = "./modal/login.php";
		var params = `user=${user}&pass=${pass}`;
		xhr.open ("POST", url, true); 
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = responseLogin; 
		xhr.send(params); 
	}

  	event.preventDefault();

}

function responseLogin() {
	if (xhr.readyState == 4) { 
        if (xhr.status == 200) { 
            var response = xhr.responseText;
            
            if (response == "false") {
            	document.getElementById('errorLogin').innerHTML = "Username and password was incorrect";
            }

            else {
            	window.alert("Log In Successful");
            	document.getElementById("loginForm").submit();
            }          
        }
    }
}

function validateRegister(event) {
	
	event = event || window.event;
	var form = document.getElementById("registerForm");
	var user = form.user.value;
  	var pass = form.pass.value;
  	var confirmPass = form.confirmPass.value;

  	if (user == "" || pass == "") {
		document.getElementById('errorRegister').innerHTML = "Please fill out all input fields"; 
	}

	else if (pass != confirmPass) {
		document.getElementById('errorRegister').innerHTML = "Passwords do not match"; 
	}

	else {
		var url = "./modal/register.php";
		var params = `user=${user}&pass=${pass}`;
		xhr.open ("POST", url, true); 
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = responseRegister; 
		xhr.send(params);
	}

  	event.preventDefault();

}

function responseRegister() {
	if (xhr.readyState == 4) { 
        if (xhr.status == 200) { 
            var response = xhr.responseText;
            
            if (response == "false") {
            	document.getElementById('errorRegister').innerHTML = "Username is already taken";
            }

            else {
            	window.alert("Registration Successful");
            	document.getElementById("registerForm").submit();
            } 
        }
    }
}

function viewModalSignIn() {
	document.getElementById('popup').classList.add('show-form');
	viewSignIn();
}

function viewModalRegister() {
	document.getElementById('popup').classList.add('show-form');
	viewRegister();
}

function exitModal() {
	document.getElementById('popup').classList.remove('show-form');

	document.getElementById('errorLogin').innerHTML = ""; 
	document.getElementById('errorRegister').innerHTML = ""; 

	document.getElementById("loginForm").reset();
	document.getElementById("registerForm").reset();
}

function viewSignIn() {
	document.getElementById('signin').classList.add('show-form');
	document.getElementById('noAccount').classList.add('show-form');

	document.getElementById('register').classList.remove('show-form');
	document.getElementById('haveAccount').classList.remove('show-form');
}

function viewRegister() {
	document.getElementById('signin').classList.remove('show-form');
	document.getElementById('noAccount').classList.remove('show-form');

	document.getElementById('register').classList.add('show-form');
	document.getElementById('haveAccount').classList.add('show-form');
}