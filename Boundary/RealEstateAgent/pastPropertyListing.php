<?php
include_once("../../Controller/RealEstateAgent/getPastPropertyListingCtl.php");
include_once("../../Controller/RealEstateAgent/searchSellerPropertyCtl.php");


$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

$aNameCtl = new getPastPropertyListingCtl();
$aName = $aNameCtl->getPastPropertyListing($user_id);


error_reporting(E_ALL);
ini_set('display_errors', 1);

$searchCtl = new searchSellerPropertyCtl();

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if (!empty($search)) {
        $aName = $searchCtl->searchSellerProperty($search);
    } else {
        // If search field is empty, retrieve all accounts
        $aName = $getPropertyCtl->getProperty($user_id);
    }
} 

?>



<!DOCTYPE html>
<html>

<head>
    <title>User Admin</title>
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
                    <p>Sold Property Page</p>
                </div>
                <div class="topnav">
                    <a href="../SystemAdmin/index.php" onclick="logout()">LOG OUT</a>
                    <a href="../RealEstateAgent/getReview.php">REVIEW</a>
                    <a href="../RealEstateAgent/realestateAgent.php">LISTINGS</a>
                    <a href="../RealEstateAgent/pastPropertyListing.php">SOLD PROPERTY</a>
                </div>
            </div>
        </section>
        <hr>
        <br>
        <br>
        <div class="container1" style="margin-top: -3%; margin-bottom: 3%; ">
            <div class="search">
                <form method="POST">
                    <div class="search-bar">
                        <input type="text" class="searchTerm" name="search" placeholder="Search by Property" style="height:100%; width:60%; margin-top: -5%;">
                        <button type="submit" class="searchButton" style="margin-top: -5%;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
    </div>
    <table id="profileTable" class="CMtable" style="width:100%">
    <tr>
    <th>Property Listing</th>
    <th>Price</th>
    <th>Description</th>
    <th>Seller Name</th>
    <th>Interest Count</th>
    <th>View Count</th>
    </tr>
    <?php foreach ($aName as $aNames) { ?>
    <tr>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($aNames['property_name']) ? $aNames['property_name'] : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($aNames['property_price']) ? '$' . number_format($aNames['property_price']) : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($aNames['property_description']) ? $aNames['property_description'] : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($aNames['seller_name']) ? $aNames['seller_name'] : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($aNames['view_count']) ? $aNames['view_count'] : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($aNames['interest_count']) ? $aNames['interest_count'] : ''; ?></td>
        </td>
    </tr>
<?php } ?>

    </table>
        <br>
    </div>
</body>

<script>
    var user = document.querySelectorAll(".editable");
    var table = document.getElementById('userTable');
</script>


</html>