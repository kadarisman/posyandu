<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="login-box">
                <!-- /.login-logo -->
                <div class="login-box-body">
                    <p class="login-box-msg" style="font-size: 18px;"><b>Buat Database </b></p>
                    <form action="<?= base_url('create_DB') ?>" method="post">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="id_desa"
                                value="<?= $login_session['id_desa']; ?>" readonly="">
                            <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Nama Desa" name="nama_desa"
                                id="nama_desa" value="<?= set_value('nama_desa'); ?>">
                            <span class="glyphicon glyphicon-home form-control-feedback"></span>
                            <?= form_error('nama_desa', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="social-auth-links text-center">
                            <button type="submit" class="btn btn-block btn-primary">Create</button>
                            <!-- <a href="#" class="btn btn-block btn-success">Daftar</a> -->
                        </div>
                    </form>
                </div>
                <!-- /.login-box-body -->
            </div>

        </div>

    </section>
    <!-- /.content -->
</div>