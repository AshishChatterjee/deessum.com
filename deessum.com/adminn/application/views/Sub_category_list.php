<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sub Category list - <?php echo $project_head; ?></title>
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
                            <h4 class="page-title">Sub Category List</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Sub Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List</li>
                            </ol>
                        </div>
                    </div>
                    <!-- End Breadcrumb-->
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" style="background-color:#f0f8ff;"><i class="fa fa-table"></i> Sub Category List</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Category</th>
                                                    <th>Sub Category</th>
                                                    <th>Created Date</th>
                                                    <th>Operations</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($sub_categories->result() as $sub_category){ ?>
                                                
                                                        <tr>
                                                            <td><?php echo $sub_category->id; ?></td>
                                                            <td><?php echo $sub_category->category_name; ?></td>
                                                            <td><?php echo $sub_category->sub_category; ?></td>
                                                            <td><?php echo $sub_category->c_dt; ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url('master/category/'.$sub_category->id."/EDiT") ?>"><img style="width:25px;" src="<?php echo base_url('assets/svg-icons/edit_blue.svg');  ?>"/></a>
                                                                <a href="<?php echo $sub_category->id; ?>" onclick="return deleteSubCategory(this)"><img style="width:25px;" src="<?php echo base_url('assets/svg-icons/delete_sky.svg');  ?>"/></a>
                                                            </td>
                                                        </tr>
                                                <?php } ?>
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Category</th>
                                                    <th>Sub Category</th>
                                                    <th>Created Date</th>
                                                    <th>Operations</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
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

    <?php include 'layout/datatable_scripts.php'; ?>
    <script>
        function deleteSubCategory(r){
            notie.confirm('Are you sure want to delete ...', 'Yes', 'Cancel', function() {
                var id=$(r).attr("href");
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url('common/temp_delete_by_ajax/'); ?>",
                    data:{"id":id,"table":"sub_category"},
                    success:function(data){
                        var res=data.trim();
                        if(res=="DONE"){
                           $(r).parent().parent().remove();
                           swal("Successful", "Deletion Successful");
                        }else{
                            swal("Successful", "Deletion Error"+res);
                        }
                    }
                });
            });
            return false;
        }
    </script>
</body>

</html>