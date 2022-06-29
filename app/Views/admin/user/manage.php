<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
<h1>Daftar User</h1>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">

                <table id="tampilres" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
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
                                <td><?= $item['nama'] ?></td>
                                <td><?= $item['email'] ?></td>
                                <td><?= $item['member'] ?></td>
                                <td> <img src="/img/profile/<?= $item['avatar']; ?>" class="img-rounded" alt="Responsive image" width="75"> </td>
                                <td> <?= ($item['is_active'] == '0' ? '<span class="badge bg-danger">Belum Tervirifikasi</span>' : '<span class="badge bg-success">Terverifikasi</span>'); ?></td>
                                <td>
                                    <a href="/admin/detailuser/<?= $item['id_user'] ?>" class="btn btn-primary">Detail</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php echo $this->endSection(); ?>