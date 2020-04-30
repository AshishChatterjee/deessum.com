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
    <link rel="stylesheet" href="<?php echo base_url('assets/slim_img_uplodaer/slim.min.css'); ?>">
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
                        <div class="col-md-4 m-auto">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/svg-icons/boy.svg'); ?>" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"><?php echo $customer->name; ?></h3>
                                    <h3 class="profile-username text-center"><?php echo $customer->id; ?></h3>

                                    <p class="text-muted text-center"><?php echo $customer->address; ?></p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Status</b> <a class="float-right"><?php echo $customer->status; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Email</b> <a class="float-right"><?php echo $customer->email; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Mobile</b> <a class="float-right"><?php echo $customer->mobile; ?></a>
                                        </li>
                                    </ul>

                                    <a href="<?php echo base_url('customer/orderHistory/'.$customer->id."/EDiT") ?>" class="btn btn-primary btn-block"><b>Order History</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
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
    <script src="<?php echo base_url('assets/slim_img_uplodaer/slim.kickstart.min.js'); ?>"></script>
    <script>
        
    </script>
</body>

</html>