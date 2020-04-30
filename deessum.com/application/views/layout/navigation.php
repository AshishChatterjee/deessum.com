    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="<?php echo base_url("welcome/"); ?>">Home</a></li>
                    <li><a href="<?php echo base_url("product/ourProducts/"); ?>">Our Products</a></li>
                    <li><a href="<?php echo base_url("welcome/"); ?>">About</a></li>
                    <li><a href="<?php echo base_url("welcome/"); ?>">Contact</a></li>
                    <li><a href="<?php echo base_url("welcome/"); ?>">Terms & Condition</a></li>
                    <li><a href="<?php echo base_url("welcome/"); ?>">Accessories</a></li>
                    <?php if($this->session->userdata("loginid")){ ?>
                        <li><a href="<?php echo base_url("customer/orderHistory/"); ?>">My Order History</a></li>
                    <?php } ?>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->