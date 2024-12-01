<?php
include 'Admin/conn.php';

// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    $productID = $_GET['id']; // Get the product ID from the URL parameter

    // Use the product ID to retrieve the product details from the database
    $query = "SELECT * FROM product_details WHERE p_id = $productID";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);

    // Retrieve the product details
    $productName = $row['productname'];
    $productImage = $row['productimage'];
    $productPrice = $row['productprice'];

    // Insert the product details into the cart table
    $insertQuery = "INSERT INTO cart (p_id, product_name, product_image, product_price, quantity) 
                    VALUES ('$productID', '$productName', '$productImage', '$productPrice', 1)";
    mysqli_query($conn, $insertQuery) or die(mysqli_error($conn));
} else {
    // Handle the case when 'id' parameter is not present in the URL
    // For example, redirect to an error page or display an error message
    echo "Product ID is missing!";
    exit; // Terminate the script
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart-page</title>
    <style>
        /* CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .container-cart {
            margin: 20px;
        }

        h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #f2f2f2;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="header">
        <?php include 'header.php'; ?>
    </div>
    <div class="container-cart">
        <h3>MY CART</h3>
        <table border="1px solid black">
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <tr>
                <td><?php echo $productID; ?></td>
                <td><?php echo $productName; ?></td>
                <td><?php echo $productImage; ?></td>
                <td><?php echo $productPrice; ?></td>
                <td>1</td>
                <td><button>Remove</button></td>
            </tr>
        </table>
    </div>
</body>

</html>