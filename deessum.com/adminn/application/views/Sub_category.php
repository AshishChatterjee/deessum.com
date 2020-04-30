<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sub category - <?php echo $project_head; ?></title>
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
                            <h4 class="page-title">Sub category</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javaScript:void();">Subcategory</a></li>
                                <li class="breadcrumb-item active" aria-current="page">New</li>
                            </ol>
                        </div>
                        <div class="col-sm-2">
                            <div class="float-sm-right">
                            <a href="<?php echo base_url('master/subCategoryList'); ?>">
                                <button type="button" class="btn btn-gradient-forest waves-effect waves-light m-1"><i class="fa fa-plus-circle"></i>  Sub Category List</button>
                            </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Breadcrumb-->

                    <!-- Form Row Start Here -->
                    <div class="row">
                        <div class="col-lg-6 m-auto ">
                            <div class="card">
                                <div class="card-body" style="background-color:#fffff0;">
                                    <div class="row pt-2 pb-2">
                                        <div class="col-sm">
                                            <h4>Sub Category</h4>
                                        </div>
                                    </div>
                                    <hr/>
                                    <form method="post" id="sub_category_form" action="<?php echo base_url('master/subCategory/') ?>">
                                        <input type="hidden" name="mode" id="mode" value="<?php if(isset($mode)){echo $mode; }else { echo set_value("mode"); } ?>" />
                                        <input type="hidden" name="id" id="id" value="<?php if(isset($sub_category->id)){echo $sub_category->id; }else{ echo set_value("id"); } ?>" />

                                            <!-- Categories -->
                                                <div class="form-group">
                                                    <label for="category_id">Category</label>
                                                    <select name="category_id" id="category_id" class="form-control single-select">
                                                        <option value="">--Select--</option>
                                                        <?php
                                                            if(isset($categories)){ 
                                                                foreach($categories->result() as $category){
                                                        ?>
                                                                    <option value="<?php echo $category->id; ?>" <?php if(isset($sub_category->category_id) && $category->id==$sub_category->category){echo"selected";}else{ echo set_select('category_id',$category->id);} ?> ><?php echo $category->category_name; ?></option>
                                                        <?php
                                                                }   
                                                            }
                                                        ?>
                                                    </select>
                                                    <?php if(form_error("category_id")!=null){ echo form_error("category_id"); } ?>
                                                </div>
                                            <!-- Categories -->

                                            <!-- Brand No -->
                                            <div class="form-group">
                                                <label for="sub_category">Sub Category Name</label>
                                                <input name="sub_category" id="sub_category" type="text" class="form-control" placeholder="Sub Category Name" value="<?php if(isset($sub_category->sub_category)){echo $sub_category->sub_category; }else{echo set_value("sub_category");} ?>">
                                                <?php if(form_error("sub_category")!=null){ echo form_error("sub_category"); } ?>
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

        <!--Select Plugins Js-->
        <script src="<?php echo base_url('assets/plugins/select2/js/select2.min.js'); ?>"></script>
        <!--Inputtags Js-->
        <script src="<?php echo base_url('assets/plugins/inputtags/js/bootstrap-tagsinput.js'); ?>"></script>

    </div>
    <!--End wrapper-->
    <?php include 'layout/footer_scripts.php'; ?>
    <?php include 'layout/datatable_scripts.php'; ?>

    <script>
        $(document).ready(function() {
            $('.single-select').select2();

            $('.multiple-select').select2();
        });


    </script>
</body>

</html>