<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <button onclick="window.print()" class="badge progress-bar-primary phide">
                                Cetak <i class="fa fa-print" aria-hidden="true"></i></button>
                            <form action="<?= base_url('filter-tahun-balita-desa') ?>" method="post" class="phide">
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
                                <h3 class="box-title" id="judul">Rekap semua Data Posyandu Balita<br>
                                    desa <?php
                                            if ($login_session['level'] == "panitia") {
                                                echo $panitia_data_login['nama_desa'];
                                            } else {
                                                echo $desa_data_login['nama_desa'], ' Tahun ', date('Y');
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
                                            <th>Umur</th>
                                            <th>Berat Badan</th>
                                            <th>Tinggi Badan</th>
                                            <th>PSG</th>
                                            <th>Bulan Kunjungan</th>
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
                                            <td><?= $psnd->GKN ?></td>
                                            <td><?= $psnd->umur, ' Bulan' ?></td>
                                            <td><?= $psnd->berat_badan ?></td>
                                            <td><?= $psnd->tinggi_badan ?></td>
                                            <td><?= $psnd->PSG ?></td>
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