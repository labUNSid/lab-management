<a href="/admin/createlab" id="tambah" class="btn btn-rounded btn-success mb-3">Tambah Anggota</a>

<table id="datatable" class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Harga Lab</th>
            <th>Nama Lab</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($list as $item) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $item['nama_lab'] ?></td>
                <td><?= $item['harga_lab'] ?></td>
                <td>
                    <a class="btn btn-success" href="#/<?= $item['id_lab'] ?>" class="btn btn-success">Detail</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>