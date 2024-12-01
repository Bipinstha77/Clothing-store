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
            <form action="register.php" method="post">
                <fieldset>
                    <center>
                        <h2>User Registration</h2>
                    </center>
                    <!-- <legend class="heading">Admin Login</legend> -->
                    <input type="text" name="name" placeholder="Name" autocomplete="off">
                    <input type="email" name="email" placeholder="Email" autocomplete="off">
                    <input type="text" name="username" placeholder="Username" autocomplete="off">
                    <input type="password" name="password" placeholder="Password" autocomplete="off">
                    <input type="password" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                    <p>Already have an account <a href="login.php"> Login </a></p>
                    <input type="submit" value="Register" name="register">
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
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    if ($password == $cpassword) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO customer_details (name,email,username,password) 
                VALUES('$name','$email','$username','$hashedPassword')";
        if ($conn->query($sql)) {
            echo "<script>";
            echo 'alert("Registration Successful")';
            header('refresh:0; url=login.php');
            echo "</script>";
            exit();
        } else {
            echo "<script>";
            echo 'alert("Registration error")';
            header('refresh:0; url=register.php');
            echo "</script>";
        }
    } else {
        echo "passwords don't match";
    }
}
?>