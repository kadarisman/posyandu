<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Panitia</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="id_desa">
                                    <option selected="true" disabled="disabled">Pilih Desa</option>
                                    <?php foreach ($all_desa as $ds) : ?>
                                    <option value="<?= $ds->id_desa ?>"><?= $ds->nama_desa ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_desa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama"
                                    value="<?= set_value('nama'); ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Username" name="username"
                                    id="username" value="<?= set_value('username'); ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    id="password" value="<?= set_value('password'); ?>">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Ulangi Password"
                                    name="password2" id="password2">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?><br>
                                <label>
                                    <input type="checkbox" class="chck"> Show Password
                                </label>
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