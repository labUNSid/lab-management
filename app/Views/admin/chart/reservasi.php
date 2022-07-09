<?= $this->extend('template/admin/layout'); ?>

<?= $this->section('kontainer'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<h1>Reservasi</h1>

<div class="dropdown mb-3">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Filter
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="#">1 Day</a></li>
        <li><a class="dropdown-item" href="#">1 Week</a></li>
        <li><a class="dropdown-item" href="#">1 Month</a></li>
        <li><a class="dropdown-item" href="#">1 Year</a></li>
    </ul>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <div class="col-8">
                        <canvas id="myChart"></canvas>
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($list_lab as $list) {
                            echo "\"" . $list['nama_lab'] . "\", ";
                        } ?>],
            datasets: [{
                label: 'Data Peminjaman',
                data: [12, 19, 3, 23, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx2 = document.getElementById("myChart2").getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: [<?php foreach ($list_lab as $list) {
                            echo "\"" . $list['nama_lab'] . "\", ";
                        } ?>],
            datasets: [{
                label: 'Data Peminjaman',
                data: [12, 19, 3, 23, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx3 = document.getElementById("myChart3").getContext('2d');
    var myChart3 = new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($list_lab as $list) {
                            echo "\"" . $list['nama_lab'] . "\", ";
                        } ?>],
            datasets: [{
                label: 'Data Peminjaman',
                data: [12, 19, 3, 23, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<?php echo $this->endSection(); ?>