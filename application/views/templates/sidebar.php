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
                <a href="<?= base_url() ?>page/pembelian_list">
                <i class="fa fa-barcode"></i>
                <span class="title">Pembelian</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>page/produk_list">
                <i class="fa fa-cube"></i>
                <span class="title">Produk</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>page/transaksi_list">
                <i class="fa fa-tasks"></i>
                <span class="title">Transaksi</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>page/pengeluaran_list">
                <i class="fa fa-credit-card"></i>
                <span class="title">Pengeluaran</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>page/pemasukkan_list">
                <i class="fa fa-money"></i>
                <span class="title">Pemasukkan</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>page/tongkir_list">
                <i class="fa fa-random"></i>
                <span class="title">Tarik Ongkir</span>
                </a>
            </li>
            <!--<li>
                <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Multi Level Menu</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                        <i class="icon-settings"></i> Item 1 <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:;">
                                <i class="icon-user"></i>
                                Sample Link 1 <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="#"><i class="icon-power"></i> Sample Link 1</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-paper-plane"></i> Sample Link 1</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-star"></i> Sample Link 1</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-camera"></i> Sample Link 1</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-link"></i> Sample Link 2</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-pointer"></i> Sample Link 3</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-globe"></i> Item 2 <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#"><i class="icon-tag"></i> Sample Link 1</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-pencil"></i> Sample Link 1</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-graph"></i> Sample Link 1</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                        <i class="icon-bar-chart"></i>
                        Item 3 </a>
                    </li>
                </ul>
            </li>-->
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>