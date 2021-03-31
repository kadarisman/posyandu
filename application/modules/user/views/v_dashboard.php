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
                            echo $login_session['nama'], ', Status Anda Admin';
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
                            echo $panitia_data_login['nama'], ', Status Anda Panitia Desa ', $panitia_data_login['nama_desa'];
                        } else
                            echo $login_session['username'], ', Status Anda Peserta Desa ', $peserta_data_login['nama_desa'];
                        ?>
                    </h2>
                    <p class="lead">SISTEM INFORMASI POSYANDU KABUPATEN BIREUEN </p>
                    <?php

                    // echo $this->session->userdata('username');
                    // echo $this->session->userdata('id_desa');
                    // echo $this->session->userdata('level');
                    // $username = $this->session->userdata('username');

                    ?>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ./wrapper -->