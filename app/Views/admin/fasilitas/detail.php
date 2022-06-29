<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
<h1>Detail Fasilitas</h1>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <!-- isi nya -->
                <table class="table table-striped">
                    <tr>
                        <td>Nama Lab</td>
                        <td><?= $list['nama_lab']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Barang</td>
                        <td><?= $list['nama_barang']; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Barang</td>
                        <td><?= $list['quantity']; ?></td>
                    </tr>
                </table>
                <a href="/admin/editfasilitas/<?= $list['id_barang'] ?>" class="btn btn-primary">Edit</a>
                <a href="/admin/deletefasilitas/<?= $list['id_barang'] ?>" class="btn btn-danger btn-hapus">Hapus</a>
            </div>
        </div>
    </div>
</div>


<?php echo $this->endSection(); ?>