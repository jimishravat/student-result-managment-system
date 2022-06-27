<?php
include("init.php");
session_start();
if ($_SESSION['is_logged'] == false) {
    header('Location: ./login.php');
}

$no_of_classes = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `course`"));
$no_of_students = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `student`"));
$no_of_result = mysqli_fetch_array(mysqli_query($conn, "select (select count(*) from sem11)+(select count(*) from sem31)+(select count(*) from sem12)+(select count(*) from sem32) as total_count;"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="normalize.css">
    <title>Dashboard</title>
    <style>
        .main {
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 7% 20% 0 20%;
        }
    </style>
</head>

<body>

   

    <?php
    include('./nav.php');
    ?>

    <div class="main">
        <?php
        echo '<p>Number of classes:' . $no_of_classes[0] . '</p>';
        echo '<p>Number of students:' . $no_of_students[0] . '</p>';
        echo '<p>Number of results:' . $no_of_result[0] . '</p>';
        ?>
    </div>


</body>

</html>