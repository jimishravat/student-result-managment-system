<?php
include('init.php');

session_start();
if ($_SESSION['is_logged'] == false) {
    header('Location: ./login.php');
}

$student_id = "";
$student_name = "";
$current_sem = "";
$academic_year = "";
$s_dept = "";
$total = 0;
$percentage = 0;
$sem11 = 0;
$sem31 = 0;
$sem12 = 0;
$sem32 = 0;
$store_marks = array();
$help_course_query = mysqli_query($conn, "SELECT * FROM course");
while ($y = mysqli_fetch_array($help_course_query)) {
    $courseid_help = $y['course_id'];
    $store_marks["i_$courseid_help"] = "";
    $store_marks["e_$courseid_help"] = "";
    $store_marks["a_$courseid_help"] = "";
}


//helping variable 
$row = "";


//search for the valid student
if (isset($_POST['search-student'])) {
    $student_id = $_POST['student_id'];
    $student_search = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$student_id'");
    $student_row = mysqli_num_rows($student_search);
    if ($student_row == 1) {
        $rec = $student_search->fetch_array();

        $student_name = $rec['s_fname'] . " " . $rec['s_lname'];
        $current_sem = $rec['current_sem'];
        $academic_year = $rec['admin_year'];
        $s_dept = $rec['dept_id'];
        $_SESSION['curr_sem'] = $current_sem;
        $_SESSION['stu_dept'] = $s_dept;
        $_SESSION['stu_id'] = $student_id;
        $_SESSION['ac_year'] = $academic_year;
    }
}

