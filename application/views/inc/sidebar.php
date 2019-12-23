<style>
    .treeview-menu-visible {
        display: block;
    }
</style>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <?php
            $level=$this->session->userdata('f_level');
            // pecah menu berdasar level
            if($level=="0") {
        ?>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li id="home">
                    <a href="<?= base_url('Admin/Home') ?>"><i class="fa fa-laptop"></i> <span>Dashboard</span></a>
                </li>
                <li class="active treeview menu-open">
                    <li id="booking" class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i><span>Menu Pesanan</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="booking" class="active">
                                <a href="<?= base_url('Admin/Pesan'); ?>">
                                    <i class="fa fa-circle-o"></i> Pesanan Hotel
                                </a>
                            </li>
                        </ul>
                    </li>
                </li>
                <li class="active treeview menu-open">
                    <li id="mitra"class="treeview">
                        <a href="#">
                            <i class="fa fa-check-circle"></i><span>Verifikasi</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="mitra" class="active">
                                <a href="<?=base_url('Admin/Akun'); ?>">
                                    <i class="fa fa-building-o"></i>Akun Mitra
                                </a>
                            </li>
                        </ul>
                    </li>
                </li>
                <li class="active treeview menu-open">
                    <li id="profile" class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i><span>Profil</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="profile" class="active">
                                <a href="<?= base_url('Admin/Profile'); ?>">
                                    <i class="fa fa-user"></i>Detail Profile
                                </a>
                            </li>
                            <li id="profile" class="active">
                                <a href="<?= base_url('Admin/Profile/Reset_pass'); ?>">
                                    <i class="fa fa-circle-o"></i>Rubah Password
                                </a>
                            </li>
                        </ul>
                    </li>
                </li>
                <li id="margin">
                    <a href="<?= base_url('Admin/Margin/'); ?>">
                        <i class="fa fa-line-chart"></i> <span>Margin</span>
                    </a>
                </li>
                <li id="penggunaan">
                    <a href="<?= base_url('Admin/Message/penggunaan'); ?>">
                        <i class="fa fa-list-alt"></i> <span>Cara Penggunaan</span>
                    </a>
                </li>
                <li id="snk">
                    <a href="<?= base_url('Admin/Message/syarat_ketentuan'); ?>">
                        <i class="fa fa-pencil-square-o"></i> <span>Syarat dan Ketentuan</span>
                    </a>
                </li>
                <li id="hubungi">
                    <a href="<?= base_url('Admin/Message/hubungi'); ?>">
                        <i class="fa fa-phone"></i> <span>Hubungi Kami</span>
                    </a>
                </li>
                <li id="about">
                    <a href="<?= base_url('Admin/Message/tentang'); ?>">
                    <i class="fa fa-info"></i> <span>Tentang Dashboard Mitra</span>
                    </a>
                </li>
                <li><a href="<?= base_url('Admin/Home/logout'); ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
            </ul>
        <?php }else{ 
        }?>
    </section>
    <script>
        $(".sidebar-menu li").removeClass("active"); 
        $(".sidebar-menu li#<?=$active_menu?>").addClass("active");
    </script>
</aside>