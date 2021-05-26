<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?= base_url('tambah-posyandu-bumil') ?>"
                                class="badge progress-bar-primary">Tambah</a>
                            <center>
                                <h3 class="box-title" id="judul">Semua Data Posyandu Ibu Hamil</h3>
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
                                            <th>Nama</th>
                                            <th>Suami</th>
                                            <th>HPHT</th>
                                            <th>TTP</th>
                                            <th>Umur</th>
                                            <th>Umur Kehamilan</th>
                                            <th>Hamil Ke</th>
                                            <th>Berat Badan</th>
                                            <th>Tinggi Badan</th>
                                            <th>HB</th>
                                            <th>Kunjungan</th>
                                            <th>Tahun</th>
                                            <th>Kegiatan Bulan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_admin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($posyandu_bumil as $psnd_bumil) :
                                            $no++
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $psnd_bumil->nama ?></td>
                                            <td><?= $psnd_bumil->suami ?></td>
                                            <td><?= $psnd_bumil->HPHT ?></td>
                                            <td><?= $psnd_bumil->TTP ?></td>
                                            <td><?php $lahir = $psnd_bumil->TTL;
                                                    $tahun_lahir = substr($lahir, -4);
                                                    $now = date("Y");
                                                    (int) $tahun_lahir;
                                                    (int) $now;
                                                    $umur = $now - $tahun_lahir;
                                                    echo $umur, ' Tahun'
                                                    ?></td>
                                            <td><?= $psnd_bumil->umur, ' Bulan' ?></td>
                                            <td><?= $psnd_bumil->hamil_ke ?></td>
                                            <td><?= $psnd_bumil->berat_badan ?></td>
                                            <td><?= $psnd_bumil->tinggi_badan ?></td>
                                            <td><?= $psnd_bumil->HB, ' G' ?></td>
                                            <td><?= 'Ke ', $psnd_bumil->kunjungan_ke ?></td>
                                            <td><?= $psnd_bumil->tahun ?></td>
                                            <td><?= $psnd_bumil->bulan ?></td>
                                            <td>
                                                <a href="<?= base_url('editBumil/' . $psnd_bumil->id_posyandu) ?>"
                                                    class="badge progress-bar-primary">Edit</a>
                                                <a href="<?= base_url('posyandu/Posyandu/delete_posyandu/' . $psnd_bumil->id_posyandu) ?>"
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




                        <div class="box-body" style="width: 50%;">
                            <div class="box-header">
                                <center>
                                    <h3 class="box-title" id="judul">Posyandu Lanjutan Ibu Hamil</h3>
                                </center>
                            </div>
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Suami</th>
                                            <th>Tambah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_admin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($cari_posyandu_bumil as $psnd_bumil) :
                                            $no++
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $psnd_bumil->nama ?></td>
                                            <td><?= $psnd_bumil->suami ?></td>
                                            <td>
                                                <a href="<?= base_url('tambah-posyandu-lanjutan/' . $psnd_bumil->id_posyandu) ?>"
                                                    class="badge progress-bar-success"> <span
                                                        class="glyphicon glyphicon glyphicon-arrow-right"></span></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>