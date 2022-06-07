    <div class="container-fluid pt-4">
        <!-- Section: Main chart -->
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong>Lab</strong>PTIK</h5>
                </div>
                <div class="card-body">
                    <h1>Biodata <?= $item['username'] ?></h1>
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-striped">
                                <tr>
                                    <td>Nama Lab</td>
                                    <td> <?= $item['nama_lab'] ?></td>
                                </tr>
                                <tr>
                                    <td>Harga Lab</td>
                                    <td> <?= $item['harga_lab'] ?></td>
                                </tr>
                </div>
            </div>
        </section>
        <!-- Section: Main chart -->  
    </div>