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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                <div class="card-body">
                    <?php if ($this->session->flashdata('msg') != null) { ?>
                        <script>
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                text: "<?php echo $this->session->flashdata('msg'); ?>",
                                timer: 4000,
                                showConfirmButton: false,
                                type: 'success'
                            });
                        </script>
                    <?php } ?>
                    <?php if ($this->session->flashdata('error') != null) { ?>
                        <script>
                            Swal.fire({
                                position: 'top-end',
                                icon: 'warning',
                                text: "<?php echo $this->session->flashdata('error'); ?>",
                                timer: 4000,
                                showConfirmButton: false,
                                type: 'error'
                            });
                        </script>
                    <?php } ?>

                    <p class="text-center">
                        Selamat datang di <br><b> PAYMENT KORPORA CONSULTING</b><br>Untuk melanjutkan pembayaran silahkan pilih sales Anda
                    </p>
                    <div class="text-center mb-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-search"></i> Cek Pemesanan
                        </button>
                    </div>
                </div>
                <?php foreach ($user as $data) : ?>
                    <div class="card-body" style="margin-bottom:-7%;">
                        <div class="row">
                            <a href="<?= base_url() ?><?= str_replace(' ', '-', strtolower($data->name)); ?>" target="_blank" style="width:100%; padding:2%;" class="produk">
                                <div class="col-md-12">
                                    <p><span style="color: black;"><?= $data->name; ?></span> <span class="float-right" style=" color:black; padding:1%; border-radius:4px; font-size:15px;"> <?= $data->phone ?></span></p>
                                    <hr>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <h4 class="mb-3">Cek Pemesanan</h4>
                                </div>
                            </div>
                        </div>
                        <form action="<?= base_url() ?>pemesanan/cari" method="post">
                            <div class="row">
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" name="id_order" placeholder="Order ID : 124534534" id="id_order">
                                    <small id="helpId" class="text-muted">Order ID Anda tercantum pada email</small>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-sm btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</body>

</html>