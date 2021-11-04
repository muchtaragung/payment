<div class="card">
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form method="POST" action="<?= base_url('admin_link/add_link') ?>">
            <div class="form-group">
                <input type="text" hidden name="id_user" value="<?= $user['id_user']; ?>">
                <label for="namaEvent">Nama Link</label>
                <input type="text" class="form-control" name="nama_link" value="<?= set_value('nama_link'); ?>">
                <?= form_error('nama_link', '<small class="text-danger pl-3" >', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="namaEvent">Link</label>
                <input type="text" class="form-control" name="link" placeholder="https://salesuniversity.id/" value="<?= set_value('link'); ?>">
                <?= form_error('link', '<small class="text-danger pl-3" >', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Call To Action button</label>
                <select class="form-control" name="button_action" id="exampleFormControlSelect1" required>
                    <option value="">Silahkan pilih</option>
                    <?php foreach ($action_button as $data) : ?>
                        <option value="<?= $data['id_actionbutton']; ?>"><?= $data['call_action_button'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Simpan Data</button>
        </form>

    </div>
</div>