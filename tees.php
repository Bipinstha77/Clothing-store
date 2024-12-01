<?php
require "Admin/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="css/pants.css?=1">
</head>

<body>
    <!----------- header start ----------->
    <?php include "header.php"; ?>
    <!----------end header ---------------->

    <section>

        <!---------------------- categories end -------------------->
        <center>
            <p class="title">TEES</p>
        </center>
        <!--------------- products start  ------------------->
        <div class="mid_content">
            <?php
            $query = 'SELECT * FROM product_details WHERE productcategory = "tees"';
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
        <!---------------- products end  -------------->
        <!---------------- about us start  -------------->
        <div class="about">
            <center>
                <h1>ABOUT US</h1>
            </center>
            <div class="about-content">
                <center>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Qu <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Qu<br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Qu<br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Qu<br>
                    </p>
                </center>
                <button class="btn">Read More</button>
            </div>
        </div>

        <!----------------- message start --------------->
        <div class="message">
            <div class="contact">
                <h1>CONTACT US:+977 ___________</h1>
                <h1>LOCATION: KATHMANDU,NEPAL</h1>

            </div>
            <div class="form">
                <form action="message.php" method="post">
                    <h1>GET IN TOUCH</h1>
                    <div class="form-group">
                        <input type="text" name="name" placeholder="YOUR NAME" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="" placeholder="YOUR EMAIL" required>
                    </div>
                    <div class="form-group">
                        <textarea name="comment" id="" cols="45" rows="10" placeholder="MESSAGE" required></textarea>
                    </div>
                    <input type="submit" value="Submit" name="submit" class="btn-message">
                </form>
            </div>
        </div>
        <!------------------- message end ------------------>
        <div class="footer">
            <?php include 'footer.php'; ?>
        </div>
    </section>

</body>


</html>