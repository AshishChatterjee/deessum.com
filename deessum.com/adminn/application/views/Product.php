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
                                <form role="form" id="product_form" action="<?php echo base_url("product/product/"); ?>" method="post">
                                    <input type="hidden" name="mode" id="mode" value="<?php if(isset($mode)){echo $mode; }else { echo set_value("mode"); } ?>" />
                                    <input type="hidden" name="id" id="id" value="<?php if(isset($product->id)){echo $product->id; }else { echo set_value("id"); } ?>" />

                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-7">
                                                <div class="row">
                                                    <!-- Product name -->
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="name">Product name</label>
                                                            <input name="name" id="name" type="text" class="form-control" placeholder="Product name" value="<?php if(isset($product->name)){echo $product->name; }else{echo set_value("name");} ?>">
                                                            <?php if(form_error("name")!=null){ echo form_error("name"); } ?>
                                                        </div>
                                                    </div>
                                                    <!-- Product name end -->

                                                    <!-- MRP-->
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="mrp">Product MRP</label>
                                                                    <input name="mrp" id="mrp" type="text" class="form-control" placeholder="Product MRP" value="<?php if(isset($product->mrp)){echo $product->mrp; }else{echo set_value("mrp");} ?>">
                                                                    <?php if(form_error("mrp")!=null){ echo form_error("mrp"); } ?>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="selling_price">Selling price</label>
                                                                    <input name="selling_price" id="selling_price" type="text" class="form-control" placeholder="Selling price" value="<?php if(isset($product->selling_price)){echo $product->selling_price; }else{echo set_value("selling_price");} ?>">
                                                                    <?php if(form_error("selling_price")!=null){ echo form_error("selling_price"); } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- MRP end -->

                                                    <!-- Brand -->
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="brand_id">Brand</label>
                                                            <select name="brand_id" id="brand_id" class="form-control select2">
                                                                <option value="">--Select--</option>
                                                                <?php
                                                                    if(isset($brands)){ 
                                                                        foreach($brands->result() as $brand){
                                                                ?>
                                                                            <option value="<?php echo $brand->id; ?>" <?php if(isset($product->brand_id) && $brand->id==$product->brand_id){echo"selected";}else{ echo set_select('brand_id',$brand->id);} ?> ><?php echo $brand->name; ?></option>
                                                                <?php
                                                                        }   
                                                                    }
                                                                ?>
                                                            </select>
                                                            <?php if(form_error("brand_id")!=null){ echo form_error("brand_id"); } ?>
                                                        </div>
                                                    </div>
                                                    <!-- Brand End -->

                                                    <!-- Category -->
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="category_id">Category</label>
                                                            <select name="category_id" id="category_id" class="form-control select2">
                                                                <option value="">--Select--</option>
                                                                <?php
                                                                    if(isset($categories)){ 
                                                                        foreach($categories->result() as $category){
                                                                ?>
                                                                            <option value="<?php echo $category->id; ?>" <?php if(isset($product->category_id) && $category->id==$product->category_id){echo"selected";}else{ echo set_select('category_id',$category->id);} ?> ><?php echo $category->category_name; ?></option>
                                                                <?php
                                                                        }   
                                                                    }
                                                                ?>
                                                            </select>
                                                            <?php if(form_error("category_id")!=null){ echo form_error("category_id"); } ?>
                                                        </div>
                                                    </div>
                                                    <!-- Category End -->

                                                    <!-- Sub Category -->
                                                    <!-- <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="sub_category_id">Sub Category</label>
                                                            <select name="sub_category_id" id="sub_category_id" class="form-control select2">
                                                                <option value="">--Select--</option>
                                                                <?php
                                                                    if(isset($sub_categories)){ 
                                                                        foreach($sub_categories->result() as $sub_category){
                                                                ?>
                                                                            <option value="<?php echo $sub_category->id; ?>" <?php if(isset($product->sub_category_id) && $sub_category->id==$product->sub_category_id){echo"selected";}else{ echo set_select('sub_category_id',$sub_category->id);} ?> ><?php echo $sub_category->sub_category; ?></option>
                                                                <?php
                                                                        }   
                                                                    }
                                                                ?>
                                                            </select>
                                                            <?php if(form_error("sub_category_id")!=null){ echo form_error("sub_category_id"); } ?>
                                                        </div>
                                                    </div> -->
                                                    <!-- Sub category End -->

                                                </div>
                                            </div>

                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <p class="small m-t-md">
                                                        <div class="form-group">
                                                            <div class="slim" data-ratio="20:31" data-instant-edit="true" data-did-upload='uploaded' data-service="<?php echo base_url('product/uploadProductImage/'); ?>" id="my-cropper" data-push="true">
                                                                <input type="file"/>
                                                                <?php
                                                                    if(isset($product->image)){
                                                                        ?>
                                                                        <img src="<?php echo base_url('product_images/'.$product->image); ?>" style="width:100%;">
                                                                        <?php
                                                                    }else{
                                                                        $uploaded_file=set_value("uploaded_file_name");
                                                                        ?>
                                                                        <img src="<?php if($uploaded_file!=null){echo base_url('product_images/'.$uploaded_file);}else{echo base_url('product_images/product.jpg');} ?>" style="width:100%;">
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                            <input type='hidden' id='uploaded_file_name' name="uploaded_file_name" value="<?php if(isset($product->image)){echo $product->image; }else{echo set_value("uploaded_file_name");} ?>" /> 
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