<style>
body {
    background-image: url(<?= base_url('assets/img/bg2.jpg');
    ?>);
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

}
</style>

<body>
    <div class="login-box">
        <div class="alert alert-danger fade out" id="bsalert_peserta">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Balik ke halaman beranda <strong> Klik daftar !</strong>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('message1'); ?>
        <h4 style="color: white; font-weight:bold; text-align:left">Ini halaman pendafataran Peserta Posyandu !<br>
            petunjuk pendaftaran Desa klik <a href="#" style="color: yellow;" id="btn_peserta">disini</a>
        </h4>

        <!-- /.login-logo -->
        <div class="login-box-body">
            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="hidden" class="form-control" name="id_desa" id="id_desa"
                        value="<?= $this->uri->segment(2) ?>">
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username" id="username"
                        value="<?= set_value('username'); ?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                        value="<?= set_value('password'); ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Ulangi Password" name="password2"
                        id="password2">
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
                    <input type="text" class="form-control" placeholder="Tempat Lahir" name="t_lahir" id="t_lahir"
                        value="<?= set_value('t_lahir'); ?>">
                    <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                    <?= form_error('t_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" placeholder="TTL" id="datepicker" name="TTL">
                    </div>
                    <?= form_error('TTL', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <label class="radio-inline mb-1"><input type="radio" name="kelamin" value="Pria">Pria</label>
                    <label class="radio-inline mb-1"><input type="radio" name="kelamin" value="Wanita">Wanita</label>
                </div>
                <?= form_error('kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                <div class="form-group" id="divkrt">
                    <select class="form-control border border-dark" tabindex="-1" aria-hidden="true" name="kriteria"
                        id="slctkrt">
                        <option selected="true" disabled="disabled">Kriteria</option>
                        <option value="Ibu Hamil">Ibu Hamil</option>
                        <option value="Balita">Balita</option>
                    </select>
                    <?= form_error('kriteria', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="social-auth-links text-center">
                    <button type="submit" class="btn btn-block btn-primary">Daftar</button>
                    <!-- <a href="#" class="btn btn-block btn-success">Daftar</a> -->
                </div>
            </form>
            <!-- /.social-auth-links -->

            <a href="<?= base_url('login'); ?>">Sudah daftar</a> |
            <a href="<?= base_url('Beranda'); ?>">Beranda</a>
            <br>
        </div>
        <!-- /.login-box-body -->
    </div>