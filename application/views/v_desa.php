<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= 'Desa ', $desa->nama_desa; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>img/favicon.png">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">

    <link rel="stylesheet"
        href="<?= base_url('assets/'); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
    body {
        background-image: url(<?= base_url('assets/img/bg2.jpg');
        ?>);
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }
    </style>
</head>

<body>
    <div class="jumbotron jumbotron-fluid" style="background-color: transparent; margin-bottom:0px; margin-top:0px;">
        <div class="container">
            <h2 style="color: white; font-weight:bold; text-align:left">Selamat datang di desa
                <?= $desa->nama_desa; ?>..</h2>
            <p style="color: white; font-weight:bold;">Sistem Informasi Posyandu Kabupaten Bireuen </p>
            <p>
                <a class="btn btn-default" href="<?= base_url('beranda') ?>" role="button">
                    <span class="glyphicon glyphicon glyphicon-arrow-left"></span> Beranda</a>
                <a class="btn btn-default" href="<?= base_url('pendaftaran-peserta/' . $desa->id_desa) ?>"
                    role="button">Pendaftaran <span class="glyphicon glyphicon glyphicon-arrow-right"></span></a>

            </p>
            <p>
            <div class="alert" role="alert" style="background-color: #F5F5DC;">
                Jumlah peserta Posyandu desa <?= $desa->nama_desa, ' sampai tahun ',  date('Y') ?> bulan
                <?= date('F'), ' adalah ', '<b>', $peserta_balita_desa ?> orang Balita </b>, dan
                <b><?= $peserta_bumil_desa ?> orang
                    Ibu Hamil</b>
            </div>
            </p>
        </div>
    </div>



    <div class=" container">
        <div class="row">
            <div class="col-xs-6">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <?php if ($posyandu_balita_desa != null) { ?>
                            <h3 class="box-title" id="judul">Data posyandu Balita <?= $desa->nama_desa; ?></h3>
                            <?php } else { ?>
                            <h3 class="box-title" id="judul">Belum ada data Posyandu Balita</h3>
                            <?php } ?>
                            <br>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Bulan Kunjungan</th>
                                            <th>Tahun</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                            $no = 0;
                                            foreach ($posyandu_balita_desa as $psnd11) :
                                                $no++
                                            ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $psnd11->nama ?></td>
                                            <td><?= $psnd11->bulan ?></td>
                                            <td><?= $psnd11->tahun ?></td>
                                            <td>
                                                <a href="" class="badge progress-bar-success" data-toggle="modal"
                                                    data-target="#<?= $psnd11->id_posyandu ?>">Lihat</a>
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

            <div class="col-xs-6">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <?php if ($posyandu_bumil_desa != null) { ?>
                            <h3 class="box-title" id="judul">Data posyandu Ibu Hamil <?= $desa->nama_desa; ?>
                                <?php } else { ?>
                                <h3 class="box-title" id="judul">Belum ada data Posyandu Ibu Hamil</h3>
                                <?php } ?>
                            </h3>
                            <br>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                            $no = 0;
                                            foreach ($posyandu_bumil_desa as $psnd12) :
                                                $no++
                                            ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $psnd12->nama ?></td>
                                            <td><?= $psnd12->bulan ?></td>
                                            <td><?= $psnd12->tahun ?></td>
                                            <td>
                                                <a href="" class="badge progress-bar-success" data-toggle="modal"
                                                    data-target="#<?= $psnd12->id_posyandu ?>">Lihat</a>
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
    </div>


    <!-- modal balita -->
    <?php foreach ($posyandu_balita_desa as $psnd11) : ?>
    <div class="modal fade" id="<?= $psnd11->id_posyandu ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center>
                        <h4 class="modal-title">Detail Data Posyandu Balita <br>
                            atas nama <b><?= $psnd11->nama ?></b> bulan <?= $psnd11->bulan, ' tahun ', $psnd11->tahun ?>
                        </h4>
                    </center>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>BB</th>
                                <th>TB</th>
                                <th>Umur</th>
                                <th>PSG</th>
                                <th>GKN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="<?= base_url('assets/'); ?>img/users/default.jpg" class="img-rounded"
                                        width="40" height="40">
                                </td>
                                <td><?= $psnd11->berat_badan ?></td>
                                <td><?= $psnd11->tinggi_badan ?></td>
                                <td><?= $psnd11->umur, ' Bulan' ?></td>
                                <td><?= $psnd11->PSG ?></td>
                                <td><?= $psnd11->GKN ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <?php endforeach; ?>



    <!-- modalibu hamil -->
    <?php foreach ($posyandu_bumil_desa as $psnd12) : ?>
    <div class="modal fade" id="<?= $psnd12->id_posyandu ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center>
                        <h4 class="modal-title">Detail Data Posyandu Ibu Hamil <br>
                            atas nama <b><?= $psnd12->nama ?></b> bulan <?= $psnd12->bulan, ' tahun ', $psnd12->tahun ?>
                        </h4>
                    </center>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>BB</th>
                                <th>TB</th>
                                <th>HPHT</th>
                                <th>TTP</th>
                                <th>HB</th>
                                <th>Hamil</th>
                                <th>Kunjungan</th>
                                <th>Usia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="<?= base_url('assets/'); ?>img/users/default.jpg" class="img-rounded"
                                        width="40" height="40">
                                </td>
                                <td><?= $psnd12->berat_badan ?></td>
                                <td><?= $psnd12->tinggi_badan ?></td>
                                <td><?= $psnd12->HPHT ?></td>
                                <td><?= $psnd12->TTP ?></td>
                                <td><?= $psnd12->HB ?></td>
                                <td><?= 'Ke ', $psnd12->hamil_ke ?></td>
                                <td><?= 'Ke ', $psnd12->kunjungan_ke ?></td>
                                <td><?= $psnd12->umur, ' Bulan' ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <?php endforeach; ?>



    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('assets/') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="<?= base_url('assets/') ?>bower_components/raphael/raphael.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('assets/') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js">
    </script>
    <!-- jvectormap -->
    <script src="<?= base_url('assets/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('assets/') ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('assets/') ?>bower_components/moment/min/moment.min.js"></script>
    <script src="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js">
    </script>
    <!-- datepicker -->
    <script src="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?= base_url('assets/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js">
    </script>
    <!-- Slimscroll -->
    <script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js">
    </script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
    <script src="<?= base_url('assets/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js">
    </script>
    <script src="<?= base_url('assets/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js">
    </script>

    <script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
    })
    </script>

    <script>
    $(document).ready(function() {
        $('.chck').click(function() {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
                $('#password2').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
                $('#password2').attr('type', 'password');
            }
        });

        function toggleAlert() {
            $(".alert").toggleClass('in out');
            return false; // Keep close.bs.alert event from removing from DOM
        }
        $("#btn").on("click", toggleAlert);
        $('#bsalert').on('close.bs.alert', toggleAlert)
    })
    </script>
</body>

</html>