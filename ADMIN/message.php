<?php

require "conn.php";
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/products.css?=1">

</head>

<body>
    <div class="container">
        <div class="sidebar">
            <?php
            include "sidebar.php";
            ?>
        </div>
        <div class="main">
            <div class="top">
                <center>
                    <h1>Messages</h1>
                </center>
            </div>
            <div class="mid">

            </div>
            <div class="content">
                <table border="1px solid black">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Messages</th>
                        <th>Options</th>
                    </tr>
                    <?php
                    $query = 'SELECT * FROM message';
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '<tr>';
                        echo '<td>' . $row['M_id'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['message'] . '</td>';
                        echo ' <td><a  type="button" class="btn btn-delete" href="delmessage.php?type=people&delete & 
                        id=' . $row['M_id'] . '">DELETE </a> </td>';
                        echo '</tr> ';
                    }
                    ?>

            </div>
        </div>
    </div>

</body>

</html>