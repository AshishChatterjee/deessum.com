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
                                    <h3 class="card-title">Product</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" id="product_form" action="<?php echo base_url("front/socialMedia/"); ?>" method="post">
                                    <input type="hidden" name="mode" id="mode" value="<?php if(isset($mode)){echo $mode; }else { echo set_value("mode"); } ?>" />
                                    <input type="hidden" name="id" id="id" value="<?php if(isset($media->id)){echo $media->id; }else { echo set_value("id"); } ?>" />

                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <!-- Name -->
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input name="name" id="name" type="text" class="form-control" placeholder="Name" value="<?php if(isset($media->name)){echo $media->name; }else{echo set_value("name");} ?>">
                                                            <?php if(form_error("name")!=null){ echo form_error("name"); } ?>
                                                        </div>
                                                    </div>
                                                    <!-- Name end -->

                                                    <!-- Link -->
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="link">Link</label>
                                                            <input name="link" id="link" type="text" class="form-control" placeholder="Link" value="<?php if(isset($media->link)){echo $media->link; }else{echo set_value("link");} ?>">
                                                            <?php if(form_error("link")!=null){ echo form_error("link"); } ?>
                                                        </div>
                                                    </div>
                                                    <!-- Link end -->

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <p class="small m-t-md">
                                                        <div class="form-group">
                                                            <div class="slim" data-ratio="1:1" data-instant-edit="true" data-did-upload='uploaded' data-service="<?php echo base_url('front/uploadFrontImage/'); ?>" id="my-cropper" data-push="true">
                                                                <input type="file"/>
                                                                <?php
                                                                    if(isset($media->image)){
                                                                        ?>
                                                                        <img src="<?php echo base_url('front_image/'.$media->image); ?>" style="width:100%;">
                                                                        <?php
                                                                    }else{
                                                                        $uploaded_file=set_value("uploaded_file_name");
                                                                        ?>
                                                                        <img src="<?php if($uploaded_file!=null){echo base_url('front_image/'.$uploaded_file);}else{echo base_url('front_image/img.jpg');} ?>" style="width:100%;">
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                            <input type='hidden' id='uploaded_file_name' name="uploaded_file_name" value="<?php if(isset($media->image)){echo $media->image; }else{echo set_value("uploaded_file_name");} ?>" /> 
                                                            <input type='hidden' id='current_img_type' name="current_img_type" value="<?php echo set_value("current_img_type"); ?>" /> 
                                                            <p class="help-blog normal-text text-center" style="font-size: 13px; margin-left: 0px;"><?php if(form_error("uploaded_file_name")!=null){ echo form_error("uploaded_file_name"); }else{ echo "Upload Product Image Here"; } ?></p>
                                                        </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
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

        function submitForm(){
            $("#product_form").attr('action',"<?php echo base_url('product/productInputSource/');  ?>");
            $("#product_form").submit();
        }

        function uploaded(error, data, response) {
            $('#uploaded_file_name').val(response['file']);
            $('#current_img_type').val("NEW");
            notie.alert(1, 'Image Uploaded Successfully!', 2);
        }
    </script>
</body>

</html>