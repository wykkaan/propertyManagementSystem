<?php
include_once("../../Controller/Seller/getReviewCtl.php");

$getReviewCtl = new getReviewCtl();
$getReview = $getReviewCtl->getReview();


error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Review Page</title>
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
                    <p>Review Page </p>
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
    <table id="profileTable" class="CMtable" style="width:100%">
    <tr>
    <th>Agent Name</th>
    <th>Name</th>
    <th>Review Stars</th>
    <th>Review Description</th>
    </tr>
        <?php foreach ($getReview as $getReviews) { ?>
    <tr>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($getReviews['agent_name']) ? $getReviews['agent_name'] : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($getReviews['reviewer_name']) ? $getReviews['reviewer_name'] : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($getReviews['review_rating']) ? $getReviews['review_rating'] : ''; ?></td>
        <td contenteditable="true" id="profileTable" class="CMtable"><?php echo isset($getReviews['review_description']) ? $getReviews['review_description'] : ''; ?></td>
        <td>
            
        </td>
    </tr>
<?php } ?>

    </table>
<br>
<br>
<br>
<br>

  
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