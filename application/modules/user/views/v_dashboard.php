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
                                                            if ($user_session['level'] == "admin BPM") {
                                                                echo $user_session['username'], ' BPM';
                                                            } elseif ($user_session['level'] == "prodi") {
                                                                echo $user_prodi['nama_prodi'];
                                                            } elseif ($user_session['level'] == "mahasiswa") {
                                                                echo $user_mahasiswa['nama_mahasiswa'];
                                                            } else
                                                                echo 'Pak ', $user_dosen['nama_dosen'];
                                                            ?>....!</h2>
                    <p class="lead">SISTEM EVALUASI KINERJA DOSEN
                        UNIVERSITAS ALMUSLIM </p>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ./wrapper -->