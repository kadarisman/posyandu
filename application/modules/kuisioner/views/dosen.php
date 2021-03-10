<div class="content-wrapper">
    <section class="content">
        <a class="badge progress-bar-primary" data-toggle="modal" data-target="#modal_add_prodi">Tambah</a>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" id="judul">Semua Prodi <?= $total_prodi;
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
                                            <th>Kode Prodi</th>
                                            <th>Nama Prodi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_admin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($all_prodi as $prodi) :
                                            $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $prodi->kd_prodi; ?></td>
                                            <td><?= $prodi->nama_prodi; ?></td>
                                            <td>
                                                <a class="badge progress-bar-primary" data-toggle="modal"
                                                    data-target="#modal_edit_prodi<?= $prodi->kd_prodi; ?>">Edit</a>
                                                <a href="<?= base_url('user/Dashboard/delete_prodi/' . $prodi->kd_prodi); ?>"
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
<div class="modal fade" id="modal_add_prodi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Prodi</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="" class="item">
                    <div class="form-group" id="level">
                        <label>Kode Prodi</label>
                        <input type="text" class="form-control border border-dark" id="kd_prodi" name="kd_prodi"
                            value="<?= set_value('kd_prodi'); ?>">
                        <span id="kd_prodi_error" class="text-danger"></span>
                    </div>
                    <div class=" form-group">
                        <label>Nama Prodi</label>
                        <input type="text" class="form-control border border-dark" id="nama_prodi" name="nama_prodi"
                            value="<?= set_value('nama_prodi'); ?>">
                        <span id="nama_prodi_error" class="text-danger"></span>
                    </div>
                    <div class="text-center">
                        <button class="badge progress-bar-primary" id="btninsert" type="submit"
                            name="submit_add_prodi">Tambah</button>
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
<?php foreach ($all_prodi as $prodi) : ?>
<div class="modal fade" id="modal_edit_prodi<?= $prodi->kd_prodi; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Prodi</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('user/Dashboard/edit_prodi'); ?>" class="item2">
                    <div class="form-group">
                        <input type="text" class="form-control border border-dark" id="kd_prodi_edit"
                            name="kd_prodi_edit" value="<?= $prodi->kd_prodi; ?>">
                        <span id=" kd_prodi_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control border border-dark" id="nama_prodi_edit"
                            name="nama_prodi_edit" value="<?= $prodi->nama_prodi; ?>">
                        <span id="nama_prodi_error" class="text-danger"></span>
                    </div>
                    <div class="text-center">
                        <button class="badge progress-bar-primary" type="submit" name="submit_edit"
                            id="btnedit">Edit</button>
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
    $('[name="submit_add_prodi"]').on('click', function(e) {
        e.preventDefault();
        var data = $('.item').serialize();
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: "<?= base_url('user/Dashboard/add_prodi'); ?>",
            data: data,
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    location.href = "<?= base_url('user/Dashboard/get_all_prodi'); ?>"

                } else {
                    $("#kd_prodi_error").html(data.error.kd_prodi_error);
                    $("#nama_prodi_error").html(data.error.nama_prodi_error);
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