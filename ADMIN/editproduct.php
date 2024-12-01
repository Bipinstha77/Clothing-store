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
        $query = 'SELECT * FROM product_details
              WHERE
              p_id =' . $_GET['id'];
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {
            $zzz = $row['p_id'];
            $i = $row['productname'];
            $a = $row['productcategory'];
            $b = $row['productimage'];
            $c = $row['productdetails'];
            $d = $row['size'];
            $e = $row['productprice'];
            $f = $row['productquantity'];
        }
        $id = $_GET['id'];
        ?>
        <div class="middle">
            <h3>Edit Products</h3>
            <form role="form" method="post" action="editproduct1.php" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $zzz; ?>" />
                </div>
                <div class="form-group">
                    <label>Product Name:</label>
                    <input type="text" name="productname" value="<?php echo $i; ?>">
                </div>
                <div class="form-group">
                    <label>Product category:</label>
                    <select name="productcategory" id="" value="<?php echo $a; ?>">
                        <option value="tees">Tees</option>
                        <option value="pants">Pants</option>
                        <option value="jacket">Jackets</option>
                        <option value="acessories">Acessories</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Product Image:</label>
                    <input type="file" id="myFile" name="productimage" value="<?php echo $b; ?>">
                </div>
                <div class="form-group">
                    <label>Product Details:</label>
                    <textarea name="productdetails" id="" cols="20" rows="1" value="<?php echo $c; ?>"></textarea>
                </div>
                <div class="form-group">
                    <label>Size:</label>
                    <select name="size" id="" value="<?php echo $d; ?>">
                        <option value="L">Large</option>
                        <option value="S">Small</option>
                        <option value="M">Medium</option>
                        <option value="XL">Extra large</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Product price:</label>
                    <input type="number" class="form-control" name="productprice" value="<?php echo $e; ?>">
                </div>
                <div class="form-group">
                    <label>Product Quantity:</label>
                    <input type="number" class="form-control" name="productquantity" value="<?php echo $f; ?>">
                </div>
                <button type="submit" class="btn">Update Record</button>
            </form>
        </div>
    </div>
    </div>
</body>

</html>