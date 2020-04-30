<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Group list - <?php echo $project_head; ?></title>
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
                                Group list
                            </h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javaScript:void();">Group</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List</li>
                            </ol>
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
                                                    <th>STATUS</th>
                                                    <th>ROUND1</th>
                                                    <th>Live Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(isset($groups)){
                                                        foreach($groups->result() as $group){
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $group->grp; ?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url("candidate/active_group/".$group->grp); ?>">
                                                                        <?php echo $game_status->grp==$group->grp? "<span class='text-success'>ACTIVE</span>" : "INACTIVE"; ?>  
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                        <a target="_blank" href="<?php echo base_url("candidate/declareSecondRoundResult/".$group->grp); ?>">
                                                                            RESULT
                                                                        </a>
                                                                </td>

                                                                <td>
                                                                        <a target="_blank" href="<?php echo base_url("candidate/liveStatusRII/".$group->grp); ?>">
                                                                            LIVE STATUS
                                                                        </a>
                                                                </td>
                                                            </td>
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