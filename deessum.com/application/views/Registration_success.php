<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Pranjal Farms</title>

    <?php include 'layout/header_links.php'; ?>
    <style>
        .cart-table tr td{
            font-size:20px; 
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
</head>

<body>
    
    <?php include 'layout/header.php'; ?>
    <?php include 'layout/navigation.php'; ?>
    
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12" style="min-height:300px;">
                    <img style="width:300px;" class="center" src="<?php echo base_url("assets/img/success.png"); ?>"/>
                    <h1 style="text-align:center;">CUSTOEMR REGISTERED SUCCESSFULL</h1>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <?php include 'layout/footer.php'; ?>
    <?php include 'layout/footer_scripts.php'; ?>

</body>

</html>