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
                                    <h3 class="card-title">Locality</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url("master/locality"); ?>" method="post">
                                <input type="hidden" name="mode" id="mode" value="<?php if(isset($mode)){echo $mode; }else { echo set_value("mode"); } ?>" />
                                        <input type="hidden" name="id" id="id" value="<?php if(isset($locality->id)){echo $locality->id; }else{ echo set_value("id"); } ?>" />

                                    <div class="card-body">
                                        <!-- localities -->
                                        <div class="form-group">
                                            <label for="city_id">City</label>
                                            <select name="city_id" id="city_id" class="form-control select2">
                                                <option value="">--Select--</option>
                                                <?php
                                                    if(isset($cities)){ 
                                                        foreach($cities->result() as $city){
                                                ?>
                                                            <option value="<?php echo $city->id; ?>" <?php if(isset($locality->city_id) && $city->id==$locality->city_id){echo"selected";}else{ echo set_select('city_id',$city->id);} ?> ><?php echo $city->city_name; ?></option>
                                                <?php
                                                        }   
                                                    }
                                                ?>
                                            </select>
                                            <?php if(form_error("city_id")!=null){ echo form_error("city_id"); } ?>
                                        </div>
                                        <!-- localities -->

                                        <!-- Brand No -->
                                        <div class="form-group">
                                            <label for="locality">Locality Name</label>
                                            <input name="locality" id="locality" type="text" class="form-control" placeholder="Locality Name" value="<?php if(isset($locality->locality)){echo $locality->locality; }else{echo set_value("locality");} ?>">
                                            <?php if(form_error("locality")!=null){ echo form_error("locality"); } ?>
                                        </div>
                                        <!-- Brand No End -->
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
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
</body>

</html>