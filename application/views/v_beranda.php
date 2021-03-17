<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>img/favicon.png">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
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

    .jumbotron {
        padding: 5px;
    }
    </style>
</head>

<body>
    <div class="jumbotron jumbotron-fluid" style="background-color: transparent;">
        <div class="container">
            <h2 style="color: white; font-weight:bold; text-align:left">Selamat datang di..</h2>
            <p style="color: white; font-weight:bold;">Sistem Informasi Posyandu Kabupaten Bireuen </p>
            <p><a class="btn btn-default" href="<?= base_url('pendaftaran-desa'); ?>" role="button">Daftar</a>
                <a class="btn btn-default" href="<?= base_url('login'); ?>" role="button">Login</a>
            </p>
            <?= $this->session->flashdata('message1'); ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($desa as $ds) : ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-folder-open"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-number"><?= $ds->nama_desa; ?></span>
                        <span class="info-box-text"><?php //unntuk hitung peserta masing-masing desa
                                                        $query = $this->db->where('level', 'peserta')
                                                            ->where('id_desa', $ds->id_desa)
                                                            ->count_all_results('user');
                                                        echo $query;
                                                        ?><small>
                                Peserta</small></span>
                        <span class="info-box-number"><a href="<?= base_url('desa/' . $ds->id_desa) ?>">
                                <span class="badge">Lihat</span></a>
                        </span>
                    </div>
                </div>
            </div>
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <?php endforeach; ?>
        </div>
    </div>
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
    <script src="<?= base_url('assets/') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?= base_url('assets/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('assets/') ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('assets/') ?>bower_components/moment/min/moment.min.js"></script>
    <script src="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?= base_url('assets/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
    <script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $("#msg").fadeTo(200, 0).slideUp(200, function() {
                $(this).remove();
            });
        }, 3000);
    })
    </script>

</body>

</html>