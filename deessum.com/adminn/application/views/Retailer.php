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
                                    <h3 class="card-title">Retailer</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url("retailer/retailer/"); ?>" method="post">
                                    <input type="hidden" name="mode" id="mode" value="<?php if(isset($mode)){echo $mode; }else { echo set_value("mode"); } ?>" />
                                    <input type="hidden" name="id" id="id" value="<?php if(isset($retailer->id)){echo $retailer->id; }else { echo set_value("id"); } ?>" />

                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Product name -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="name">Retailer name</label>
                                                    <input name="name" id="name" type="text" class="form-control" placeholder="Retailer name" value="<?php if(isset($retailer->name)){echo $retailer->name; }else{echo set_value("name");} ?>">
                                                    <?php if(form_error("name")!=null){ echo form_error("name"); } ?>
                                                </div>
                                            </div>
                                            <!-- Product name end -->

                                            <!-- MRP-->
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="mobile">Mobile</label>
                                                            <input name="mobile" id="mobile" type="text" class="form-control" placeholder="Mobile" value="<?php if(isset($retailer->mobile)){echo $retailer->mobile; }else{echo set_value("mobile");} ?>">
                                                            <?php if(form_error("mobile")!=null){ echo form_error("mobile"); } ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input name="email" id="email" type="text" class="form-control" placeholder="Email" value="<?php if(isset($retailer->email)){echo $retailer->email; }else{echo set_value("email");} ?>">
                                                            <?php if(form_error("email")!=null){ echo form_error("email"); } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input name="password" id="password" type="text" class="form-control" placeholder="Password" value="<?php if(isset($retailer->password)){echo $retailer->password; }else{echo set_value("password");} ?>">
                                                            <?php if(form_error("password")!=null){ echo form_error("password"); } ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <input name="address" id="address" type="text" class="form-control" placeholder="Address" value="<?php if(isset($retailer->address)){echo $retailer->address; }else{echo set_value("address");} ?>">
                                                            <?php if(form_error("address")!=null){ echo form_error("address"); } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- MRP end -->
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                    <?php 
                                        $msg=$this->session->flashdata('message');
                                        if(isset($msg)){
                                            ?><br/><br/><p style="color:green;" class="pull-right"><?php echo $msg; ?></p><?php
                                        }
                                    ?>
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