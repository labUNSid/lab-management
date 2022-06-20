<!DOCTYPE html>
<html lang="en">

<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
<h1> Laboratorium </h1>
<a href="/admin/createlab" id="tambah" class="btn btn-rounded btn-success mb-3">Tambah Lab</a>

<table id="datatable" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Harga Lab</th>
            <th>Nama Lab</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($list as $item) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $item['nama_lab'] ?></td>
                <td><?= $item['harga_lab'] ?></td>
                <td>
                    <a href="/admin/detaillab/<?=$item['id_lab']?>" class="btn btn-success">Detail</a>
                    
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<?php echo $this->endSection(); ?>

</body>
</html>

