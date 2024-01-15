<?php
try {
    require "admin_side.php";
    $admin_id = $_SESSION['id'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Approval Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
                <div class="container">
                    <div class=" row justify-content-center m-5">
                        <div class="col-auto">
                            <h3>Vendor Approval</h3>
                        </div>
                    </div>
                    <table class="table table-striped table-hover m-5" id="stf_dt">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js" integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Datatables -->
        <link href="https://cdn.datatables.net/v/bs5/dt-1.13.5/fc-4.3.0/fh-3.4.0/datatables.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://cdn.datatables.net/v/bs5/dt-1.13.5/fc-4.3.0/fh-3.4.0/datatables.min.js"></script>
        <script>
            $.post('api.php', {
                view: 1
            }, function(res) {
                for (var i = 0; i < res.length; i++) {
                    $('#stf_dt tbody').append(`
            <tr>
                <td>${res[i].user_id}</td>
                <td>${res[i].name}</td>
                <td>
            <form action="admin_update_user2.php" method="post">
                <span>
                    <button type="submit" name="update" value="${res[i].user_id}" class="btn btn-primary">Update</button>
                </span>
            </form>
                </td>
            </tr>
        `);
                }
                new DataTable('#stf_dt');
            }, 'json');
        </script>
    </body>

    </html>
<?php
} catch (Throwable $th) {
    echo $th;
}
?>