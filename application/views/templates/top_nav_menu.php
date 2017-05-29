<div class="top-menu">
    <ul class="nav navbar-nav pull-right">
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <li class="dropdown dropdown-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

            <span class="username username-hide-on-mobile">
            User Name </span>
            <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu">                
                <li>
                    <a href="<?= base_url() ?>auth/logout">
                    <i class="icon-key"></i> Log Out </a>
                </li>
            </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
    </ul>
</div>