<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <?php include 'layout/header_linksn.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    <?php include 'layout/top_nav.php'; ?>
    <?php include 'layout/left_side_navigationn.php'; ?>

        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class='card'>
                                <div class="card-header">
                                    <h4>Consumer Detail</h4>
                                </div>
                                <div class="card-body">
                                    <p>Name : <?php echo $customer->name; ?></p>
                                    <p>Email : <?php echo $customer->email; ?></p>
                                    <p>Mobile : <?php echo $customer->mobile; ?></p>
                                    <p>
                                        <strong>City : </strong> <?php echo $customer->city_name; ?>
                                        <strong>Locality : </strong> <?php echo $customer->locality_name; ?>
                                    </p>
                                    <p>Address : <?php echo $customer->address; ?></p>
                                    <p>Status : <?php echo $customer->status; ?></p>
                                </div>
                            </div>
                            <h4>Product Details</h4>
                            <?php foreach($items->result() as $item){ ?>
                                <div class="card" style="margin-bottom:5px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <a href=" <?php echo base_url("product/profile/".$item->product_id); ?>">
                                                    <img style="width:50%;" src="<?php echo base_url("product_images/".$item->image); ?>"/>
                                                </a>
                                            </div>
                                            <div class="col-lg-3">
                                                <?php echo $item->name; ?>
                                            </div>
                                            <div class="col-lg-1">
                                                <?php echo "Qty. ".$item->qty; ?>
                                            </div>
                                            <div class="col-lg-2">
                                                <?php echo "MRP Rs. ".$item->mrp; ?>
                                            </div>
                                            <div class="col-lg-2">
                                                <?php echo "SP Rs. ".$item->selling_price; ?>
                                            </div>
                                            <div class="col-lg-2">
                                                <?php echo "Total Rs. ".($item->selling_price*$item->qty); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <hr/>
                            <?php if($order->status=="PENDING"){ ?>
                                <a href=" <?php echo base_url("customer/dispatchOrder/".$order->id); ?>" class="btn btn-success btn-sm pull-right">Dispatch this order</a>
                            <?php }else if($order->status=="DISPATCHED"){ ?>
                                <a href=" <?php echo base_url("customer/deliverOrder/".$order->id); ?>" class="btn btn-warning btn-sm pull-right">Deliver this order</a>
                            <?php } ?>
                            <br/>
                            <br/>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
        </div>
        <!-- /.content-wrapper -->
        <?php include 'layout/footer.php'; ?>
    </div>
    <!-- ./wrapper -->

    <?php include 'layout/footer_scriptsn.php'; ?>
</body>

</html>