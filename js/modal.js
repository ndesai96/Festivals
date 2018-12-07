var element = document.getElementById('popup');

window.onclick = function(event) {
    if (event.target == element) {
        element.classList.remove('active');
    }
}

function viewModalSignIn() {
	var element = document.getElementById('popup'); 
	element.classList.add('active');
	viewSignIn();
}

function viewModalRegister() {
	var element = document.getElementById('popup'); 
	element.classList.add('active');
	viewRegister();
}

function exitModal() {
	var element = document.getElementById('popup'); 
	element.classList.remove('active');
}

function viewSignIn() {
	document.getElementById('signin').classList.add('active');
	document.getElementById('noAccount').classList.add('active');

	document.getElementById('register').classList.remove('active');
	document.getElementById('haveAccount').classList.remove('active');
}

function viewRegister() {
	document.getElementById('signin').classList.remove('active');
	document.getElementById('noAccount').classList.remove('active');

	document.getElementById('register').classList.add('active');
	document.getElementById('haveAccount').classList.add('active');
}