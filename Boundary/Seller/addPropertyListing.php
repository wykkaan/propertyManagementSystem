<?php
include_once("../../Controller/Seller/addPropertyListingCtl.php");

// this is a commit test

$e1 = "";
$e2 = "";
$e3 = "";
$e4 = "";

if (isset($_POST["addPropertyListing"])) {
	$property_name = $_POST["property_name"];
    $property_price = $_POST["property_price"];
    $property_description = $_POST["property_description"];
    $seller_id = $_POST["seller_id"];
    $addUserProfileCtl = new addPropertyListingCtl();
    $addUserProfileCtl->addPropertyListing($property_name, $property_price, $property_description,$seller_id);
}
  
?>

<html>
<head>
	<title>Seller - Add Property Listing</title>
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
                    <p>Seller Management System </p>
                </div>
                <div class="topnav">
                    <a href="seller.php">Back</a>
                </div>
            </div>
        </section>
        <hr>
		<div class="form-box">
			<h3>Add Property Listing:</h3>

			<?php
			?>
			
			<form method="post" id="addPropertyListing" name="addPropertyListing" class="user-input" onsubmit="return checkForm(this);">
				<input type="text" name="property_name" class="input-field" placeholder="Name" required>
				<input type="text" name="property_price" class="input-field" placeholder="Price" required>
				<input type="text" name="property_description" class="input-field" placeholder="Description" required>
				<span>
					<?php echo $e1 ?>
				</span>
				<input type="submit" name="addPropertyListing" class="submit-btn" value="Add Property Listing">
			</form>
		</div>
	</div>

</html>
<script>
	var y = document.getElementById("addPropertyListing");
	var z = document.getElementById("btn");

	function addPropertyListing() {
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


	function addPropertyListingSuccess() {
		alert("You have successfully added!")
	}

	function clearForm() {
		document.getElementById("addPropertyListing").reset();
	}
</script>
</body>