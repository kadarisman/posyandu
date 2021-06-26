<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <button onclick="window.print()" class="badge progress-bar-primary phide">
                                Cetak <i class="fa fa-print" aria-hidden="true"></i></button>
                            <form action="<?= base_url('filter-tahun-bumil-desa') ?>" method="post" class="phide">
                                <br>
                                Filter Pertahun :
                                <select name="tahun" required>
                                    <option value="" selected disabled>Tahun</option>
                                    <?php for ($i = date('Y'); $i >= 2015; $i--) : ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                <button type="submit" class="badge progress-bar-primary" id="crsmth_p">Cari</button>
                            </form>

                            <center>
                                <?php if ($filter_bumil_tahun1 != null) { ?>
                                <h3 class="box-title" id="judul"> <?php if ($filter_bumil_tahun1 != null) { ?>
                                    Rekap Data Posyandu Ibu Hamil<br>
                                    desa <?php
                                                                            if ($login_session['level'] == "panitia") {
                                                                                echo $panitia_data_login['nama_desa'];
                                                                            } else {
                                                                                echo $desa_data_login['nama_desa'], ' Tahun ', $th;
                                                                            } ?>
                                    <?php } else {
                                                                            echo 'Data tidak ditemukan';
                                                                        } ?>
                                    <?php } else { ?>
                                    Belum ada data
                                    <?php } ?>
                                </h3>
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
                                            <th>Tahun</th>
                                            <th>Kunjungan Bulan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($all_admin); 
                                        ?>
                                        <?php
                                        $no = 0;
                                        foreach ($filter_bumil_tahun1 as $psnd) :
                                            $no++
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $psnd->nama ?></td>
                                            <td><?= $psnd->suami ?></td>
                                            <td><?= $psnd->HPHT ?></td>
                                            <td><?= $psnd->TTP ?></td>
                                            <td><?php $lahir = $psnd->TTL;
                                                    $tahun_lahir = substr($lahir, -4);
                                                    $now = date("Y");
                                                    (int) $tahun_lahir;
                                                    (int) $now;
                                                    $umur = $now - $tahun_lahir;
                                                    echo $umur, ' Tahun'
                                                    ?></td>
                                            <td><?= $psnd->umur, ' Bulan' ?></td>
                                            <td><?= $psnd->hamil_ke ?></td>
                                            <td><?= $psnd->berat_badan ?></td>
                                            <td><?= $psnd->tinggi_badan ?></td>
                                            <td><?= $psnd->HB, ' G' ?></td>
                                            <td><?= $psnd->tahun ?></td>
                                            <td><?= $psnd->bulan ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="row tndtgn">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <center>
                                    <?php if ($login_session['level'] == "panitia") {
                                        echo $panitia_data_login['nama_desa'];
                                    } else {
                                        echo $desa_data_login['nama_desa'], ', ';
                                    } ?> <?php echo date('d-m-Y'); ?>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    Ka Posyandu Desa <?php if ($login_session['level'] == "panitia") {
                                                            echo $panitia_data_login['nama_desa'];
                                                        } else {
                                                            echo $desa_data_login['nama_desa'];
                                                        } ?>
                                    <br>
                                    <br>
                                </center>
                            </div>
                        </div>
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