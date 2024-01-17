<?php
try {
    require "admin_side.php";

    $stmt = $conn->prepare("SELECT COUNT(*) FROM administrator");
    $stmt->execute();
    $result1 = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("SELECT COUNT(*) FROM foodvendor");
    $stmt->execute();
    $result2 = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("SELECT COUNT(*) FROM registereduser");
    $stmt->execute();
    $result3 = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("SELECT COUNT(*) FROM generaluser");
    $stmt->execute();
    $result4 = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js" integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Datatables -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.5/fc-4.3.0/fh-3.4.0/datatables.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.5/fc-4.3.0/fh-3.4.0/datatables.min.js"></script>

    <!-- Apex Chart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-10">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <div class="card bg-danger bg-gradient mb-2 bg-opacity-75">
                            <div class="card-body text-white text-center">
                                <p class="h3 text-black">Number of Administrator</p>
                                <p class="h2"><?php if ($result1['COUNT(*)'] == 0) {
                                                    echo 0;
                                                } else {
                                                    echo $result1['COUNT(*)'];
                                                }; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card bg-secondary bg-gradient mb-2 bg-opacity-75">
                            <div class="card-body text-white text-center">
                                <p class="h3 text-black">Number of Food Vendor</p>
                                <p class="h2"><?php if ($result2['COUNT(*)'] == 0) {
                                                    echo 0;
                                                } else {
                                                    echo $result2['COUNT(*)'];
                                                } ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card bg-info bg-gradient mb-2">
                            <div class="card-body text-white text-center">
                                <p class="h3 text-black">Number of Registered User</p>
                                <p class="h2"><?php if ($result3['COUNT(*)'] == 0) {
                                                    echo 0;
                                                } else {
                                                    echo $result3['COUNT(*)'];
                                                } ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card bg-warning bg-gradient mb-2">
                            <div class="card-body text-white text-center">
                                <p class="h3 text-black">Number of General User</p>
                                <p class="h2"><?php if ($result4['COUNT(*)'] == 0) {
                                                    echo 0;
                                                } else {
                                                    echo $result4['COUNT(*)'];
                                                } ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header h4">Overall User</div>
                            <div class="card-body">
                                <div id="chart1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header h4">Admin Approval</div>
                            <div class="card-body">
                                <div id="chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header h4 bg-info">List of Users</div>
                            <div class="card-body">
                                <table id="table1" class="table table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Usename</th>
                                            <th scope="col">Password</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header h4 bg-info">List of Vendor</div>
                            <div class="card-body">
                                <table id="table2" class="table table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Usename</th>
                                            <th scope="col">Password</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $.post('api.php', {
            chart1: 1
        }, function(res) {
            console.log(res)
            var options = {
                series: res.yaxis,
                labels: ["administrator", "foodvendor", "registereduser", "generaluser"],
                chart: {
                    height: 300,
                    type: 'donut',
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart1"), options);
            chart.render();
        }, 'json');

        $.post('api.php', {
            chart2: 1
        }, function(res) {
            console.log(res);
            array1 = [];
            array2 = [];
            for (var i = 0; i < res.length; i++) {
                array1.push(res[i]['name']);
                array2.push(parseInt(res[i]['number']));
            }
            var options = {
                series: [{
                    data: array2
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: array1,
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart2"), options);
            chart.render();

        }, 'json')

        $.post('api.php', {
            post3: 1
        }, function(res) {
            console.log(res)
            for (var i = 0; i < res.length; i++) {
                $('#table1 tbody').append(`
                <tr>
                    <td>${res[i].id}</td>
                    <td>${res[i].name}</td>
                    <td>${res[i].phoneNum}</td>
                    <td>${res[i].email}</td>
                    <td>${res[i].username}</td>
                    <td>${res[i].password}</td>
                </tr>
            `)
            }

            new DataTable('#table1')
        }, 'json')

        $.post('api.php', {
            posting: 1
        }, function(res) {
            console.log(res)
            for (var i = 0; i < res.length; i++) {
                $('#table2 tbody').append(`
                <tr>
                    <td>${res[i].id}</td>
                    <td>${res[i].name}</td>
                    <td>${res[i].phoneNum}</td>
                    <td>${res[i].email}</td>
                    <td>${res[i].username}</td>
                    <td>${res[i].password}</td>
                </tr>
            `)
            }

            new DataTable('#table2')
        }, 'json')
    </script>
</body>

</html>