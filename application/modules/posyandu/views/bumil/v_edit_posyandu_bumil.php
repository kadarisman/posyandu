<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Posyandu</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <input type="hidden" class="form-control" name="id_posyandu" posyandu_e
                            value="<?= $posyandu_e->id_posyandu ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Peserta</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="id_user">
                                    <option value="<?= $posyandu_e->id_user ?>"><?= $posyandu_e->nama ?>
                                    </option>
                                    <?php if ($this->session->userdata('level') == "desa" || $this->session->userdata('level') == "panitia") { ?>
                                    <?php foreach ($user_peserta_desa_bumil as $psrt) : ?>
                                    <option value="<?= $psrt->id_user ?>"><?= $psrt->nama ?></option>
                                    <?php endforeach; ?>
                                    <?php } else { ?>
                                    <?php foreach ($user_peserta_bumil as $psrt1) : ?>
                                    <option value="<?= $psrt1->id_user ?>"><?= $psrt1->nama ?></option>
                                    <?php endforeach; ?>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>HPHT</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control pull-right" placeholder="HPHT"
                                        id="datepicker" name="HPHT" value="<?= $posyandu_e->HPHT ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                                <?= form_error('HPHT', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>TTP</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control pull-right" placeholder="TTP"
                                        id="datepicker2" name="TTP" value="<?= $posyandu_e->TTP ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                                <?= form_error('TTP', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Umur Kandungan</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="umur">
                                    <option value="<?= $posyandu_e->umur ?>"><?= $posyandu_e->umur ?>
                                    </option>
                                    <?php for ($i = 0; $i <= 9; $i++) : ?>
                                    <option value="<?= $i ?>"><?= $i, ' Bulan' ?></option>
                                    <?php endfor; ?>
                                </select>
                                <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Hamil Ke</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="hamil_ke">
                                    <option value="<?= $posyandu_e->hamil_ke ?>">
                                        <?= $posyandu_e->hamil_ke ?></option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                    <option value="VII">VII</option>
                                    <option value="VIII">VIII</option>
                                    <option value="IX">IX</option>
                                    <option value="X">X</option>
                                </select>
                                <?= form_error('hamil_ke', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Umur Kehamilan</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="umur">
                                    <option value="<?= $posyandu_e->umur ?>"><?= $posyandu_e->umur ?>
                                    </option>
                                    <?php for ($i = 0; $i <= 9; $i++) : ?>
                                    <option value="<?= $i ?>"><?= $i, ' Bulan' ?></option>
                                    <?php endfor; ?>
                                </select>
                                <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Berat Badan</label>
                                <input type="text" class="form-control" name="berat_badan" id="berat_badan"
                                    value="<?= $posyandu_e->berat_badan ?>">
                                <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                                <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Tinggi Badan</label>
                                <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan"
                                    value="<?= $posyandu_e->tinggi_badan ?>">
                                <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                                <?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>HB</label>
                                <input type="text" class="form-control" placeholder="HB" name="HB" id="HB"
                                    value="<?= $posyandu_e->HB ?>">
                                <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                                <?= form_error('HB', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Kunjugan Ke</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="kunjugan_ke">
                                    <option value="<?= $posyandu_e->kunjungan_ke ?>">
                                        <?= $posyandu_e->kunjungan_ke ?>
                                    </option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                </select>
                                <?= form_error('kunjugan_ke', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <?php if ($login_session['level'] == "desa" || $login_session['level'] == "panitia") { ?>
                                <a href="<?= base_url('posyandu-desa-bumil') ?>" class="btn btn-primary">Batal</a>
                                <?php } else { ?>
                                <a href="<?= base_url('posyandu-bumil') ?>" class="btn btn-primary">Batal</a>
                                <?php } ?>
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