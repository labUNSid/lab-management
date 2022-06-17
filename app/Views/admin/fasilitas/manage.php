<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
<!-- Mulai disini -->
<a href="/admin/createfasilitas" class="btn btn-success"><i style="width:18px;height:18px;" class="me-1" data-feather="plus"></i>Tambah Fasilitas</a>
<table class="table table-hover">
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
                    <a href="" class="btn btn-primary">Detail</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php echo $this->endSection(); ?>