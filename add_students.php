<?php
include('init.php');

session_start();
if ($_SESSION['is_logged'] == false) {
    header('Location: ./login.php');
}

$student_update = false;
$s_id = "";
$s_fname = "";
$s_lname = "";
$current_sem = "";
$s_dept = "";
$s_mobile = "";
$s_email = "";
$s_addmision_year = "";

// For creating new student information
if (isset($_POST["student-add"])) {
    $s_fname = $_POST["s_fname"];
    $s_lname = $_POST["s_lname"];
    $s_mobile = $_POST["s_mobile"];
    $s_email = $_POST["s_email"];
    $current_sem = $_POST["current_sem"];
    $s_dept = $_POST["s_dept"];
    $s_addmision_year = $_POST['s_addmision_year'];
    //for creating the Unique ID of the Each Students

    generate:
    $number = rand(10, 100);
    //department wise different ID for students

    //for checking the academic year of admision of student
    $year = "";
    if ($s_addmision_year == 2020) {
        $year = 20;
    }
    if ($s_addmision_year == 2021) {
        $year = 21;
    }
    if ($s_addmision_year == 2022) {
        $year = 22;
    }
    //checking the department of the student
    if ($s_dept == 1) {

        $s_id = $year . 'CP' . $number;
    }
    if ($s_dept == 2) {
        $s_id = $year . 'EL' . $number;
    }


    $check = mysqli_query($conn, "SELECT student_id FROM student WHERE student_id='$s_id");
    // $row = mysqli_num_rows($check);
    if ($check) {
        goto generate;
    }


    $result = mysqli_query($conn, "INSERT INTO `student`(`student_id`, `s_fname`, `s_lname`, `mobile`, `email`, `current_sem`, `dept_id`,`admin_year`) VALUES ('$s_id','$s_fname','$s_lname','$s_mobile','$s_email','$current_sem','$s_dept','$s_addmision_year')");
    echo '<script>alert("' . $s_id . '")</script>';
    echo '<script>window.location.href = "add_students.php";</script>';
}

//for updation of the student

if (isset($_GET['student_id_edit'])) {
    $s_id = $_GET['student_id_edit'];
    $student_update = true;
    $record = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$s_id'");
    $row = mysqli_num_rows($record);
    if ($row == 1) {
        $rec = $record->fetch_array();
        $s_fname = $rec['s_fname'];
        $s_lname = $rec['s_lname'];
        $current_sem = $rec['current_sem'];
        $s_dept = $rec['dept_id'];
        $s_mobile = $rec['mobile'];
        $s_email = $rec['email'];
        $s_addmision_year = $rec['admin_year'];
    }
}

//for updation of student data in the database

if (isset($_POST['student-update'])) {
    $s_fname = $_POST["s_fname"];
    $s_lname = $_POST["s_lname"];
    $s_mobile = $_POST["s_mobile"];
    $s_email = $_POST["s_email"];
    $current_sem = $_POST["current_sem"];
    $s_dept = $_POST["s_dept"];
    $s_addmision_year = $_POST['s_addmision_year'];

    $result = mysqli_query($conn, "UPDATE `student` SET `s_fname`='$s_fname',`s_lname`='$s_lname',`mobile`='$s_mobile',`email`='$s_email',`current_sem`='$current_sem',`dept_id`='$s_dept',`admin_year`='$s_addmision_year' WHERE student_id='$s_id'");
    echo '<script>window.location.href = "manage_students.php";</script>';
}
// for deletion of data
if (isset($_GET['student_id_del'])) {
    $stu_id = $_GET['student_id_del'];
    $que = mysqli_query($conn, "DELETE FROM `student` WHERE `student_id`='$stu_id'");
    echo '<script>window.location.href = "manage_students.php";</script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/form.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <title>Add Students</title>
</head>

<body>



    <?php include('nav.php') ?>

    <div class="main">
        <form action="" method="post">
            <fieldset>
                <?php if ($student_update == true) : ?>
                    <legend>Update Student</legend>

                <?php else :  ?>
                    <legend>Add Student</legend>
                <?php endif ?>
                <input type="hidden" name="id" value="<?php echo $s_id; ?>">
                <input type="text" name="s_fname" placeholder="Student First Name" value="<?php echo $s_fname ?>">
                <input type="text" name="s_lname" placeholder="Student Last Name" value="<?php echo $s_lname ?>">
                <input type="tel" name="s_mobile" placeholder="Mobile Number" value="<?php echo $s_mobile ?>">
                <input type="email" name="s_email" placeholder="E-Mail" value="<?php echo $s_email ?>">

                <!-- Semester -->
                <select name="current_sem" placeholder="Current Semester" required>
                    <option selected="selected" disabled>Current Semester</option>

                    <?php for ($x = 1; $x <= 8; $x++) { ?>
                        <option value="<?php echo $x ?>" <?php print($current_sem == $x ? ' selected="selected"' : ""); ?>> <?php echo $x ?> </option>
                    <?php } ?>
                </select>

                <!-- Department -->
                <?php
                $query = "SELECT * FROM department";
                $query_result = mysqli_query($conn, $query);
                ?>
                <select name="s_dept" placeholder="Department" required>
                    <option selected disabled>Select Department</option>
                    <?php
                    while ($row = mysqli_fetch_array($query_result)) {
                        $dept_name = $row['dept_name'];
                        $dept_id = $row['dept_id'];
                    ?>
                        <option value="<?php echo $dept_id ?>" <?php print($s_dept == $dept_id ? ' selected="selected"' : ""); ?>> <?php echo $dept_name ?> </option>
                    <?php
                    }
                    ?>
                </select>

                <!-- Academic Year -->
                <select name="s_addmision_year" placeholder="Academic Year" required>
                    <option selected disabled>Academic Year</option>
                    <?php for ($x = 2020; $x <= 2022; $x++) { ?>
                        <option value="<?php echo $x ?>" <?php print($s_addmision_year == $x ? ' selected="selected"' : ""); ?>> <?php echo $x ?> </option>
                    <?php } ?>

                </select>

                <!-- Submit and Update  -->
                <?php if ($student_update == true) : ?>
                    <input type="submit" class="button" id="submit" name="student-update" value="Update">
                <?php else :  ?>
                    <input type="submit" class="button" id="submit" name="student-add" value="Save">
                <?php endif ?>
            </fieldset>
        </form>
    </div>


</body>

</html>

<?php

if (isset($_POST['student_fname'], $_POST['roll_no'])) {
    $name = $_POST['student_fname'];
    $rno = $_POST['roll_no'];
    if (!isset($_POST['class_name']))
        $class_name = null;
    else
        $class_name = $_POST['class_name'];

    // validation
    if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i", $rno) or !preg_match("/^[a-zA-Z ]*$/", $name)) {
        if (empty($name))
            echo '<p class="error">Please enter name</p>';
        if (empty($class_name))
            echo '<p class="error">Please select your class</p>';
        if (empty($rno))
            echo '<p class="error">Please enter your roll number</p>';
        if (preg_match("/[a-z]/i", $rno))
            echo '<p class="error">Please enter valid roll number</p>';
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            echo '<p class="error">No numbers or symbols allowed in name</p>';
        }
        exit();
    }

    $sql = "INSERT INTO `students` (`name`, `rno`, `class_name`) VALUES ('$name', '$rno', '$class_name')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo '<script language="javascript">';
        echo 'alert("Invalid Details")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Successful")';
        echo '</script>';
    }
}
?>