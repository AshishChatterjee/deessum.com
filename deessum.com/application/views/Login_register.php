<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Divisima | eCommerce Template</title>
    <meta charset="UTF-8">
    <meta name="description" content=" Divisima | eCommerce Template">
    <meta name="keywords" content="divisima, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php include 'layout/header_links.php'; ?>

    <style>
        .contact-form select {
            width: 100%;
            height: 44px;
            border: none;
            padding: 0 18px;
            background: #f0f0f0;
            border-radius: 40px;
            margin-bottom: 17px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <!-- Page Preloder  -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->
   
    <?php include 'layout/header.php'; ?>



    <!-- Contact section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h3>Register New User</h3>
                    <form class="contact-form" id="regForm" method="post" action="<?php echo base_url("customer/register/"); ?>">
                        
                        <?php if(form_error("name")!=null){ echo form_error("name"); } ?>
                        <input class="input" type="text" name="name" placeholder="Name" value="<?php echo set_value("name"); ?>">

                        <?php if(form_error("email")!=null){ echo form_error("email"); } ?>
                        <?php if(form_error("exist")!=null){ echo "<b>".form_error("exist")."</b>"; } ?>
                        <input class="input" type="text" name="email" placeholder="Email" value="<?php echo set_value("email"); ?>">

                        <?php if(form_error("mobile")!=null){ echo form_error("mobile"); } ?>
                        <input class="input" type="text" name="mobile" placeholder="Mobile" value="<?php echo set_value("mobile"); ?>">

                        <?php if(form_error("password")!=null){ echo form_error("password"); } ?>
                        <input class="input" type="text" name="password" placeholder="Password" value="<?php echo set_value("password"); ?>">

                        
                        <div class="form-group">
                            <?php if(form_error("city")!=null){ echo form_error("city"); } ?>
                            <select name="city" class="input" onchange="submitForm()">
                                <option value="">-- Select City --</option>
                                <?php
                                    if(isset($cities)){
                                        foreach($cities->result() as $city){
                                ?>
                                            <option value="<?php echo $city->id; ?>" <?php echo set_select('city',$city->id); ?>><?php echo $city->city_name; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        <div>
                    
                        <div class="form-group">
                            <?php if(form_error("locality")!=null){ echo form_error("locality"); } ?>
                            <select name="locality" class="input">
                                <option value="">-- Select Locality --</option>
                                <?php
                                    if(isset($localities)){
                                        foreach($localities->result() as $locality){
                                ?>
                                            <option value="<?php echo $locality->id; ?>" <?php echo set_select('locality',$locality->id); ?>><?php echo $locality->locality; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <?php if(form_error("address")!=null){ echo form_error("address"); } ?>
                        <textarea class="input" name="address" placeholder="Address"><?php echo set_value("address"); ?></textarea>
                            
                        <input type="submit" class="" value="Register"/>
                    </form>
                </div>

                
            </div>
        </div>
            <div class="col-lg-4 col-lg-2-push">
                <h3>Login Here</h3>
                <?php 
                    $msg=$this->session->flashdata('message');
                    if(isset($msg)){
                        ?><br/><br/><p style="color:green;" class="pull-right"><?php echo $msg; ?></p><?php
                    }
                ?>
                <form class="contact-form" id="loginForm" method="post" action="<?php echo base_url("customer/login/"); ?>">
                    
                <?php if(form_error("username")!=null){ echo form_error("username"); } ?>
                    <input class="input" type="text" name="username" placeholder="Password">

                    <?php if(form_error("password")!=null){ echo form_error("password"); } ?>
                    <input class="input" type="password" name="password" placeholder="Password">
                        
                    <input type="submit" class="" value="Login"/>
                </form>
            </div>

            
    </section>
    <!-- Contact section end -->


    <?php include 'layout/footer.php'; ?>
    <?php include 'layout/footer_scripts.php'; ?>
    <script>
        function submitForm(){
            $("#regForm").attr('action',"<?php echo base_url('customer/registerInputSource/');  ?>");
            $("#regForm").submit();
        }
    </script>
    

</body>

</html>