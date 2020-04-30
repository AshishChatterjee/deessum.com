    <!-- Header section -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 text-center text-lg-left">
                        <!-- logo -->
                        <a href="./index.html" class="site-logo">
                            <img style="margin-top:10px;" src="<?php echo base_url("assets/logo/logo.png"); ?>" alt="">
                        </a>
                    </div>
                    <div class="col-xl-6 col-lg-5">
                        <form class="header-search-form" method="post" action="<?php echo base_url("product/search/"); ?>">
                            <input type="text" name="text" placeholder="Search on deessum ....">
                            <button><i class="flaticon-search"></i></button>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="user-panel">
                            <div class="up-item">
                                <?php if($this->session->userdata("customer_name")){ ?>
                                    <i class="flaticon-profile"></i>
                                    <a href="#"><?php echo $this->session->userdata("customer_name"); ?></a>
                                    
                                    <a href="<?php echo base_url("customer/logout/"); ?>"><i class="flaticon-logout"></i></a>
                                    <?php }else{ ?>
                                        <i class="flaticon-profile"></i>
                                        <a href="<?php echo base_url("customer/loginRegister/"); ?>">Login Or Register</a>
                                    <?php } ?>
                                
                            </div>
                            <div class="up-item">
                                <div class="shopping-card">
                                    <i class="flaticon-bag"></i>
                                    <span><?php if(is_array($cart_products)){ echo sizeof($cart_products); }else{ echo "0"; } ?></span>
                                </div>
                                <a href="<?php echo base_url("product/viewCart/"); ?>">Shopping Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="main-navbar">
            <div class="container">
                <!-- menu -->
                <ul class="main-menu">
                    <li><a href="<?php echo base_url("welcome/"); ?>">Home</a></li>
                    <li><a href="<?php echo base_url("product/ourProducts/"); ?>">Products</a></li>
                    
                    <li><a href="#">Caegories</a>
                        <ul class="sub-menu">
                            <?php foreach($categories->result() as $category){ ?>
                                <li><a href="<?php echo base_url("product/productOfCategory/".$category->id); ?>"><?php echo $category->category_name; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url("welcome/contact/"); ?>">Contact US</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li>
                    <a href="contact-us.php">Upload Image</a>
                </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Header section end -->