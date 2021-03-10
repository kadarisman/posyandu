<a href="<?= base_url('User/all_user'); ?>" class="badge progress-bar-info" id="btn_smua">Semua</a>
<a href="<?= base_url('User/admin_BPM'); ?>" class="badge progress-bar-success" id="btn_adm">Admin</a>
<a href="<?= base_url('User/user_prodi'); ?>" class="badge progress-bar-primary" id="btn_prd">Prodi</a>
<a href="<?= base_url('User/user_dosen'); ?>" class="badge progress-bar-danger" id="btn_dsn">Dosen</a>
<a href="<?= base_url('User/user_mahasiswa'); ?>" class="badge progress-bar-warning" id="btn_mhs">Mahasiswa</a>
<a class="badge progress-bar-primary" data-toggle="modal" data-target="#modal_add_user">Tambah</a>

<!--modal add-->
<div class="modal fade" id="modal_add_user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pengguna</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="" class="item">
                    <div class="form-group" id="level">
                        <label>Level</label>
                        <select class="form-control border border-dark" tabindex="-1" aria-hidden="true"
                            name="selectLevel">
                            <option selected="true" disabled="disabled">Pilih Level</option>
                            <?php foreach ($selectLevel as $lv) : ?>
                            <option value="<?= $lv->nama_level; ?>"><?= $lv->nama_level; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span id="level_error" class="text-danger"></span>
                    </div>
                    <div class=" form-group">
                        <label>NIDN / NPM / Username</label>
                        <input type="text" class="form-control border border-dark" name="username"
                            value="<?= set_value('username'); ?>">
                        <span id="username_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control border border-dark" id="password1" name="password1">
                        <span id="password_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>Ulangi Password</label>
                        <input type="password" class="form-control border border-dark" id="password2" name="password2"
                            value="<?= set_value('passord2'); ?>">
                    </div>
                    <div class="text-center">
                        <button class="badge progress-bar-primary" type="submit" name="submit_add_user">Tambah</button>
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
<?php foreach ($data_all_users as $usr) : ?>
<div class="modal fade" id="modal_edit_user<?= $usr->id_user; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Pengguna</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('user/User/edit_user'); ?>" class="item2">
                    <input type="hidden" name="id_user" value="<?= $usr->id_user; ?>">
                    <div class="form-group">
                        <input type="text" class="form-control border border-dark" readonly
                            value="<?= $usr->username; ?>">
                    </div>
                    <div class="form-group" name="e_l_u">
                        <label>Level</label>
                        <select class="form-control border border-dark" tabindex="-1" aria-hidden="true" name="level_U">
                            <option selected="true" disabled="disabled" value="<?= $usr->level; ?>">
                                <?= $usr->level; ?></option>
                            <?php foreach ($selectLevel as $lv) : ?>
                            <option value="<?= $lv->nama_level; ?>">
                                <?= $lv->nama_level; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <span id="err_error" class="text-danger"></span>
                    <div class="text-center">
                        <button class="badge progress-bar-primary" type="submit" name="submit_edit_user">Edit</button>
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
    
    $(document).ready(function(){
         $('[name="submit_add_user"]').on('click', function(e) {
        e.preventDefault();
        var data = $('.item').serialize();
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: "<?= base_url('user/User/add_user'); ?>",
            data: data,
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    location.href = "<?= base_url('user/User/all_user'); ?>"

                } else {
                    $("#username_error").html(data.error.u_error);
                    $("#password_error").html(data.error.p_error);
                    $("#level_error").html(data.error.level_error);
                }
            }

        });
    });
    })
</script>