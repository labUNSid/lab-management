<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?= $this->extend('template/layout'); ?>

<?= $this->section('kontainer'); ?>

<a href="/admin/createlab" id="tambah" class="btn btn-rounded btn-success mb-3">Tambah Anggota</a>

<table id="datatable" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Harga Lab</th>
            <th>Nama Lab</th>
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
                    <a href="/admin/detaillab/<?= $item['id_lab'] ?>" class="btn btn-success">Detail</a>
                    <a href="/admin/editlab/<?= $item['id_lab'] ?>" class="btn btn-info">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<?php echo $this->endSection(); ?>

</body>
</html>

