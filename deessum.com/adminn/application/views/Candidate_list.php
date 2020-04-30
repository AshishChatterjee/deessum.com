<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Candidate list - <?php echo $project_head; ?></title>
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
                                Candidate List
                            </h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javaScript:void();">Candidate</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List</li>
                            </ol>
                        </div>
                        <div class="col-sm-4">
                            <div class="float-sm-right">
                                <a href="<?php echo base_url('candidate/candidate/'); ?>" >
                                    <button class="btn-outline-success border-0 shadow-light m-1"> <span class="moon-security-on"></span> New One</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End : Breadcrumb-->

                    <!-- Start : Tabel Start here -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"><i class="fa fa-table"></i> Data Exporting</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <!--<th>IMG</th>-->
                                                    <th>Husband</th>
                                                    <th>Wife</th>
                                                    <th>Mobile</th>
                                                    <th>Group</th>
                                                    <!-- <th>Status</th> -->
                                                    <th>Deete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(isset($candidates)){
                                                        foreach($candidates->result() as $candidate){
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <!-- <a href="<?php //echo base_url("candidate/candidate/".$candidate->id."/EDiT"); ?>"> -->
                                                                        <?php echo $candidate->id; ?>
                                                                    <!-- </a> -->
                                                                </td>
                                                                <!--<td><img style=" width:50px; height:50px;" src="<?php echo base_url("couple_img/".$candidate->img); ?>"/></td>-->
                                                                <td><?php echo $candidate->husband_name; ?></td>
                                                                <td><?php echo $candidate->wife_name; ?></td>
                                                                <td><?php echo $candidate->mobile; ?></td>
                                                                <td><?php echo $candidate->grp; ?></td>
                                                                <!-- <td><?php //echo $candidate->status? "TRUE" : "FALSE"; ?></td> -->
                                                                <td>
                                                                    <a href="<?php echo base_url("candidate/deleteCouple/".$candidate->id); ?>" class="btn btn-outline-success btn-sm">Delete</a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                    }
                                                ?>
                                            </tbody>  
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row-->
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
       
    </script>
</body>

</html>