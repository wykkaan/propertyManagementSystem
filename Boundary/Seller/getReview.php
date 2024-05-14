<?php
include_once("../../Controller/Seller/getReviewCtl.php");
include_once("../../Controller/Seller/searchReviewCtl.php");



$getReviewCtl = new getReviewCtl();
$getReview = $getReviewCtl->getReview();


error_reporting(E_ALL);
ini_set('display_errors', 1);

$searchCtl = new searchReviewCtl();

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if (!empty($search)) {
        $getReview = $searchCtl->searchReview($search);
    } else {
        // If search field is empty, retrieve all accounts
        $getReview = $getReviewCtl->getReview();
    }
} else {
    // If search field is not set, retrieve all accounts
    $getReview = $getReviewCtl->getReview();
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
                    <p>Seller Page </p>
            </div>
            <div class="topnav">
                <a href="../SystemAdmin/index.php" onclick="logout()">LOG OUT</a>
                <a href="../Seller/viewrealestateAgent.php">AGENTS</a>
                <a href="../Seller/getReview.php">REVIEWS</a>
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
    <th>Agent Name</th>
    <th>Review</th>
    </tr>
        <?php foreach ($getReview as $getReview) { ?>
    <tr>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($getReview['user_fullname']) ? $getReview['user_fullname'] : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($getReview['review_rating']) ? $getReview['review_rating'] : ''; ?></td>
        <td>
            
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