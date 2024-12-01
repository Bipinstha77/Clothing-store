<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css?=1">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body>
    <div class="top">
        <center>
            <h1>ONLINE CLOTHING STORE</h1>
        </center>

    </div>

    <div class="main">
        <div class="login">
            <form action="" method="post" name="login">
                <fieldset>
                    <center>
                        <h2>ADMIN LOGIN</h2>
                    </center>
                    <!-- <legend class="heading">Admin Login</legend> -->
                    <input type="text" name="username" placeholder="Username" autocomplete="off" required>
                    <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                    <input type="submit" value="Login">
                </fieldset>
            </form>
        </div>

    </div>

</body>

</html>

<?php
include("conn.php");
session_start();

if (isset($_POST["username"], $_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM admin WHERE username='$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);

    // $row=mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        header("Location: dashboard.php");
    } else {
        echo '<script language="javascript">';
        echo 'alert("Invalid Username or Password")';
        echo '</script>';
    }
}
?>