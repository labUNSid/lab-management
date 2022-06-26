<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>    

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td>ID Role</td>
                                <td> <?= $list[0]['id_role'] ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td> <?= $list[0]['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td> <?= $list[0]['harga_lab'] ?></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td> <?= $list[0]['password'] ?></td>
                            </tr>
                            <tr>
                                <td>Member</td>
                                <td> <?= $list[0]['harga_lab'] ?></td>
                            </tr>
                            <tr>
                                <td>Avatar</td>
                                <td> <?= $list[0]['avatar'] ?></td>
                            </tr>
                            <tr>
                                <td>Is Active</td>
                                <td> <?= $list[0]['harga_lab'] ?></td>
                            </tr>
                        </table>
                            <a href="/admin/edituser/<?= $list[0]['id_user'] ?>" class="btn btn-primary">Edit</a>
                            <a href="/admin/deleteuser/<?= $list[0]['id_user'] ?>" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- <script>
            function hapus(id_lab) {
                Swal.fire({
                title: 'Are you sure?',
                text: `Apakah Anda yakin akan menghapus data dengan ID=${id_lab}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )    
                }
                })
        }
        </script> -->
<?php echo $this->endSection(); ?>