<?= $this->extend('template/member/layout'); ?>

<?= $this->section('kontainer'); ?>
<!-- Mulai disini -->
<h1>Reservasi</h1>
<a href="/user/createreservasi" class="btn btn-primary">Reservasi</a>
<div class="row mt-3">
    <div class="col-10">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lab</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu Awal</th>
                    <th scope="col">Waktu Akhir</th>
                    <th scope="col">Status Peminjaman</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_reservasi as $list) { ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $list['nama_lab']; ?></td>
                        <td><?= date("d-m-Y", strtotime($list['waktu_awal'])); ?></td>
                        <td><?= date("H:i", strtotime($list['waktu_awal'])); ?></td>
                        <td><?= date("H:i", strtotime($list['waktu_akhir'])); ?></td>
                        <td><span class="<?= $list['is_accept'] == 0 ? "badge rounded-pill bg-warning" : "badge rounded-pill bg-success"; ?>"><?= $list['is_accept'] == 0 ? "Process" : "Approved"; ?></span></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php echo $this->endSection(); ?>