<!-- Page Heading -->
<h1 class="h3 mb-2" style="text-align: center; background-color:#2043E5; padding:1%; font-weight:700; color:white;">HISTORI PEMBELIAN</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="histori" cellspacing="0">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Nama Pembeli</th>
                        <th>Email Pembeli</th>
                        <th>No telepon</th>
                        <th>Sales</th>
                        <th>Product</th>
                        <th>Harga</th>
                        <th>Payment Type</th>
                        <th>Bank</th>
                        <th>VA Number</th>
                        <th>Waktu Transaksi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($histori_pembelian as $data) : ?>
                        <tr>
                            <td><?= $data['order_id']; ?></td>
                            <td><b><?= $data['nama_customer']; ?></b> </td>
                            <td><?= $data['email_customer']; ?></td>
                            <td><?= $data['no_telp']; ?></td>
                            <td><?= $data['nama_sales']; ?></td>
                            <td><?= $data['nama_event']; ?></td>
                            <td>Rp.<?= number_format($data['price'], 0, ",", "."); ?></td>
                            <td><?= ucfirst(str_replace("_", " ", $data['payment_type'])); ?></td>
                            <td><b><?= strtoupper($data['bank']); ?></b></td>
                            <td><b><?= $data['va_number']; ?></b></td>
                            <td><?= date('d-m-Y H:i:s', strtotime($data['transaction_time'])); ?></td>
                            <td>
                                <?php if ($data['status_code'] == 201) : ?>
                                    <p class="badge badge-warning">Pending</p>
                                <?php elseif ($data['status_code'] == 200) : ?>
                                    <p class="badge badge-success">Success <i class="far fa-check-circle"></i></p>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>