<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
<h1>Detail Fasilitas</h1>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="col-4">
        <div class="alert alert-primary alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
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
                        <td>Nama Lab</td>
                        <td><?= $list['quantity']; ?></td>
                    </tr>
                </table>
                <a href="/admin/editfasilitas/<?= $list['id_barang'] ?>" class="btn btn-primary">Edit</a>
                <a href="/admin/deletefasilitas/<?= $list['id_barang'] ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>


<?php echo $this->endSection(); ?>