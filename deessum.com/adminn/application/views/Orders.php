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
                    <br/>
                    <div class="row">
                        <?php foreach($orders->result() as $order){ ?>
                            <div class="col-md-12 m-auto">
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
                                        <a href="<?php echo base_url('customer/orderDetail/'.$order->id); ?>" class="btn btn-success btn-sm">Detail</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- /.row -->
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