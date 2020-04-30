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



    <!-- checkout section  -->
    <section class="checkout-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-2 order-lg-1">
                    <form class="checkout-form">
                        <ul class="payment-list">
                            <li>
                                Name : <?php echo $this->session->userdata("customer_name") ?>
                            </li>
                            <li>
                                Email : <?php echo $this->session->userdata("customer_email") ?>
                            </li>
                            <li>
                                Address : <?php echo $this->session->userdata("customer_address") ?>
                            </li>
                        </ul>
                        <a href="<?php echo base_url("customer/placeOrder/"); ?>" class="btn btn-success">Place Order</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout section end -->


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