<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
        <div class = "row">
            <div class="col-6">
            <h1>Tambah Lab</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/savelab" method="post">
                            <?= csrf_field(); ?>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label" for="nl">Nama Lab</label>
                                        <input type="text" id="nl" name="nama_lab" class="form-control" required />         
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label" for="hl">Harga Lab</label>
                                        <input type="text" id="hl" name="harga_lab" class="form-control" required />
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary mb-4">Tambah Data</button>
                                </div>
                        </form>
                    </div>
                </div>
            <?php echo $this->endSection(); ?>