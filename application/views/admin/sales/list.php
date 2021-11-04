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
                    <h1 class="h3 mb-4 text-gray-800">List Sales</h1>

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
                            <h6 class="m-0 font-weight-bold text-primary">Table Sales</h6>
                            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambah_sales">Tambah Sales</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_data">
                                        <?php $i = 0;
                                        foreach ($sales as $data) : ?>
                                            <tr>
                                                <td><?= ++$i ?></td>
                                                <td><?= $data->name ?></td>
                                                <td><?= $data->email ?></td>
                                                <td><?= $data->phone ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-primary edit-button" data='<?= $data->id_user ?>'><i class="far fa-edit"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger delete-button" data='<?= $data->id_user ?>'><i class="fas fa-trash"></i></button>
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
    <div class="modal fade" id="tambah_sales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Sales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Sales</label>
                            <div class="col-xs-9">
                                <input name="name" id="name" class="form-control" type="text" placeholder="Nama Sales" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Email Sales</label>
                            <div class="col-xs-9">
                                <input name="email" id="email" class="form-control" type="email" placeholder="sales@email.com" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">No Sales</label>
                            <div class="col-xs-9">
                                <input name="phone" id="phone" class="form-control" type="text" placeholder="081234567890" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button type="button" class="btn btn-primary" id="save-button">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <input type="hidden" name="id_user" id="id_user" value="">
                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Sales</label>
                            <div class="col-xs-9">
                                <input name="name-update" id="name-update" class="form-control" type="text" placeholder="Nama Sales" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Email Sales</label>
                            <div class="col-xs-9">
                                <input name="email-update" id="email-update" class="form-control" type="email" placeholder="sales@email.com" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">No Sales</label>
                            <div class="col-xs-9">
                                <input name="phone-update" id="phone-update" class="form-control" type="text" placeholder="081234567890" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button type="button" class="btn btn-primary" id="update-button">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Sales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">

                        <input type="hidden" name="id_user" id="id_user" value="">
                        <div class="alert alert-warning">
                            <p>Apakah Anda yakin mau menghapus data sales ini?</p>
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
            //update modal
            $('.edit-button').on('click', function() {
                var id_user = $(this).attr('data');
                $.ajax({
                    type: "GET",
                    url: "<?php echo site_url('admin/sales/edit') ?>",
                    dataType: "JSON",
                    data: {
                        id_user: id_user
                    },
                    success: function(data) {
                        $.each(data, function(id_user) {
                            $('#edit-modal').modal('show');
                            $('[name="id_user"]').val(data.id_user);
                            $('[name="name-update"]').val(data.name);
                            $('[name="email-update"]').val(data.email);
                            $('[name="phone-update"]').val(data.phone);
                        });
                    }
                });
                return false;
            });

            //delete modal
            $('.delete-button').on('click', function() {
                var id_user = $(this).attr('data');
                $('#delete-modal').modal('show');
                $('[name="id_user"]').val(id_user);
            });

            //Simpan 
            $('#save-button').on('click', function() {
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('admin/sales/save') ?>",
                    dataType: "JSON",
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                    },
                    success: function(data) {
                        $('#tambah_sales').modal('hide');
                        location.reload();
                    }
                });
                return false;
            });

            //Update 
            $('#update-button').on('click', function() {
                var id_user = $('#id_user').val();
                var name = $('#name-update').val();
                var email = $('#email-update').val();
                var phone = $('#phone-update').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('admin/sales/update') ?>",
                    dataType: "JSON",
                    data: {
                        id_user: id_user,
                        name: name,
                        email: email,
                        phone: phone,
                    },
                    success: function(data) {
                        $('#edit-modal').modal('hide');
                        location.reload();
                    }
                });
                return false;
            });

            //Hapus 
            $('#button-delete').on('click', function() {
                var id_user = $('#id_user').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('admin/sales/delete') ?>",
                    dataType: "JSON",
                    data: {
                        id_user: id_user
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