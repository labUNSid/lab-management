<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
<h1>Manage Reservasi</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped text-center">
                    <thead>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Labolatorium</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Konfirmasi Reservasi</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list as $list) { ?>
                            <tr>
                                <form id="formres<?= $list['id']; ?>" action="/admin/updatereservasi/<?= $list['id']; ?>">
                                    <td><?= $no++; ?></td>
                                    <td><?= $list['nama']; ?></td>
                                    <td><?= $list['nama_lab']; ?></td>
                                    <td><?= $list['waktu_awal']; ?></td>
                                    <td><?= $list['waktu_akhir']; ?></td>
                                    <td>
                                        <!-- <input type="checkbox" value="1"> -->
                                        <input type="hidden" name="is_accept" value="0">
                                        <input class="form-check-input" type="checkbox" onchange="document.getElementById('formres<?= $list['id']; ?>').submit()" value="1" name="is_accept" <?= ($list['is_accept'] == '1' ? 'checked' : ''); ?>>
                                    </td>
                                    <input type="hidden" name="id_user" value="<?= $list['id_user']; ?>">
                                    <input type="hidden" name="id_lab" value="<?= $list['id_lab']; ?>">
                                    <input type="hidden" name="waktu_awal" value="<?= $list['waktu_awal']; ?>">
                                    <input type="hidden" name="waktu_akhir" value="<?= $list['waktu_akhir']; ?>">
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>