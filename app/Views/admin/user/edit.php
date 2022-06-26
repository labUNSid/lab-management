<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>

        <div class="row">
            <div class="col-6">
                <h1>Edit User</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/updateuser/<?= $list[0]['id_user'] ?>" method="post" enctype="multipart/form-data" onsubmit="return submitForm(this);">
                            <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="id_role" class="form-label">Id Role</label>
                                    <select id="id_role" class="form-select" name="id_role">
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <label class="form-label" for="nama">Nama</label>
                                    <input type="text" id="nama" name="nama" value="<?= $list[0]['nama'] ?> " class="form-control" <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>/>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" id="email" name="email" value="<?= $list[0]['email'] ?>" class="form-control" <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>/>
                                </div>
                                    <br>
                                <div class="form-group">
                                <label for="member" class="form-label">Member</label>
                                    <select id="member" class="form-select" name="member">
                                        <option value="civitas">Civitas</option>
                                        <option value="non-civitas">Non Civitas</option>
                                    </select>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <label class="form-label" for="avatar">Avatar</label>
                                    <input type="text" id="avatar" name="avatar" readonly="readonly" value="<?= $list[0]['avatar'] ?>" class="form-control" <?= ($validation->hasError('avatar')) ? 'is-invalid' : ''; ?>/>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <label for="is_active" class="form-label">Aktivasi</label>
                                    <select id="is_active" class="form-select" name="is_active">
                                        <option value="1">Terverifikasi</option>
                                        <option value="2">Belum Terverifikasi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="password" name="password" value="<?= $list[0]['password'] ?>">                       
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