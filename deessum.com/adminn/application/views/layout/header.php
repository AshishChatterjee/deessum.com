<!--Start topbar header-->
<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top bg-white">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                <i class="fa fa-bars" aria-hidden="true"></i>

                </a>
            </li>
            <li class="nav-item">
                <h4 style="margin-top:10px;"><?php echo $project_name; ?></h4>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
            
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="index3.html#">
                    <span class="user-profile"><img src="<?php echo base_url('member_profile/'.$member->image); ?>" class="img-circle" alt="user avatar"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="javaScript:void();">
                            <div class="media">
                                <div class="avatar"><img class="align-self-start mr-3" src="<?php echo base_url('member_profile/'.$member->image); ?>" alt="user avatar"></div>
                                <div class="media-body">
                                    <h6 class="mt-2 user-title"><?php echo $member->name; ?></h6>
                                    <p class="user-subtitle"><?php echo $member->email; ?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <!-- <li class="dropdown-item"><a href=""><i class="fa fa-user"></i> Account</a></li> -->
                    <li class="dropdown-item"><a href="<?php echo base_url('common/updatePassword/'); ?>"><i class="fa fa-lock"></i> Update Password</a></li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item"><a href="<?php echo base_url('welcome/logout/'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<!--End topbar header-->