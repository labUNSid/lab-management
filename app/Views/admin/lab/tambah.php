            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong>Lab</strong>PTIK</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h2>Tambah Anggota</h2>
                        <form action="savelab" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="nd" name="nama_lab" class="form-control" required />
                                        <label class="form-label" for="nama_lab">Nama Lab</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="nb" name="harga_lab" class="form-control" required />
                                        <label class="form-label" for="harga_lab">Harga Lab</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mb-4">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>