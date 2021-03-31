<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Desa</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">

                        <div class="box-body">
                            <input type="hidden" class="form-control" name="id_desa" value="<?= $desa->id_desa ?>">
                            <div class="form-group has-feedback">
                                <label>Nama desa</label>
                                <input type="text" class="form-control" name="nama_desa" id="nama_desa"
                                    value="<?= $desa->nama_desa ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nama_desa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="social-auth-links text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('desa') ?>" class="btn btn-primary">Batal</a>
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