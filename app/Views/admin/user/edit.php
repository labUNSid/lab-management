<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success text-center" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                    <?php endif; ?>

                    <div class="card-body">
                        
                        <form action="/admin/updatelab/<?= $list[0]['id_user'] ?>" method="post" enctype="multipart/form-data" onsubmit="return submitForm(this);">
                            <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label class="form-label" for="nama_lab">ID Role</label>
                                    <input type="text" id="id_role" name="id_role" value="<?= $list[0]['id_role'] ?>" class="form-control <?= ($validation->hasError('id_role')) ? 'is-invalid' : ''; ?>"  value="<?= old('id_role'); ?>" />
                                    <div class="invalid-feedback"><?= $validation->getError('id_role'); ?></div>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <label class="form-label" for="nama">Nama</label>
                                    <input type="text" id="nama" name="nama" value="<?= $list[0]['nama'] ?>" class="form-control" <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>/>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" id="email" name="email" value="<?= $list[0]['email'] ?>" class="form-control" <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>/>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="text" id="password" name="password" value="<?= $list[0]['password'] ?>" class="form-control" <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>/>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <label class="form-label" for="member">Member</label>
                                    <input type="text" id="member" name="member" value="<?= $list[0]['member'] ?>" class="form-control" <?= ($validation->hasError('member')) ? 'is-invalid' : ''; ?>/>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <label class="form-label" for="avatar">Avatar</label>
                                    <input type="text" id="avatar" name="avatar" value="<?= $list[0]['avatar'] ?>" class="form-control" <?= ($validation->hasError('avatar')) ? 'is-invalid' : ''; ?>/>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <label class="form-label" for="is_active">Is Active</label>
                                    <input type="text" id="is_active" name="is_active" value="<?= $list[0]['is_active'] ?>" class="form-control" <?= ($validation->hasError('is_active')) ? 'is-invalid' : ''; ?>/>
                                </div>
                                    <br>
                                <button type="submit" id="submit" class="btn btn-primary mb-4">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    

<script>


</script>

<?php echo $this->endSection(); ?>