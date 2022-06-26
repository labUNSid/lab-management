<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>

        <div class="row">
            <div class="col-6">
            <h1>Edit Lab</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/updatelab/<?= $list[0]['id_lab'] ?>" method="post" enctype="multipart/form-data" onsubmit="return submitForm(this);">
                            <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label class="form-label" for="nama_lab">Nama lab</label>
                                    <input type="text" id="nama_lab" name="nama_lab" value="<?= $list[0]['nama_lab'] ?>" class="form-control <?= ($validation->hasError('nama_lab')) ? 'is-invalid' : ''; ?>"  />
                                    <div class="invalid-feedback"><?= $validation->getError('nama_lab'); ?></div>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <label class="form-label" for="harga_lab">Harga lab</label>
                                    <input type="text" id="harga_lab" name="harga_lab" value="<?= $list[0]['harga_lab'] ?>" class="form-control" <?= ($validation->hasError('harga_lab')) ? 'is-invalid' : ''; ?>/>
                                </div>
                                    <br>
                                <button type="submit" id="submit" class="btn btn-primary mb-4">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php echo $this->endSection(); ?>