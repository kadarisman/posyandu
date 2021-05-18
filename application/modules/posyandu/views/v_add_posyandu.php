<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Posyandu</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">

                        <div class="box-body">
                            <div class="form-group">
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="id_user">
                                    <option selected="true" disabled="disabled">Pilih Peserta</option>
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
                                <input type="text" class="form-control" placeholder="Berat Badan" name="berat_badan"
                                    value="<?= set_value('berat_badan'); ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Tinggi Badan" name="tinggi_badan"
                                    value="<?= set_value('tinggi_badan'); ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="PSG">
                                    <option selected="true" disabled="disabled">Pilih PSG</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Kurang baik">Kurang baik</option>
                                    <option value="Sangat kurang">Sangat kurang</option>
                                    <option value="Buruk">Buruk</option>
                                </select>
                                <?= form_error('PSG', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                                    name="bulan">
                                    <option selected="true" disabled="disabled">Pilih Bulan</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                                <?= form_error('PSG', '<small class="text-danger pl-3">', '</small>'); ?>
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