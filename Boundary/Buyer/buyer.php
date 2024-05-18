<?php
// Include necessary controller and entity files
include_once("../../Controller/Buyer/getSellerPropertyListingCtl.php");
include_once("../../Controller/Buyer/searchSellerPropertyListingCtl.php");
include_once("../../Controller/Buyer/addFavouritesCtl.php");
include_once("../../Controller/Buyer/updateInterestCountCtl.php");
include_once("../../Entity/listPropertyEntity.php");

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

// Create instances of the required controllers
$propertyListingCtl = new getSellerPropertyListingCtl();
$searchCtl = new searchSellerPropertyListingCtl();
$favCtl = new addFavouritesCtl();
$updateInterestCountCtl = new updateInterestCountCtl(); // Instantiate the updateInterestCount controller

// Retrieve property listings
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if (!empty($search)) {
        $propertyListings = $searchCtl->searchSellerPropertyListing($search);
    } else {
        $propertyListings = $propertyListingCtl->getSellerPropertyListing();
    }
} else {
    $propertyListings = $propertyListingCtl->getSellerPropertyListing();
}

// Handle favourite button action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['propertylisting_id'])) {
    $prop_id = $_POST['propertylisting_id'];
    $favCtl->addFavourite($prop_id);
    $updateInterestCountCtl->updateInterestCount($prop_id);
    echo 'success';
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buyer Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/ua_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,800;1,100;1,400&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url("../../Images/background.jpg");
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function addFavourite(propertylisting_id) {
            $.ajax({
                url: 'buyer.php',
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
</head>
<body>
    <div class="white-box">
        <section>
            <div class="container1">
                <div class="logo">
                    <p>Buyer Page</p>
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
        <div class="container1" style="margin-top: -3%; margin-bottom: 3%;">
            <div class="search">
                <form method="POST">
                    <div class="search">
                        <form method="POST">
                            <div class="search-bar">
                                <input type="text" class="searchTerm" name="search" placeholder="Search By Property" style="height:100%; width:65%; margin-top: -5%;">
                                <button type="submit" class="searchButton" style="margin-top: -5%;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
        <table id="profileTable" class="CMtable" style="width:100%">
            <tr>
                <th>Listed Properties</th>
                <th>View More</th>
                <th>Action</th>
            </tr>
            <?php foreach ($propertyListings as $propertylisting) { ?>
                <tr id="property-<?php echo $propertylisting['propertylisting_id']; ?>">
                    <td><?php echo isset($propertylisting['property_name']) ? $propertylisting['property_name'] : ''; ?></td>
                    <td>
                        <form method="get" action="viewMore.php">
                            <input type="hidden" name="propertylisting_id" value="<?php echo isset($propertylisting['propertylisting_id']) ? $propertylisting['propertylisting_id'] : ''; ?>">
                            <button type="submit">View More</button>
                        </form>
                    </td>
                    <td>
                        <button onclick="addFavourite(<?php echo $propertylisting['propertylisting_id']; ?>)">Favourite</button>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br><br><br><br>
