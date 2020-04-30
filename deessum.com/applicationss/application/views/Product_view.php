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


    
    
    <!-- SECTION -->
    <div class="section">
        <br/>
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5">
                    <div id="product-main-img">
                        <div class="product-preview">
                            <img src="<?php echo base_url("adminn/product_images/".$prod->image); ?>" alt="">
                        </div>
                    </div>
                </div>
                <!-- /Product main img -->

                

                <!-- Product details -->
                <div class="col-md-5 col-md-push-1">
                    <div class="product-details">
                        <h2 class="product-name"><?php echo $prod->name; ?></h2>
                        
                        <div>
                            <h3 class="product-price">Rs. <?php echo $prod->selling_price; ?> <del class="product-old-price">Rs. <?php echo $prod->mrp; ?></del></h3>
                            <span class="product-available">In Stock</span>
                        </div>
                        <p><?php echo $prod->description; ?></p>

                        

                        <div class="add-to-cart">
                            <a href="<?php echo base_url("product/addtocart/".$prod->id); ?>">
                                <button class="btn btn-sm btn-primary"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                                <button class="btn btn-sm btn-danger"><i class="fa fa-shopping-cart"></i> Customize</button>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- /Product details -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section -->
    <div class="section">
        <br/>
        <hr/>
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>
                <hr/>

                <?php
                    foreach($related_products->result() as $product){
                ?>
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
                <?php
                    }
                ?>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->


    <?php include 'layout/footer.php'; ?>
    <?php include 'layout/footer_scripts.php'; ?>
    

</body>

</html>