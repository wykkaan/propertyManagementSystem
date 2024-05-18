<?php
include_once("../../Controller/Buyer/getSoldPropertyListingCtl.php");
include_once("../../Controller/Buyer/searchSellerPropertyListingCtl.php");
include_once("../../Controller/Buyer/addFavouritesCtl.php");

//session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

$viewSellerCtl = new getSoldPropertyListingCtl();
$viewSeller = $viewSellerCtl->getSoldPropertyListing();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$searchCtl = new searchSellerPropertyListingCtl();

$favCtl = new addFavouritesCtl();

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if (!empty($search)) {
        $viewSeller = $searchCtl->searchSellerPropertyListing($search);
    } else {
        // If search field is empty, retrieve all accounts
        $viewSeller = $viewSellerCtl->getSoldPropertyListing($user_id);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['propertylisting_id'])) {
    $prop_id = $_POST['propertylisting_id'];
    $favCtl->addFavourite($prop_id);
    echo 'success';
    exit();
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,800;1,100&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-image: url("../../Images/background.jpg");
        }
    </style>
    <script>
        function addFavourite(propertylisting_id) {
            $.ajax({
                url: 'pastPropertyListing.php',
                type: 'POST',
                data: { propertylisting_id: propertylisting_id },
                success: function(response) {
                    if (response === 'success') {
                        // Remove the property from the list
                        $('#property-' + propertylisting_id).remove();
                    } else {
                        alert('Failed to add to favourites.');
                    }
                },
                error: function() {
                    alert('Error processing request.');
                }
            });
        }
    </script>
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
                    <a href="buyer.php">PROPERTY LISTING</a>
                    <a href="favourite.php">VIEW FAVOURITE</a>
                    <a href="../Buyer/viewrealestateAgent.php">AGENTS</a>
                    <a href="../Buyer/getReview.php">REVIEWS</a>
                    <a href="../Buyer/pastPropertyListing.php">SOLD PROPERTY</a>
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
                        <input type="text" class="searchTerm" name="search" placeholder="Search By Property" style="height:100%; width:60%; margin-top: -5%;">
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
                <th>View Count</th>
                <th>Interest Count</th>
                <th>Action</th>
            </tr>
            <?php foreach ($viewSeller as $viewSellers) { ?>
                <tr id="property-<?php echo $viewSellers['propertylisting_id']; ?>">
                    <td contenteditable="true" class="CMtable"><?php echo isset($viewSellers['property_name']) ? $viewSellers['property_name'] : ''; ?></td>
                    <td contenteditable="true" class="CMtable"><?php echo isset($viewSellers['property_price']) ? $viewSellers['property_price'] : ''; ?></td>
                    <td contenteditable="true" class="CMtable"><?php echo isset($viewSellers['property_description']) ? $viewSellers['property_description'] : ''; ?></td>
                    <td contenteditable="true" class="CMtable"><?php echo isset($viewSellers['seller_name']) ? $viewSellers['seller_name'] : ''; ?></td>
                    <td contenteditable="true" class="CMtable"><?php echo isset($viewSellers['view_count']) ? $viewSellers['view_count'] : ''; ?></td>
                    <td contenteditable="true" class="CMtable"><?php echo isset($viewSellers['interest_count']) ? $viewSellers['interest_count'] : ''; ?></td>
                    <td>
                        <button onclick="addFavourite(<?php echo $viewSellers['propertylisting_id']; ?>)">Favourite</button>
                    </td>      
                </tr>
            <?php } ?>
        </table>
        <br><br><br><br>
    <script>
        function logout() {
            console.log("Logged out");
            window.location.href = '../SystemAdmin/index.php';
        }

        document.addEventListener("DOMContentLoaded", function () {
            updateToggleSwitchListeners();

            document.getElementById('search').addEventListener('input', function (e) {
                var searchVal = e.target.value.toLowerCase();
                var table = document.getElementById('profileTable');

                for (var i = 1, row; row = table.rows[i]; i++) {
                    var profile = row.cells[0].innerText;

                    if (profile.toLowerCase().includes(searchVal)) {
                        row.style.display = "";
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });

        function updateToggleSwitchListeners() {
            // Placeholder for the updateToggleSwitchListeners function
        }
    </script>
</body>

</html>

