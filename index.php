<?php session_start();
include("connect.php");
$re = "SELECT * FROM warehouse;";
$sell = mysqli_query($conn, $re);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cloud 9 Systems</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php
                if (isset($_SESSION['status'])) {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Insert Multiple Data <h6>Coded by <a target="_blank" style="text-decoration: none;"
                                    href="https://cloud9sellingsoftware.herokuapp.com/">Cloud 9 Selling Software</a>
                            </h6>
                            <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary">ADD MORE</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST">

                            <div class="main-form mt-3 border-bottom">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">Name</label>
                                            <input type="text" name="name[]" class="form-control" required
                                                placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">Location</label>
                                            <input type="text" name="location[]" class="form-control" required
                                                placeholder="Enter Location">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="paste-new-forms"></div>

                            <button type="submit" name="save_multiple_data" class="btn btn-primary">Save Multiple
                                Data</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <br>

        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $fo = 1;
                while ($ret = mysqli_fetch_array($sell)) {
                    // echo $ret;
                    $id = $ret['id'];
                    $fname = $ret['name'];
                    $sname = $ret['location'];
                ?>

                <tr>
                    <td> <?php echo $fo++; ?></td>
                    <td> <?php echo  " $fname" ?> </td>
                    <td> <?php echo  " $sname" ?> </td>


                </tr>

                <?php
                }

                ?>


            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {

        $(document).on('click', '.remove-btn', function() {
            $(this).closest('.main-form').remove();
        });

        $(document).on('click', '.add-more-form', function() {
            $('.paste-new-forms').append('<div class="main-form mt-3 border-bottom">\
                                <div class="row">\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">Name</label>\
                                            <input type="text" name="name[]" class="form-control" required placeholder="Enter Name">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">Location</label>\
                                            <input type="text" name="location[]" class="form-control" required placeholder="Enter Location">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <br>\
                                            <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>');
        });

    });
    </script>

</body>

</html>