<?php

include('conf.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Administration Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js" integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Datatables -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.5/fc-4.3.0/fh-3.4.0/datatables.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.5/fc-4.3.0/fh-3.4.0/datatables.min.js"></script>

    <!-- Apex Chart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Dashboard Administration</a>

            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 70px">
        <div class="row mb-3">
            <div class="col-lg-3">
                <div class="card bg-primary mb-2"">
                <div class=" card-body text-white">
                    <p class="h3 text-muted">Earning (Monthly)</p>
                    <p class="h2">RM 5,000</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card bg-secondary mb-2"">
                <div class=" card-body text-white">
                <p class="h3 text-muted">Earning (Annually)</p>
                <p class="h2">RM 50,000</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-danger mb-2"">
                <div class=" card-body text-white">
            <p class="h3 text-muted">Shipping</p>
            <div class="h2">
                <span id="ship_incomp" class="fw-light">0</span>
                /
                <span id="ship_total" class="fw-bold">0</span>
            </div>
        </div>
    </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-success mb-2"">
                <div class=" card-body text-white">
            <p class="h3 text-muted">Task</p>
            <p class="h2">15</p>
        </div>
    </div>
    </div>
    </div>

    <!-- 2nd row - Chart -->
    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header h4">Earning (Monthly)</div>
                <div class="card-body">
                    <div id="chart_line"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header h4">Top Product</div>
                <div class="card-body">
                    <div id="tree_map"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3rd row - Datatables -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header h4">List of Staff</div>
                <div class="card-body">
                    <table id="stf_dt" class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">Salary</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

<script>
    $(document).ready(function() {

        /* ========================================================================== Ni coding utk line chart */
        $.post('api.php?getanual=1', {
            test: 123
        }, function(res) {
            console.log(res)
            var options = {
                series: [{
                    name: "Sales (RM)",
                    data: res.sales
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                // title: {
                //  text: 'Profit Gain Trends by Month',
                //  align: 'left'
                // },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: res.bulan,
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart_line"), options);
            chart.render();
        }, 'json')

        /* ========================================================================== Ni coding utk Tree Map */
        var options = {
            series: [{
                data: [{
                        x: 'New Delhi',
                        y: 218
                    },
                    {
                        x: 'Kolkata',
                        y: 149
                    },
                    {
                        x: 'Mumbai',
                        y: 184
                    },
                    {
                        x: 'Ahmedabad',
                        y: 55
                    },
                    {
                        x: 'Bangaluru',
                        y: 84
                    },
                    {
                        x: 'Pune',
                        y: 31
                    },
                    {
                        x: 'Chennai',
                        y: 70
                    },
                    {
                        x: 'Jaipur',
                        y: 30
                    },
                    {
                        x: 'Surat',
                        y: 44
                    },
                    {
                        x: 'Hyderabad',
                        y: 68
                    },
                    {
                        x: 'Lucknow',
                        y: 28
                    },
                    {
                        x: 'Indore',
                        y: 19
                    },
                    {
                        x: 'Kanpur',
                        y: 29
                    }
                ]
            }],
            legend: {
                show: false
            },
            chart: {
                height: 350,
                type: 'treemap'
            },
            title: {
                text: 'Basic Treemap'
            }
        };

        var chart = new ApexCharts(document.querySelector("#tree_map"), options);
        chart.render();

        /* ========================================================================== Ni coding utk Staff DT */
        $.post('api.php?getstaff=1', {
            test: 123
        }, function(res) {
            console.log(res)
            for (var i = 0; i < res.length; i++) {
                $('#stf_dt tbody').append(`
                <tr>
                    <td>${res[i].first_name}</td>
                    <td>${res[i].last_name}</td>
                    <td>${res[i].phone}</td>
                    <td>${res[i].email}</td>
                    <td>${res[i].salary}</td>
                </tr>
            `)
            }

            new DataTable('#stf_dt')
        }, 'json')

        /* ========================================================================== Real-time Shipping */
        setInterval(function() {
            $.post('api.php?getshipping=1', {}, function(res) {
                $('#ship_incomp').html(res.incomp)
                $('#ship_total').html(res.total)
            }, 'json')
        }, 1000)
        // short-polling

    });
</script>

</html>