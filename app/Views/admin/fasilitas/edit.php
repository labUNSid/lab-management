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
                    <div class="form-group">
                        <label for="nama barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" value="<?= $list['nama_barang']; ?>" name="nama_barang">
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect" class="form-label">Nama Lab</label>
                            <select class="form-select" name="id_lab">
                                <?php
                                    foreach ($list_lab as $item) { ?>
                                    <option value=<?= $item['id_lab'] ?>><?= $item['nama_lab'] ?></option>
                                <?php } ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Jumlah Barang</label>
                        <input type="text" class="form-control" value="<?= $list['quantity']; ?>" name="quantity">
                    </div>
                    <br>
                    <button type="submit" id="submit" class="btn btn-primary mb-4">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>