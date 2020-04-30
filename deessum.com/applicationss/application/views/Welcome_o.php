<!DOCTYPE html>
<html>

<head>
    <title>pranjalfarms</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--//tags -->
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url("assets/css/font-awesome.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/easy-responsive-tabs.css"); ?>" rel='stylesheet' type='text/css' />
    <!-- //for bootstrap working -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>

<body>
    
    <?php include 'layout/header.php'; ?>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php 
                $i=0;
                foreach($sliders->result() as $slider){
            ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i==0){ echo "active"; } ?>"></li>
            <?php
                $i++; 
                }
            ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            
            <?php 
                $i=0;
                foreach($sliders->result() as $slider){
            ?>
                <div class="item <?php if($i==0){ echo "active"; } ?>">
                    <img src="<?php echo base_url("adminn/front_image/".$slider->image); ?>" alt="Los Angeles">
                </div>
            <?php 
                $i++;
                }
            ?>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>

    <div class="banner_bottom_agile_info">
        <div class="container">
            <div class="banner_bottom_agile_info_inner_w3ls">
                <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                    <figure class="effect-roxy">
                        <img src="<?php echo base_url("assets/images/bottom1.jpg"); ?>" alt=" " class="img-responsive" />
                        <figcaption>
                            <h3><span>F</span>all Ahead</h3>
                            <p>New Arrivals</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                    <figure class="effect-roxy">
                        <img src="<?php echo base_url("assets/images/bottom2.jpg"); ?>" alt=" " class="img-responsive" />
                        <figcaption>
                            <h3><span>F</span>all Ahead</h3>
                            <p>New Arrivals</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!--/grids-->
    <div class="agile_last_double_sectionw3ls">
        <div class="col-md-6 multi-gd-img multi-gd-text ">
            <a href="womens.html"><img src="<?php echo base_url("assets/images/bot_1.jpg"); ?>" alt=" ">
                <h4>Flat <span>50%</span> offer</h4>
            </a>

        </div>
        <div class="col-md-6 multi-gd-img multi-gd-text ">
            <a href="womens.html"><img src="<?php echo base_url("assets/images/bot_2.jpg"); ?>" alt=" ">
                <h4>Flat <span>50%</span> offer</h4>
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
    <!--/grids-->


    <!-- /new_arrivals -->
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info">New <span>Arrivals</span></h3>
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <?php 
                        foreach($categories->result() as $category){
                    ?>
                        <li> <?php echo $category->category_name; ?></li>
                    <?php
                        }
                    ?>
                </ul>
                <div class="resp-tabs-container">
                    <!--/tab_one-->
                    <?php 
                        foreach($categories->result() as $category){
                    ?>
                        <div class="tab1">
                            <?php 
                                foreach($category->products->result() as $product){
                            ?>
                                <div class="col-md-3 product-men">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item">
                                            <img src="<?php echo base_url("adminn/product_images/".$product->image); ?>" alt="" class="pro-image-front">
                                            <img src="<?php echo base_url("adminn/product_images/".$product->image); ?>" alt="" class="pro-image-back">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="single.html" class="link-product-add-cart">Quick View</a>
                                                </div>
                                            </div>
                                            <span class="product-new-top">New</span>

                                        </div>
                                        <div class="item-info-product ">
                                            <h4><a href="single.html"><?php echo $product->name; ?></a></h4>
                                            <div class="info-product-price">
                                                <span class="item_price">Rs. <?php echo $product->selling_price; ?></span>
                                                <del>Rs. <?php echo $product->mrp; ?></del>
                                            </div>

                                        </div>
                                        <a href="<?php echo base_url("product/addtocart/".$product->id); ?>" class="btn btn-success btn-sm btn-block">Add To Cart</a>
                                            
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    <?php
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- //new_arrivals -->


    <!-- /we-offer -->
    <div class="sale-w3ls">
        <div class="container">
            <h6>We Offer Flat <span>40%</span> Discount</h6>

            <a class="hvr-outline-out button2" href="single.html">Shop Now </a>
        </div>
    </div>
    <!-- //we-offer -->

    
    <!--/grids-->
    <div class="coupons">
        <div class="coupons-grids text-center">
            <div class="w3layouts_mail_grid">
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>PAID SHIPPING</h3>
                        <p>As per the area code</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-headphones" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>24/7 SUPPORT</h3>
                        <p>Only on working hours</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>MONEY BACK GUARANTEE</h3>
                        <p>T&C Applied</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>FREE GIFT COUPONS</h3>
                        <p>T&C Apply and Offers valid</p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>

        </div>
    </div>
    <!--grids-->
    
    <?php include 'layout/footer.php'; ?>

    <!-- login -->
    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body modal-spa">
                    <div class="login-grids">
                        <div class="login">
                            <div class="login-bottom">
                                <h3>Sign up for free</h3>
                                <form>
                                    <div class="sign-up">
                                        <h4>Email :</h4>
                                        <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">
                                    </div>
                                    <div class="sign-up">
                                        <h4>Password :</h4>
                                        <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">

                                    </div>
                                    <div class="sign-up">
                                        <h4>Re-type Password :</h4>
                                        <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">

                                    </div>
                                    <div class="sign-up">
                                        <input type="submit" value="REGISTER NOW">
                                    </div>

                                </form>
                            </div>
                            <div class="login-right">
                                <h3>Sign in with your account</h3>
                                <form>
                                    <div class="sign-in">
                                        <h4>Email :</h4>
                                        <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">
                                    </div>
                                    <div class="sign-in">
                                        <h4>Password :</h4>
                                        <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="single-bottom">
                                        <input type="checkbox" id="brand" value="">
                                        <label for="brand"><span></span>Remember Me.</label>
                                    </div>
                                    <div class="sign-in">
                                        <input type="submit" value="SIGNIN">
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //login -->
    
    <a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

    <?php include 'layout/footer_scripts.php'; ?>
</body>

</html>