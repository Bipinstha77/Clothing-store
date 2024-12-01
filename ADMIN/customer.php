<?php
include "conn.php";
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/customer.css?=1">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <?php
            include "sidebar.php";
            ?>
        </div>
        <div class="main">
            <center>
                <h2>Customers</h2>
            </center>
            <h3>List of Customers</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = 'SELECT * FROM customer_details';
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                        while ($row = mysqli_fetch_assoc($result)) {

                            echo '<tr>';
                            echo '<td>' . $row['c_id'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            // echo '<td>' . $row['address'] . '</td>';
                            // echo '<td>' . $row['contact'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . $row['created_at'] . '</td>';
                            // echo '<td>' . $row['password'] . '</td>';
                            // echo '<td> <a type="button" class="btn btn-xs btn-info" href="searchfrm.php?action=edit & id=' . $row['id'] . '" > SEARCH </a> ';
                            echo '<td> <a  type="button" class="btn-edit" href="edit.php?action=edit & id=' . $row['c_id'] . '"> EDIT </a> ';
                            echo ' <a  type="button" class="btn btn-delete" href="del.php?type=people&delete & id=' . $row['c_id'] . '">DELETE </a> </td>';
                            echo '</tr> ';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>