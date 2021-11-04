<div class="card">
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form method="POST" action="<?= base_url('admin_controller/edit_event') ?>">
            <div class="form-group">
                <input type="text" hidden name="id_event" value="<?= $data_event['id_events']; ?>">
                <label for="namaEvent">Nama Event<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="nama_event" value="<?= $data_event['nama_events'] ? $data_event['nama_events'] : set_value('nama_event'); ?>">
                <?= form_error('nama_event', '<small class="text-danger pl-3" >', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="namaEvent">Deskripsi(Optional)</label>
                <textarea name="deskripsi" id="" class="form-control" rows="3"><?= $data_event['description'] ? $data_event['description'] : set_value('deskripsi'); ?></textarea>
                <?= form_error('deskripsi', '<small class="text-danger pl-3" >', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="namaEvent">Sales<span style="color: red;">*</span></label>
                <select required class="select2 form-control" name="id_user" id="id_user">
                    <option disabled value="">Pilih Sales</option>
                    <?php foreach ($user as $data) { ?>
                        <option value="<?= $data->id_user; ?>" <?= $data_event['id_user'] == $data->id_user ? 'selected' :  $data->id_user; ?>><?= $data->name ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="namaEvent">Link Event<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="link_event" placeholder="https://us02web.zoom.us/j/86502819503" value="<?= $data_event['link_event'] ? $data_event['link_event'] : set_value('link_event'); ?>">
                        <?= form_error('link_event', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="namaEvent">Link Pembayaran Pihak ke 3(Optional)</label>
                        <input type="text" class="form-control" name="link_credit" placeholder="Contoh : Tokopedia" value="<?= $data_event['link_credit'] ? $data_event['link_credit'] : set_value('link_credit'); ?>">
                        <?= form_error('link_credit', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="namaEvent">Tanggal Event<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="date_event" value="<?= $data_event['date_events'] ? $data_event['date_events'] : set_value('date_event'); ?>">
                        <?= form_error('date_event', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="namaEvent">Start at<span style="color: red;">*</span></label>
                        <input type="time" class="form-control" name="start_at" value="<?= $data_event['start_at'] ? $data_event['start_at'] : set_value('start_at'); ?>">
                        <?= form_error('start_at', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="namaEvent">Start End<span style="color: red;">*</span></label>
                        <input type="time" class="form-control" name="durasi_event" value="<?= $data_event['start_end'] ? $data_event['start_end'] : set_value('durasi_event'); ?>">
                        <?= form_error('durasi_event', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="namaEvent">Quantity<span style="color: red;">*</span></label>
                        <input type="number" class="form-control" name="quantity" placeholder="1" required value="<?= $data_event['quantity'] ? $data_event['quantity'] : set_value('quantity'); ?>">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="namaEvent">Harga Event<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="harga_event" id="rupiah" placeholder="Masukan harga" value="<?= $data_event['price'] ? $data_event['price'] : set_value('harga_event'); ?>">
                <?= form_error('harga_event', '<small class="text-danger pl-3" >', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Call To Action button<span style="color: red;">*</span></label>
                <select class="select2 form-control" name="button_action" id="exampleFormControlSelect1" required>
                    <option disabled selected value="<?= $data_event['actionbutton'] ?>"><?= $data_event['actionbutton'] ?></option>
                    <option value="Saya Ingin Ini">Saya Ingin Ini</option>
                    <option value="Order Sekarang">Order Sekarang</option>
                    <option value="Beli Sekarang">Beli Sekarang</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Simpan Data</button>
        </form>

    </div>
</div>


<!-- <div class="form-group">
                <label for="exampleFormControlFile1">Gambar</label>
                <input type="file" name="gambar_thumbnail" class="form-control-file" id="exampleFormControlFile1" required>
                <?= form_error('gambar_thumbnail', '<small class="text-danger pl-3" >', '</small>'); ?>
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