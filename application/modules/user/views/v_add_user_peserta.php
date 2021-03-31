<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Peserta</h3>
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
                            <div class="form-group">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" placeholder="TTL" id="datepicker"
                                        name="TTL">
                                </div>
                                <?= form_error('TTL', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label class="radio-inline mb-1"><input type="radio" name="kelamin"
                                        value="Pria">Pria</label>
                                <label class="radio-inline mb-1"><input type="radio" name="kelamin"
                                        value="Wanita">Wanita</label>
                            </div>
                            <?= form_error('kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="form-group">
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="kriteria">
                                    <option selected="true" disabled="disabled">Kriteria</option>
                                    <option value="Ibu Hamil">Ibu Hamil</option>
                                    <option value="Balita">Balita</option>
                                </select>
                                <?= form_error('kriteria', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nama ibu" name="nama_ibu"
                                    id="nama_ibu" value="<?= set_value('nama_ibu'); ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nama_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('all-peserta') ?>" class="btn btn-primary">Batal</a>
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