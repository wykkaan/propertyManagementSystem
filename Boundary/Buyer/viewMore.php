<?php
include_once("../../Controller/Buyer/getSellerPropertyDetailsCtl.php");
include_once("../../Controller/Buyer/addFavouritesCtl.php");
include_once("../../Controller/Buyer/updateViewCountCtl.php");

// Instantiate getSellerPropertyDetailsCtl
$getSellerPropertyDetailsCtl = new getSellerPropertyDetailsCtl();

// Check if propertylisting_id is set
if(isset($_GET['propertylisting_id'])) {
    $propertylisting_id = $_GET['propertylisting_id'];
    // Retrieve property details
    $propertyListings = $getSellerPropertyDetailsCtl->getSellerPropertyDetails($propertylisting_id);
} else {
    // Handle case when propertylisting_id is not set
    // For example, redirect the user or display an error message
    echo "Property ID not provided";
    exit; // Stop further execution
}

$updateViewCountCtl = new updateViewCountCtl();
$updateViewCountCtl->updateViewCount($_GET['propertylisting_id']);
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
</head>

<body>
    <div class="white-box">
        <section>
            <div class="container1">
                <div class="logo">
                    <p>More Details</p>
                </div>
                <div class="topnav">
                    <a href="buyer.php">BACK</a>        
                </div>
            </div>
        </section>
        <hr>
        <br>
        <br>
        <table id="profileTable" class="CMtable" style="width:100%">
            <tr>
                <th>Listed Properties</th>
                <th>Price</th>
                <th>Description</th>
                <th>Real Estate Agent</th>
                <th>Seller Name</th>
                <th>Calculate</th>
            </tr>
            <?php foreach ($propertyListings as $propertylisting) { ?>
    <tr>
        <td><?php echo isset($propertylisting['property_name']) ? $propertylisting['property_name'] : ''; ?></td>
        <td><?php echo isset($propertylisting['property_price']) ? '$' . number_format($propertylisting['property_price']) : ''; ?></td>
        <td><?php echo isset($propertylisting['property_description']) ? $propertylisting['property_description'] : ''; ?></td>
        <td><?php echo isset($propertylisting['realestate_name']) ? $propertylisting['realestate_name'] : ''; ?></td>
        <td><?php echo isset($propertylisting['seller_name']) ? $propertylisting['seller_name'] : ''; ?></td>
        <td>
            <button type="button" onclick="calculateMortgage(<?php echo isset($propertylisting['property_price']) ? $propertylisting['property_price'] : '0'; ?>)">Calculate Mortgage</button>
        </td>
    </tr>
<?php } ?>

        </table>
        <br><br><br><br>
        <div id="mortgageResult"></div>
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
            const resultText = `Your estimated monthly mortgage payment is: $${monthlyPayment.toFixed(2)}`;

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
