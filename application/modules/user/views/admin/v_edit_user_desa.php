<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Admin Desa</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <input type="hidden" class="form-control" name="id_user" value="<?= $user_desa->id_user ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="form-group has-feedback">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="username"
                                        id="username" value="<?= $user_desa->username ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="social-auth-links text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?= base_url('all-admin-desa') ?>" class="btn btn-primary">Batal</a>
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