<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
<!-- Mulai disini -->

<h1>Daftar Fasilitas</h1>
<a href="/admin/createfasilitas" class="btn btn-success mb-2"><i style="width:18px;height:18px;" class="me-1" data-feather="plus"></i>Tambah Fasilitas</a>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="col-4">
        <div class="alert alert-primary alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Nama Lab</th>
            <th scope="col">Jumlah Barang</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($list as $item) { ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $item['nama_barang'] ?></td>
                <td><?= $item['nama_lab'] ?></td>
                <td><?= $item['quantity'] ?></td>
                <td>
                    <a href="/admin/detailfasilitas/<?= $item['id_barang']; ?>" class="btn btn-primary">Detail</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php echo $this->endSection(); ?>