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
                        <!-- left column -->
                        <div class="col-md-6 m-auto">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Password Updation</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url("common/updatePassword/"); ?>" method="post">
                            

                                    <div class="card-body">
                                            <!-- Old Password -->
                                            <div class="form-group">
                                                <label for="name">Old Password</label>
                                                <input type="text" name="old" id="old" class="form-control" placeholder="Old Password">
                                                <?php if(form_error("old")!=null){ echo form_error("old"); } ?>
                                            </div>
                                            <!-- Old Password -->

                                            <!-- New Password -->
                                            <div class="form-group">
                                                <label for="name">New Password</label>
                                                <input type="text" name="new" id="new" class="form-control" placeholder="New Password">
                                                <?php if(form_error("new")!=null){ echo form_error("new"); } ?>
                                            </div>
                                            <!-- New Password -->

                                            <!-- Confirm Password -->
                                            <div class="form-group">
                                                <label for="name">Confirm Password</label>
                                                <input type="text" name="conf" id="conf" class="form-control" placeholder="Confirm Password">
                                                <?php if(form_error("conf")!=null){ echo form_error("conf"); } ?>
                                            </div>
                                            <!-- Confirm Password -->

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <?php 
                                            $msg=$this->session->flashdata('message');
                                            if(isset($msg)){
                                                echo $msg;
                                            }
                                        ?>
                                    </div>

                                    
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (right) -->
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
</body>

</html>