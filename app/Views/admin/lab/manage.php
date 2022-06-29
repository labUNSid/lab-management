<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
<h1> Daftar Laboratorium </h1>
<a href="/admin/createlab" id="tambah" class="btn btn-rounded btn-success mb-3">Tambah Lab</a>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table id="tampilres" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lab</th>
                            <th>Harga Lab</th>
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
                                    <a href="/admin/detaillab/<?= $item['id_lab'] ?>" class="btn btn-success">Detail</a>
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