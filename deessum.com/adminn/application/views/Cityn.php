<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>City - <?php echo $project_head; ?></title>
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

                    <!-- Breadcrumb-->
                    <div class="row pt-2 pb-2">
                        <div class="col-sm">
                            <h4 class="page-title">City</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javaScript:void();">City</a></li>
                                <li class="breadcrumb-item active" aria-current="page">New</li>
                            </ol>
                        </div>
                        <div class="col-sm-2">
                            <div class="float-sm-right">
                            <a href="<?php echo base_url('master/CityList'); ?>">
                                <button type="button" class="btn btn-gradient-forest waves-effect waves-light m-1"><i class="fa fa-plus-circle"></i>  City List</button>
                            </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Breadcrumb-->

                    <!-- Form Row Start Here -->
                    <div class="row">
                        <div class="col-lg-8 m-auto ">
                            <div class="card">
                                <div class="card-body" style="background-color:#fffff0;">
                                    <div class="row pt-2 pb-2">
                                        <div class="col-sm">
                                            <h4>City</h4>
                                        </div>
                                    </div>
                                    <hr/>
                                    <form method="post" id="city_form" action="<?php echo base_url('master/city/') ?>">
                                        <input type="hidden" name="mode" id="mode" value="<?php if(isset($mode)){echo $mode; }else { echo set_value("mode"); } ?>" />
                                        <input type="hidden" name="id" id="id" value="<?php if(isset($city->id)){echo $city->id; }else{ echo set_value("id"); } ?>" />

                                            <!-- Brand No -->
                                            <div class="form-group">
                                                <label for="city_name">City Name</label>
                                                <input name="city_name" id="city_name" type="text" class="form-control" placeholder="City Name" value="<?php if(isset($city->city_name)){echo $city->city_name; }else{echo set_value("city_name");} ?>">
                                                <?php if(form_error("city_name")!=null){ echo form_error("city_name"); } ?>
                                            </div>
                                            <!-- Brand No End -->


                                        <div class="form-group row pull-right">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="fa fa-save"></i> Submit</button>
                                            </div>
                                        </div>
                                        <br>
                                        <?php 
                                            $msg=$this->session->flashdata('message');
                                            if(isset($msg)){
                                                ?><br/><br/><p style="color:green;" class="pull-right"><?php echo $msg; ?></p><?php
                                            }
                                        ?>
                                    </form>
                                </div>
                            </div>
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
    <?php include 'layout/datatable_scripts.php'; ?>

    <script>
        

    </script>
</body>

</html>
