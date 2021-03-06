<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <center>
                                <?php if ($posyandu_ku != null) { ?>
                                <h3 class="box-title" id="judul">Semua Data Posyandu Kebalitaan
                                    <?= $login_session['nama']; ?></h3>
                                <?php } else { ?>
                                <h3 class="box-title" id="judul">Belum ada data Posyandu Kebalitaan
                                    <?= $login_session['nama']; ?></h3>
                                <?php } ?>
                            </center>
                            <br>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Peserta</th>
                                            <th>Berat Badan</th>
                                            <th>Tinggi Badan</th>
                                            <th>PSG</th>
                                            <th>GKN</th>
                                            <th>Kelamin</th>
                                            <th>Umur</th>
                                            <th>Tahun</th>
                                            <th>Kunjungan Bulan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_admin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($posyandu_ku as $psnd) :
                                            $no++
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $psnd->nama ?></td>
                                            <td><?= $psnd->berat_badan, ' Kg' ?></td>
                                            <td><?= $psnd->tinggi_badan, ' Cm' ?></td>
                                            <td><?= $psnd->PSG ?></td>
                                            <td><?= $psnd->GKN ?></td>
                                            <td><?= $psnd->kelamin ?></td>
                                            <td><?php $lahir = $psnd->TTL;
                                                    $tahun_lahir = substr($lahir, -4);
                                                    $now = date("Y");
                                                    (int) $tahun_lahir;
                                                    (int) $now;
                                                    $umur = $now - $tahun_lahir;
                                                    echo $umur, ' Tahun'
                                                    ?></td>
                                            <td><?= $psnd->tahun ?></td>
                                            <td><?= $psnd->bulan ?></td>
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