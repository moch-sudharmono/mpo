<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu " data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="start">
                <a href="<?= base_url() ?>page">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>referensi">
                <i class="fa fa-barcode"></i>
                <span class="title">Persentase</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>mak">
                <i class="fa fa-cube"></i>
                <span class="title">Mata Anggaran Kerja</span>
                </a>
            </li>
            <li>
                <a href="#">
                <i class="fa fa-tasks"></i>
                <span class="title">Kabupaten / Kota</span>
                </a>
            </li>
            <li>
                <a href="#">
                <i class="fa fa-ban"></i>
                <span class="title">Errors</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>users">
                <i class="fa fa-users"></i>
                <span class="title">Users</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>