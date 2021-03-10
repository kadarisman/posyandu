<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="<?= base_url('user/Dashboard') ?>"><i class="fa fa-users"></i> Dashboard
                    <span class="pull-right-container">
                    </span>
                </a>
            </li><?php if ($user_session['level'] == 'admin BPM' || $user_session['level'] == 'prodi') { ?>
            <li><a href="<?= base_url('User/all_user') ?>"><i class="fa fa-users"></i>
                    Pengguna
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Master Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('Prodi') ?>"><i class="fa fa-circle-o"></i> Prodi
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_prodi; ?></small>
                            </span>
                        </a></li>
                    <li><a href="<?= base_url('Dosen') ?>"><i class="fa fa-circle-o"></i> Dosen
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_dosen ?></small>
                            </span>
                        </a></li>
                    <li><a href="<?= base_url('Mahasiswa') ?>"><i class="fa fa-circle-o"></i> Mahasiswa
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red"><?= $total_mahasiswa; ?></small>
                            </span>
                        </a>
                    </li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Unit
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red">12</small>
                            </span>
                        </a>
                    </li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Pengajaran
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red">12</small>
                            </span>
                        </a>
                    </li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Kuisioner
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red">12</small>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>;
            <?php } else { ?>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kuisioner
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <?php   } ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>