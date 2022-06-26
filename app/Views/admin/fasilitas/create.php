<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
<!-- Mulai disini -->
<h1>Tambah Fasilitas</h1>
<div class="col-6">
    <form action="/admin/savefasilitas" method="POST">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>" name="nama_barang">
            <div class="invalid-feedback">
                <?= $validation->getError('nama_barang'); ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="nama_lab" class="form-label">Nama Lab</label>
            <select class="form-select" name="id_lab">
                <?php
                foreach ($list_lab as $item) { ?>
                    <option value=<?= $item['id_lab'] ?>><?= $item['nama_lab'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" class="form-control <?= ($validation->hasError('quantity')) ? 'is-invalid' : ''; ?>" name="quantity">
            <div class="invalid-feedback">
                <?= $validation->getError('quantity'); ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php echo $this->endSection(); ?>