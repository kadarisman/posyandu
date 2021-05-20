<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?= base_url('tambah-posyandu') ?>" class="badge progress-bar-primary">Tambah</a>
                            <center>
                                <h3 class="box-title" id="judul">Rekap Data Posyandu Balita<br> desa <?php
                                                                                                        if ($login_session['level'] == "panitia") {
                                                                                                            echo $panitia_data_login['nama_desa'];
                                                                                                        } else {
                                                                                                            echo $desa_data_login['nama_desa'];
                                                                                                        } ?></h3>
                            </center>
                            <br>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?= $this->session->flashdata('message1'); ?>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Balita</th>
                                            <th>Sex</th>
                                            <th>Tanggal Lahir</th>
                                            <th>GKN</th>
                                            <th>Januari</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_admin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($rekap_balita_desa as $psnd) :
                                            $no++
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $psnd->nama ?></td>
                                            <td><?= $psnd->kelamin ?></td>
                                            <td><?= $psnd->TTL ?></td>
                                            <td></td>
                                            <td>Umur&ensp;: <br>
                                                BB &ensp;&ensp;&ensp;: <br>
                                                TB &ensp;&ensp;&ensp;:
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Balita</th>
                                            <th>Sex</th>
                                            <th>Tanggal Lahir</th>
                                            <th>GKN</th>
                                        </tr>
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