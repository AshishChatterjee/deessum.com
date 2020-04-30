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
                                <form role="form" id="product_form" action="<?php echo base_url("front/slider/"); ?>" method="post">
                                    <input type="hidden" name="mode" id="mode" value="<?php if(isset($mode)){echo $mode; }else { echo set_value("mode"); } ?>" />
                                    <input type="hidden" name="id" id="id" value="<?php if(isset($slider->id)){echo $slider->id; }else { echo set_value("id"); } ?>" />

                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <!-- Title -->
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="title">Title</label>
                                                            <input name="title" id="title" type="text" class="form-control" placeholder="Title" value="<?php if(isset($slider->title)){echo $slider->title; }else{echo set_value("title");} ?>">
                                                            <?php if(form_error("title")!=null){ echo form_error("title"); } ?>
                                                        </div>
                                                    </div>
                                                    <!-- Title end -->

                                                    <!-- Sub Title -->
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="sub_title">Sub Title</label>
                                                            <input name="sub_title" id="sub_title" type="text" class="form-control" placeholder="Sub Title" value="<?php if(isset($slider->sub_title)){echo $slider->sub_title; }else{echo set_value("sub_title");} ?>">
                                                            <?php if(form_error("sub_title")!=null){ echo form_error("sub_title"); } ?>
                                                        </div>
                                                    </div>
                                                    <!-- Sub Title end -->

                                                    <!-- Description -->
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="description">Description</label>
                                                            <textarea name="description" type="text" class="form-control" placeholder="Description"><?php if(isset($slider->description)){echo $slider->description; }else{echo set_value("description");} ?></textarea>
                                                            <?php if(form_error("description")!=null){ echo form_error("description"); } ?>
                                                        </div>
                                                    </div>
                                                    <!-- Description end -->

                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <p class="small m-t-md">
                                                        <div class="form-group">
                                                            <div class="slim" data-ratio="8:3" data-instant-edit="true" data-did-upload='uploaded' data-service="<?php echo base_url('front/uploadFrontImage/'); ?>" id="my-cropper" data-push="true">
                                                                <input type="file"/>
                                                                <?php
                                                                    if(isset($slider->image)){
                                                                        ?>
                                                                        <img src="<?php echo base_url('front_image/'.$slider->image); ?>" style="width:100%;">
                                                                        <?php
                                                                    }else{
                                                                        $uploaded_file=set_value("uploaded_file_name");
                                                                        ?>
                                                                        <img src="<?php if($uploaded_file!=null){echo base_url('front_image/'.$uploaded_file);}else{echo base_url('front_image/banner.jpg');} ?>" style="width:100%;">
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