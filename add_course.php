<?php
include('init.php');
session_start();
if ($_SESSION['is_logged'] == false) {
    header('Location: ./login.php');
}
// include('session.php');
$course_name = "";
$course_id = "";
$course_sem_offered = "";
$course_dept_offereing = "";
$course_update = false;

//For Adding the data to the database
if (isset($_POST['course-add'])) {
    $course_name = $_POST["course_name"];
    $course_id = $_POST["course_id"];
    $course_sem_offered = $_POST["sem_offered"];
    $course_dept_offereing = $_POST["dept_offering"];



    $sql = "INSERT INTO `course` (`course_id`, `course_name`,`sem_offered`,`dept_offered_id`) VALUES ('$course_id', '$course_name','$course_sem_offered','$course_dept_offereing')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo '<script language="javascript">';
        echo 'alert("Error Occured")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Successful Created the Course")';
        echo '</script>';
        echo '<script>window.location.href = "add_course.php";</script>';

        // header('Location : add_classes.php');
    }
}

// for updating the course data

//for fetching the data
if (isset($_GET['course_id_edit'])) {
    $course_id = $_GET['course_id_edit'];

    $course_update = true;
    $record = mysqli_query($conn, "SELECT * FROM course WHERE course_id = '$course_id'");
    $row = mysqli_num_rows($record);
    if ($row == 1) {
        $rec = $record->fetch_array();
        $course_name = $rec['course_name'];
        $course_id = $rec['course_id'];
        $course_sem_offered = $rec['sem_offered'];
        $course_dept_offereing = $rec['dept_offered_id'];
    }
}

//for updating the data in the database
if (isset($_POST['course-update'])) {
    $course_name = $_POST["course_name"];
    $course_id = $_POST["course_id"];
    $course_sem_offered = $_POST["sem_offered"];
    $course_dept_offereing = $_POST["dept_offering"];



    $sql = "UPDATE `course` SET `course_id`='$course_id',`course_name`='$course_name',`sem_offered`='$course_sem_offered',`dept_offered_id`='$course_dept_offereing' WHERE course_id='$course_id'";
    $result = mysqli_query($conn, $sql);
    echo '<script>window.location.href = "manage_classes.php";</script>';
}
// for deletion of data
if (isset($_GET['course_id_del'])) {
    $cou_id = $_GET['course_id_del'];
    $que = mysqli_query($conn, "DELETE FROM `course` WHERE `course_id`='$cou_id'");
    echo '<script>window.location.href = "manage_classes.php";</script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/form.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <title>Add Courses</title>
</head>

<body>

    

    <?php include('nav.php') ?>

    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend>Add Course</legend>
                <!-- Course Details -->
                <input type="text" name="course_id" placeholder="Course ID" required value="<?php echo $course_id ?>">
                <input type="text" name="course_name" placeholder="Course Name" required value="<?php echo $course_name ?>">

                <!-- Semester -->
                <select name="sem_offered" placeholder="Semester Offered" required>
                    <option selected="selected" disabled>Semester Offered</option>

                    <?php for ($x = 1; $x <= 8; $x++) { ?>
                        <option value="<?php echo $x ?>" <?php print($course_sem_offered == $x ? ' selected="selected"' : ""); ?>> <?php echo $x ?> </option>
                    <?php } ?>
                </select>

                <!-- Department -->
                <?php
                $query = "SELECT * FROM department";
                $query_result = mysqli_query($conn, $query);
                ?>
                <select name="dept_offering" required>
                    <option selected disabled>Select Department</option>
                    <?php
                    while ($row = mysqli_fetch_array($query_result)) {
                        $dept_name = $row['dept_name'];
                        $dept_id = $row['dept_id'];
                    ?>
                        <option value="<?php echo $dept_id ?>" <?php print($course_dept_offereing == $dept_id ? ' selected="selected"' : ""); ?>> <?php echo $dept_name ?> </option>
                    <?php
                    }
                    ?>
                </select>



                <!-- Submit and Update -->
                <?php if ($course_update == true) : ?>
                    <input type="submit" class="button" id="submit" name="course-update" value="Update">
                <?php else :  ?>
                    <input type="submit" class="button" id="submit" name="course-add" value="Save">
                <?php endif ?>

            </fieldset>
        </form>
    </div>


</body>

</html>