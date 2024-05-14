<?php
include_once("../../Controller/SystemAdmin/UserAccountLoginCtl.php");
include_once("../../Controller/SystemAdmin/addUserAccountCtl.php");

$username = "";
$password = "";
$e1 = "";
$e2 = "";
$e3 = "";
$e4 = "";

if (isset($_POST["addUser"])) {
    validateFullname($e1);
    validateUsername($e2);
    validatePassword($e3);
    validateUserProfile($e4);
    if (empty($e1) && empty($e2) && empty($e3) && empty($e4)) {
        addUserAccount($_POST["user_fullname"], $_POST["username"],  $_POST["password"], $_POST["user_profile"]);
    }
}

function validateFullname(&$e1)
{
    global $user_fullname;
    $user_fullname = trim($_POST["user_fullname"]);
    if (empty($user_fullname)) {
        $e1 = "Please enter fullname";
    }
}
function validateUserName(&$e2)
{
    global $username;
    $username = trim($_POST["username"]);
    if (empty($username)) {
        $e2 = "Please fill in Username";
    }
}

function validatePassword(&$e3)
{
    global $password;
    $password = trim($_POST["password"]);
    if (empty($password)) {
        $e3 = "Please fill in password";
    }
}

function validateUserProfile(&$e4)
{
    global $custProfile;
    $custProfile = trim($_POST["user_profile"]);
    if (empty($custProfile)) {
        $e4 = "Please select your profile";
    }
}


function addUserAccount($username, $password, $email, $user_profile)
{
    global $e1;
    $cRC = new addUserAccountCtl();
    $results = $cRC->addUserAccount($username, $password, $email, $user_profile);
    if ($results == true) {
        echo "Signup SUCCESSFUL";
    } else {
        echo "Signup Failed";
        $e1 = "User Name taken";
    }
}

?>

<html>

<head>
    <title>System Admin - Add user account</title>
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
                    <p>Property Management System</p>
                </div>
                <div class="topnav">
                    <a href="index.php">LOG OUT</a>
                    <a href="userProfile.php">PROFILE</a>
                    <a href="userAccount.php">USER</a>
                </div>
            </div>
        </section>
        <hr>

        <h2> Add user form: </h2>
        <?php
        ?>

        <form method="post" id="addUser" class="user-input" onsubmit="return checkForm(this);" style="width:50%">

            <label for="user_profile">User profile:</label>
            <select name="user_profile" id="user_profile">
                <option value="System Admin">System Admin</option>
                <option value="Real Estate Agent">Real Estate Agent</option>
                <option value="Seller">Seller</option>
                <option value="Buyer">Buyer</option>
            </select>
            <br><br>
            <input type="text" name="user_fullname" class="input-field" placeholder="Fullname" required>
            <br><br>
            <input type="text" name="username" class="input-field" placeholder="Username" required>
            <br><br>
            <input type="text" name="password" class="input-field" placeholder="Password" required>
            <br><br>
            <input type="submit" name="addUser" class="submit-btn button3" value="Add User">
        </form>
    </div>
    </div>
    </div>

</html>
<script>
    var y = document.getElementById("addUser");
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