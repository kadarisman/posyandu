<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-users"></i> Dashboard
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <?php if ($login_session['level'] == 'admin') { ?>
            <li><a href="<?= base_url('all-user') ?>"><i class="fa fa-users"></i>
                    Pengguna
                    <span class="pull-right-container"><?= $total_user ?>
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('desa') ?>"><i class="fa fa-home"></i>
                    Desa
                    <span class="pull-right-container"><?= $total_desa ?>
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('User/all_user') ?>"><i class="fa fa-database"></i>
                    Data Posyandu
                    <span class="pull-right-container">0
                    </span>
                </a>
            </li>
            <?php } else if ($login_session['level'] == 'desa') { ?>
            <li><a href="<?= base_url('User/all_user') ?>"><i class="fa fa-users"></i>
                    Peserta
                    <span class="pull-right-container">0
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('User/all_user') ?>"><i class="fa fa-users"></i>
                    Panitia
                    <span class="pull-right-container">0
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('User/all_user') ?>"><i class="fa fa-database"></i>
                    Posyandu
                    <span class="pull-right-container">0
                    </span>
                </a>
            </li>
            <?php } else if ($login_session['level'] == 'panitia') { ?>
            <li><a href="<?= base_url('User/all_user') ?>"><i class="fa fa-users"></i>
                    Peserta
                    <span class="pull-right-container">0
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('User/all_user') ?>"><i class="fa fa-database"></i>
                    Data Posyandu
                    <span class="pull-right-container">0
                    </span>
                </a>
            </li>
            <?php } else { ?>

            <?php   } ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>