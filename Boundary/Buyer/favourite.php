<?php
include_once("../../Controller/Buyer/getSellerPropertyListingCtl.php");
include_once("../../Controller/Buyer/getFavouriteCtl.php");
include_once("../../Controller/Buyer/deleteFavouriteCtl.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: ../SystemAdmin/index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$getFavouriteCtl = new getFavouriteCtl();
$propertyListings = $getFavouriteCtl->getFavourite($user_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $propertylisting_id = $_POST['propertylisting_id'];
    $deleteFavouriteCtl = new deleteFavouriteCtl();
    $deleteFavouriteCtl->deleteFavourite($user_id, $propertylisting_id);
    // Refresh the list after deletion
    $propertyListings = $getFavouriteCtl->getFavourite($user_id);
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Favourite Page</title>
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
            padding-top: 60px; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; 
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
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
</head>
<body>
<div class="white-box">
    <section>
        <div class="container1">
            <div class="logo">
                <p>Favourite Page</p>
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
    <br><br>
    <table id="profileTable" class="CMtable" style="width:100%">
        <tr>
            <th>Favourited Properties</th>
            <th>Price</th>
            <th>Description</th>
            <th>Real Estate Agent</th>
            <th>Seller Name</th>
            <th>Calculate Mortgage</th>
            <th>Action</th>
        </tr>
        <?php foreach ($propertyListings as $propertylisting) { ?>
        <tr>
            <td><?php echo isset($propertylisting['property_name']) ? htmlspecialchars($propertylisting['property_name']) : ''; ?></td>
            <td><?php echo isset($propertylisting['property_price']) ? '$' . number_format(htmlspecialchars($propertylisting['property_price'])) : ''; ?></td>
            <td><?php echo isset($propertylisting['property_description']) ? htmlspecialchars($propertylisting['property_description']) : ''; ?></td>
            <td><?php echo isset($propertylisting['realestate_name']) ? htmlspecialchars($propertylisting['realestate_name']) : ''; ?></td>
            <td><?php echo isset($propertylisting['seller_name']) ? htmlspecialchars($propertylisting['seller_name']) : ''; ?></td>
            <td>
            <button type="button" onclick="calculateMortgage(<?php echo isset($propertylisting['property_price']) ? $propertylisting['property_price'] : '0'; ?>)">Calculate Mortgage</button>
            </td>
            <td>
                <form method="post" action="favourite.php">
                    <input type="hidden" name="propertylisting_id" value="<?php echo isset($propertylisting['propertylisting_id']) ? htmlspecialchars($propertylisting['propertylisting_id']) : ''; ?>">
                    <button type="submit" name="delete" value="delete">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br><br><br><br>
</div>

<!-- The Modal -->
<div id="mortgageModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="modalText"></p>
    </div>
</div>

<script>
    function calculateMortgage(propertyPrice) {
        const interestRate = 0.05; // 5% annual interest rate
        const loanTerm = 30; // 30 years loan term

        const monthlyInterestRate = interestRate / 12;
        const numberOfPayments = loanTerm * 12;

        const monthlyPayment = (propertyPrice * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -numberOfPayments));
        const resultText = `Your estimated monthly mortgage payment is: $${monthlyPayment.toFixed(2)}\n` +
                           `Loan Term: ${loanTerm} years\n` +
                           `Interest Rate: ${(interestRate * 100).toFixed(2)}% per annum`;

        // Display the result in a modal
        document.getElementById('modalText').innerText = resultText;
        var modal = document.getElementById("mortgageModal");
        modal.style.display = "block";

        var span = document.getElementsByClassName("close")[0];
        span.onclick = function () {
            modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }

    function logout() {
        console.log("Logged out");
        window.location.href = '../SystemAdmin/index.php';
    }
</script>
</body>
</html>
