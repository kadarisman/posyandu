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
            <a href="#" style="color: yellow;" id="btn_peserta">Desa ?</a>
        </h4>

        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg" style="font-size: 18px;"><b>Sistem Informasi Posyandu Kabupaten Bireuen </b></p>
            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="hidden" class="form-control" name="id_desa" id="id_desa" value="<?= $this->uri->segment(2)
                                                                                                    ?>">
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    <?= form_error('id_desa', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username" id="username"
                        value="<?= set_value('username'); ?>">
                    <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
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
                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <label>
                    <input type="checkbox" class="chck"> Show Password
                </label>
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