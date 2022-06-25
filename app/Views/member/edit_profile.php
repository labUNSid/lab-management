
<?= $this->extend('template/member/layout'); ?>

<?= $this->section('kontainer'); ?>

        <div class="row">
            <div class="col-6">
            <h1>Edit Profile</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="/user/update" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>    
                            <input type="hidden" name="id_user" value="<?= $listc[0]['id_user']; ?>">
                            <input type="hidden" name="id_role" value="<?= $listc[0]['id_role']; ?>">
                            <input type="hidden" name="password" value="<?= $listc[0]['password']; ?>">
                            <input type="hidden" name="member" value="<?= $listc[0]['member']; ?>">
                            <input type="hidden" name="is_active" value="<?= $listc[0]['is_active']; ?>">
                            <input type="hidden" name="avatar_lama" value="<?= $listc[0]['avatar']; ?>">

                            <div class="form-group">
                                <label class="form-label" for="nama">Nama</label>
                                <input class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="inputName" type="text" name="nama" value="<?= (old('nama')) ? old('nama') : $listc[0]['nama']; ?>">
                                <div class="invalid-feedback"><?= $validation->getError('nama'); ?></div>
                            </div>
                                <br>
                            <div class="form-group">
                                <label class="form-label" for="email">Email address</label>
                                <input class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="inputEmail" type="email" name="email" value="<?= (old('email')) ? old('email') : $listc[0]['email']; ?>">
                                <div class="invalid-feedback"><?= $validation->getError('email'); ?></div>
                            </div>
                                <br>
                            <div class="form-group">
                                <label class="form-label" for="avatar">Ganti foto profil :</label>
                                <input type="file" id="avatar" accept=".png, .jpg, .jpeg" name="avatar" class="form-control" value="<?= ($listc[0]['avatar']) == '' ? old('avatar') : $listc[0]['avatar']; ?>" />
                                
                            </div>
                                <br>
                            <button type="submit" class="btn btn-primary mb-4">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->endSection(); ?>