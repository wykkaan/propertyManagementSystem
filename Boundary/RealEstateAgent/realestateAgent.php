<?php
include_once("../../Controller/RealEstateAgent/getPropertyListingCtl.php");
include_once("../../Controller/RealEstateAgent/searchPropertyListingCtl.php");
//include_once("../../Controller/CafeManager/getBidsManagerCtl.php");




$propertyListingCtl = new getPropertyListingCtl();
$propertyListings = $propertyListingCtl->getPropertyListing();

/* $getBidsManagerCtl = new getBidsManagerCtl();
$bidsData = $getBidsManagerCtl->getBidsManager();
*/

// List property function

error_reporting(E_ALL);
ini_set('display_errors', 1);

$searchCtl = new searchPropertyListingCtl();

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if (!empty($search)) {
        $propertyListings = $searchCtl->searchPropertyListing($search);
    } else {
        // If search field is empty, retrieve all user profiles
        $propertyListings = $propertyListingCtl->getPropertyListing();
    }
} else {
    // If search field is not set, retrieve all user profiles
    $propertyListings = $propertyListingCtl->getPropertyListing();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Real Estate Page</title>
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
    </style>
</head>
<div class="white-box">
    <section>
        <div class="container1">
            <div class="logo">
                    <p>Real Estate Page </p>
            </div>
            <div class="topnav">
                <a href="../SystemAdmin/index.php" onclick="logout()">LOG OUT</a>
                <a href="status.php">STATUS</a>
                <a href="workslot.php">PROPERTY LISTING</a>
				<a href="assignStaff.php">ASSIGN STAFF</a>
            </div>
        </div>
    </section>
    <hr>
    <br>
    <br>
    <div class="container1" style="margin-top: -3%; margin-bottom: 3%; ">
        <div class="search">
            <form method="POST">
                <div class="search">
                    <form method="POST">
                        <div class="search-bar">
                            <input type="text" class="searchTerm" name="search" placeholder="Search by name" style="height:100%; width:65%; margin-top: -5%;">
                            <button type="submit" class="searchButton" style="margin-top: -5%;">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
    <!-- View Workslot to be filled -->
    <table id="profileTable" class="CMtable" style="width:100%">
    <tr>
    <th>Property Listing To Be Listed</th>
    <th>Price</th>
    <th>Description</th>
    <th>Seller</th>
    </tr>
        <?php foreach ($propertyListings as $propertylisting) { ?>
    <tr>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($propertylisting['property_name']) ? $propertylisting['property_name'] : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($propertylisting['property_price']) ? $propertylisting['property_price'] : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($propertylisting['property_description']) ? $propertylisting['property_description'] : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($propertylisting['seller_name']) ? $propertylisting['seller_name'] : ''; ?></td>
        <td>
            <a href="updatePropertyListing.php?propertylisting_id=<?php echo isset($propertylisting['propertylisting_id']) ? $propertylisting['propertylisting_id'] : ''; ?>&property_name=<?php echo isset($propertylisting['property_name']) ? $propertylisting['property_name'] : ''; ?>">List</a> |
            <a href="deletePropertyListing.php?propertylisting_id=<?php echo isset($propertylisting['propertylisting_id']) ? $propertylisting['propertylisting_id'] : ''; ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
        </td>
    </tr>
<?php } ?>

    </table>
<br>
<br>
<br>
<br>


    <!-- View Approved Bids link to Workslot -->
  
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        updateToggleSwitchListeners();

        document.getElementById('search').addEventListener('input', function(e) {
            var searchVal = e.target.value.toLowerCase();
            var table = document.getElementById('profileTable');

            for (var i = 1, row; row = table.rows[i]; i++) {
                var profile = row.cells[0].innerText;

                if (profile.toLowerCase().includes(searchVal)) {
                    row.style.display = "";
                } else {
                    row.style.display = ('none');
                }
            }
        });
    });

    document.getElementById('search').addEventListener('input', function(e) {
        var searchVal = e.target.value.toLowerCase();
        var table = document.getElementById('profileTable');

        for (var i = 1, row; row = table.rows[i]; i++) {
            var profile = row.cells[0].innerText;

            if (profile.toLowerCase().includes(searchVal)) {
                row.style.display = "";
            } else {
                row.style.display = ('none');
            }
        }
    });



    function setRowEditable(row, editable) {
        for (var i = 0; i < row.cells.length; i++) {
            if (i !== row.cells.length - 1) {
                row.cells[i].contentEditable = editable ? "true" : "false";
            }
        }
    }

    function updateProfile() {
        var table = document.getElementById('profileTable');
        for (var i = 1, row; row = table.rows[i]; i++) {
            var profile = row.cells[0].innerText;
            console.log('Work Slot: ' + profile);
        }

        alert("You have successfully updated!");
    }

    function logout() {
        console.log("Logged out");
        window.location.href = '../SystemAdmin/index.php';
    }
</script>
</body>

</html>