<div class="row">
    <div class="col-md-6">
        <h2 style="color: black;">Payment</h2>
    </div>
    <div class="col-md-6">
        <div class="text-right">
            <a class="btn btn-md btn-primary" href="<?= base_url() ?>admin_controller/form_event">Tambah Event Baru</a>
        </div>
    </div>
</div>
<?= $this->session->flashdata('message'); ?>
<div class="card">
    <div class="card-body">
        <table id="datatables" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Event</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Nama Sales</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_event as $data) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><b><?= $data->nama_event ?></b></td>
                        <td>Rp.<?= number_format($data->price, 0, ",", "."); ?></td>
                        <td><?= date('d-m-Y', strtotime($data->date_event)); ?></td>
                        <td><?= $data->name ?></td>
                        <td>
                            <a class="btn btn-md btn-info" href="<?= base_url(); ?>admin_controller/form_editevent/<?= $data->id_event; ?>">Edit</a>
                            <a class="btn btn-md btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="<?= base_url(); ?>admin_controller/delete_event/<?= $data->id_event; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>