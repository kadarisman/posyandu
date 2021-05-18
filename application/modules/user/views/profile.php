<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <?= $this->session->flashdata('message1'); ?>
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-light-blue">
                        <div class="widget-user-image">
                            <?php if ($login_session['level'] == 'desa') { ?>
                            <img class="img-circle" src="<?= base_url('assets/'); ?>img/users/desa.jpg"
                                alt="User Avatar">
                            <?php } else { ?>
                            <img class="img-circle" src="<?= base_url('assets/'); ?>img/users/default.jpg"
                                alt="User Avatar">
                            <?php } ?>
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username"><strong><?php if ($login_session['level'] == 'desa') {
                                                                        echo $desa_data_login['nama_desa'];
                                                                    } else {
                                                                        echo $login_session['nama'];
                                                                    } ?></strong></h3>
                        <h5 class="widget-user-desc"><?php if ($login_session['level'] == 'admin') {
                                                            echo 'Admin';
                                                        } else if ($login_session['level'] == 'desa') {
                                                            echo 'Desa ', $desa_data_login['nama_desa'];
                                                        } else if ($login_session['level'] == 'panitia') {
                                                            echo 'Panitia Desa ', $panitia_data_login['nama_desa'];
                                                        } else {
                                                            echo 'Peserta Desa ', $peserta_data_login['nama_desa'];
                                                        } ?></h5>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a>Username : <?= $login_session['username'] ?></a></li>
                            <?php if ($login_session['level'] == 'peserta') { ?>
                            <li><a>NIK : <?= $login_session['nik'] ?></a></li>
                            <li><a>Lahir : <?= $login_session['t_lahir'], ' ', $login_session['TTL'] ?></a></li>
                            <li><a>Kelamin : <?= $login_session['kelamin'] ?></a></li>
                            <li><a>Kriteria : <?= $login_session['kriteria'] ?></a></li>
                            <li><a>Nama ibu : <?= $login_session['nama_ibu'] ?></a></li>
                            <?php } ?>
                            <center>
                                <div class="row" style="margin-bottom: 15px;;">
                                    <?php if ($login_session['level'] == 'peserta') { ?>
                                    <a href="<?= base_url('edit-profil-ku/' . $login_session['id_user']) ?>"
                                        class="btn btn-primary">Edit Profil</a>
                                    <?php } else if ($login_session['level'] == 'desa') { ?>
                                    <a href="<?= base_url('edit-profil-desa/' . $desa_data_login['id_desa']) ?>"
                                        class="btn btn-primary">Edit Desa</a>
                                    <?php } else { ?>
                                    <a href="<?= base_url('edit-profil/' . $login_session['id_user']) ?>"
                                        class="btn btn-primary">Edit Profil</a>
                                    <?php } ?>
                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                        Ubah Password</a>
                                </div>
                            </center>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Password ..?</h4>
            </div>
            <div class="modal-body">
                <p>Hubungi Lia Paramita&hellip;</p>
                <img width="100" height="100" src=" <?= base_url('assets/'); ?>img/users/senyum.png" alt="User Avatar">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->