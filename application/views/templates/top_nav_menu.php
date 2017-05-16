<div class="top-menu">
    <ul class="nav navbar-nav pull-right">
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <li class="dropdown dropdown-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

            <span class="username username-hide-on-mobile">
            Admin </span>
            <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#">
                    <i class="icon-user"></i> My Profile </a>
                </li>
                <li>
                    <a href="#">
                    <i class="icon-calendar"></i> My Calendar </a>
                </li>
                <li>
                    <a href="#">
                    <i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
                    3 </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
                    7 </span>
                    </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="#">
                    <i class="icon-lock"></i> Lock Screen </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>auth/logout">
                    <i class="icon-key"></i> Log Out </a>
                </li>
            </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
    </ul>
</div>