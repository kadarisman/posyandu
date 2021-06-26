<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?= base_url('tambah-peserta-ibu-hamil') ?>"
                                class="badge progress-bar-primary">Tambah</a>
                            <center>
                                <?php if ($user_peserta_bumil != null) { ?>
                                <h3 class="box-title" id="judul">Semua Peserta Ibu Hamil desa <?php
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
                                            <th>Foto</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Nik</th>
                                            <th>Lahir</th>
                                            <th>Suami</th>
                                            <th>Kriteria</th>
                                            <th>Kelamin</th>
                                            <th>Umur</th>
                                            <th>Ditambahkan</th>
                                            <th>Diubah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_admin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($user_peserta_bumil as $psrt) :
                                            $no++
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><img src="<?= base_url('assets/'); ?>img/users/default.jpg"
                                                    class="img-rounded" width="40" height="40">
                                            </td>
                                            <td><?= $psrt->username ?></td>
                                            <td><?= $psrt->nama ?></td>
                                            <td><?= $psrt->nik ?></td>
                                            <td><?= $psrt->t_lahir, ', ', $psrt->TTL ?></td>
                                            <td><?= $psrt->suami ?></td>
                                            <td><?= $psrt->kriteria ?></td>
                                            <td><?php
                                                    if ($psrt->kriteria == 'Ibu Hamil') {
                                                        echo 'Wanita';
                                                    } else {
                                                        echo $psrt->kelamin;
                                                    }
                                                    ?></td>
                                            <td><?php $lahir = $psrt->TTL;
                                                    $tahun_lahir = substr($lahir, -4);
                                                    $now = date("Y");
                                                    (int) $tahun_lahir;
                                                    (int) $now;
                                                    $umur = $now - $tahun_lahir;
                                                    echo $umur, ' Tahun'
                                                    ?></td>
                                            <td><?= $psrt->created ?></td>
                                            <td><?php if ($psrt->modifed == nulL) {
                                                        echo 'belum pernah diubah';
                                                    } else {
                                                        echo $psrt->modifed;
                                                    }
                                                    ?></td>
                                            <td>
                                                <a href="<?= base_url('edit-peserta-ku/' . $psrt->id_user) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('user/User/delete_peserta_desa_bumil/' . $psrt->id_user) ?>"
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