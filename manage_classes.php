<?php
include('init.php');
session_start();
if ($_SESSION['is_logged'] == false) {
    header('Location: ./login.php');
}

//search filter
//if nothing is mentioned than print all the courses
$sql = "SELECT `course_name`, `course_id`,`sem_offered`,`dept_offered_id` FROM `course`";
if (isset($_POST['search'])) {
    $sem_value = $_POST['sem_value'];
    $dept_value = $_POST['dept_value'];

    $conditions = array();

    //check if the search filter is applied or not
    if ($sem_value != 'All') $conditions[] = "sem_offered='$sem_value'";
    if ($dept_value != 'All') $conditions[] = "dept_offered_id='$dept_value'";

    if (count($conditions) > 0) {
        $sql .= "WHERE " . implode(' AND ', $conditions);
    }
} else if (isset($_POST['reset'])) {

    // if reset is clicked then reload the page so that it can show all the values of the table
    echo '<script>window.location.href = "manage_classes.php";</script>';
}

// result is stored in the result variable
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
    include './nav.php';
    ?>
    <div class="main">

        <!-- search filter -->

        <form action="" method="post">

            <fieldset>
                <legend>Search</legend>
                <!-- Semester filter-->
                Semester - 
                <select name="sem_value" class="search_filter">
                    <option selected="selected" value="All">ALL</option>

                    <?php for ($x = 1; $x <= 8; $x++) { ?>
                        <option value="<?php echo $x ?>" ); ?> <?php echo $x ?> </option>
                    <?php } ?>
                </select>

                <!-- Department Filter  -->
                Department - 
                <?php
                $query = "SELECT * FROM department";
                $query_result = mysqli_query($conn, $query);
                ?>
                <select name="dept_value" class="search_filter">
                    <option selected value="All" class="search_filter">ALL</option>
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


                <input type="submit" name="search" value="Search" class="search_button">
                <input type="submit" name="reset" value="Reset" class="search_button">

            </fieldset>

        </form>


        <!-- Search filter ends -->

        <?php
        if (mysqli_num_rows($result) > 0) {
            echo "<table>
                <caption>Manage Classes</caption>
                <tr>
                <th>Course_Id</th>
                <th>Course_Name</th>
                <th>Semester_Offered</th>
                <th>Action</th>
                </tr>";

            while ($row = mysqli_fetch_array($result)) {
        ?>
                <tr>
                    <td><?php echo $row['course_id'] ?> </td>
                    <td><?php echo $row['course_name'] ?></td>
                    <td><?php echo $row['sem_offered'] ?></td>
                    <td>
                        <a href="add_course.php?course_id_edit=<?php echo $row['course_id']; ?>" class="fas fa-pencil-alt link_edit" name="edit"></a>
                        <a href="add_course.php?course_id_del=<?php echo $row['course_id']; ?>" class="fas fa-trash-alt link_trash" name="delete"></a>

                    </td>
                </tr>
        <?php
            }

            echo "</table>";
        } else {
            echo "0 results";
        }
        ?>

    </div>

</body>

</html>