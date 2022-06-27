<?php
include('init.php');
session_start();
if ($_SESSION['is_logged'] == false) {
    header('Location: ./login.php');
}
//if no filter is added than print all the students
$sql = "SELECT `student_id`, `s_fname`, `s_lname`, `mobile`, `email`, `current_sem`, `dept_id`, `admin_year` FROM `student`";

if (isset($_POST['search'])) {
    $conditions = array();
    $sem_value = $_POST['sem_value'];
    $dept_value = $_POST['dept_value'];
    // $academic_value = $_POST['academic_value'];


    if ($sem_value != 'All') $conditions[] = "current_sem='$sem_value'";
    if ($dept_value != 'All') $conditions[] = "dept_id='$dept_value'";
    // if ($academic_value != 'All') $conditions[] = "admin_year='$academic_value'";


    if (count($conditions) > 0) {
        $sql .= " WHERE " . implode(' AND ', $conditions);
    }
} else if (isset($_POST['reset'])) {

    // if reset is clicked then reload the page so that it can show all the values of the table
    echo '<script>window.location.href = "manage_students.php";</script>';
}

$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <link rel="stylesheet" href="./css/search.css">
    <script src="https://kit.fontawesome.com/836db6b2a0.js" crossorigin="anonymous"></script>

    <title>Dashboard</title>
</head>

<body>



    <?php
    include './nav.php' ?>


    <div class="main">

        <!-- Search filter starts -->

        <form action="" method="post">

            <fieldset>
                <legend>Search</legend>
                <!-- Based on semester  -->
                Semester - 
                <select name="sem_value" class="search_filter">
                    <option selected="selected" value="All">ALL</option>

                    <?php for ($x = 1; $x <= 8; $x++) { ?>
                        <option value="<?php echo $x ?>" ); ?> <?php echo $x ?> </option>
                    <?php } ?>
                </select>
                <!-- Based on department  -->
                Department - 
                <?php
                $query = "SELECT * FROM department";
                $query_result = mysqli_query($conn, $query);
                ?>
                <select name="dept_value" class="search_filter">
                    <option selected value="All">ALL</option>
                    <?php
                    while ($row = mysqli_fetch_array($query_result)) {
                        $dept_name = $row['dept_name'];
                        $dept_id = $row['dept_id'];
                    ?>
                        <option value="<?php echo $dept_id ?>"> <?php echo $dept_name ?> </option>
                    <?php
                    }
                    ?>
                </select>
                <!-- Based on the academic year -->
                <!-- Academic Year - 
                <select name="academic_value" placeholder="Academic Year" class="search_filter">
                    <option selected value="All">All</option>
                    <?php for ($x = 2020; $x <= 2022; $x++) { ?>
                        <option value="<?php echo $x ?>"> <?php echo $x ?> </option>
                    <?php } ?>

                </select> -->

                <input type="submit" name="search" value="Search" class="search_button">
                <input type="submit" name="reset" value="Reset" class="search_button">

            </fieldset>


        </form>






        <!-- Search filter ends -->




        <?php




        if (mysqli_num_rows($result) > 0) {
            echo "<table>
                <caption>Manage Students</caption>
                <tr>
                <th>student_ID</th>
                <th>student_name</th>
                <th>Current_Sem</th>
                <th>academic_year</th>
                <th>Action</th>
                </tr>";

            while ($row = mysqli_fetch_array($result)) {
        ?>
                <tr>
                    <td><?php echo $row['student_id'] ?> </td>
                    <td><?php echo $row['s_fname'] . " " . $row['s_lname'] ?></td>
                    <td><?php echo $row['current_sem'] ?></td>
                    <td><?php echo $row['admin_year'] ?></td>
                    <td>


                        <a href="add_students.php?student_id_edit=<?php echo $row['student_id']; ?>" class="fas fa-pencil-alt link_edit" name="edit"></a>
                        <a href="add_students.php?student_id_del=<?php echo $row['student_id']; ?>" class="fas fa-trash-alt link_trash" name="delete"></a>

                    </td>
                </tr>
        <?php
            }

            echo "</table>";
        } else {
            echo "0 Students";
        }
        ?>
    </div>


</body>

</html>