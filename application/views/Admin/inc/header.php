<body class="red">
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('home'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>V</b>ID</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="<?php echo base_url('/assets/new-logo.png'); ?>"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="" class="dropdown">
                        <!--              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                        <span class="hidden-xs show-xs"><?= $_SESSION['nama'] ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" style="height: 65px">
                            <!--                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->

                            <p>
                                <?= $_SESSION['nama'] ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
<!--                            <div class="pull-left">-->
<!--                                <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal_profile">-->
<!--                                    Profile-->
<!--                                </button>-->
<!--                            </div>-->
                            <div class="pull-right">
                                <a href="<?= base_url('Login/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
</body>
