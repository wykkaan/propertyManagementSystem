<?php
include_once("../../Controller/Seller/addReviewCtl.php");

$e1 = "";
$e2 = "";
$e3 = "";
$e4 = "";

// Get the realestate_id from the URL
$realestate_id = isset($_GET['realestate_id']) ? $_GET['realestate_id'] : '';

if (isset($_POST["addReview"])) {
    $realestate_id = $_POST["realestate_id"];
    $review_rating = $_POST["review_rating"];
    $review_description = $_POST["review_description"];
    $addReviewCtl = new addReviewCtl();
    $addReviewCtl->addReview($realestate_id, $review_rating, $review_description);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seller - Add Review</title>
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
                <p>Add Review</p>
            </div>
            <div class="topnav">
                <a href="viewrealestateAgent.php">BACK</a>
            </div>
        </div>
    </section>
    <hr>
    <div class="form-box">
        <form method="post" id="addReview" name="addreview" class="user-input">
            <input type="hidden" name="realestate_id" value="<?php echo htmlspecialchars($realestate_id); ?>">
            <input type="text" name="review_rating" class="input-field" placeholder="0-5" required>
            <input type="text" name="review_description" class="input-field" placeholder="Add your review" required>
            <span><?php echo $e1 ?></span>
            <input type="submit" name="addReview" class="submit-btn" value="Submit Review">
        </form>
    </div>
</div>

<script>
    var y = document.getElementById("addreview");
    var z = document.getElementById("btn");

    function addPropertyListing() {
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
    }

    window.onload = function() {
        var alertDiv = document.getElementById('alert-message');
        var alertMessage = alertMessage || '';
        if (alertMessage.length > 0) {
            alertDiv.innerHTML = '<p>' + alertMessage + '</p>';
        }
    };

    function addPropertyListingSuccess() {
        alert("You have successfully added!");
    }

    function clearForm() {
        document.getElementById("addReview").reset();
    }
</script>
</body>
</html>
