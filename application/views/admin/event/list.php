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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table event</h6>
                            <a href="<?= site_url('admin/event/add') ?>" class="btn btn-primary float-right">Tambah event</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Event</th>
                                            <th>Harga</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Nama event</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($events as $data) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><b><?= $data->nama_event ?></b></td>
                                                <td>Rp.<?= number_format($data->price, 0, ",", "."); ?></td>
                                                <td><?= date('d-m-Y', strtotime($data->start_date)); ?></td>
                                                <td><?= date('d-m-Y', strtotime($data->end_date)); ?></td>
                                                <td><?= $data->name ?></td>
                                                <td>
                                                    <a class="btn btn-md btn-info" href="<?= base_url(); ?>admin/event/edit/<?= $data->id_event; ?>">Edit</a>
                                                    <a class="btn btn-md btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="<?= base_url(); ?>admin/event/delete/<?= $data->id_event; ?>">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
</body>