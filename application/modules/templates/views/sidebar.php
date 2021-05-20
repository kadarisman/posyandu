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
            <li><a href="<?= base_url('all-admin') ?>"><i class="fa fa-users"></i>
                    Admin
                    <span class="pull-right-container"><?= $total_admin ?>
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('all-admin-desa') ?>"><i class="fa fa-users"></i>
                    Admin Desa
                    <span class="pull-right-container"><?= $total_admin_desa ?>
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('all-panitia') ?>"><i class="fa fa-users"></i>
                    Panitia
                    <span class="pull-right-container"><?= $total_user_panitia ?>
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('all-peserta') ?>"><i class="fa fa-users"></i>
                    Peserta
                    <span class="pull-right-container"><?= $total_user_peserta ?>
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('desa') ?>"><i class="fa fa-home"></i>
                    Desa
                    <span class="pull-right-container"><?= $total_desa ?>
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('posyandu') ?>"><i class="fa fa-database"></i>
                    Balita
                    <span class="pull-right-container"> <?= $total_posyandu ?>
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('posyandu') ?>"><i class="fa fa-database"></i>
                    Ibu Hamil
                    <span class="pull-right-container"> <?= $total_posyandu_bumil ?>
                    </span>
                </a>
            </li>
            <?php } else if ($login_session['level'] == 'desa') { ?>
            <li><a href="<?= base_url('panitia') ?>"><i class="fa fa-users"></i>
                    Panitia
                    <span class="pull-right-container"><?= $total_user_panitia_desa ?>
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('peserta') ?>"><i class="fa fa-users"></i>
                    Peserta
                    <span class="pull-right-container"><?= $total_user_peserta_desa ?>
                    </span>
                </a>
            </li>

            <li><a href="<?= base_url('posyandu-desa') ?>"><i class="fa fa-database"></i>
                    Balita
                    <span class="pull-right-container"><?= $total_posyandu_desa ?>
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('posyandu-desa') ?>"><i class="fa fa-database"></i>
                    Ibu Hamil
                    <span class="pull-right-container"><?= $total_posyandu_bumil_desa ?>
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('rekap-balita-desa') ?>"><i class="fa fa-list"></i>
                    Rekap Balita
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('posyandu-desa') ?>"><i class="fa fa-list"></i>
                    Rekap Ibu Hamil
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <?php } else if ($login_session['level'] == 'panitia') { ?>
            <li><a href="<?= base_url('peserta') ?>"><i class="fa fa-users"></i>
                    Peserta
                    <span class="pull-right-container"><?= $total_user_peserta_desa ?>
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('posyandu-desa') ?>"><i class="fa fa-database"></i>
                    Balita
                    <span class="pull-right-container"><?= $total_posyandu_desa ?>
                    </span>
                </a>
            </li>
            <li><a href="<?= base_url('posyandu-desa') ?>"><i class="fa fa-database"></i>
                    Ibu Hamil
                    <span class="pull-right-container"><?= $total_posyandu_desa ?>
                    </span>
                </a>
            </li>
            <?php } else { ?>
            <li><a href="<?= base_url('User/all_user') ?>"><i class="fa fa-database"></i>
                    Tidak ada data
                    <span class="pull-right-container">0
                    </span>
                </a>
            </li>
            <?php   } ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>