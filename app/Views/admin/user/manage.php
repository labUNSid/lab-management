<!DOCTYPE html>
<html lang="en">

<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
<h1> User </h1>
<a href="/admin/createuser" id="tambah" class="btn btn-rounded btn-success mb-3">Tambah Lab</a>

<table id="datatable" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Role</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th>Member</th>
            <th>Avatar</th>
            <th>Is Active</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($list as $item) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $item['id_role'] ?></td>
                <td><?= $item['nama'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= $item['password'] ?></td>
                <td><?= $item['member'] ?></td>
                <td><?= $item['avatar'] ?></td>
                <td><?= $item['is_active'] ?></td>
                <td>
                    <a href="/admin/detailuser/<?=$item['id_user']?>" class="btn btn-success">Detail</a>
                    
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<?php echo $this->endSection(); ?>

</body>
</html>

