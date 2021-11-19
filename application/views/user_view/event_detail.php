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
                    <h6>You are invited to join events</h6>
                    <div class="row" style="margin-bottom: 5%;">
                        <div class="col-md-12 mb-3">
                            <center>
                                <img class="img-fluid rounded" src="<?= base_url() ?>upload/events/images/<?= $detail_event['image_event']; ?>" alt="" srcset="">
                            </center>
                        </div>
                        <div class="col-md-6">
                            <p style="font-weight: 700; color:black;"><?= $detail_event['nama_event']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><span class="float-right" style="background-color: green; color:white; padding:1%; border-radius:4px; font-size:15px;">IDR <?= number_format($detail_event['price'], 0, ",", "."); ?></span></p>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary btn-block" style="margin-bottom: 5%;" data-toggle="modal" data-target="#showDeskripsi<?= $detail_event['id_event']; ?>">Deskripsi produk</button>
                    <div style="color: black;">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Sales </p>
                            </div>
                            <div class="col-md-6">
                                <p class="float-right"><?= $detail_event['name']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Tanggal </p>
                            </div>
                            <div class="col-md-6">
                                <p class="float-right"><?= date('d F Y', strtotime($detail_event['date_event'])); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Waktu </p>
                            </div>
                            <div class="col-md-6">
                                <p class="float-right"><?= date('H:i', strtotime($detail_event['start_time'])); ?>-<?= date('H:i', strtotime($detail_event['end_time'])); ?> WIB</p>
                            </div>
                        </div>
                        <hr style="border-top: 1px dashed #193C7F; margin-top:-1%;">
                        <div class="row" style="color: black; font-weight:700;">
                            <div class="col-md-6">
                                <p>Harga </p>
                            </div>
                            <div class="col-md-6">
                                <p class="float-right">Rp. <?php echo number_format($detail_event['price'], 0, ",", "."); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin:2%; margin-top:8%; margin-bottom:30px;">
                    <h4 style="color: black;">Checkout</h4>
                    <form id="payment-form" method="post" action="<?= site_url() ?>snap/finish">
                        <div> <input type="hidden" name="result_type" id="result-type" value=""></div>
                        <div> <input type="hidden" name="result_data" id="result-data" value=""></div>
                        <div class="form-group">
                            <label for="namalengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" name="namalengkap" id="namalengkap" aria-describedby="namaHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="emailcustomer">Email</label>
                            <input type="email" class="form-control" name="emailcustomer" id="emailcustomer" aria-describedby="emailHelp" required>
                            <small>Pastikan Email Anda Valid</small>
                        </div>
                        <div class="form-group">
                            <label for="noTelp">Nomor Telpon</label>
                            <input type="text" name="notelp" class="form-control" id="notelp" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                            <!-- <input type="text" class="form-control" name="notelp" id="notelp" aria-describedby="notelpHelp" required> -->
                        </div>
                        <!-- Product -->
                        <input type="text" hidden name="idevents" id="idevents" value="<?= $detail_event['id_event'] ?>">
                        <input type="text" hidden name="namaevents" id="namaevents" value="<?= $detail_event['nama_event'] ?>">
                        <input type="text" hidden name="hargaevents" id="hargaevents" value="<?= $detail_event['price']; ?>">
                        <input type="text" hidden name="quantityevents" id="quantityevents" value="<?= $detail_event['quantity']; ?>">
                        <input type="text" hidden name="nama_sales" id="id_user" value="<?= $detail_event['name']; ?>">
                        <input type="text" hidden name="nama_event" id="id_user" value="<?= $detail_event['nama_event']; ?>">
                        <input type="text" hidden name="price" id="id_user" value="<?= $detail_event['price']; ?>">

                        <button type="submit" class="btn btn-primary btn-block" id="pay-button">Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Deskripsi -->
    <div class="modal fade" id="showDeskripsi<?= $detail_event['id_event']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deskripsi Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= nl2br($detail_event['description']); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $('#pay-button').click(function(event) {
            event.preventDefault();
            $(this).attr("disabled", "disabled");

            var namalengkap = $("#namalengkap").val();
            var emailcustomer = $("#emailcustomer").val();
            var notelp = $("#notelp").val();
            var namaevents = $("#namaevents").val();
            var hargaevents = $("#hargaevents").val();
            var quantityevents = $("#quantityevents").val();
            var idevents = $("#idevents").val();

            if (namalengkap == '' || emailcustomer == '' || notelp == '') {
                alert('Pastikan semua data harus di isi');
                location.reload();
                return false;
            }
            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>/snap/token',
                data: {
                    namalengkap: namalengkap,
                    emailcustomer: emailcustomer,
                    notelp: notelp,
                    namaevents: namaevents,
                    hargaevents: hargaevents,
                    idevents: idevents,
                    quantityevents: quantityevents
                },
                cache: false,

                success: function(data) {
                    //location = data;

                    console.log('token = ' + data);

                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                        //resultType.innerHTML = type;
                        //resultData.innerHTML = JSON.stringify(data);
                    }

                    snap.pay(data, {

                        onSuccess: function(result) {
                            changeResult('success', result);
                            console.log(result.status_message);
                            console.log(result);
                            $("#payment-form").submit();
                        },
                        onPending: function(result) {
                            changeResult('pending', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                        onError: function(result) {
                            changeResult('error', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        }
                    });
                }
            });
        });
    </script>



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