<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Customer - <?php echo $project_head; ?></title>
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
                        
                        <div class="col-sm-12">
                            <div class="">
                                <a href="<?php echo base_url('customer/customerList/'); ?>" >
                                    <button class="btn-outline-success border-0 shadow-light m-1 pull-right"> <span class="moon-security-on"></span> Customer List</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Breadcrumb-->

                    <!-- Form Row Start Here -->
                    <div class="row">
                        <div class="col-lg-8 m-auto">
                            <div class="card">
                                <div class="card-body bg-light-blue" >
                                    <div class="row pt-2 pb-2">
                                        <div class="col-sm">
                                            <h4>Customer</h4>
                                        </div>
                                    </div>
                                    <hr/>
                                    <form method="post" id="service_form" action="<?php echo base_url('customer/customer/') ?>">
                                        <input type="hidden" name="mode" id="mode" value="<?php if(isset($mode)){echo $mode; }else { echo set_value("mode"); } ?>" />
                                        <input type="hidden" name="id" id="id" value="<?php if(isset($customer->id)){echo $customer->id; }else { echo set_value("id"); } ?>" />


                                            <div class="row">
                                                <!-- Start : Name  -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">Name <span class="icon-star-empty text-danger"></span></label>
                                                        <input name="name" id="name" type="text" class="form-control" placeholder="Customer Name" value="<?php if(isset($customer->name)){echo $customer->name; }else{echo set_value("name");} ?>">
                                                        <?php if(form_error("name")!=null){ echo form_error("name"); } ?>
                                                    </div>
                                                </div>
                                                <!-- End : Name -->

                                                <!-- Start : Email  -->
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="email">Email <span class="icon-star-empty text-danger"></span></label>
                                                        <input name="email" id="email" type="text" class="form-control" placeholder="Customer email" value="<?php if(isset($customer->email)){echo $customer->email; }else{echo set_value("email");} ?>">
                                                        <?php if(form_error("email")!=null){ echo form_error("email"); } ?>
                                                    </div>
                                                </div>
                                                <!-- End : Email -->

                                                <!-- Start : Mobile  -->
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="mobile">Mobile <span class="icon-star-empty text-danger"></span></label>
                                                        <input name="mobile" id="mobile" type="text" class="form-control" placeholder="Customer number" value="<?php if(isset($customer->mobile)){echo $customer->mobile; }else{echo set_value("mobile");} ?>">
                                                        <?php if(form_error("mobile")!=null){ echo form_error("mobile"); } ?>
                                                    </div>
                                                </div>
                                                <!-- End : Mobile -->

                                                <!-- Start : Address  -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address">Address <span class="icon-star-empty text-danger"></span></label>
                                                        <input name="address" id="address" type="text" class="form-control" placeholder="Address" value="<?php if(isset($customer->address)){echo $customer->address; }else{echo set_value("address");} ?>">
                                                        <?php if(form_error("address")!=null){ echo form_error("address"); } ?>
                                                    </div>
                                                </div>
                                                <!-- End : Address -->

                                                <!-- Start : Product -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="product">Product <span class="icon-star-empty text-danger"></span></label>
                                                        <select name="product" id="product" class="form-control single-select">
                                                            <option value="">--Select--</option>
                                                            <?php
                                                                    if(isset($products)){ 
                                                                        foreach($products->result() as $product){
                                                                            ?>
                                                                                <option value="<?php echo $product->id; ?>" <?php if(isset($customer->product) && $product->id==$customer->product){echo"selected";}else{ echo set_select('product',$product->id);} ?>><?php echo $product->name; ?></option>
                                                                            <?php
                                                                        }   
                                                                    }
                                                                ?>
                                                        </select>
                                                        <?php if(form_error("product")!=null){ echo form_error("product"); } ?>
                                                    </div>
                                                </div>
                                                <!-- End : Product  -->

                                                <!-- Start : Engineer -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="engineer">Engineer <span class="icon-star-empty text-danger"></span></label>
                                                        <select name="engineer" id="engineer" class="form-control single-select">
                                                            <option value="">--Select--</option>
                                                            <?php
                                                                    if(isset($engineers)){ 
                                                                        foreach($engineers->result() as $engineer){
                                                                            ?>
                                                                                <option value="<?php echo $engineer->id; ?>" <?php if(isset($customer->engineer) && $engineer->id==$customer->engineer){echo"selected";}else{ echo set_select('product',$engineer->id);} ?>><?php echo $engineer->name; ?></option>
                                                                            <?php
                                                                        }   
                                                                    }
                                                                ?>
                                                        </select>
                                                        <?php if(form_error("engineer")!=null){ echo form_error("engineer"); } ?>
                                                    </div>
                                                </div>
                                                <!-- End : Engineer  -->

                                                <!-- Start : Service Place -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="service_place">Service place <span class="icon-star-empty text-danger"></span></label>
                                                        <select name="service_place" id="service_place" class="form-control single-select">
                                                            <option value="ONSIDE" <?php if(isset($customer->service_place) && $customer->service_place=="ONSIDE"){echo"selected";}else{ echo set_select('service_place',"ONSIDE");} ?>>ONSIDE</option>
                                                            <option value="OFFSIDE" <?php if(isset($customer->service_place) && $customer->service_place=="OFFSIDE"){echo"selected";}else{ echo set_select('service_place',"OFFSIDE");} ?>>OFFSIDE</option>              
                                                        </select>
                                                        <?php if(form_error("engineer")!=null){ echo form_error("engineer"); } ?>
                                                    </div>
                                                </div>
                                                <!-- End : Service Place  -->

                                                <!-- Start : Problem  -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="problem">Problem <span class="icon-star-empty text-danger"></span></label>
                                                        <textarea name="problem" id="problem" type="text" class="form-control" placeholder="Problem"><?php if(isset($customer->problem)){echo $customer->problem; }else{echo set_value("problem");} ?></textarea>

                                                        <?php if(form_error("address")!=null){ echo form_error("address"); } ?>
                                                    </div>
                                                </div>
                                                <!-- End : Problem -->

                                                <!-- Start : Remark  -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="remark">Remark <span class="icon-star-empty text-danger"></span></label>
                                                        <textarea name="remark" id="remark" type="text" class="form-control" placeholder="Remark"><?php if(isset($customer->remark)){echo $customer->remark; }else{echo set_value("remark");} ?></textarea>

                                                        <?php if(form_error("address")!=null){ echo form_error("address"); } ?>
                                                    </div>
                                                </div>
                                                <!-- End : Remark -->

                                                <!-- Start : Approx amount  -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="approx_amt">Approx Amt <span class="icon-star-empty text-danger"></span></label>
                                                        <input name="approx_amt" id="approx_amt" type="text" class="form-control" placeholder="Approx amt" value="<?php if(isset($customer->approx_amt)){echo $customer->approx_amt; }else{echo set_value("approx_amt");} ?>">
                                                        <?php if(form_error("approx_amt")!=null){ echo form_error("approx_amt"); } ?>
                                                    </div>
                                                </div>
                                                <!-- End : Approx amount -->

                                                <!-- Start : Advance amount  -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="advance_amt">Advance Amt <span class="icon-star-empty text-danger"></span></label>
                                                        <input name="advance_amt" id="advance_amt" type="text" class="form-control" placeholder="Advance amt" value="<?php if(isset($customer->advance_amt)){echo $customer->advance_amt; }else{echo set_value("advance_amt");} ?>">
                                                        <?php if(form_error("advance_amt")!=null){ echo form_error("advance_amt"); } ?>
                                                    </div>
                                                </div>
                                                <!-- End : Advance amount -->

                                                

                                                <div class="col-sm-3">      
                                                    <div class="form-group">
                                                        <label for="delivery_date">Delivery date <span class="icon-star-empty text-danger"></span></label>
                                                        <?php $delivery_date=set_value("delivery_date"); ?>
                                                        <input name="delivery_date" id="delivery_date" type="text" class="form-control" placeholder="Delivery date" value="<?php if(isset($customer->delivery_date)){echo substr($customer->delivery_date,8,2)."/".substr($customer->delivery_date,5,2)."/".substr($customer->delivery_date,0,4); }else{ if(isset($delivery_date) && $delivery_date!=""){ echo $delivery_date; }else{ echo date('d/m/Y'); }} ?>">
                                                        <?php if(form_error("delivery_date")!=null){ echo form_error("delivery_date"); } ?>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">      
                                                    <div class="form-group">
                                                        <label for="delivery_time">Delivery Time <span class="icon-star-empty text-danger"></span></label>
                                                        <?php $delivery_time=set_value("delivery_time"); ?>
                                                        <input name="delivery_time" id="delivery_time" type="text" class="form-control" placeholder="00:00" value="<?php if(isset($customer->delivery_time)){ echo $customer->delivery_time; }else{ if(isset($delivery_time) && $delivery_time!=""){ echo $delivery_time; }else{ echo "00:00"; }} ?>">
                                                        <?php if(form_error("delivery_time")!=null){ echo form_error("delivery_time"); } ?>
                                                    </div>
                                                </div>

                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <div class="form-group bt-switch">
                                                            <label style="font-size:0.6em;" for="posting">Warrantee status <span class="icon-star-empty text-danger"></span></label>
                                                            <br/>
                                                            <input name="warrantee_status" type="checkbox" value="1" <?php if(isset($customer->warrantee_status)){ echo $customer->warrantee_status ? "checked" : "";  }else{ echo set_checkbox('posting', '1');  } ?> data-on-color="success" data-off-color="danger" data-on-text="WORRENTY" data-off-text="WARRENTY">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-outline-success border-0 shadow-light m-1 pull-right"><span class="zmdi zmdi-check-all"></span> Submit</button>
                                            </div>
                                        <br>
                                        <?php 
                                            $msg=$this->session->flashdata('message');
                                            if(isset($msg)){
                                                ?><br/><br/><p style="color:green;" class="pull-right"><?php echo $msg; ?></p><?php
                                            }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form Row End Here -->

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
    <!--Bootstrap Switch Buttons-->
    <script src="<?php echo base_url('assets/plugins/bootstrap-switch/bootstrap-switch.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/summernote/dist/summernote-lite.js'); ?>"></script>
    <script src="<?php echo base_url('assets/slim_img_uploader/slim.kickstart.min.js'); ?>"></script>
    <script>
        $('#delivery_date').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy'
        });
        $(document).ready(function() {
            $('.single-select').select2();

            $('.multiple-select').select2();
        });
        function submitForm() {
            $("#service_form").attr('action', "<?php echo base_url('services/getServicesOfSelectedCategory/');  ?>");
            $("#service_form").submit();
        }
        function deleteService(){
            alert("Deletion module is in waiting list");
            return false;
        }
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        $('#description').summernote({
            height: 200,
            tabsize: 2,
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        });

        function uploaded(error, data, response) {
            $('#uploaded_file_name').val(response['file']);
            $('#current_img_type').val("NEW");
            notie.alert(1, 'Image Uploaded Successfully!', 2);
        }
    </script>
</body>

</html>