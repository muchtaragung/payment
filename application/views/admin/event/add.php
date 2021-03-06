<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layouts/head'); ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('layouts/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('layouts/topbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">List event</h1>

                    <?php if ($this->session->flashdata('msg')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= $this->session->flashdata('msg') ?>
                        </div>
                    <?php elseif ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $this->session->flashdata('error') ?>
                        </div>
                    <?php endif ?>

                    <div class="card">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <form method="POST" action="<?= base_url('admin/event/save') ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="namaEvent">Nama Event<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_event" value="<?= set_value('nama_event'); ?>">
                                </div>

                                <div class="form-group text-center">
                                    <center>
                                        <img src="" alt="" id="gambar_load" width="77.2%">
                                    </center>
                                </div>

                                <div class="form-group">
                                    <label for="namaEvent">Image Event<span style="color: red;">*</span></label>
                                    <input type="file" name="image_event" id="preview_gambar" class="form-control" accept=".jpg,.jpeg,.png" />
                                </div>

                                <div class="form-group">
                                    <label for="namaEvent">Deskripsi(Optional)</label>
                                    <textarea name="description" id="" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="namaEvent">Sales<span style="color: red;">*</span></label>
                                    <select class="select2 form-control" name="id_user" id="id_user">
                                        <option disabled selected value="">Pilih Sales</option>
                                        <?php foreach ($user as $data) { ?>
                                            <option value="<?= $data->id_user ?>"><?= $data->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="namaEvent">Event Trainer</label>
                                            <input type="text" class="form-control" name="trainer" placeholder="Trainers" value="<?= set_value('trainer'); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="namaEvent">Tanggal Mulai Event<span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" name="start_date" value="<?= set_value('date_event'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="namaEvent">Tanggal Selesai Event<span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" name="end_date" value="<?= set_value('date_event'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="namaEvent">Start time<span style="color: red;">*</span></label>
                                            <input type="time" class="form-control" name="start_time" value="<?= set_value('start_time'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="namaEvent">End Time<span style="color: red;">*</span></label>
                                            <input type="time" class="form-control" name="end_time" value="<?= set_value('end_time'); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="namaEvent">Price<span style="color: red;">*</span></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                </div>
                                                <input type="text" class="form-control" name="price" id="price" placeholder="Masukan harga" value="<?= set_value('price'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="namaEvent h2">Early Price<span style="color: red;"></span></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                </div>
                                                <input type="text" class="form-control" name="early_price" id="early" placeholder="Masukan harga" value="<?= set_value('price'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="namaEvent">Early Date<span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" name="early_date" value="<?= set_value('early_date'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="namaEvent h1">Super Early Price</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                </div>
                                                <input type="text" class="form-control" name="super_price" id="super_price" placeholder="Masukan harga" value="<?= set_value('price'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="namaEvent">Super Early Date<span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" name="super_date" value="<?= set_value('super_date'); ?>">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg">Simpan Data</button>
                            </form>

                        </div>
                    </div>


                    <!-- <div class="form-group">
                <label for="exampleFormControlFile1">Gambar</label>
                <input type="file" name="gambar_thumbnail" class="form-control-file" id="exampleFormControlFile1" >
            </div> -->


                    <script type="text/javascript">
                        var price = document.getElementById('price');
                        price.addEventListener('keyup', function(e) {
                            // gunakan fungsi formatprice() untuk mengubah angka yang di ketik menjadi format angka
                            price.value = formatRupiah(this.value);
                        });

                        var early = document.getElementById('early');
                        early.addEventListener('keyup', function(e) {
                            // gunakan fungsi formatearly() untuk mengubah angka yang di ketik menjadi format angka
                            early.value = formatRupiah(this.value);
                        });

                        var superprice = document.getElementById('super_price');
                        superprice.addEventListener('keyup', function(e) {
                            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                            superprice.value = formatRupiah(this.value);
                        });

                        /* Fungsi formatRupiah */
                        function formatRupiah(angka, prefix) {
                            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                split = number_string.split(','),
                                sisa = split[0].length % 3,
                                rupiah = split[0].substr(0, sisa),
                                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                            if (ribuan) {
                                separator = sisa ? '.' : '';
                                rupiah += separator + ribuan.join('.');
                            }

                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
                        }
                    </script>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view('layouts/footer'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">

                        <input type="hidden" name="id_event" id="id_event" value="">
                        <div class="alert alert-warning">
                            <p>Apakah Anda yakin mau menghapus data event ini?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-danger" id="button-delete">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $this->load->view('layouts/script'); ?>
    <script>
        $(document).ready(function() {

            //delete modal
            $('.delete-button').on('click', function() {
                var id_event = $(this).attr('data');
                $('#delete-modal').modal('show');
                $('[name="id_event"]').val(id_event);
            });

            //Hapus 
            $('#button-delete').on('click', function() {
                var id_event = $('#id_event').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('admin/event/delete') ?>",
                    dataType: "JSON",
                    data: {
                        id_event: id_event
                    },
                    success: function(data) {
                        $('#delete-modal').modal('hide');
                        location.reload();
                    }
                });
                return false;
            });
        });
    </script>
    <script>
        function bacaGambar(input) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }

        $("#preview_gambar").change(function() {
            bacaGambar(this);
        });
    </script>
</body>