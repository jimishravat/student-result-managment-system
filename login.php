<?php
include('init.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        <div class="login">
            <form action="" method="POST" name="login">
                <fieldset>
                    <legend class="heading">Admin Login</legend>
                    <input type="text" name="user" placeholder="Username" autocomplete="off" required>
                    <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                    <input type="submit" value="Login" name="login-user">
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

<?php


if (isset($_POST["login-user"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM login WHERE username ='$user' and password = '$password'";
    $result = mysqli_query($conn, $sql);

    // $row=mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    echo $count;

    if ($count == 1) {
        $_SESSION['is_logged'] = true;
        header("Location: dashboard.php");
    } else {
        echo '<script language="javascript">';
        echo 'alert("Invalid Username or Password")';
        echo '</script>';
    }
}
?>