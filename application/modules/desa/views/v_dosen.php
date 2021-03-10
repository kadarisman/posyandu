<div class="content-wrapper">
    <section class="content">
        <a class="badge progress-bar-primary" data-toggle="modal" data-target="#modal_add_dosen">Tambah</a>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="judul">Semua Dosen <?= $total_dosen;
                                                                            ?></h3><br>
                        </div>
                        <?= $this->session->flashdata('message1'); ?>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIDN</th>
                                            <th>Nama Dosen</th>
                                            <th>Prodi</th>
                                            <th>Alamat Dosen</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_admin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($all_Dosen as $dosen) :
                                            $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $dosen->NIDN; ?></td>
                                            <td><?= $dosen->nama_dosen; ?></td>
                                            <td><?= $dosen->nama_prodi; ?></td>
                                            <td><?= $dosen->alamat_dosen; ?></td>
                                            <td><?php if ($dosen->status == 1) {
                                                        echo 'Aktif';
                                                    } else {
                                                        echo 'Tidak Aktif';
                                                    } ?></td>
                                            <td>
                                                <a class="badge progress-bar-primary" data-toggle="modal"
                                                    data-target="#modal_edit_dosen<?= $dosen->NIDN; ?>">Edit</a>
                                                <a href="<?= base_url('dosen/Dosen/delete_dosen/' . $dosen->NIDN); ?>"
                                                    class="badge progress-bar-danger"
                                                    onclick="return confirm('Yakin..?');">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


<!--modal add-->
<div class="modal fade" id="modal_add_dosen">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Dosen</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="" class="item">
                    <div class="form-group" id="level">
                        <label>NIDN</label>
                        <input type="text" class="form-control border border-dark" id="NIDN" name="NIDN"
                            value="<?= set_value('NIDN'); ?>">
                        <span id="NIDN_error" class="text-danger"></span>
                    </div>
                    <div class=" form-group">
                        <label>Nama Dosen</label>
                        <input type="text" class="form-control border border-dark" id="nama_dosen" name="nama_dosen"
                            value="<?= set_value('nama_dosen'); ?>">
                        <span id="nama_dosen_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>Prodi Dosen</label>
                        <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                            name="kd_prodi">
                            <option selected="true" disabled="disabled">Pilih Prodi</option>
                            <?php foreach ($selectProdi as $prd) : ?>
                            <option value="<?= $prd->kd_prodi; ?>"><?= $prd->nama_prodi; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <span id="kd_prodi_error" class="text-danger"></span>
                    </div>
                    <div class=" form-group">
                        <label>Alamat Dosen</label>
                        <input type="text" class="form-control border border-dark" id="alamat_dosen" name="alamat_dosen"
                            value="<?= set_value('alamat_dosen'); ?>">
                        <span id="alamat_dosen_error" class="text-danger"></span>
                    </div>
                    <div class="text-center">
                        <button class="badge progress-bar-primary" type="submit" name="submit_add_dosen">Tambah</button>
                        <button data-dismiss="modal" class="badge progress-bar-danger">Batal</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--modal edit-->
<?php foreach ($all_Dosen as $dosen) : ?>
<div class="modal fade" id="modal_edit_dosen<?= $dosen->NIDN; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit dosen</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('dosen/Dosen/edit_dosen'); ?>" class="item2">
                    <input type="hidden" class="form-control border border-dark" id="NIDN_edit" name="NIDN_edit"
                        value="<?= $dosen->NIDN; ?>">
                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <input type="text" class="form-control border border-dark" id="nama_dosen_edit"
                            name="nama_dosen_edit" value="<?= $dosen->nama_dosen; ?>">
                    </div>
                    <div class="form-group">
                        <label>Prodi Dosen</label>
                        <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                            name="selectProdi_edit">
                            <option value="<?= $dosen->kd_prodi; ?>"><?= $dosen->nama_prodi; ?></option>
                            <?php foreach ($selectProdi as $prd) : ?>
                            <option value="<?= $prd->kd_prodi; ?>"><?= $prd->nama_prodi; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Status Dosen</label>
                        <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                            name="status_edit">
                            <option value="<?= $dosen->status; ?>"><?php if ($dosen->status == 1) {
                                                                            echo 'Aktif';
                                                                        } else {
                                                                            echo 'Tidak Aktif';
                                                                        } ?></option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control border border-dark" name="alamat_dosen_edit"
                            value="<?= $dosen->alamat_dosen; ?>">
                    </div>
                    <div class="text-center">
                        <button class="badge progress-bar-primary" type="submit" name="submit_edit_dosen">Edit</button>
                        <button data-dismiss="modal" class="badge progress-bar-danger">Batal</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
<!-- /.modal -->

<script src="<?= base_url('assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('[name="submit_add_dosen"]').on('click', function(e) {
        e.preventDefault();
        var data = $('.item').serialize();
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: "<?= base_url('dosen/Dosen/add_dosen'); ?>",
            data: data,
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    location.href = "<?= base_url('Dosen'); ?>"

                } else {
                    $("#NIDN_error").html(data.error.NIDN_error);
                    $("#nama_dosen_error").html(data.error.nama_dosen_error);
                    $("#kd_prodi_error").html(data.error.kd_prodi_error);
                    $("#alamat_dosen_error").html(data.error.alamat_dosen_error);
                }
            }

        });
    });


    window.setTimeout(function() {
        $("#msg").fadeTo(200, 0).slideUp(200, function() {
            $(this).remove();
        });
    }, 3000);

})
</script>