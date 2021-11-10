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
                    <h1 class="h3 mb-4 text-gray-800">Edit event</h1>

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
                            <form method="POST" action="<?= base_url('admin/event/update') ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="namaEvent">Nama Event<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_event" value="<?= $event->nama_event ?>" required>
                                </div>


                                <div class="row">
                                    <div class="col-6 form-group text-center shadow">
                                        <img src="<?= base_url('upload/events/images/' . $event->image_event) ?>" alt="old photo" width="100%">
                                        <input type="hidden" name="old_image_event" value="<?= $event->image_event ?>">
                                    </div>
                                    <div class="col-6 form-group text-center shadow">
                                        <img src="" alt="new photo" id="gambar_load" width="100%">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="namaEvent">Image Event<span style="color: red;">*</span></label>
                                    <input type="file" name="image_event" id="preview_gambar" class="form-control" accept=".jpg,.jpeg,.png" />
                                </div>

                                <div class="form-group">
                                    <label for="namaEvent">Deskripsi(Optional)</label>
                                    <textarea name="description" id="" class="form-control" rows="3"><?= $event->description ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="namaEvent">Sales<span style="color: red;">*</span></label>
                                    <select required class="select2 form-control" name="id_user" id="id_user">
                                        <option disabled selected value="">Pilih Sales</option>
                                        <?php foreach ($user as $data) { ?>
                                            <option value="<?= $data->id_user ?>" <?php if ($event->id_user == $data->id_user) { ?>selected<?php } ?>><?= $data->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="namaEvent">Link Event (Optional)</label>
                                            <input type="text" class="form-control" name="link_event" placeholder="https://us02web.zoom.us/j/86502819503" value="<?= $event->link_event ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="namaEvent">Tanggal Event<span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" name="date_event" value="<?= $event->date_event ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="namaEvent">Start time<span style="color: red;">*</span></label>
                                            <input type="time" class="form-control" name="start_time" value="<?= $event->start_time ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="namaEvent">End Time<span style="color: red;">*</span></label>
                                            <input type="time" class="form-control" name="end_time" value="<?= $event->end_time ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="namaEvent">Quantity<span style="color: red;">*</span></label>
                                            <input type="number" class="form-control" name="quantity" placeholder="1" required value="<?= $event->quantity ?>">
                                        </div>
                                    </div>
                                </div>

                                <label for="namaEvent">Harga Event<span style="color: red;">*</span></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" name="price" id="rupiah" placeholder="Masukan harga" value="<?= $event->price ?>" required>
                                </div>
                                <input type="hidden" name="id_event" value="<?= $event->id_event ?>">
                                <button type="submit" class="btn btn-primary btn-lg">Simpan Data</button>
                            </form>

                        </div>
                    </div>


                    <!-- <div class="form-group">
                <label for="exampleFormControlFile1">Gambar</label>
                <input type="file" name="gambar_thumbnail" class="form-control-file" id="exampleFormControlFile1" required>
            </div> -->


                    <script type="text/javascript">
                        var rupiah = document.getElementById('rupiah');
                        rupiah.addEventListener('keyup', function(e) {
                            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                            rupiah.value = formatRupiah(this.value);
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