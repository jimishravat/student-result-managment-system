<?php
include("init.php");
$sem_fetch = "";
$sem_curr = "";
$s_id = "";
$s_dept = "";
$name = "";
$total = "";
$percentage = "";
$sem11 = "sem11";
$sem31 = "sem31";
$sem12 = "sem12";
$sem32 = "sem32";
$store_marks = array();

$help_course_query = mysqli_query($conn, "SELECT * FROM course");
while ($y = mysqli_fetch_array($help_course_query)) {
    $courseid_help = $y['course_id'];
    $store_marks["i_$courseid_help"] = "";
    $store_marks["e_$courseid_help"] = "";
    $store_marks["a_$courseid_help"] = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css" media="all">
    <title>Result</title>
</head>

<body>
    <?php

    if (isset($_GET['semester'], $_GET['stu_id'])) {
        $s_id = $_GET['stu_id'];
        $sem_fetch = $_GET['semester'];
    };


    $stu_details = mysqli_query($conn, "SELECT * FROM `student` WHERE `student_id`='$s_id' ");
    while ($row = mysqli_fetch_assoc($stu_details)) {
        $sem_curr = $row['current_sem'];
        $name = $row['s_fname'] . " " . $row['s_lname'];
        $s_dept = $row['dept_id'];
    }
    if ($sem_fetch > $sem_curr) {
        echo "<script>alert('Sorry!!! No Result Exist ')</script>";
        echo '<script>window.location.href = "login.php";</script>';
    }

    $sem_help = ${"sem$sem_fetch$s_dept"};

    $result_sql = mysqli_query($conn, "SELECT * FROM `$sem_help` WHERE `s_id`='$s_id' ");
    $course_result = mysqli_query($conn, "SELECT * FROM course WHERE sem_offered='$sem_fetch' AND dept_offered_id='$s_dept'");
    // var_dump($course_result);
    if (mysqli_num_rows($result_sql) == 0) {
        echo "<script>alert('Sorry!!! No Result Exist ')</script>";
        exit();
    }
    while ($row1 = mysqli_fetch_array($result_sql)) {
        while ($row2 = mysqli_fetch_array($course_result)) {
            $courseid = $row2['course_id'];
            $store_marks["i_$courseid"] = $row1["i_$courseid"];
            $store_marks["e_$courseid"] = $row1["e_$courseid"];
            $store_marks["a_$courseid"] = $row1["a_$courseid"];
        }
    }
    // var_dump($store_marks);

    ?>

    <div class="container">
        <div class="details">
            <table>
                <tr>
                    <th id="t"> Student ID </th>
                    <td> <?php echo $s_id; ?> </td>
                </tr>
                <tr>
                    <th id="t"> Name </th>
                    <td> <?php echo $name ?></td>
                </tr>
                <tr>
                    <th id="t"> Semester </th>
                    <td> <?php echo $sem_fetch; ?> </td>
                </tr>
            </table>

        </div>

        <div class="main">
            <div class="result_table">

                <table>
                    <tr>
                        <td id="t">Subject</td>
                        <td id="t">Internal</td>
                        <td id="t">External</td>
                        <td id="t">Attendence</td>

                    </tr>
                    <?php
                    $course_result1 = mysqli_query($conn, "SELECT * FROM course WHERE sem_offered='$sem_fetch' AND dept_offered_id='$s_dept'");
                    $course_result2 = mysqli_query($conn, "SELECT * FROM course WHERE sem_offered='$sem_fetch' AND dept_offered_id='$s_dept'");

                    while ($h = mysqli_fetch_array($course_result1)) {
                        while ($j = mysqli_fetch_array($course_result2)) {
                            $courseid1 = $j['course_id'];

                    ?>
                            <tr>
                                <td><?php echo $h['course_id'] ?></td>
                                <td><?php echo $store_marks["i_$courseid1"] ?></td>
                                <td><?php echo $store_marks["e_$courseid1"] ?></td>
                                <td><?php echo $store_marks["a_$courseid1"] ?></td>
                            </tr>

                    <?php }
                    } ?>
                </table>
            </div>

            <div class="result_sum">
                <div class="result">
                    <?php
                    $result_sql1 = mysqli_query($conn, "SELECT * FROM `$sem_help` WHERE `s_id`='$s_id' ");

                    while ($row3 = mysqli_fetch_array($result_sql1)) {;
                    ?>
                        <?php echo '<p>Total Marks:&nbsp' . $row3['total'] . '</p>'; ?>
                        <?php echo '<p>Percentage:&nbsp' . $row3['percentage'] . '%</p>'; ?>

                    <?php } ?>
                </div>
            </div>
        </div>





    </div>
    <div class="button" >
        <input class=" search_button" type="submit" onclick="window.print()" value="Print">
        <input class=" search_button" type="submit" onclick="window.location.href = './index.html';" value="Home">
        <!-- <button onclick="window.print()">Print Result</button> -->
    </div>
</body>

</html>