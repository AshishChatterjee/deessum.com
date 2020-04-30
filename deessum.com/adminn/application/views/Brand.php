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
                                    <h3 class="card-title">Brand</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url("master/brand"); ?>" method="post">
                                    <input type="hidden" name="mode" id="mode" value="<?php if(isset($mode)){echo $mode; }else { echo set_value("mode"); } ?>" />
                                    <input type="hidden" name="id" id="id" value="<?php if(isset($brand->id)){echo $brand->id; }else{ echo set_value("id"); } ?>" />

                                    <div class="card-body">
                                            <!-- Brand NAME -->
                                            <div class="form-group">
                                                <label for="name">Brand Name</label>
                                                <input name="name" id="name" type="text" class="form-control" placeholder="Brand Name" value="<?php if(isset($brand->name)){echo $brand->name; }else{echo set_value("name");} ?>">
                                                <?php if(form_error("name")!=null){ echo form_error("name"); } ?>
                                            </div>
                                            <!-- Brand NAME  End -->

                                            <!-- Discount Percentage -->
                                            <div class="form-group">
                                                <label for="discount_percentage">Discount Percentage</label>
                                                <input name="discount_percentage" id="discount_percentage" type="text" class="form-control" placeholder="Discount Percentage" value="<?php if(isset($brand->discount_percentage)){echo $brand->discount_percentage; }else{echo set_value("discount_percentage");} ?>">
                                                <?php if(form_error("discount_percentage")!=null){ echo form_error("discount_percentage"); } ?>
                                            </div>
                                            <!-- Discount Percentage end -->
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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