<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Panitia</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="id_user" value="<?= $user_panitia->id_user ?>">
                                <label>Desa</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="id_desa">
                                    <option value="<?= $user_panitia->id_desa ?>"><?= $user_panitia->nama_desa ?>
                                    </option>
                                    <?php foreach ($all_desa as $ds) : ?>
                                    <option value="<?= $ds->id_desa ?>"><?= $ds->nama_desa ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama"
                                    value="<?= $user_panitia->nama ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="username"
                                    id="username" value="<?= $user_panitia->username ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('all-panitia') ?>" class="btn btn-primary">Batal</a>
                                <!-- <a href="#" class="btn btn-block btn-success">Daftar</a> -->
                            </div>
                        </div>
                    </form>

                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>