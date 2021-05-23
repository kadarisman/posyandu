<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Peserta</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">

                        <div class="box-body">
                            <input type="hidden" class="form-control" name="id_user"
                                value="<?= $user_peserta->id_user ?>">
                            <label>Username</label>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Username" name="username"
                                    id="username" value="<?= $user_peserta->username ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <label>Nama</label>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama"
                                    value="<?= $user_peserta->nama ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <label>Nik</label>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nik" name="nik" id="nik"
                                    value="<?= $user_peserta->nik ?>">
                                <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                                <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="t_lahir" id="t_lahir"
                                    value="<?= $user_peserta->t_lahir ?>">
                                <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                                <?= form_error('t_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <label>Tanggal Lahir</label>
                            <div class="form-group">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" placeholder="TTL" id="datepicker"
                                        name="TTL" value="<?= $user_peserta->TTL ?>">
                                </div>
                                <?= form_error('TTL', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Kriteria</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="kriteria">
                                    <option value="<?= $user_peserta->kriteria ?>"><?= $user_peserta->kriteria ?>
                                    </option>
                                    <option value="Ibu Hamil">Ibu Hamil</option>
                                    <option value="Balita">Balita</option>
                                </select>
                            </div>
                            <label>Kelamin</label>
                            <div class="form-group has-feedback">
                                <label class="radio-inline mb-1"><input type="radio" name="kelamin" value="Pria"
                                        <?php if ($user_peserta->kelamin == 'Pria') {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>Pria</label>
                                <label class="radio-inline mb-1"><input type="radio" name="kelamin" value="Wanita"
                                        <?php if ($user_peserta->kelamin == 'Wanita') {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>Wanita</label>
                            </div>
                            <?= form_error('kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?php if ($user_peserta->kriteria == 'Ibu Hamil') { ?>
                            <label>Suami</label>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nama suami" name="suami" id="suami"
                                    value="<?= $user_peserta->suami ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <?php } else { ?>
                            <label>Ibu</label>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nama ibu" name="nama_ibu"
                                    id="nama_ibu" value="<?= $user_peserta->nama_ibu ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <?php } ?>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('profil') ?>" class="btn btn-primary">Batal</a>
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