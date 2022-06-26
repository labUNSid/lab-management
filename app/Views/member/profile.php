<?= $this->extend('template/member/layout'); ?>

<?= $this->section('kontainer'); ?>
<h1>Profile</h1>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <!-- isi nya -->
                <div class="text-center">
                    <img src="/img/profile/<?= $listc[0]['avatar']; ?>" class="img-rounded" alt="Responsive image" width="200">         
                </div>
                <br>
                <table class="table table-striped">
                    <tr>
                        <td>Nama</td>
                        <td><?= $listc[0]['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $listc[0]['email']; ?></td>
                    </tr>
                </table>
                <a href="/user/edit/<?= $listc[0]['id_user'] ?>" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>


<?php echo $this->endSection(); ?>