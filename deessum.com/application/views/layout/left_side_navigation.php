<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="<?php echo base_url('dashboard'); ?>">
            <img src="<?php echo base_url('assets/logo/logo-icon.png'); ?>" class="logo-icon" alt="logo icon">
            <h5 class="logo-text text-center"> <?php echo $project_head; ?></h5>
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header"><b>MAIN NAVIGATION </b></strong></li>

        <li style="border-bottom:1px solid black; background:#F5E4D6;">
            <a href="javaScript:void();" class="waves-effect">
                <i class="fa fa-database" style="color:black"></i>
                <span>Masters</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu" style=" margin-left:15px;">
                <li>
                    <a href="javaScript:void();"><i class="fa fa-calendar"></i> Category <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="<?php echo base_url('master/category/'); ?>"><i class="fa fa-plus-circle"></i> Category </a></li>
                        <li><a href="<?php echo base_url('master/categoryList/'); ?>"><i class="fa fa-list"></i> Category List </a></li>
                        <li><a href="<?php echo base_url('master/subCategory/'); ?>"><i class="fa fa-plus-circle"></i> Sub Category </a></li>
                        <li><a href="<?php echo base_url('master/subCategoryList/'); ?>"><i class="fa fa-list"></i> Sub Category List </a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();"><i class="fa fa-cab"></i> City <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="<?php echo base_url('master/city/'); ?>"><i class="fa fa-plus-circle"></i> City </a></li>
                        <li><a href="<?php echo base_url('master/cityList/'); ?>"><i class="fa fa-list"></i> City List </a></li>
                        <li><a href="<?php echo base_url('master/locality/'); ?>"><i class="fa fa-plus-circle"></i> Locality </a></li>
                        <li><a href="<?php echo base_url('master/localityList/'); ?>"><i class="fa fa-list"></i> Locality List </a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();"><i class="fa fa-behance-square"></i> Brand <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="<?php echo base_url('master/brand/'); ?>"><i class="fa fa-plus-circle"></i> Brand </a></li>
                        <li><a href="<?php echo base_url('master/brandList/'); ?>"><i class="fa fa-list"></i> Brand List </a></li>
                    </ul>
                </li>


            </ul>
        </li>

        <li style="border-bottom:1px solid black; background:#F6FFB6;">
            <a href="javaScript:void();"><i class="fa fa-calendar"></i> Product <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="sidebar-submenu">
                <li><a href="<?php echo base_url('product/product/'); ?>"><i class="fa fa-plus-circle"></i> Product </a></li>
                <li><a href="<?php echo base_url('product/productList/'); ?>"><i class="fa fa-list"></i> Product List </a></li>
            </ul>
        </li>

        <li style="border-bottom:1px solid black; background:#DDF2CF;">
            <a href="javaScript:void();"><i class="fa fa-calendar"></i> Slider <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="sidebar-submenu">
                <li><a href="<?php echo base_url('master/slider/'); ?>"><i class="fa fa-plus-circle"></i> Slider </a></li>
                <li><a href="<?php echo base_url('master/sliderList/'); ?>"><i class="fa fa-list"></i> Slider List </a></li>
            </ul>
        </li>

        <li style="border-bottom:1px solid black; background:#e9f7ef;">
            <a href="<?php echo base_url('customer/customerList/'); ?>" class="waves-effect">
                <i class="fa fa-users"></i> <span>Customers</span>
            </a>
        </li>

        <li style="border-bottom:1px solid black; background:#e9f7ef;">
            <a href="<?php echo base_url('retailer/retailerList/'); ?>" class="waves-effect">
                <i class="fa fa-users"></i> <span>Retailers</span>
            </a>
        </li>

        <li style="border-bottom:1px solid black; background:#F6FFB6;">
            <a href="javaScript:void();"><i class="fa fa-calendar"></i> Order <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="sidebar-submenu">
                <li><a href="<?php echo base_url('customer/orders/'); ?>"><i class="fa fa-plus-circle"></i> All Orders` </a></li>
                <li><a href="<?php echo base_url('customer/orders/PENDING'); ?>"><i class="fa fa-list"></i> Pending Orders </a></li>
                <li><a href="<?php echo base_url('customer/orders/DISPATCHED'); ?>"><i class="fa fa-list"></i> Dispatched Orders </a></li>
                <li><a href="<?php echo base_url('customer/orders/DELIVERED'); ?>"><i class="fa fa-list"></i> Delivered Orders </a></li>
                <li><a href="<?php echo base_url('customer/orders/TODAY'); ?>"><i class="fa fa-list"></i> Today Orders </a></li>
            </ul>
        </li>

    </ul>

</div>
<!--End sidebar-wrapper-->