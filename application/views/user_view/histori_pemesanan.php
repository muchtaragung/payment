<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-Fbk-gdYXVvtjJfNr"></script> -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-MK3PDSzfqm48182s"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

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
                <div class="card-body" style="margin-bottom:-7%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin:2%;">
                    <!-- <div class="text-center mb-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <h4 class="mb-3">Cek Pemesanan</h4>
                                </div>
                            </div>
                        </div>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" name="id_order" placeholder="Order ID : 124534534" id="id_order">
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-sm btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div> -->
                    <div class="row" style="margin-bottom: 5%;">
                        <div class="col-md-6">
                            <p style="font-weight: 700; color:black;">Nama Customer</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-right" style="font-weight: 700; color:black;"><?= $pesanan->nama_customer; ?></p>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 5%;">
                        <div class="col-md-6">
                            <p style="font-weight: 700; color:black;">Nama Event</p>
                        </div>
                        <div class="col-md-6">
                            <p><span class="float-right" style="background-color: green; color:white; padding:1%; border-radius:4px; font-size:15px;"><?= $pesanan->nama_event ?></span></p>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 5%;">
                        <div class="col-md-6">
                            <p style="font-weight: 700; color:black;">Status Pemesanan</p>
                        </div>
                        <div class="col-md-6">
                            <?php if ($pesanan->status_code == 201) : ?>
                                <p><span class="float-right" style="background-color: yellow; color:black; padding:1%; border-radius:4px; font-size:15px;">Pending</span></p>
                            <?php elseif ($pesanan->status_code == 200) : ?>
                                <p><span class="float-right" style="background-color: green; color:white; padding:1%; border-radius:4px; font-size:15px;">Success</span></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div style="color: black;">
                        <div class="row">
                            <div class="col-md-6">
                                <p><b>Sales</b></p>
                            </div>
                            <div class="col-md-6">
                                <p class="float-right"><?= $pesanan->nama_sales ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><b>Tanggal</b></p>
                            </div>
                            <div class="col-md-6">
                                <p class="float-right"><?= date('d F Y', strtotime($pesanan->created_at)); ?></p>
                            </div>
                        </div>
                        <hr style="border-top: 1px dashed #193C7F; margin-top:-1%;">
                        <div class="row" style="color: black; font-weight:700;">
                            <div class="col-md-6">
                                <p><b>Harga</b></p>
                            </div>
                            <div class="col-md-6">
                                <p class="float-right">Rp. <?php echo number_format($pesanan->price, 0, ",", "."); ?></p>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary btn-block" href="<?= base_url('event'); ?>">Kembali ke menu utama</a>
                </div>
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