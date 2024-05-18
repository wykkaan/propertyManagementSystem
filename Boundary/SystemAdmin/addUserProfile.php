<?php
include_once("../../Controller/SystemAdmin/addUserProfileCtl.php");

$e1 = "";
$e2 = "";
$e3 = "";
$e4 = "";

if (isset($_POST["addUserProfile"])) {
    $addUserProfileCtl = new addUserProfileCtl();
    $addUserProfileCtl->addUserProfile($_POST["user_profile"]);
}
  
?>

<html>
<head>
    <title>System Admin - Add user profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/ua_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,800;1,100;1,400&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            background-image: url("../../Images/background.jpg");
        }

    </style>
</head>

<body>
<div class="white-box">
        <section>
            <div class="container1">
                <div class="logo">
                    <p>Add User Profile</p>
                </div>
                <div class="topnav">
					<a href="index.php">LOG OUT</a>
                    <a href="userAccount.php">USER</a>
                    <a href="userProfile.php">HOME</a>
                </div>
            </div>
        </section>
        <hr>
		<div class="form-box">
			<h3>Add Profile:</h3>

			<?php
			?>

			<form method="post" id="addUserProfile" name="addUserProfile" class="user-input" onsubmit="return checkForm(this);">
				<input type="text" name="user_profile" class="input-field" placeholder="User profile" required>
				<span>
					<?php echo $e1 ?>
				</span>
				<input type="submit" name="addUserProfile" class="submit-btn" value="Add Profile">
			</form>
		</div>
	</div>

</html>
<script>
	var y = document.getElementById("addUserProfile");
	var z = document.getElementById("btn");

	function addUser() {
		x.style.left = "-400px";
		y.style.left = "50px";
		z.style.left = "110px";
	}
</script>
<script>
	window.onload = function() {
		var alertDiv = document.getElementById('alert-message');
		var alertMessage = alertMessage || '';
		if (alertMessage.length > 0) {
			alertDiv.innerHTML = '<p>' + alertMessage + '</p>';
		}
	};


	function addUserSuccess() {
		alert("You have successfully added!")
	}

	function clearForm() {
		document.getElementById("addUser").reset();
	}
</script>
</body>