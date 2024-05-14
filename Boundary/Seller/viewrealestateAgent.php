<?php
include_once("../../Controller/Seller/viewrealestateAgentCtl.php");
include_once("../../Controller/Seller/searchrealestateAgentCtl.php");



$viewAgentCtl = new viewrealestateAgentCtl();
$viewAgent = $viewAgentCtl->viewrealestateAgent();


error_reporting(E_ALL);
ini_set('display_errors', 1);

$searchCtl = new searchrealestateAgentCtl();

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if (!empty($search)) {
        $viewAgent = $searchCtl->searchrealestateAgent($search);
    } else {
        // If search field is empty, retrieve all accounts
        $viewAgent = $viewAgentCtl->viewrealestateAgent();
    }
} else {
    // If search field is not set, retrieve all accounts
    $viewAgent = $viewAgentCtl->viewrealestateAgent();
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
                    <p>Real Estate Agents</p>
                </div>
                <div class="topnav">
                    <a href="seller.php">Back</a>
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
        </div>
        <table id="userTable">
            <thead>
                <tr>
                    <table class="table table-condensed table-striped CMtable" id="profileTable" style="font-size: 11.5px; width:100%;">
                        <tr>
                            <th>Name</th>
                        </tr>
                        <?php
                        foreach ($viewAgent as $userAccount) {
                            echo "<tr>";
                            echo "<td>" . $userAccount['user_fullname'] . "</td>";
                            echo "<td><a href=\"addReview.php?user_id={$userAccount['user_id']}&user_fullname={$userAccount['user_fullname']}}\">Add Review</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>

                </tr>
            </thead>

        </table>
        <br>
    </div>
</body>

<script>
    var user = document.querySelectorAll(".editable");
    var table = document.getElementById('userTable');
</script>


</html>