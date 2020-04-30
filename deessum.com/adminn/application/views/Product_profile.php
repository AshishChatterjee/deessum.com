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
                        <div class="col-md-4">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('product_images/'.$product->image); ?>" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"><?php echo $product->name; ?></h3>

                                    <p class="text-muted text-center"><?php echo $product->brand_name; ?></p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>MRP</b> <a class="float-right"><?php echo $product->mrp; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Selling Price</b> <a class="float-right"><?php echo $product->selling_price; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Product ID</b> <a class="float-right"><?php echo $product->id; ?></a>
                                        </li>
                                    </ul>

                                    <a href="<?php echo base_url('product/product/'.$product->id."/EDiT") ?>" class="btn btn-primary btn-block"><b>Edit</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-8">
                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">About Product </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Category</strong>

                                    <p class="text-muted">
                                        <?php echo $product->category_name; ?>
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Sub Category</strong>

                                    <p class="text-muted"><?php echo $product->sub_category; ?></p>

                                    <hr>
                                    
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Description</strong>

                                    <p class="text-muted"><?php echo $product->description; ?></p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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