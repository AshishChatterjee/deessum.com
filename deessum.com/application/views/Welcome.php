<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Divisima | eCommerce Template</title>
    <meta charset="UTF-8">
    <meta name="description" content=" Divisima | eCommerce Template">
    <meta name="keywords" content="divisima, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php include 'layout/header_links.php'; ?>

</head>

<body>
    <!-- Page Preloder  -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
   
    <?php include 'layout/header.php'; ?>



    <!-- Hero section -->
    <section class="hero-section">
        <div class="hero-slider owl-carousel">
            <?php foreach($sliders->result() as $slider){ ?>
                <div class="hs-item set-bg" data-setbg="<?php echo base_url("adminn/front_image/".$slider->image); ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 text-white">
                                <span><?php echo $slider->title; ?></span>
                                <h2><?php echo $slider->sub_title; ?></h2>
                                <p>
                                <?php echo $slider->description; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="container">
            <div class="slide-num-holder" id="snh-1"></div>
        </div>
    </section>
    <!-- Hero section end -->



    <!-- Features section -->
    <section class="features-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="<?php echo base_url("assets/img/icons/1.png"); ?>" alt="#">
                        </div>
                        <h2>Fast Secure Payments</h2>
                    </div>
                </div>
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="<?php echo base_url("assets/img/icons/2.png"); ?>" alt="#">
                        </div>
                        <h2>Premium Products</h2>
                    </div>
                </div>
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="<?php echo base_url("assets/img/icons/3.png"); ?>" alt="#">
                        </div>
                        <h2>Free & fast Delivery</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features section end -->


    <!-- letest product section -->
    <section class="top-letest-product-section">
        <div class="container">
            <div class="section-title">
                <h2>LATEST PRODUCTS</h2>
            </div>
            <div class="product-slider owl-carousel">

                <?php foreach($latest_products->result() as $product){ ?>
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="<?php echo base_url("adminn/product_images/".$product->image); ?>" alt="">
                            <div class="pi-links">
                                <a href="<?php echo base_url("product/addtocart/".$product->id); ?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="<?php echo base_url("product/viewProduct/".$product->id); ?>" class="wishlist-btn"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>Rs. <?php echo $product->selling_price; ?></h6>
                            <p><?php echo $product->name; ?> </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- letest product section end -->



    <!-- Product filter section -->
    <section class="product-filter-section">
        <div class="container">

        <div class="section-title">
                <h2>BROWSE TOP SELLING PRODUCTS</h2>
            </div>
            
            <div class="row">
                <?php foreach($latest_products->result() as $product){ ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo base_url("adminn/product_images/".$product->image); ?>" alt="">
                                <div class="pi-links">
                                    <a href="<?php echo base_url("product/addtocart/".$product->id); ?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                    <a href="<?php echo base_url("product/viewProduct/".$product->id); ?>" class="wishlist-btn"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="pi-text">
                                <h6>Rs. <?php echo $product->selling_price; ?></h6>
                                <p><?php echo $product->name; ?> </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="text-center pt-5">
                <button class="site-btn sb-line sb-dark">LOAD MORE</button>
            </div>
        </div>
    </section>
    <!-- Product filter section end -->


    <!-- Banner section -->
    <section class="banner-section">
        <div class="container">
            <div class="banner set-bg" data-setbg="<?php echo base_url("assets/img/banner-bg.jpg"); ?>">
                <div class="tag-new">NEW</div>
                <span>New Arrivals</span>
                <h2>STRIPED SHIRTS</h2>
                <a href="#" class="site-btn">SHOP NOW</a>
            </div>
        </div>
    </section>
    <!-- Banner section end  -->


    <?php include 'layout/footer.php'; ?>
    <?php include 'layout/footer_scripts.php'; ?>
    

</body>

</html>