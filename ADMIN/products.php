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
            <?php include "sidebar.php"; ?>
        </div>
        <div class="main">
            <div class="top">
                <center>
                    <h1>Products</h1>
                </center>
            </div>
            <div class="mid">
                <a href="addproduct.php"><input type="submit" value="Add Product"></a>
            </div>
            <div class="content">
                <table border="1px solid black">
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Details</th>
                        <th>Size</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Options</th>
                    </tr>
                    <?php
                    $query = 'SELECT * FROM product_details ORDER BY p_id DESC';
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['p_id'] . '</td>';
                        echo '<td>' . $row['productname'] . '</td>';
                        echo '<td><img src="uploads/' . $row['productimage'] . '" height="80px" width="120px"></td>';
                        echo '<td>' . $row['productdetails'] . '</td>';
                        echo '<td>' . $row['size'] . '</td>';
                        echo '<td>' . $row['productprice'] . '</td>';
                        echo '<td>' . $row['productquantity'] . '</td>';
                        echo '<td><a type="button" class="btn-edit" href="editproduct.php?action=edit&id=' . $row['p_id'] . '">EDIT</a>';
                        echo '<a type="button" class="btn btn-delete" href="delproduct.php?type=people&delete&id=' . $row['p_id'] . '">DELETE</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <?php
    $sql = "SELECT * FROM images ORDER BY img_id DESC";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($images = mysqli_fetch_assoc($res)) {
            echo '<div class="alb">';
            echo '<img src="uploads/' . $images['image_url'] . '">';
            echo '</div>';
        }
    }
    ?>
</body>

</html>