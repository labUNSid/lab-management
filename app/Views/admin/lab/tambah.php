<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h2>Tambah Lab</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="/admin/savelab" method="post">
                            <?= csrf_field(); ?>
                            <div class="row mb-8">
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
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php echo $this->endSection(); ?>