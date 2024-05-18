<?php
// Include necessary files
include_once("../../Controller/Buyer/calculateMortgageCtl.php");
include_once("../../Controller/Buyer/getSellerPropertyListingCtl.php");

// Initialize the property listing controller
$propertyListingCtl = new getSellerPropertyListingCtl();
$propertyListings = $propertyListingCtl->getSellerPropertyListing();

// Initialize the mortgage calculation controller
$calculateMortgageCtl = new calculateMortgageCtl();

// Check if the form is submitted and the necessary data is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calculate_mortgage']) && isset($_POST['property_price'])) {
    // Retrieve the property price from the form
    $propertyPrice = $_POST['property_price'];

    // Perform the mortgage calculation
    $calculateMortgageCtl = new CalculateMortgageCtl();
    $monthlyPayment = $calculateMortgageCtl->calculateMortgage($propertyPrice);

    // Display the result
    $mortgageResult = "Your estimated monthly mortgage payment is: $" . number_format($monthlyPayment, 2);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Mortgage Calculator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/ua_style.css">
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
                <p>Mortgage Calculator</p>
            </div>
            <div class="topnav">
                <a href="../SystemAdmin/index.php" onclick="logout()">LOG OUT</a>
                <a href="buyer.php">PROPERTY LISTING</a>
                <a href="favourite.php">VIEW FAVOURITE</a>
                <a href="../Buyer/viewrealestateAgent.php">AGENTS</a>
                <a href="../Buyer/getReview.php">REVIEWS</a>
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
                            <input type="text" class="searchTerm" name="search" placeholder="Search by property name" style="height:100%; width:65%; margin-top: -5%;">
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
            <th>Price</th>
            <th>Description</th>
            <th>Real Estate Agent</th>
            <th>Seller Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($propertyListings as $propertylisting) { ?>
        <tr>
            <td><?php echo isset($propertylisting['property_name']) ? $propertylisting['property_name'] : ''; ?></td>
            <td><?php echo isset($propertylisting['property_price']) ? $propertylisting['property_price'] : ''; ?></td>
            <td><?php echo isset($propertylisting['property_description']) ? $propertylisting['property_description'] : ''; ?></td>
            <td><?php echo isset($propertylisting['realestate_name']) ? $propertylisting['realestate_name'] : ''; ?></td>
            <td><?php echo isset($propertylisting['seller_name']) ? $propertylisting['seller_name'] : ''; ?></td>
            <td>
                <form method="post" action="mortgageCalculator.php">
                    <input type="hidden" name="property_price" value="<?php echo isset($propertylisting['property_price']) ? $propertylisting['property_price'] : ''; ?>">
                    <button type="submit" name="calculate_mortgage">Calculate Mortgage</button>
                </form>
            </td>
        </tr>
        <?php } ?>
        <?php if (isset($mortgageResult)) { ?>
        <tr>
            <td colspan="6"><?php echo $mortgageResult; ?></td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <br>
    <br>
    <br>
</div>
</body>

</html>
