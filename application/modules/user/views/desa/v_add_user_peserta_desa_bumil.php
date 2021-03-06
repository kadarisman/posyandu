<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Peserta Ibu Hamil</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">

                        <div class="box-body">
                            <input type="hidden" class="form-control"" name=" id_desa"
                                value="<?= $login_session['id_desa'] ?>">
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

                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama"
                                    value="<?= set_value('nama'); ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nik" name="nik" id="nik"
                                    value="<?= set_value('nik'); ?>">
                                <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                                <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Tempat lahir" name="t_lahir"
                                    id="t_lahir" value="<?= set_value('t_lahir'); ?>">
                                <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                                <?= form_error('t_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" placeholder="TTL" id="datepicker"
                                        name="TTL" autocomplete="off">
                                </div>
                                <?= form_error('TTL', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nama Suami" name="suami" id="suami"
                                    value="<?= set_value('suami'); ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('suami', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('peserta-ibu-hamil') ?>" class="btn btn-primary">Batal</a>
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