<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="/img/icon/ico.ico" />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Manajemen LAB</title>

    <link href="/assets/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- datatables -->
  <link href=" <?= base_url('datatables/datatables.min.css'); ?> " />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
</head>

<body>
    <div class="wrapper">
        <?= $this->include('template/admin/navigasi'); ?>
        <main class="content">
            <?= $this->renderSection('kontainer'); ?>
        </main>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <a class="text-muted" href="https://Manajemen-lab.oi/" target="_blank"><strong>Manajemen Lab</strong></a> &copy;
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="/assets/js/app.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- datatables -->
    <script src=" <?= base_url('datatables/datatables.min.js'); ?> "></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(function() {
            <?php if (session()->has("pesan")) { ?>
                Swal.fire({
                    icon: 'success',
                    text: '<?= session("pesan"); ?>'
                })
            <?php } ?>
        });

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
            $('#datafasilitas').DataTable();
            });
        
        $(document).ready(function() {
            $('#datalab').DataTable();
            });

        $(document).ready(function() {
            $('#datauser').DataTable();
            });

        $(document).ready(function() {
            $('#datareservasi').DataTable();
            });
            

    </script>
</body>

</html>