<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Pranjal Farms | Login Successful</title>

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
                <div class="col-lg-12">

                    <?php foreach($orders->result() as $order){ ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1"><?php echo "ORDER ID : ".$order->id ?> </small></h4>
                                    <small class="text-muted" style="padding-right:5px;"><?php echo $order->status; ?></small>
                                </div>
                                <p class="mb-1">
                                    <p>
                                        <strong>Consumer : </strong><?php echo $order->customer_name; ?>
                                    </p>
                                    <p>
                                        <strong>Items</strong>
                                        <span style="margin-left:10px;"><?php echo $order->items; ?></span>
                                    </p>
                                    <p>
                                        <strong>Order Date Time</strong>
                                        <span style="margin-left:10px;"><?php echo $order->c_dt; ?></span>
                                    </p>
                                    <p >
                                        <span style="color:green;">
                                            <strong>Savings : </strong>
                                            <span style="margin-left:10px;"><?php echo $order->savings; ?></span>
                                        </span>

                                        <span class="pull-right" style="color:blue;">
                                            <strong>Payable Amount : </strong>
                                            <span style="margin-left:10px;"><?php echo $order->payableamt; ?></span>
                                        </span>
                                    </p>
                                </p>
                                <hr/>
                                <!-- <a href="<?php echo base_url('customer/orderDetail/'.$order->id); ?>" class="btn btn-danger text-white btn-sm">Detail</a> -->
                            </div>
                        </div>
                    <?php } ?>

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