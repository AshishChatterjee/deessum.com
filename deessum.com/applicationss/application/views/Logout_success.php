<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Divisima | eCommerce Template</title>
    <meta charset="UTF-8">
    <meta name="description" content=" Divisima | eCommerce Template">
    <meta name="keywords" content="divisima, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php include 'layout/header_links.php'; ?>

    <style>
        .contact-form select {
            width: 100%;
            height: 44px;
            border: none;
            padding: 0 18px;
            background: #f0f0f0;
            border-radius: 40px;
            margin-bottom: 17px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <!-- Page Preloder  -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->
   
    <?php include 'layout/header.php'; ?>



   <!-- SECTION -->
   <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                
                <div class="col-lg-12" style="min-height:300px; text-align:center;">
                    <br/>
                    <h2 style="text-align:center;">CUSTOMER LOGGED OUT SUCCESSFULLY</h2>
                    <img class="center" src="<?php echo base_url("assets/img/out.png"); ?>"/>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


    <?php include 'layout/footer.php'; ?>
    <?php include 'layout/footer_scripts.php'; ?>
    <script>
        function submitForm(){
            $("#regForm").attr('action',"<?php echo base_url('customer/registerInputSource/');  ?>");
            $("#regForm").submit();
        }
    </script>
    

</body>

</html>