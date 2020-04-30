<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo base_url("dashboard"); ?>" class="brand-link">
                <img src="<?php echo base_url("assets/dist/img/AdminLTELogo.png"); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">DEESSUM LTE</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url("assets/dist/img/user2-160x160.jpg"); ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">DEESUM </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                        <!-- <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index.html" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li> -->


                      <!-- Menu Creation Master -->
                        <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Masters
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('master/category/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('master/categoryList/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('master/city/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>City</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('master/cityList/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>City List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('master/locality/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Locality</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('master/localityList/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Locality List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('master/brand/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Brand</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('master/brandList/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Brand List</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                      <!-- Menu Creation -->


                       <!-- Menu Creation Product -->
                       <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>
                                    Product
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('product/product/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('product/productList/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product List</p>
                                    </a>
                                </li>
                               
                               
                            </ul>
                        </li>
                      <!-- Menu Creation -->

                     


                      <!-- Menu Creation Slider -->
                      <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Slider
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                <a href="<?php echo base_url('master/slider/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Slider</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="<?php echo base_url('master/sliderList/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Slider List</p>
                                    </a>
                                </li>
                               
                               
                            </ul>
                        </li>
                      <!-- Menu Creation -->

                       <!-- Menu Creation Customer -->
                       <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Customers
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                <a href="<?php echo base_url('customer/customerList/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Customer</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                      <!-- Menu Creation -->
                      <!-- Menu Creation Retailer -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Retailer
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('retailer/retailer/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Retailer</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo base_url('retailer/retailerList/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Retailer List</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Social Media Links
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('front/socialMedia/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Link</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo base_url('front/socialMediaList/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Retailer List</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Slider Web
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('front/slider/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Slider</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo base_url('front/sliderList/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Slider List</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                      <!-- Menu Creation -->

                       <!-- Menu Creation Order -->
                       <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Order
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                <a href="<?php echo base_url('customer/orders/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Orders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="<?php echo base_url('customer/orders/PENDING/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pending Orders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="<?php echo base_url('customer/orders/DISPATCHED/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dispatched Orders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="<?php echo base_url('customer/orders/DILEVERED/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Delivered Orders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="<?php echo base_url('customer/orders/TODAY/'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Today Orders</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>

                        <li class="nav-header">LABELS</li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("welcome/logout"); ?>" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p class="text">Logout</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("customer/inquiry"); ?>" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p class="text">Inquiries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("common/updatePassword"); ?>" class="nav-link">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p class="text">Update Password</p>
                            </a>
                        </li>
                      <!-- Menu Creation -->


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>