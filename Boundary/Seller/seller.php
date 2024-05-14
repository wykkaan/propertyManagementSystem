<?php
include_once("../../Controller/Seller/getSellerPropertyCtl.php");
include_once("../../Controller/Seller/searchSellerPropertyCtl.php");

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

$viewSellerCtl = new getSellerPropertyCtl();
$viewSeller = $viewSellerCtl->getSellerProperty($user_id);


error_reporting(E_ALL);
ini_set('display_errors', 1);

$searchCtl = new searchSellerPropertyCtl();

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if (!empty($search)) {
        $viewSeller = $searchCtl->searchSellerProperty($search);
    } else {
        // If search field is empty, retrieve all accounts
        $viewSeller = $getSellerPropertyCtl->getSellerProperty($user_id);
    }
} /*else {
    // If search field is not set, retrieve all accounts
    $viewSeller = $getSellerPropertyCtl->getSellerProperty($user_id);
}*/

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
                    <p>Seller Page</p>
                </div>
                <div class="topnav">
                    <a href="../SystemAdmin/index.php" onclick="logout()">LOG OUT</a>
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
                        <input type="text" class="searchTerm" name="search" placeholder="Search by Username" style="height:100%; width:60%; margin-top: -5%;">
                        <button type="submit" class="searchButton" style="margin-top: -5%;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        <div class="topnav" style="margin-top: 1%;">
            <a1 onclick="location.href='addPropertyListing.php'" style="margin-left: 5%;">
                <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add Property
            </a1>
        </div>
    </div>
    <table id="profileTable" class="CMtable" style="width:100%">
    <tr>
    <th>Property Listing</th>
    <th>Price</th>
    <th>Description</th>
    <th>Action</th>
    </tr>
    <?php foreach ($viewSeller as $viewSellers) { ?>
    <tr>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($viewSellers['property_name']) ? $viewSellers['property_name'] : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($viewSellers['property_price']) ? $viewSellers['property_price'] : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($viewSellers['property_description']) ? $viewSellers['property_description'] : ''; ?></td>
        <td>
            <a href="updatePropertyListing.php?propertylisting_id=<?php echo isset($viewSellers['propertylisting_id']) ? $viewSellers['propertylisting_id'] : ''; ?>&property_name=<?php echo isset($viewSellers['property_name']) ? $viewSellers['property_name'] : ''; ?>">Update</a> |
            <a href="deletePropertyListing.php?propertylisting_id=<?php echo isset($viewSellers['propertylisting_id']) ? $viewSellers['propertylisting_id'] : ''; ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
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