<?php
require "conn.php";
include 'session.php';

if (isset($_POST['addproduct'])) {
    $name = $_POST["productname"];
    $category = $_POST["productcategory"];
    $description = $_POST["productdetails"];
    $size = $_POST["size"];
    $price = $_POST["productprice"];
    $qty = $_POST["productquantity"];

    // Image Upload
    $img_name = $_FILES['productimage']['name'];
    $img_size = $_FILES['productimage']['size'];
    $tmp_name = $_FILES['productimage']['tmp_name'];
    $error = $_FILES['productimage']['error'];


    if ($error === 0) {
        if ($img_size > 125000) {
            $em = "Sorry, your file is too large.";
            header("Location: addproduct.php?error=$em");
            exit();
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            } else {
                $em = "You can't upload files of this type";
                header("Location: addproduct.php?error=$em");
                exit();
            }
        }
    } else {
        $em = "Unknown error occurred!";
        header("Location: addproduct.php?error=$em");
        exit();
    }

    // Insert into Database
    $sql = "INSERT INTO product_details (productname, productcategory, productimage, productdetails, size, productprice, productquantity) 
            VALUES ('$name', '$category', '$new_img_name', '$description', '$size', '$price', '$qty')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Item added successfully")</script>';
        header('location: products.php');
        exit();
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/addproduct.css?=1">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <?php include "sidebar.php"; ?>
        </div>
        <div class="main">
            <div class="top">
                <center>
                    <h1>ADD PRODUCTS</h1>
                </center>
            </div>
            <div class="content">
                <form method="post" action="addproduct.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Product Name:</label>
                        <input type="text" class="form-control" name="productname">
                    </div>
                    <div class="form-group">
                        <label>Product Category:</label>
                        <select name="productcategory" id="">
                            <option value="tees">Tees</option>
                            <option value="pants">Pants</option>
                            <option value="jacket">Jackets</option>
                            <option value="accessories">Accessories</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Image:</label>
                        <input type="file" id="myFile" name="productimage">
                    </div>
                    <div class="form-group">
                        <label>Product Details:</label>
                        <textarea name="productdetails" id="" cols="20" rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Size:</label>
                        <select name="size" id="">
                            <option value="L">Large</option>
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="XL">Extra large</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Price:</label>
                        <input type="number" class="form-control" name="productprice">
                    </div>
                    <div class="form-group">
                        <label>Product Quantity:</label>
                        <input type="number" class="form-control" name="productquantity">
                    </div>
                    <input type="submit" value="Add Product" name="addproduct" class="btn-add">
                </form>
            </div>
        </div>
    </div>
</body>

</html>