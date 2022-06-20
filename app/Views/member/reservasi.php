<?= $this->extend('template/member/layout'); ?>

<?= $this->section('kontainer'); ?>
<!-- Mulai disini -->
<h1>Reservasi</h1>
<div class="row">
    <div class="col-8">
        <table class="table">
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
                <tr>
                    <th scope="row">1</th>
                    <td>Jaringan</td>
                    <td>19 Juni 2022</td>
                    <td>14.00</td>
                    <td>16.00</td>
                    <td><span class="badge rounded-pill bg-success">Approved</span></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jaringan</td>
                    <td>19 Juni 2022</td>
                    <td>13.00</td>
                    <td>15.00</td>
                    <td><span class="badge rounded-pill bg-danger">Rejected</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php echo $this->endSection(); ?>