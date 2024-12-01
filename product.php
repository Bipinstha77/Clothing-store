<?php
require 'Admin/conn.php';

// Check if a product ID is provided in the URL
if (isset($_GET['id'])) {
    $productID = $_GET['id'];

    // Retrieve product details from the database based on the provided product ID
    $query = "SELECT * FROM product_details WHERE p_id = '$productID'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $product = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['productname']; ?></title>
    <link rel="stylesheet" href="css/view_product.css?=1">
</head>

<body>
    <div class="header">
        <?php include 'header.php'; ?>
    </div>
    <main class="container-view">
        <?php if ($product) { ?>
            <div class="layout-view">
                <div class="left-column">
                    <div class="card">
                        <img class="img-display" src="Admin/uploads/<?php echo $product['productimage']; ?>" alt="" data-product-id="<?php echo $product['p_id']; ?>">
                    </div>
                </div>

                <div class="right-column">
                    <div class="product-description">
                        <h1><?php echo $product['productname']; ?></h1>
                        <p><?php echo 'Description: ' . $product['productdetails']; ?></p>
                        <p><?php echo 'Size: ' . $product['size']; ?></p> <br>
                    </div>
                    <div class="product-price">
                        <span><?php echo 'Price: RS.' . $product['productprice']; ?></span><br> <br>
                        <a href="cart.php?id=' . $row['p_id'] . '" class="add-to-cart-btn">Add to Cart</a>

                    </div>
                </div>
            </div>
        <?php } else { ?>
            <p>Product not found.</p>
        <?php } ?>
    </main>
    <center>
        <h1>YOU MAY ALSO LIKE</h1>
    </center>
    <div class="mid_content">
        <?php
        $query = 'SELECT * FROM product_details  ORDER BY RAND() LIMIT 4';
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card-2">';
            echo '<div class="card-details-2">';
            echo '<a href="product.php?id=' . $row['p_id'] . '"><img src="Admin/uploads/' . $row['productimage'] . '" alt=""></a>';
            echo '<p class="details">' . $row['productname'] . '</p>';
            echo '<p class="details">Price: Rs ' . $row['productprice'] . '</p>';
            echo '<a href="product.php?id=' . $row['p_id'] . '" class="read-more-link">Read More</a>';
            echo '<a href="#" class="add-to-cart-btn">Add to Cart</a>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <div class="footer">
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>