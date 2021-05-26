<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?= base_url('tambah-posyandu-bumil') ?>" class="badge progress-bar-primary">Tambah
                                Baru</a>

                            <center>
                                <h3 class="box-title" id="judul">Semua Data Posyandu Ibu Hamil <br>desa <?php
                                                                                                        if ($login_session['level'] == "panitia") {
                                                                                                            echo $panitia_data_login['nama_desa'];
                                                                                                        } else {
                                                                                                            echo $desa_data_login['nama_desa'];
                                                                                                        } ?></h3>
                            </center>
                            <br>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?= $this->session->flashdata('message1'); ?>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Suami</th>
                                            <th>HPHT</th>
                                            <th>TTP</th>
                                            <th>Umur</th>
                                            <th>Umur Kehamilan</th>
                                            <th>Hamil Ke</th>
                                            <th>Berat Badan</th>
                                            <th>Tinggi Badan</th>
                                            <th>HB</th>
                                            <th>Kunjungan</th>
                                            <th>Tahun</th>
                                            <th>Kegiatan Bulan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_admin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($posyandu_bumil_desa as $psnd1) :
                                            $no++
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $psnd1->nama ?></td>
                                            <td><?= $psnd1->suami ?></td>
                                            <td><?= $psnd1->HPHT ?></td>
                                            <td><?= $psnd1->TTP ?></td>
                                            <td><?php $lahir = $psnd1->TTL;
                                                    $tahun_lahir = substr($lahir, -4);
                                                    $now = date("Y");
                                                    (int) $tahun_lahir;
                                                    (int) $now;
                                                    $umur = $now - $tahun_lahir;
                                                    echo $umur, ' Tahun'
                                                    ?></td>
                                            <td><?= $psnd1->umur, ' Bulan' ?></td>
                                            <td><?= $psnd1->hamil_ke ?></td>
                                            <td><?= $psnd1->berat_badan ?></td>
                                            <td><?= $psnd1->tinggi_badan ?></td>
                                            <td><?= $psnd1->HB, ' G' ?></td>
                                            <td><?= 'Ke ', $psnd1->kunjungan_ke ?></td>
                                            <td><?= $psnd1->tahun ?></td>
                                            <td><?= $psnd1->bulan ?></td>
                                            <td>
                                                <a href="<?= base_url('edit-posyandu-bumil/' . $psnd1->id_posyandu) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('posyandu/Posyandu/delete_posyandu_bumil/' . $psnd1->id_posyandu) ?>"
                                                    class="badge progress-bar-danger"
                                                    onclick="return confirm('Yakin..?');">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <div class="box-body" style="width: 50%;">
                        <div class="box-header">
                            <center>
                                <h3 class="box-title" id="judul">Posyandu Lanjutan Ibu Hamil <br>desa <?php
                                                                                                        if ($login_session['level'] == "panitia") {
                                                                                                            echo $panitia_data_login['nama_desa'];
                                                                                                        } else {
                                                                                                            echo $desa_data_login['nama_desa'];
                                                                                                        } ?></h3>
                            </center>
                        </div>
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Suami</th>
                                        <th>Tambah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php //var_dump($all_admin); 
                                    ?>
                                    <?php
                                    $no = 0;
                                    foreach ($cari_posyandu_bumil_desa as $psnd) :
                                        $no++
                                    ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $psnd->nama ?></td>
                                        <td><?= $psnd->suami ?></td>
                                        <td>
                                            <a href="<?= base_url('tambah-posyandu-lanjutan/' . $psnd->id_posyandu) ?>"
                                                class="badge progress-bar-success"> <span
                                                    class="glyphicon glyphicon glyphicon-arrow-right"></span></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- /.col -->
            </div>


            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>