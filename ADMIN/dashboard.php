<?php
include 'session.php';
include 'conn.php';
$no_of_products = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `product_details`"));
$no_of_customers = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `customer_details`"));
$no_of_messages = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `message`"));
$no_of_order = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `order_details`"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css?=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section class="container">
        <div class="sidebar">
            <?php
            include "sidebar.php";
            ?>
        </div>
        <div class="main">
            <div class="top">
                <center>
                    <h1>DASHBOARD</h1>
                </center>
            </div>
            <div class="middle">
                <div class="card">
                    <center>
                        <a href="products.php">

                            <?php
                            echo '<h3>Products:<br>  ' . $no_of_products[0] . '</h3>';

                            ?>
                        </a>
                    </center>
                </div>
                <div class="card">
                    <center>
                        <a href="customer.php">
                            <?php
                            echo '<h3>Customers: <br> ' . $no_of_customers[0] . '</h3>';
                            ?>
                        </a>
                    </center>
                </div>
            </div>
            <div class="bottom">
                <div class="card">
                    <center>
                        <a href="message.php">
                            <?php
                            echo '<h3>messages: <br>  ' . $no_of_messages[0] . '</h3>';
                            ?>
                        </a>
                    </center>
                </div>
                <div class="card">
                    <center>
                        <a href="order.php">
                            <?php
                            echo '<h3>Orders: <br> ' . $no_of_order[0] . '</h3>';
                            ?>
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </section>
</body>

</html>