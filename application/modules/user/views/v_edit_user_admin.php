<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Admin</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">

                        <div class="box-body">
                            <input type="hidden" class="form-control" name="id_user" id="username"
                                value="<?= $user_admin->id_user ?>">
                            <div class="form-group has-feedback">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    value="<?= $user_admin->username ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    value="<?= $user_admin->nama ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="is_active">
                                    <option value="<?= $user_admin->is_active ?>">
                                        <?= $user_admin->is_active ?></option>
                                    <option value="1"">Aktif</option>
                                    <option value=" 0">Tidak Aktif</option>

                                </select>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('all-admin') ?>" class="btn btn-primary">Batal</a>
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