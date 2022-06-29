<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>    

        <div class="row">
            <div class="col-6">
            <h1>Detail Lab</h1>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td>Nama Lab</td>
                                <td> <?= $list[0]['nama_lab'] ?></td>
                            </tr>
                            <tr>
                                <td>Harga Lab</td>
                                <td> <?= $list[0]['harga_lab'] ?></td>
                            </tr>
                        </table>
                            <a href="/admin/editlab/<?= $list[0]['id_lab'] ?>" class="btn btn-primary">Edit</a>
                            <a href="/admin/deletelab/<?= $list[0]['id_lab'] ?>" class="btn btn-danger btn-hapus">Hapus</a>
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