<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="judul">Data Admin</h3>
                            <a href="<?= base_url('tambah-admin') ?>" class="badge progress-bar-primary">+</a>
                        </div>
                        <?= $this->session->flashdata('message1'); ?>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Level</th>
                                            <th>Status</th>
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
                                        foreach ($user_admin as $adm) :
                                            $no++
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $adm->username ?></td>
                                            <td><?= $adm->nama ?></td>
                                            <td><?= $adm->level ?></td>
                                            <td><?php
                                                    if ($adm->is_active == 1) {
                                                        echo 'Aktif';
                                                    } else {
                                                        echo 'Tidak aktif';
                                                    }
                                                    ?></td>
                                            <td><?= $adm->created ?></td>
                                            <td><?php if ($adm->modifed == nulL) {
                                                        echo 'belum pernah diubah';
                                                    } else {
                                                        echo $adm->modifed;
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('edit-admin/' . $adm->id_user) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('user/User/delete_admin/' . $adm->id_user) ?>"
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