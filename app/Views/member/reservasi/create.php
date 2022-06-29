<?= $this->extend('template/member/layout'); ?>

<?= $this->section('kontainer'); ?>
<!-- Mulai disini -->
<h1>Buat Reservasi</h1>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <form action="/user/savereservasi" method="POST">
                    <div class="mb-3">
                        <label for="id_lab" class="form-label">Nama Laboratorium</label>
                        <select class="form-select <?= ($validation->hasError('id_lab')) ? 'is-invalid' : ''; ?>" name="id_lab">
                            <option></option>
                            <?php
                            foreach ($list_lab as $item) { ?>
                                <option value=<?= $item['id_lab'] ?>><?= $item['nama_lab'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_lab'); ?>
                        </div>
                    </div>
                    <input type="hidden" value="<?= $listc[0]['id_user']; ?>" name="id_user">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Pemesanan</label>
                        <input type="date" class="form-control" min="<?= date("Y-m-d", strtotime('+2 day')); ?>" max="<?= date("Y-m-d", strtotime('+14 day')); ?>" name="tanggal">

                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Jam Awal</label>
                        <input type="time" min="07:00" max="20:00" step="3600" class="form-control <?= ($validation->hasError('jam_awal')) ? 'is-invalid' : ''; ?>" name="jam_awal">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jam_awal'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Jam Akhir</label>
                        <input type="time" min="08:00" max="21:00" step="3600" class="form-control <?= ($validation->hasError('jam_akhir')) ? 'is-invalid' : ''; ?>" name="jam_akhir">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jam_akhir'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>