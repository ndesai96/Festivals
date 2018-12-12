<?php
	
	function writeModal() {

		print <<<MODAL
			<div id="popup" class="popup">
	            <div class="card">
	                <div onclick="exitModal();" class="close" title="Close Modal">&times;</div>
	                <div class="content">
	                    <div class="login show-form" id="signin">
	                        <h2>Sign in to Festival Finder</h2>
	                        <form class="loginForm" id="loginForm" method="post">
	                            <input class="textField" name="user" type="text" size="30" placeholder="Username" />
	                            <input class="textField" name="pass" type="password" size="30" placeholder="Password" />
	                            <p id="errorLogin" class="error"></p>
	                            <div class="buttons">
	                                <input name="loginButton" class="button" type="submit" value="Log In" onclick="validateLogin();" />
	                                <input class="button" type="reset" value="Clear" />
	                            </div>
	                        </form>
	                    </div>
	                    <div class="register" id="register">
	                        <h2>Register with Festival Finder</h2>
	                        <form class="registerForm" id="registerForm" method="post">
	                            <input class="textField" name="user" type="text" size="30" placeholder="Username" />
	                            <input class="textField" name="pass" type="password" size="30" placeholder="Password" />
	                            <input class="textField" name="confirmPass" type="password" size="30" id="confirmPass" placeholder="Confirm Password" />
	                            <p id="errorRegister" class="error"></p>
	                            <div class="buttons">
	                                <input name="registerButton" class="button" type="submit" value="Register" onclick="validateRegister();" />
	                                <input class="button" type="reset" value="Clear" />
	                            </div>
	                        </form>
	                    </div>
	                    <div class="divider"></div>
	                    <p class="noAccount show-form" id="noAccount">Don't have an account? <a href="javascript:viewRegister();">Register</a></p>
	                    <p class="haveAccount" id="haveAccount">Already have an account? <a href="javascript:viewSignIn();">Log in</a></p>
	                </div>
	                <div class="footer">
	                    <button class="cancel button" onclick="exitModal();">Cancel</button>
	                </div>
	            </div>
	        </div>
MODAL;

	}

?>