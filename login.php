<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" type="text/css" href="css/login.css?=1">
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
                        <h2>User LOGIN</h2>
                    </center>
                    <!-- <legend class="heading">Admin Login</legend> -->
                    <input type="text" name="username" placeholder="Username" autocomplete="off">
                    <input type="password" name="password" placeholder="Password" autocomplete="off">
                    <p>Don't Have an account <a href="register.php"> Register </a></p>
                    <input type="submit" value="Login">

                </fieldset>
            </form>
        </div>

    </div>

</body>

</html>
<?php
include("ADMIN/conn.php");
session_start();

if (isset($_POST["username"], $_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize user input
    $username = mysqli_real_escape_string($conn, $username);

    // Prepare the statement using parameterized query
    $stmt = mysqli_prepare($conn, "SELECT password FROM customer_details WHERE username=?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['customer_details'] = $username;
            header("Location: index.php");
            exit(); // Always include an exit() after a header redirect
        }
    }

    echo '<script language="javascript">';
    echo 'alert("Invalid Username or Password")';
    echo '</script>';
}
?>