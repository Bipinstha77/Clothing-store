<?php
include('conn.php');
session_start();
$db = mysqli_select_db($conn, 'mainproject');
$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$user_check'");
$row = mysqli_fetch_array($ses_sql);

$login_session = $row['username'];

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit();
}
