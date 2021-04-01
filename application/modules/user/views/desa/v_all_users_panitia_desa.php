<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="judul">Semua Panitia</h3>
                            <a href="<?= base_url('tambah-panitia-ku') ?>" class="badge progress-bar-primary">+</a>
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
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Ditambahkan</th>
                                            <th>Diubah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_pntin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($user_panitia as $pnt) :
                                            $no++
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $pnt->username ?></td>
                                            <td><?= $pnt->nama ?></td>
                                            <td><?= $pnt->created ?></td>
                                            <td><?php if ($pnt->modifed == nulL) {
                                                        echo 'belum pernah diubah';
                                                    } else {
                                                        echo $pnt->modifed;
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('edit-panitia-ku/' . $pnt->id_user) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('user/User/delete_panitia_desa/' . $pnt->id_user) ?>"
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