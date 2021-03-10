<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h2 class="display-4">Selamat Datang <?php
                                                            if ($user_session['level'] == "admin") {
                                                                echo $user_session['username'];
                                                            } elseif ($user_session['level'] == "desa") {
                                                                echo $user_desa['nama_desa'];
                                                            } elseif ($user_session['level'] == "panitia") {
                                                                echo $user_session['username'], ' Panitia Desa ', $user_panitia['nama_desa'];
                                                            } else
                                                                echo $user_session['username'], ' Peserta Desa ', $user_peserta['nama_desa'];
                                                            ?>....!</h2>
                    <p class="lead">SISTEM INFORMASI POSYANDU KABUPATEN BIREUEN </p>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ./wrapper -->