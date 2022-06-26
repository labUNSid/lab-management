$(document).on('click', '.btn-hapus', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Yakin Untuk menghapus?',
        text: "Data yang dihapus tidak bisa dikembalikan!!!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
})

$(document).ready(function() {
    $('#tampilres').DataTable();
});