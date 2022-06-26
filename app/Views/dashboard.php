
<?= $this->extend('template/guest/layout'); ?>

<?= $this->section('kontainer'); ?>
<!-- Mulai disini -->
<h1>Dashboard Reservasi</h1>
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs mb-3">
                    <a class="nav-link <?= ($tabs == 'all' ? 'active' : ''); ?>" href="/">All</a>
                    <?php
                    foreach ($list_lab as $list) { ?>
                        <li class="nav-item">
                            <a class="nav-link <?= ($tabs == $list['id_lab'] ? 'active' : ''); ?>" href="/home/detailtampil/<?= $list['id_lab']; ?>"><?= $list['nama_lab']; ?></a>
                        </li>
                    <?php } ?>
                </ul>
                <table class="table table-striped" id="tampilres">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lab</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Waktu Mulai</th>
                            <th scope="col">Waktu Akhir</th>
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
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>