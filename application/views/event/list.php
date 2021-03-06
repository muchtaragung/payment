<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>asset/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>asset/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>asset/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url() ?>asset/favicon/site.webmanifest">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .produk:hover {
            background-color: #FFF000;
            transform: scale(1.05);
            transition: all 0.90s ease 0s;
            color: white;
        }
    </style>
</head>

<body>
    <?= $this->session->flashdata('message'); ?>
    <div style="min-height: 100vh;">
        <div class="card" style="background-color: #193C7F; min-height: 100vh;">
            <div style="width:100%; max-width:420px; margin-left:auto; margin-right:auto; background-color:white; border-radius:5px; min-height:100vh;">
                <img src="https://korporaconsulting.com/wp-content/uploads/2018/04/Untitled-1cc.png" alt="Logo" style="display: block; margin-left: auto; margin-right: auto; margin-top: 10%; margin-bottom: 10%; width:60%;">
                <?php foreach ($data_event as $data) : ?>
                    <div class="card-body" style="margin-bottom:-7%;">
                        <div class="row">
                            <a href="<?= base_url() ?><?= $data->slug_sales ?>/event/<?= $data->slug_event; ?>" target="_blank" style="width:100%; padding:2%;" class="produk">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <center>
                                                <img class="img-fluid rounded" style="width: 100px;" src="<?= base_url() ?>upload/events/images/<?= $data->image_event; ?>" alt="" srcset="">
                                            </center>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="text-center"><span style="color: black;"><?= $data->nama_event; ?></span></p>
                                        </div>
                                        <div class="col-sm-3">
                                            <?php
                                            $tgl = date('Y-m-d');
                                            // $tgl = '2021-12-07';
                                            if ($data->super_price != null && $data->super_date != null && $data->super_date >= $tgl) { ?>
                                                <p><span class="float-right" style="background-color: green; color:white; padding:1%; border-radius:4px; font-size:15px;">IDR <?= number_format($data->super_price, 0, ",", "."); ?></span><span class="badge badge-warning">Super Early</span></p>
                                            <?php } elseif ($data->early_price != null  && $data->early_date != null && $data->early_date >= $tgl) { ?>
                                                <p><span class="float-right" style="background-color: green; color:white; padding:1%; border-radius:4px; font-size:15px;">IDR <?= number_format($data->early_price, 0, ",", "."); ?></span><span class="badge badge-info">Early</span></p>
                                            <?php } else { ?>
                                                <p><span class="float-right" style="background-color: green; color:white; padding:1%; border-radius:4px; font-size:15px;">IDR <?= number_format($data->price, 0, ",", "."); ?></span></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>




    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>
</body>

</html>