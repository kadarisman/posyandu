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
                        <input type="hidden" class="form-control" name="id_posyandu"
                            value="<?= $posyandu_e->id_posyandu ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Peserta</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="id_user">
                                    <option value="<?= $posyandu_e->id_user ?>"><?= $posyandu_e->nama ?></option>
                                    <?php if ($this->session->userdata('level') == "desa" || $this->session->userdata('level') == "panitia") { ?>
                                    <?php foreach ($user_peserta_desa as $psrt) : ?>
                                    <option value="<?= $psrt->id_user ?>"><?= $psrt->nama ?></option>
                                    <?php endforeach; ?>
                                    <?php } else { ?>
                                    <?php foreach ($user_peserta as $psrt1) : ?>
                                    <option value="<?= $psrt1->id_user ?>"><?= $psrt1->nama ?></option>
                                    <?php endforeach; ?>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Berat Badan</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="berat_badan">
                                    <option value="<?= $posyandu_e->berat_badan ?>"><?= $posyandu_e->berat_badan ?>
                                    </option>
                                    <option value="Normal">Normal</option>
                                    <option value="Kurus">Kurus</option>
                                    <option value="Sangat Kurus">Sangat Kurus</option>
                                    <option value="Gemuk">Gemuk</option>
                                </select>
                                <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Tinggi Badan</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="tinggi_badan">
                                    <option value="<?= $posyandu_e->tinggi_badan ?>"><?= $posyandu_e->tinggi_badan ?>
                                    </option>
                                    <option value="Normal">Normal</option>
                                    <option value="Pendek">Pendek</option>
                                    <option value="Sangat Pendek">Sangat Pendek</option>
                                    <option value="Tinggi">Tinggi</option>
                                </select>
                                <?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>PSG</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="PSG">
                                    <option value="<?= $posyandu_e->PSG ?>"><?= $posyandu_e->PSG ?></option>
                                    <option value="Baik">Baik</option>
                                    <option value="Kurang baik">Kurang baik</option>
                                    <option value="Sangat kurang">Sangat kurang</option>
                                    <option value="Buruk">Buruk</option>
                                </select>
                                <?= form_error('PSG', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>GKN</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="GKN">
                                    <option value="<?= $posyandu_e->GKN ?>"><?= $posyandu_e->GKN ?></option>
                                    <option value="Baik">Baik</option>
                                    <option value="Lebih">Lebih</option>
                                    <option value="Kurang">Kurang</option>
                                    <option value="Buruk">Buruk</option>
                                </select>
                                <?= form_error('GKN', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Umur</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="umur">
                                    <option value="<?= $posyandu_e->umur ?>"><?= $posyandu_e->umur ?>
                                    </option>
                                    <?php for ($i = 0; $i <= 48; $i++) : ?>
                                    <option value="<?= $i ?>"><?= $i, ' Bulan' ?></option>
                                    <?php endfor; ?>
                                </select>
                                <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <?php if ($login_session['level'] == "desa" && $login_session['level'] == "panitia") { ?>
                                <a href="<?= base_url('posyandu-desa') ?>" class="btn btn-primary">Batal</a>
                                <?php } else { ?>
                                <a href="<?= base_url('posyandu') ?>" class="btn btn-primary">Batal</a>
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