<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Customer Profile - <?php echo $project_head; ?></title>
    <!--favicon-->
    <link rel="icon" href="<?php echo base_url('assets/logo/favicon.png'); ?> " type="image/x-icon">
    <?php include 'layout/header_links.php'; ?>
    <!--Switchery-->
    <link href="<?php echo base_url('assets/plugins/bootstrap-switch/bootstrap-switch.min.css'); ?>" rel="stylesheet">
    <?php include 'layout/link_and_script_of_summernote.php'; ?>
    <link rel="stylesheet" href="<?php echo base_url('assets/slim_img_uploader/slim.min.css'); ?>">
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
                            <h4 class="page-title">
                                Customer Profile
                            </h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javaScript:void();">Temporary Author</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </div>
                        <div class="col-sm-4">
                            <div class="float-sm-right">
                                <a href="<?php echo base_url('author/tmpAuthorList/'); ?>" >
                                    <button class="btn-outline-success border-0 shadow-light m-1"> <span class="moon-security-on"></span> Temporary Author List</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End : Breadcrumb-->
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="profile-card-3">
                                    <div class="card">
                                        <div class="user-fullimage">
                                            <img src="<?php echo base_url('assets/images/avatars/avatar-22.png'); ?>" alt="user avatar"
                                                class="card-img-top">
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="mb-0"><?php echo $customer->name; ?></h5>
                                                </div>
                                            </div>
                                            <br/>
                                            <p><?php echo $customer->mobile; ?></p>
                                            <p><?php echo $customer->address; ?></p>
                                            

                                            <hr>
                                            <a href="javascript:void():"
                                                class="btn btn-primary shadow-primary btn-sm btn-round waves-effect waves-light m-1">Hire
                                                Me</a>
                                            <a href="javascript:void():"
                                                class="btn btn-outline-primary btn-sm btn-round waves-effect waves-light m-1">Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>New Followup</h1>
                                    </div>
                                    <div class="card-body">

                                        <form method="post" id="service_category_form" action="<?php echo base_url('author/tmpAuthorProfile/'.$author->id) ?>">
                                            <input type="hidden" name="mode" id="mode" value="<?php if(isset($mode)){echo $mode; }else { echo set_value("mode"); } ?>" />
                                            <input type="hidden" name="id" id="id" value="<?php if(isset($package->id)){echo $package->id; }else { echo set_value("id"); } ?>" />

                                            
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <!-- Start : Followup detail  -->
                                                            <div class="form-group">
                                                                <label for="followup">Followup <span class="icon-star-empty text-danger"></span></label>
                                                                <textarea rows="3" name="followup" id="followup" class="form-control" placeholder="Followup details"><?php if(isset($package->name)){echo $package->name; }else{echo set_value("followup");} ?></textarea>
                                                                <?php if(form_error("followup")!=null){ echo form_error("followup"); } ?>
                                                            </div>
                                                            <!-- End : Followup detail -->
                                                            <div class="row">
                                                                <!-- Start : Member id  -->
                                                                <div class="form-group col-sm-6">
                                                                    <label for="eid">Employee id <span class="icon-star-empty text-danger"></span></label>
                                                                    <input name="eid" id="eid" type="text" class="form-control" placeholder="Employee Id" value="<?php echo set_value("eid"); ?>">
                                                                    <?php if(form_error("eid")!=null){ echo form_error("eid"); } ?>
                                                                    <?php if(form_error("eidnf")!=null){ echo form_error("eidnf"); } ?>
                                                                </div>
                                                                <!-- End : Member id -->

                                                                <div class="form-group col-sm-3">
                                                                    <label for="next_date">Next Date<span class="icon-star-empty text-danger"></span></label>
                                                                    <?php $next_date=set_value("next_date"); ?>
                                                                    <input type="text" name="next_date" id="next_date" class="form-control" value="<?php if(isset($author->next_date)){echo substr($author->next_date,8,2)."/".substr($author->next_date,5,2)."/".substr($author->next_date,0,4); }else{ if(isset($next_date) && $next_date!=""){ echo $next_date; }else{ echo date('d/m/Y'); }} ?>" >
                                                                    <?php if(form_error("profit_per")!=null){ echo form_error("profit_per"); } ?>
                                                                </div>                                             
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>    

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <br/>
                                                    <button type="submit" class="btn btn-outline-success border-0 shadow-light m-1"><span class="zmdi zmdi-check-all"></span> Submit</button>
                                                    <?php 
                                                        $msg=$this->session->flashdata('message');
                                                        if(isset($msg)){
                                                            ?><br/><br/><p style="color:green;" class="pull-right"><?php echo $msg; ?></p><?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            
                                        </form>

                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header text-uppercase">Follow ups</div>
                                    <div class="card-body">
                                        <ul class="list-unstyled">
                                            <?php
                                                if(isset($followups)){
                                                    foreach($followups->result() as $followup){
                                            ?>
                                                        <li class="media" style="margin-top:20px;">
                                                            <img class="mr-3 rounded" src="<?php echo base_url('assets/images/avatars/avatar-1.png'); ?>"
                                                                alt="user avatar" />
                                                            <div class="media-body">
                                                                <h5 class="mt-0 mb-1">
                                                                    <?php echo $followup->mid; ?>
                                                                    <small class="pull-right text-danger"><?php echo $followup->date; ?></small>
                                                                </h5>
                                                                <?php echo $followup->followup; ?>
                                                            </div>
                                                        </li>
                                                <?php
                                                    }
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- End : Tabel Start here -->
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
    <!--Bootstrap Switch Buttons-->
    <script src="<?php echo base_url('assets/plugins/bootstrap-switch/bootstrap-switch.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/summernote/dist/summernote-lite.js'); ?>"></script>
    <script src="<?php echo base_url('assets/slim_img_uploader/slim.kickstart.min.js'); ?>"></script>
    <script>
       $('#next_date').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy'
        });
    </script>
</body>

</html>