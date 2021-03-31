<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="judul">Semua Peserta</h3>
                            <a href="<?= base_url('tambah-peserta') ?>" class="badge progress-bar-primary">+</a>
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
                                            <th>Nama Ibu</th>
                                            <th>Kriteria</th>
                                            <th>Kelamin</th>
                                            <th>Desa</th>
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
                                        foreach ($user_peserta as $psrt) :
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
                                            <td><?= $psrt->nama_ibu ?></td>
                                            <td><?= $psrt->kriteria ?></td>
                                            <td><?php
                                                    if ($psrt->kriteria == 'Ibu Hamil') {
                                                        echo 'Wanita';
                                                    } else {
                                                        echo $psrt->kelamin;
                                                    }
                                                    ?></td>
                                            <td><?= $psrt->nama_desa ?></td>
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
                                                <a href="<?= base_url('edit-peserta/' . $psrt->id_user) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('user/User/delete_peserta/' . $psrt->id_user) ?>"
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