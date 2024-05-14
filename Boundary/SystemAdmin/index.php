<?php
include_once("../../Controller/SystemAdmin/UserAccountLoginCtl.php");
include_once("../../Controller/SystemAdmin/UserAccountRegisterCtl.php");


$username = "";
$password = "";
$e1 = "";
$e2 = "";
$e3 = "";

if (isset($_POST["login"])) {
    validateUserName($e1);
    validatePassword($e2);
    if (empty($e1) && empty($e2)) {
        loginAccount($_POST["username"], $_POST["password"]);
    }
}

if (isset($_POST["register"])) {
    validateUsername($e1);
    validatePassword($e2);
    validateFullname($e3);
    if (empty($e1) && empty($e2) && empty($e3)) {
        RegisterCustomerAccount($_POST["user_fullname"], $_POST["username"], $_POST["password"]);
    }
}

function validateUserName(&$e1)
{
    global $username;
    $username = trim($_POST["username"]);
    if (empty($username)) {
        $e1 = "Please fill in Username";
    }

}

function validatePassword(&$e2)
{
    global $password;
    $password = trim($_POST["password"]);
    if (empty($password)) {
        $e2 = "Please fill in password";
    }
}

function validateFullname(&$e3)
{
    global $email;
    $email = trim($_POST["user_fullname"]);
    if (empty($email)) {
        $e3 = "Please fill in name";
    }
}


function loginAccount($username, $password)
{
    global $e1;
    $cLGC = new UserAccountLoginCtl();
    $results = $cLGC->loginAccount($username, $password);
    if ($results == true) {
		echo "Login Success";
    } else {
        echo "Login Failed";
        $e1 = "Please try again";
    }

	
}
function RegisterCustomerAccount($user_fullname, $username, $password)
{
    global $e1;
    $cRC = new UserAccountRegisterCtl();
    $results = $cRC->RegisterCustomerAccount($user_fullname,$username, $password);
    if ($results == true) {
        echo "Signup SUCCESSFUL";
    } else {
        echo "Signup Failed";
        $e1 = "User Name taken";
    }
}

?>

<style>
	*
	{
		margin: 0;
		padding: 0;
		font-family: sans-serif;
	}
	 
	.backgroundImage
	{
		height: 100%;
		width: 100%;
		background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(../../Images/background.jpg);
		background-position: center;
		background-size: cover;
		position: absolute;
	}
	
	.form-box
	{
		width: 380px;
		height: 480px;
		position: relative;
		margin: 3% auto;
		background: #fff;
		padding: 5px;
		overflow: hidden;
	}
	
	.button-box
	{
		width: 250px;
		margin: 35px auto;
		position: relative;
		box-shadow: 0 0 10px 3px #800000;
		border-radius: 30px;
	}
	
	.login-btn
	{
		padding-top: 14px;
		padding-right: 11px;
		padding-bottom: 14px;
		padding-left: 50px;
		cursor: pointer;
		background: transparent;
		border: 0;
		outline: none;
		position: relative;
	}
	
	#btn
	{
		top: 0;
		left: 0;
		position: absolute;
		width: 140px;
		height: 100%;
		background: linear-gradient(to right, #008080, #DCAE96);
		border-radius:30px;
		transition: .5s;
	}
	
	.user-input
	{
		top: 170px;
		position: absolute;
		width: 280px;
		transition: .5s;
	}
	
	.input-field
	{
		width: 100%;
		padding: 15px 0 5px;
		margin: 5px 0;
		border-left: 0;
		border-top: 0;
		border-right: 0;
		border-bottom: 1px solid #777;
		outline: none;
		background: transparent;
	}
	
	.submit-btn
	{
		width: 85%;
		padding: 10px 30px;
		cursor: pointer;
		display: block;
		margin: auto;
		background: linear-gradient(to right, #008080, #DCAE96);
		border: 0;
		outline: none;
		border-radius: 30px;
	}
	
	.check-box
	{
		margin: 3px 10px 30px 0;
	}
	
	span
	{
		color: #777;
		font-size: 14px;
		position: absolute;
	}
	
	#register label
	{
		font-size: 15px;
	}
	
	#login
	{
		left: 50px;
	}
	
	#register
	{
		left: 450px;
	}
</style>
<html>
<body>
	<div class="backgroundImage">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="login-btn" onclick="login()"><strong>Login</strong></button>
				<button type="button" class="login-btn" onclick="register()"><strong>Register</strong></button>
			</div>		
			<h3></h3>
			<form id="login" class="user-input" method="POST">
   				 <input type="text" name="username" class="input-field" placeholder="Username"  value="<?php echo $username ?>" required>
   				 <input type="password" name="password" class="input-field" placeholder="Password" value="<?php echo $password ?>" required><br><br>
   				 <input type="submit" name="login" class="submit-btn" value="Login">
					<div id="alert-message"></div>
			</form>
			<?php echo $e1?>
		
		<form method="post" id="register" class="user-input" onsubmit="return checkForm(this);">
			<input type="text" name="user_fullname" class="input-field" placeholder="Name" required>
			<input type="text" name="username" class="input-field" placeholder="Username" required>
			<span>
     		  <?php //echo $e1 ?>
  			</span>
			<input type="text" name="password" class="input-field" placeholder="Password" required><br><br>
			<input type="checkbox" class="check-box" required name="terms">
			<span>I agree to the <a href="#">terms & conditions</a></span>
			<input type="submit" name="register" class="submit-btn" value="Register">
		</form>
		</div>
	</div>
	</html>
	<script>
	var x = document.getElementById("login");
	var y = document.getElementById("register");	
	var z = document.getElementById("btn");
	
	function register()
	{
		x.style.left = "-400px";
		y.style.left = "50px";
		z.style.left = "110px";
	}
	
	function login()
	{
		x.style.left = "50px";
		y.style.left = "450px";
		z.style.left = "0px";
	}
	
	var checkForm = function(form) {
    if(!form.terms.checked) {
      alert("Please indicate that you accept the Terms and Conditions");
      form.terms.focus();
      return false;
    }
    return true;
  };


	</script>
	<script>


  	window.onload = function() {
    var alertDiv = document.getElementById('alert-message');
    var alertMessage = alertMessage || '';
    if (alertMessage.length > 0) {
      alertDiv.innerHTML = '<p>' + alertMessage + '</p>';
    }
  };


	function registerSuccess()
	{
		alert("You have successfully registered!")
	}

	function clearForm() 
	{
 		document.getElementById("register").reset();
	}

	
	</script>
</body>