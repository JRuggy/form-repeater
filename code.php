<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "multiple_data");

if (isset($_POST['save_multiple_data'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];

    foreach ($name as $index => $names) {
        $s_name = $names;
        $s_location = $location[$index];
        // $s_otherfiled = $empid[$index];

        $query = "INSERT INTO warehouse (name,location) VALUES ('$s_name','$s_location')";
        $query_run = mysqli_query($conn, $query);
    }

    if ($query_run) {
        $_SESSION['status'] = "Multiple Data Inserted Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: index.php");
        exit(0);
    }
}