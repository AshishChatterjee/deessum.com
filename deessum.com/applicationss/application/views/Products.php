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


    <!-- Product filter section -->
    <section class="product-filter-section">
        <br/>
        <div class="container">
            <!-- <ul class="product-filter-menu">
                <li><a href="#">TOPS</a></li>
                <li><a href="#">JUMPSUITS</a></li>
                <li><a href="#">LINGERIE</a></li>
                <li><a href="#">JEANS</a></li>
                <li><a href="#">DRESSES</a></li>
                <li><a href="#">COATS</a></li>
                <li><a href="#">JUMPERS</a></li>
                <li><a href="#">LEGGINGS</a></li>
            </ul> -->
            <div class="row">
                <?php foreach($products->result() as $product){ ?>
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
            <!-- <div class="text-center pt-5">
                <button class="site-btn sb-line sb-dark">LOAD MORE</button>
            </div> -->
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