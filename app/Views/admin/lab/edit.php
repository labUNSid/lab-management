
<!--Main layout-->

    <div class="container pt-4">
        <!-- Section: Main chart -->
        <section class="mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h2>Tambah Anggota</h2>
                        <form action="/admin/updatelab" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="nama_lab">Nama lab</label>
                                        <input type="text" id="nama_lab" name="nama_lab" value=" <?= $list[0]['nama_lab'] ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="harga_lab">Harga lab</label>
                                        <input type="text" id="harga_lab" name="harga_lab" value=" <?= $list[0]['harga_lab'] ?>"  class="form-control" />
                                    </div>
                                </div>
                                <button type="submit" id="submit" class="btn btn-primary mb-4">Update Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

