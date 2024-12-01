<?php
require "Admin/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="css/index1.css?=1">
    <style>
        @media screen and (max-width: 1200px) {
            .top_content {
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }
            .mid_content {
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }
            .container_1 h1 {
                font-size: 2em;
            }
        }
        
        @media screen and (max-width: 768px) {
            .message {
                flex-direction: column;
            }
            .contact, .form {
                width: 100%;
                padding: 20px;
            }
            .form-group textarea {
                width: 100%;
            }
            .about-content p {
                padding: 0 20px;
            }
            .card {
                width: 80%;
                margin: 10px auto;
            }
            .card-2 {
                width: 80%;
                margin: 10px auto;
            }
        }

        @media screen and (max-width: 480px) {
            .container_1 h1 {
                font-size: 1.5em;
                padding: 0 10px;
            }
            .contact h1 {
                font-size: 1.2em;
            }
            .form h1 {
                font-size: 1.5em;
            }
            .card, .card-2 {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <!----------- header start ----------->
    <?php include "header.php"; ?>
    <!----------end header ---------------->

    <section>
        <div class="container_1">
            <h1>"Fashion is the armor to <br>survive the reality of everyday life."</h1>
        </div>
        <center>
            <h1 style="color: white;">PRODUCTS</h1>
        </center>
        <!---------- catagories start--------------->
        <div class="top_content">

            <div class="card">
                <div class="card-details">
                    <img src="photos/jacket.jpg" alt="">
                </div>
                <h3>Jacket</h3>
                <a href="jackets.php"><button class="card-button">More info</button></a>
            </div>
            <div class="card">
                <div class="card-details">
                    <img src="photos/download.jpg" alt="">
                </div>
                <h3>PANTS</h3>
                <a href="pants.php"><button class="card-button">More info</button></a>
            </div>
            <div class="card">
                <div class="card-details">
                    <img src="photos/cyberpunk-shirt-1.jpg" alt="">
                </div>
                <h3>T-SHIRTS</h3>
                <a href="tees.php"><button class="card-button">More info</button></a>
            </div>
            <div class="card">
                <div class="card-details">
                    <img src="photos/accessories.jpg" alt="">
                </div>
                <h3>ACESSORIES</h3>
                <a href="accessories.php"><button class="card-button">More info</button></a>
            </div>
        </div>
        <!---------------------- catagories end -------------------->
        <center>
            <p class="title">TRENDING PRODUCTS</p>
        </center>
        <!--------------- products start  ------------------->
        <div class="mid_content">
            <?php
            $query = 'SELECT * FROM product_details';
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="card-2">';
                echo '<div class="card-details-2">';
                echo '<a href="product.php?id=' . $row['p_id'] . '"><img src="Admin/uploads/' . $row['productimage'] . '" alt=""></a>';
                echo '<p class="details">' . $row['productname'] . '</p>';
                echo '<p class="details">Price: Rs ' . $row['productprice'] . '</p>';
                echo '<a href="product.php?id=' . $row['p_id'] . '" class="read-more-link">Read More</a>';
                echo '<a href="cart-page.php?id=' . $row['p_id'] . '" class="add-to-cart-btn" onclick="showPopup()">Add to Cart</a>';


                echo '</div>';
                echo '</div>';
            }
            ?>

        </div>
        <!---------------- products end  -------------->
        <!---------------- about us start  -------------->
        <div class="about" id="about-us">
            <center>
                <h1>ABOUT US</h1>
            </center><br>
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
        <div class="message" id="message">
            <div class="contact " id="contact">
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
    <script>
        function showPopup() {
            alert("Product added to cart!");
        }
    </script>

</body>

</html>