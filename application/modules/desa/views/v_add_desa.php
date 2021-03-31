<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Desa</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">

                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Id Desa" name="id_desa"
                                    id="id_desa" value="<?= set_value('id_desa'); ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('id_desa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nama Desa" name="nama_desa"
                                    id="nama_desa" value="<?= set_value('nama_desa'); ?>">
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