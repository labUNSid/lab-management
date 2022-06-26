<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>

<div class="row">
    <div class="col-6">
        <h1>Edit Barang</h1>
        <div class="card">
            <div class="card-body">
                <!-- isi nya -->
                <form action="/admin/updatefasilitas/<?= $list['id_barang']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="nama barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" value="<?= $list['nama_barang']; ?>" name="nama_barang">
                    </div>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Nama Lab</label>
                        <select id="disabledSelect" class="form-select" name="id_lab">
                            <option value="<?= $list['id_lab']; ?>"><?= $list['nama_lab']; ?></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jumlah Barang</label>
                        <input type="text" class="form-control" value="<?= $list['quantity']; ?>" name="quantity">
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary mb-4">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>