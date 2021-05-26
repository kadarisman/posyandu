<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Posyandu Ibu Hamil Lanjutan</h3>
                    </div>

                    <!-- <form action="<?= base_url('tambah-posyandu-lanjutan-data') ?>" method="post" class="phide">
                        <br>
                        Tambah lanjutan :
                        <select name="id_posyandu">
                            <option selected="true" disabled="disabled">Pilih Peserta</option>
                            <?php foreach ($cari_posyandu_bumil_desa as $psrt) : ?>
                            <option value="<?= $psrt->id_posyandu ?>">
                                <?= $psrt->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="badge progress-bar-primary" id="crsmth_p">Cari</button>
                    </form> -->

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control pull-right" value="<?= $posyandu_e->id_user ?>"
                                    name="id_user" readonly>
                                <label>Nama Peserta</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control pull-right" value="<?= $posyandu_e->nama ?>"
                                        readonly>
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>HPHT</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control pull-right" name="HPHT"
                                        value="<?= $posyandu_e->HPHT ?>" readonly>
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>TTP</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control pull-right" placeholder="TTP" name="TTP"
                                        value="<?= $posyandu_e->TTP ?>" readonly>
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Hamil Ke</label>
                                <input type="text" class="form-control" name="hamil_ke" id="hamil_ke"
                                    value="<?= $posyandu_e->hamil_ke ?>" readonly>
                                <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Tinggi Badan</label>
                                <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan"
                                    value="<?= $posyandu_e->tinggi_badan ?>" readonly>
                                <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label>HB</label>
                                <input type="text" class="form-control" name="HB" id="HB" value="<?= $posyandu_e->HB ?>"
                                    readonly>
                                <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label>Umur Kandungan</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="umur">
                                    <option value="<?= $posyandu_e->umur ?>"><?= $posyandu_e->umur, ' Bulan' ?></option>
                                    <?php for ($i = 0; $i <= 9; $i++) : ?>
                                    <option value="<?= $i ?>"><?= $i, ' Bulan' ?></option>
                                    <?php endfor; ?>
                                </select>
                                <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Berat Badan</label>
                                <input type="text" class="form-control" name="berat_badan" id="berat_badan"
                                    placeholder="ex : 60 kg">
                                <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                                <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Kunjugan Ke</label>
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="kunjungan_ke">
                                    <option selected="true" disabled="disabled">Pilih</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                </select>
                                <?= form_error('kunjungan_ke', '<small class="text-danger pl-3">', '</small>'); ?>
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