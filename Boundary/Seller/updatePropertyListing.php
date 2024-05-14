<?php

if (isset($_POST['propertylisting_id'], $_POST['property_name'], $_POST['property_price'], $_POST['property_description'])) {
    $id = $_POST['propertylisting_id'];
    $property_name = $_POST['property_name'];
    $property_price = $_POST['property_price'];
    $property_description = $_POST['property_description'];

    // Checking empty fields
    if (empty($property_name)) {
        echo "<font color='red'>Name field is empty!</font><br/>";
    } else {
        // Updating the table
        require_once('../../Controller/Seller/updatePropertyListingCtl.php');
        $propertylistingCtl = new updatePropertyListingCtl();
        $result = $propertylistingCtl->updatePropertyListing($id, $property_name, $property_price, $property_description);

        if ($result) {
            // Redirecting to the display page. In this case, it is realestateAgent.php
            header("Location: seller.php");
            exit(); // Add an exit after header to stop further execution
        }
    }
}


//getting id from url
$id = isset($_GET['propertylisting_id']) ? $_GET['propertylisting_id'] : die('ERROR: Record ID not found.');
// echo "Property Listing ID: " . $id; // Debugging statement
?>



<head>
<title>Seller - Update Property Listing </title>
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


<body class="index-page sidebar-collapse">
    <div class="white-box">
        <section>
            <div class="container1">
                <div class="logo">
                    <p>Seller Page </p>
                </div>
            </div>
        </section>
        <hr>
        <!-- End Navbar -->
        
            <br>
            <div class="main">
                <div class="section section-basic">
                    <div class="container">
                        
                        <a href='seller.php' class='btn btn-warning btn-round button2'>Back</a>
                        <br>
                        <div class="col-md-12">
                            <div class="panel panel-success panel-size-custom">
                                <div class="panel-heading">
                                    <h3>Update Property Listing</h3>
                                </div>
                                <div class="panel-body">
                                    <form action="updatePropertyListing.php" method="post" id="updatePropertyListing">
                                        <div class="form group">
                                            <input type="hidden" class="form-control" id="propertylisting_id" name="propertylisting_id" value=<?php echo $_GET['propertylisting_id']; ?>>
                                            <label for="property_name">Property Listing:</label>
                                            <input type="text" class="form-control" id="property_name" name="property_name" value="<?php echo $_GET['property_name']; ?>">
                                            <label for="property_price">Price:</label>
                                            <input type="text" class="form-control" id="property_price" name="property_price" value="<?php echo isset($_GET['property_price']) ? $_GET['property_price'] : ''; ?>">
                                            <label for="property_description">Description:</label>
                                            <input type="text" class="form-control" id="property_description" name="property_description" value="<?php echo isset($_GET['property_description']) ? $_GET['property_description'] : ''; ?>">
                                        </div>
                                        <br>
                                        <input type="submit" class="btn btn-success btn-round" id="submit" value="update">
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
    </div>
</body>



</html>