<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="judul">Semua Admin Desa</h3>
                            <a href="<?= base_url('tambah-admin-desa') ?>" class="badge progress-bar-primary">+</a>
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
                                            <th>Desa</th>
                                            <th>Ditambahkan</th>
                                            <th>Diubah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_adpin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($user_admin_desa as $adp) :
                                            $no++
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $adp->username ?></td>
                                            <td><?php if ($adp->nama_desa == null) {
                                                        echo 'Belum punya desa
                                                        ' ?><a href="<?= base_url('tambah-desa') ?>"><?php echo 'Tambah Desa</a>';
                                                                                                } else {
                                                                                                    echo $adp->nama_desa;
                                                                                                }

                                                                                                    ?>
                                            </td>
                                            <td><?= $adp->created ?></td>
                                            <td><?php if ($adp->modifed == nulL) {
                                                        echo 'belum pernah diubah';
                                                    } else {
                                                        echo $adp->modifed;
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('edit-admin-desa/' . $adp->id_user) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('user/User/delete_admin_desa/' . $adp->id_user) ?>"
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