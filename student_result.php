<?php
include('init.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Results</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body>
    <div class="title">
        <span>Student Management System</span>
    </div>
    <input type="submit" value="Home" class="search_button home_button" id="home_button">

    <div class="main">

        <div class="search">
            <form action="./student.php" method="get">
                <fieldset>
                    <legend class="heading">For Students</legend>
                    <select name="semester" placeholder="Semester" required>
                        <option selected="selected" disabled>Semester</option>
                        

                        <?php for ($x = 1; $x <= 8; $x++) { ?>
                            <option value="<?php echo $x ?>"> <?php echo $x ?> </option>
                        <?php } ?>
                    </select>


                    <input type="text" name="stu_id" placeholder="Student ID" required>
                    <input type="submit" value="Get Result">
                </fieldset>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById("home_button").onclick = function() {
            location.href = "./index.html";
        };
    </script>
</body>

</html>