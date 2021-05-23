<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?= base_url('tambah-posyandu-bumil') ?>"
                                class="badge progress-bar-primary">Tambah</a>
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
                                            <th>Tahun</th>
                                            <th>Kunjungan Bulan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_admin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($posyandu_bumil_desa as $psnd) :
                                            $no++
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $psnd->nama ?></td>
                                            <td><?= $psnd->suami ?></td>
                                            <td><?= $psnd->HPHT ?></td>
                                            <td><?= $psnd->TTP ?></td>
                                            <td><?php $lahir = $psnd->TTL;
                                                    $tahun_lahir = substr($lahir, -4);
                                                    $now = date("Y");
                                                    (int) $tahun_lahir;
                                                    (int) $now;
                                                    $umur = $now - $tahun_lahir;
                                                    echo $umur, ' Tahun'
                                                    ?></td>
                                            <td><?= $psnd->umur, ' Bulan' ?></td>
                                            <td><?= $psnd->hamil_ke ?></td>
                                            <td><?= $psnd->berat_badan ?></td>
                                            <td><?= $psnd->tinggi_badan ?></td>
                                            <td><?= $psnd->HB, ' G' ?></td>
                                            <td><?= $psnd->tahun ?></td>
                                            <td><?= $psnd->bulan ?></td>
                                            <td>
                                                <a href="<?= base_url('edit-posyandu-bumil/' . $psnd->id_posyandu) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('posyandu/Posyandu/delete_posyandu_bumil/' . $psnd->id_posyandu) ?>"
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
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>