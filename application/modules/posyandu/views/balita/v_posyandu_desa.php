<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?= base_url('tambah-posyandu') ?>" class="badge progress-bar-primary">Tambah</a>
                            <center>
                                <?php if ($posyandu_desa != null) { ?>
                                <h3 class="box-title" id="judul">Semua Data Posyandu Balita <br>desa <?php
                                                                                                            if ($login_session['level'] == "panitia") {
                                                                                                                echo $panitia_data_login['nama_desa'];
                                                                                                            } else {
                                                                                                                echo $desa_data_login['nama_desa'];
                                                                                                            } ?>
                                    <?php } else { ?>
                                    Belum ada data
                                    <?php } ?>
                                </h3>
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
                                            <th>Nama Peserta</th>
                                            <th>Berat Badan</th>
                                            <th>Tinggi Badan</th>
                                            <th>PSG</th>
                                            <th>GKN</th>
                                            <th>Kelamin</th>
                                            <th>Ibu</th>
                                            <th>Umur Balita</th>
                                            <th>Tahun</th>
                                            <th>Kunjungan Bulan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($posyandu_desa as $psnd) :
                                            $no++
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $psnd->nama ?></td>
                                            <td><?= $psnd->berat_badan ?></td>
                                            <td><?= $psnd->tinggi_badan ?></td>
                                            <td><?= $psnd->PSG ?></td>
                                            <td><?= $psnd->GKN ?></td>
                                            <td><?= $psnd->kelamin ?></td>
                                            <td><?= $psnd->nama_ibu ?></td>
                                            <td><?= $psnd->umur, ' Bulan' ?></td>
                                            <td><?= $psnd->tahun ?></td>
                                            <td><?= $psnd->bulan ?></td>
                                            <td>
                                                <a href="<?= base_url('edit-posyandu/' . $psnd->id_posyandu) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('posyandu/Posyandu/delete_posyandu/' . $psnd->id_posyandu) ?>"
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