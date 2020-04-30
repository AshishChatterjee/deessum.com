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
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->
   
    <?php include 'layout/header.php'; ?>



    <!-- cart section end -->
    <section class="cart-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-table">
                        <h3>Your Cart</h3>
                        <div class="cart-table-warp">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-th">Product</th>
                                        <th class="quy-th">Quantity</th>
                                        <th class="total-th">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $total=0;
                                        if($cart_products!=null){
                                            foreach($cart_products as $product){
                                    ?>
                                            <tr>
                                                <td class="product-col">
                                                    <img src="<?php echo base_url("adminn/product_images/".$product->image); ?>" alt="">
                                                    <div class="pc-title">
                                                        <h4><?php echo $product->name; ?></h4>
                                                        <p>Rs. <?php echo $product->selling_price; ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo $product->qty; ?>
                                                    <a href="<?php echo base_url("product/decreaseCartItemQty/".$product->id); ?>" class="">
                                                        <button>-</button>
                                                    </a>
                                                    <a href="<?php echo base_url("product/addtocart/".$product->id); ?>" class="">
                                                        <button>+</button>
                                                    </a>
                                                </td>
                                                <td class="total-col">
                                                    <h4>Rs. <?php echo $tmpt=$product->qty*$product->selling_price; $total=$total+$tmpt; ?></h4>
                                                </td>
                                            </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="total-cost">
                            <h6>Total <span><?php echo "Rs. ".$total; ?></span></h6>
                        </div>
                    </div>

                    <br/>
                    <div class="col-lg-5 card-right">
                        <!-- <form class="promo-code-form">
                            <input type="text" placeholder="Enter promo code">
                            <button>Submit</button>
                        </form> -->
                        <a href="<?php echo base_url("customer/checkOut/"); ?>" class="site-btn">Proceed to checkout</a>
                    </div>
                    <div class="col-lg-5 card-right">
                        <!-- <form class="promo-code-form">
                            <input type="text" placeholder="Enter promo code">
                            <button>Submit</button>
                        </form> -->
                        <a href="<?php echo base_url("product/ourProducts/"); ?>" class="site-btn sb-dark">Continue shopping</a>
                    </div>
                </div>

                <div class="col-lg-4 card-right">
                    <!-- <form class="promo-code-form">
                        <input type="text" placeholder="Enter promo code">
                        <button>Submit</button>
                    </form> -->
                    <a href="<?php echo base_url("customer/checkOut/"); ?>" class="site-btn">Proceed to checkout</a>
                    <a href="<?php echo base_url("product/ourProducts/"); ?>" class="site-btn sb-dark">Continue shopping</a>
                </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->


    <?php include 'layout/footer.php'; ?>
    <?php include 'layout/footer_scripts.php'; ?>
    

</body>

</html>