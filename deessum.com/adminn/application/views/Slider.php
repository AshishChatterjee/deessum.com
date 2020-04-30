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
    <link rel="stylesheet" href="<?php echo base_url('assets/slim_img_uplodaer/slim.min.css'); ?>">
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
                        <div class="col-md-10 m-auto">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Slider</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" id="product_form" action="<?php echo base_url("master/slider/"); ?>" method="post">
                                    <input type="hidden" name="mode" id="mode" value="<?php if(isset($mode)){echo $mode; }else { echo set_value("mode"); } ?>" />
                                    <input type="hidden" name="id" id="id" value="<?php if(isset($slider->id)){echo $slider->id; }else{ echo set_value("id"); } ?>" />

                                    <div class="card-body">
                                        <!-- Product ID -->
                                        <div class="form-group">
                                            <label for="product_id">Product ID</label>
                                            <input name="product_id" id="product_id" type="text" class="form-control" placeholder="Product ID" value="<?php if(isset($slider->product_id)){echo $slider->product_id; }else{echo set_value("product_id");} ?>">
                                            <?php if(form_error("product_id")!=null){ echo form_error("product_id"); } ?>
                                        </div>
                                        <!-- product ID End -->

                                        <!-- Image -->
                                        <div class="form-group">
                                            <p class="small m-t-md">
                                                <div class="form-group">
                                                    <div class="slim" data-ratio="4:2" data-instant-edit="true" data-did-upload='uploaded' data-service="<?php echo base_url('master/uploadSliderImage/'); ?>" id="my-cropper" data-push="true">
                                                        <input type="file"/>
                                                        <?php
                                                            if(isset($slider->image)){
                                                                ?>
                                                                <img src="<?php echo base_url('slider_images/'.$slider->image); ?>" style="width:100%;">
                                                                <?php
                                                            }else{
                                                                $uploaded_file=set_value("uploaded_file_name");
                                                                ?>
                                                                <img src="<?php if($uploaded_file!=null){echo base_url('slider_images/'.$uploaded_file);}else{echo base_url('slider_images/slider.jpg');} ?>" style="width:100%;">
                                                                <?php
                                                            }
                                                        ?>
                                                    </div>
                                                    <input type='hidden' id='uploaded_file_name' name="uploaded_file_name" value="<?php if(isset($slider->image)){echo $slider->image; }else{echo set_value("uploaded_file_name");} ?>" /> 
                                                    <input type='hidden' id='current_img_type' name="current_img_type" value="<?php echo set_value("current_img_type"); ?>" /> 
                                                    <p class="help-blog normal-text text-center" style="font-size: 13px; margin-left: 0px;"><?php if(form_error("uploaded_file_name")!=null){ echo form_error("uploaded_file_name"); }else{ echo "Upload Product Image Here"; } ?></p>
                                                </div>
                                            </p>
                                        </div>
                                        <!-- Image End -->
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <br>
                                        <?php 
                                            $msg=$this->session->flashdata('message');
                                            if(isset($msg)){
                                                ?><br/><br/><p style="color:green;" class="pull-right"><?php echo $msg; ?></p><?php
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
    <script src="<?php echo base_url('assets/slim_img_uplodaer/slim.kickstart.min.js'); ?>"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            })
        });

        function uploaded(error, data, response) {
            $('#uploaded_file_name').val(response['file']);
            $('#current_img_type').val("NEW");
            notie.alert(1, 'Image Uploaded Successfully!', 2);
        }
    </script>
</body>

</html>