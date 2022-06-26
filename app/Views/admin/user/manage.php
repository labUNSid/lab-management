<!DOCTYPE html>
<html lang="en">

<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
<h1>Daftar User</h1>

<table id="datauser">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Role</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Member</th>
            <th>Avatar</th>
            <th>Aktivasi</th>
            <th>Aksi</th>
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
                <td><?= $item['member'] ?></td>
                <td> <img src="/img/profile/<?= $item['avatar']; ?>" class="img-rounded" alt="Responsive image" width="75"> </td>
                <td> <?= ($item['is_active'] == '0' ? 'Belum Tervirifikasi' : 'Terverifikasi'); ?></td>
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

