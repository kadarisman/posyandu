<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<style>
    .dbc {
        color: red;
    }
</style>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <?= $this->session->flashdata('message'); ?>
                    <?= $this->session->flashdata('message1'); ?>
                    <h2 class="display-4">Selamat Datang
                        <?php

                        if ($login_session['level'] == "admin") {
                            echo $login_session['nama'], ', Anda Admin';
                        } elseif ($login_session['level'] == "desa") {
                            if ($desa_data_login['nama_desa'] == null) { ?>
                                <?php echo 'Desa ', $login_session['username']; ?><br><span class="dbc">Anda belum punya
                                    Database, ayo
                                    buat..!</span>
                                <br><a href="<?= base_url('create_DB') ?>" class="btn btn-success">create
                                    DB</a>
                        <?php
                            } else {
                                echo 'Desa ', $desa_data_login['nama_desa'];
                            }
                        } elseif ($login_session['level'] == "panitia") {
                            echo $panitia_data_login['nama'], ', Panitia Desa ', $panitia_data_login['nama_desa'];
                        } else
                            echo $peserta_data_login['nama'], ', Peserta Desa ', $peserta_data_login['nama_desa'];
                        ?>
                    </h2>
                    <p class="lead">SISTEM INFORMASI POSYANDU KABUPATEN BIREUEN </p>
                    <?php

                    // echo $this->session->userdata('username');
                    // echo $this->session->userdata('id_desa');
                    // echo $this->session->userdata('level');
                    // $username = $this->session->userdata('username');

                    ?>
                    <?php if ($login_session['level'] == 'desa') { ?>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Semua Peserta <br> Posyandu</span>
                                        <span class="info-box-number"><?= $total_user_peserta_desa ?> Orang</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Data Posyandu <br>Ibu Hamil</span>
                                        <span class="info-box-number"><?= $total_posyandu_bumil_desa ?> Data</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Data Posyandu <br>Balita</span>
                                        <span class="info-box-number"><?= $total_posyandu_desa ?> Data</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Panitia</span>
                                        <span class="info-box-number"><?= $total_user_panitia_desa ?> Orang</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ./wrapper -->