<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Message - <?php echo $project_head; ?></title>
    <!--favicon-->
    <link rel="icon" href="<?php echo base_url('assets/logo/favicon.png'); ?> " type="image/x-icon">
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
            <div class="content-wrapper" >
                <div class="container-fluid" style="min-height:500px;" >

                    <!-- Form Row Start Here -->
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <h2 class="text-center text-danger <?php echo $text_color; ?>">
                                <span style="font-size:4em;" class="<?php echo $glyphicon; ?>"></span>
                                <hr/>
                                <?php echo $msg; ?>
                            </h2>
                        </div>
                    </div>
                    <!-- Form Row End Here -->

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
    
    <script>
        $(document).ready(function() {
            $('.single-select').select2();

            $('.multiple-select').select2();
        });
    </script>
</body>

</html>