//getting the marks data from the user
if (isset($_POST['add-marks'])) {
    $a = $_SESSION['curr_sem'];
    $b = $_SESSION['stu_dept'];
    $s = $_SESSION['stu_id'];
    $d = $_SESSION['ac_year'];
    ${"sem$a$b"} = 1;
    
    // var_dump($sem31);


    $c_result = mysqli_query($conn, "SELECT * FROM course WHERE sem_offered='$a' AND dept_offered_id='$b'");

    $x = mysqli_num_rows($c_result);




    while ($c = mysqli_fetch_array($c_result)) {

        $courseid = $c['course_id'];

        $store_marks["i_$courseid"] = $_POST["i_$courseid"];
        $store_marks["e_$courseid"] = $_POST["e_$courseid"];
        $store_marks["a_$courseid"] = $_POST["a_$courseid"];
        $total += (int)$store_marks["i_$courseid"] + (int)$store_marks["e_$courseid"] + (int)$store_marks["a_$courseid"];
    }
    $percentage = ($total / 750) * 100;
    if ($sem11 == 1) {
        $q = "INSERT INTO `sem11`(`s_id`, `ac_year`, `i_1CP01`, `e_1CP01`, `a_1CP01`, `i_1CP02`, `e_1CP02`, `a_1CP02`, `i_1CP03`, `e_1CP03`, `a_1CP03`, `i_1CP04`, `e_1CP04`, `a_1CP04`, `i_1CP05`, `e_1CP05`, `a_1CP05`, `total`, `percentage`) VALUES ('$s','$d'," . $store_marks['i_1CP01'] . "," . $store_marks['e_1CP01'] . "," . $store_marks['a_1CP01'] . "," . $store_marks['i_1CP02'] . "," . $store_marks['e_1CP02'] . "," . $store_marks['a_1CP02'] . "," . $store_marks['i_1CP03'] . "," . $store_marks['e_1CP03'] . "," . $store_marks['a_1CP03'] . "," . $store_marks['i_1CP04'] . "," . $store_marks['e_1CP04'] . "," . $store_marks['a_1CP04'] . "," . $store_marks['i_1CP05'] . "," . $store_marks['e_1CP05'] . "," . $store_marks['a_1CP05'] . ",'$total', '$percentage')";
        $r = mysqli_query($conn, $q);
        if ($r) {
            echo '<script>alert("Done")</script>';
        }
    } else if ($sem31 == 1) {
        $q = "INSERT INTO `sem31`(`s_id`, `ac_year`, `i_3CP201`, `e_3CP201`, `a_3CP201`, `i_3CP202`, `e_3CP202`, `a_3CP202`, `i_3CP203`, `e_3CP203`, `a_3CP203`, `i_3CP204`, `e_3CP204`, `a_3CP204`, `i_3CPHS02`, `e_3CPHS02`, `a_3CPHS02`, `total`, `percentage`) VALUES ('$s','$d'," . $store_marks['i_3CP201'] . "," . $store_marks['e_3CP201'] . "," . $store_marks['a_3CP201'] . "," . $store_marks['i_3CP202'] . "," . $store_marks['e_3CP202'] . "," . $store_marks['a_3CP202'] . "," . $store_marks['i_3CP203'] . "," . $store_marks['e_3CP203'] . "," . $store_marks['a_3CP203'] . "," . $store_marks['i_3CP204'] . "," . $store_marks['e_3CP204'] . "," . $store_marks['a_3CP204'] . "," . $store_marks['i_3CPHS02'] . "," . $store_marks['e_3CPHS02'] . "," . $store_marks['a_3CPHS02'] . ",'$total', '$percentage')";
        $r = mysqli_query($conn, $q);
        if ($r) {
            echo '<script>alert("Done")</script>';
        }
    } else if ($sem12 == 1) {
        $q = "INSERT INTO `sem12`(`s_id`, `ac_year`, `i_1EL01`, `e_1EL01`, `a_1EL01`, `i_1EL02`, `e_1EL02`, `a_1EL02`, `i_1EL03`, `e_1EL03`, `a_1EL03`, `i_1EL04`, `e_1EL04`, `a_1EL04`, `i_1EL05`, `e_1EL05`, `a_1EL05`, `total`, `percentage`) VALUES ('$s','$d'," . $store_marks['i_1EL01'] . "," . $store_marks['e_1EL01'] . "," . $store_marks['a_1EL01'] . "," . $store_marks['i_1EL02'] . "," . $store_marks['e_1EL02'] . "," . $store_marks['a_1EL02'] . "," . $store_marks['i_1EL03'] . "," . $store_marks['e_1EL03'] . "," . $store_marks['a_1EL03'] . "," . $store_marks['i_1EL04'] . "," . $store_marks['e_1EL04'] . "," . $store_marks['a_1EL04'] . "," . $store_marks['i_1EL05'] . "," . $store_marks['e_1EL05'] . "," . $store_marks['a_1EL05'] . ",'$total', '$percentage')";
        $r = mysqli_query($conn, $q);
        if ($r) {
            echo '<script>alert("Done")</script>';
        }
    } else if ($sem32 == 1) {
        $q = "INSERT INTO `sem32`(`s_id`, `ac_year`, `i_3EL02`, `e_3EL02`, `a_3EL02`, `i_3EL03`, `e_3EL03`, `a_3EL03`, `i_3EL04`, `e_3EL04`, `a_3EL04`, `i_3EL05`, `e_3EL05`, `a_3EL05`, `i_3EL06`, `e_3EL06`, `a_3EL06`, `total`, `percentage`) VALUES ('$s','$d'," . $store_marks['i_3EL02'] . "," . $store_marks['e_3EL02'] . "," . $store_marks['a_3EL02'] . "," . $store_marks['i_3EL03'] . "," . $store_marks['e_3EL03'] . "," . $store_marks['a_3EL03'] . "," . $store_marks['i_3EL04'] . "," . $store_marks['e_3EL04'] . "," . $store_marks['a_3EL04'] . "," . $store_marks['i_3EL05'] . "," . $store_marks['e_3EL05'] . "," . $store_marks['a_3EL05'] . "," . $store_marks['i_3EL06'] . "," . $store_marks['e_3EL06'] . "," . $store_marks['a_3EL06'] . ",'$total', '$percentage')";
        $r = mysqli_query($conn, $q);
        if ($r) {
            echo '<script>alert("Done")</script>';
        }
    }

    // $q = "INSERT INTO `temp`(`CP01_int`, `CP01_ext`, `CP01_att`, `CP02_int`, `CP02_ext`, `CP02_att`) VALUES ('" . $store_marks['i_CP01'] . "','" . $store_marks['e_CP01'] . "','" . $store_marks['a_CP01'] . "','" . $store_marks['i_CP02'] . "','" . $store_marks['e_CP02'] . "','" . $store_marks['a_CP02'] . "')";
    // $r = mysqli_query($conn, $q);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./css/form.css">
    <title>Dashboard</title>
</head>

<body>

    
    <?php include('nav.php') ?>

    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend>Enter Student ID</legend>
                <input type="text" name="student_id" placeholder="Enter Student ID">
                <input type="submit" value="Submit" name="search-student">
            </fieldset>
        </form>
        <div>
            <p> Student ID : <span class=""><?php echo $student_id ?></span></p>
            <p>Student Name : <span class=""><?php echo $student_name ?></span></p>
            <p>Current Semester : <span class=""><?php echo $current_sem ?> </span></p>
            <p>Academic Year : <span class=""><?php echo $academic_year ?></span></p>

            <?php if ($s_dept != "") {
                $result = mysqli_query($conn, "SELECT dept_name FROM department WHERE dept_id = '$s_dept'");
                $row = mysqli_fetch_array($result);
            } ?>
            <p>Department : <span class=""><?php if ($s_dept != "") {
                                                echo $row['dept_name'];
                                            } ?></span></p>


        </div>
        <form action="" method="post">
            <fieldset>
                <legend>Enter Marks</legend>

                <!-- fetching the courses that are offered to particular student -->
                <?php
                $course_result = mysqli_query($conn, "SELECT * FROM course WHERE sem_offered='$current_sem' AND dept_offered_id='$s_dept'");
                while ($c_row = mysqli_fetch_array($course_result)) {
                ?>
                    <label><?php echo $c_row['course_id'] ?></label> : <label><?php echo $c_row['course_name'] ?></label>
                    <div class="course">
                        <input type="text" class="cmarks" placeholder="Internal Marks out 40" name="<?php echo 'i_' . $c_row['course_id']  ?>">
                        <input type="text" class="cmarks" placeholder="External Marks out 100 " name="<?php echo 'e_' . $c_row['course_id']  ?>">
                        <input type="text" class="cmarks" placeholder="Attendence out of 10" name="<?php echo 'a_' . $c_row['course_id'] ?>">
                    </div>

                <?php } ?>

                <input type="submit" value="Submit Marks" name="add-marks">

            </fieldset>
        </form>
    </div>

</body>

</html>