<div class="content-wrapper">
    <section class="content">
        <a class="badge progress-bar-primary" data-toggle="modal" data-target="#modal_add_mahasiswa">Tambah</a>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="judul">Semua Mahasiswa <?= $total_mahasiswa;
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
                                            <th>NPM</th>
                                            <th>Nama mahasiswa</th>
                                            <th>Prodi</th>
                                            <th>Alamat</th>
                                            <th>Unit</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_admin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($all_mahasiswa as $mahasiswa) :
                                            $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $mahasiswa->NPM; ?></td>
                                            <td><?= $mahasiswa->nama_mahasiswa; ?></td>
                                            <td><?= $mahasiswa->nama_prodi; ?></td>
                                            <td><?= $mahasiswa->alamat_mahasiswa; ?></td>
                                            <td><?= $mahasiswa->kd_unit; ?></td>
                                            <td><?php if ($mahasiswa->status == 1) {
                                                        echo 'Aktif';
                                                    } else {
                                                        echo 'Tidak Aktif';
                                                    } ?></td>
                                            </td>
                                            <td>
                                                <a class="badge progress-bar-primary" data-toggle="modal"
                                                    data-target="#modal_edit_mahasiswa<?= $mahasiswa->NPM; ?>">Edit</a>
                                                <a href="<?= base_url('mahasiswa/Mahasiswa/delete_mahasiswa/' . $mahasiswa->NPM); ?>"
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
<div class="modal fade" id="modal_add_mahasiswa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Mahasiswa</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="" class="item">
                    <div class="form-group">
                        <label>NPM</label>
                        <input type="text" class="form-control border border-dark" name="NPM"
                            value="<?= set_value('NPM'); ?>">
                        <span id="NPM_error" class="text-danger"></span>
                    </div>
                    <div class=" form-group">
                        <label>Nama mahasiswa</label>
                        <input type="text" class="form-control border border-dark" name="nama_mahasiswa"
                            value="<?= set_value('nama_mahasiswa'); ?>">
                        <span id="nama_mahasiswa_error" class="text-danger"></span>
                    </div>
                    <div class=" form-group">
                        <label>Alamat Mahasiswa</label>
                        <input type="text" class="form-control border border-dark" name="alamat_mahasiswa"
                            value="<?= set_value('alamat_mahasiswa'); ?>">
                        <span id="alamat_mahasiswa_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>Prodi Mahasiswa</label>
                        <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                            name="kd_prodi">
                            <option selected="true" disabled="disabled">Pilih Prodi</option>
                            <?php foreach ($selectProdi as $prd) : ?>
                            <option value="<?= $prd->kd_prodi; ?>"><?= $prd->nama_prodi; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <span id="prodi_mahasiswa_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>Unit Mahasiswa</label>
                        <select class="form-control border border-dark" tabindex="-1" aria-hidden="true" name="kd_unit">
                            <option selected="true" disabled="disabled">Pilih Unit</option>
                            <?php foreach ($selectUnit as $unit) : ?>
                            <option value="<?= $unit->kd_unit; ?>"><?= $unit->kd_unit; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <span id="unit_mahasiswa_error" class="text-danger"></span>
                    </div>
                    <div class="text-center">
                        <button class="badge progress-bar-primary" type="submit"
                            name="submit_add_mahasiswa">Tambah</button>
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
<?php foreach ($all_mahasiswa as $mahasiswa) : ?>
<div class="modal fade" id="modal_edit_mahasiswa<?= $mahasiswa->NPM; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit mahasiswa</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('mahasiswa/Mahasiswa/edit_mahasiswa') ?>" class="item2">
                    <input type="hidden" class="form-control border border-dark" name="NPM"
                        value="<?= $mahasiswa->NPM; ?>">
                    <div class=" form-group">
                        <label>Nama mahasiswa</label>
                        <input type="text" class="form-control border border-dark" name="nama_mahasiswa"
                            value="<?= $mahasiswa->nama_mahasiswa; ?>">
                        <span id="nama_mahasiswa_error" class="text-danger"></span>
                    </div>
                    <div class=" form-group">
                        <label>Alamat Mahasiswa</label>
                        <input type="text" class="form-control border border-dark" name="alamat_mahasiswa"
                            value="<?= $mahasiswa->alamat_mahasiswa; ?>">
                    </div>
                    <div class="form-group">
                        <label>Prodi Mahasiswa</label>
                        <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                            name="kd_prodi">
                            <option value="<?= $mahasiswa->kd_prodi; ?>"><?= $mahasiswa->nama_prodi; ?></option>
                            <?php foreach ($selectProdi as $prd) : ?>
                            <option value="<?= $prd->kd_prodi; ?>"><?= $prd->nama_prodi; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Unit Mahasiswa</label>
                        <select class="form-control border border-dark" tabindex="-1" aria-hidden="true" name="kd_unit">
                            <option value="<?= $mahasiswa->kd_unit; ?>"><?= $mahasiswa->kd_unit; ?></option>
                            <?php foreach ($selectUnit as $unit) : ?>
                            <option value="<?= $unit->kd_unit; ?>"><?= $unit->kd_unit; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <button class="badge progress-bar-primary" type="submit"
                            name="submit_edit_mahasiswa">Edit</button>
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
    $('[name="submit_add_mahasiswa"]').on('click', function(e) {
        e.preventDefault();
        var data = $('.item').serialize();
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: "<?= base_url('mahasiswa/Mahasiswa/add_mahasiswa'); ?>",
            data: data,
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    location.href = "<?= base_url('Mahasiswa'); ?>"

                } else {
                    $("#NPM_error").html(data.error.NPM_error);
                    $("#nama_mahasiswa_error").html(data.error.nama_mahasiswa_error);
                    $("#alamat_mahasiswa_error").html(data.error.alamat_mahasiswa_error);
                    $("#prodi_mahasiswa_error").html(data.error.prodi_mahasiswa_error);
                    $("#unit_mahasiswa_error").html(data.error.unit_mahasiswa_error);
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