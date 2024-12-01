<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/edit1.css?=1">
</head>
<?php

include('conn.php');
include 'session.php';
?>

<body>
    <div class="container">
        <?php
        include "sidebar.php";
        ?>
        <?php
        $query = 'SELECT * FROM customer_details
              WHERE
              c_id =' . $_GET['id'];
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {
            $zz = $row['c_id'];
            $i = $row['name'];
            $c = $row['email'];
        }
        $id = $_GET['id'];
        ?>
        <div class="middle">
            <h3>Edit Records</h3>
            <form role="form" method="post" action="edit1.php">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                </div>
                <div class="form-group">
                    <label>Name:</label>
                    <input class="form-control" placeholder="Name" name="Name" value="<?php echo $i; ?>">
                    <!-- </div>
                <div class="form-group">
                    <label>Address:</label>
                    <input class="form-control" placeholder="Address" name="address" value="<?php echo $a; ?>">
                </div>
                <div class="form-group">
                    <label>Contact:</label>
                    <input class="form-control" placeholder="Contact" name="contact" value="<?php echo $b; ?>">
                </div> -->
                    <div class="form-group">
                        <label>Email:</label>
                        <input class="form-control" placeholder="Email" name="email" value="<?php echo $c; ?>">
                    </div>
                    <button type="submit" class="btn">Update Record</button>
            </form>
        </div>
    </div>
    </div>
</body>

</html>