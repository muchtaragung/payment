<!-- Page Heading -->
<h1 class="h3 mb-2" style="text-align: center; background-color:#2043E5; padding:1%; font-weight:700; color:white;">HISTORI PEMBELIAN</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Data Pembeli</th>
                        <th>Product</th>
                        <th>Harga</th>
                        <th>Payment Type</th>
                        <th>Bank</th>
                        <th>VA Number</th>
                        <th>Waktu Transaksi</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Order ID</th>
                        <th>Data Pembeli</th>
                        <th>Product</th>
                        <th>Harga</th>
                        <th>Payment Type</th>
                        <th>Bank</th>
                        <th>VA Number</th>
                        <th>Waktu Transaksi</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($histori_pembelian as $data) : ?>
                        <tr>
                            <td><?= $data['order_id']; ?></td>
                            <td><?= $data['nama_customer']; ?></td>
                            <td><?= $data['nama_events']; ?></td>
                            <td><?= $data['price']; ?></td>
                            <td><?= $data['payment_type']; ?></td>
                            <td><?= $data['bank']; ?></td>
                            <td><?= $data['va_number']; ?></td>
                            <td><?= $data['transaction_time']; ?></td>
                            <td>
                                <?php if ($data['status_code'] == 201) : ?>
                                    Pending
                                <?php elseif ($data['status_code'] == 200) : ?>
                                    Success
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($data['status_code'] == 201) : ?>
                                    <form method="POST" action="<?= base_url('payment_histori/status_success'); ?>">
                                        <input type="text" hidden name="id_pesanan" value="<?= $data['id_pesanan'] ?>">
                                        <input type="text" hidden name="status_success" value="200">
                                        <button type="submit" class="badge badge-primary">Buy Success</button>
                                    </form>
                                <?php elseif ($data['status_code'] == 200) : ?>
                                    <p class="badge badge-success">Verified <i class="far fa-check-circle"></i></p>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>