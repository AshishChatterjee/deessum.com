<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>101 - Access Restricted </title>
    <!--favicon-->
    <link rel="icon" href="<?php echo base_url('assets/images/favicon.png'); ?> " type="image/x-icon">
    <?php include 'layout/header_links.php'; ?>

</head>

<body>

    <!-- Start wrapper-->
    <div id="wrapper">
        <!--Start sidebar-wrapper-->
            <?php include 'layout/left_side_navigation.php' ?>
        <!--Start sidebar-wrapper-->

        <!--Start topbar header-->
            <?php include 'layout/header.php'; ?>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <!--Start content-wrapper-->
            <div class="content-wrapper bg-error">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center error-pages">
                                <h1 class="error-title text-danger"> 101</h1>
                                <h2 class="error-sub-title text-dark">Ristricted Access</h2>

                                <p class="error-message text-dark text-uppercase">You don't have permission to access this section</p>

                                <div class="mt-4">
                                    <a href="<?php echo base_url('Dashboard'); ?>" class="btn btn-danger btn-round shadow-primary m-1">Dashboard </a>
                                    <a href="<?php echo base_url('welcom/logout'); ?>" class="btn btn-outline-danger btn-round m-1">Log Out</a>
                                </div>

                                <div class="mt-4">
                                    <p class="text-dark">Copyright © 2018 <span class="text-danger">!nfiniverse </span>| All rights reserved.</p>
                                </div>
                                <hr class="w-50">
                                <div class="mt-2">
                                    <a href="javascript:void()" class="btn-social btn-social-circle btn-facebook waves-effect waves-light m-1"><i class="fa fa-facebook"></i></a>
                                    <a href="javascript:void()" class="btn-social btn-social-circle btn-google-plus waves-effect waves-light m-1"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End container-fluid-->

            </div>
        <!--End content-wrapper-->

        <!--Start Back To Top Button-->
            <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        <?php include 'layout/footer.php'; ?>
        <!--End footer-->

    </div>
    <!--End wrapper-->
    <?php include 'layout/footer_scripts.php'; ?>

</body>

</html>