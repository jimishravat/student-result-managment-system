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
    <!-- <link rel="stylesheet" href="css/login.css"> -->

    <title>Dashboard</title>
</head>

<body>

    <?php include './nav.php' ?>


    <div class="main">
        <form action="./student.php" method="get">
            <fieldset>
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




</body>

</html>