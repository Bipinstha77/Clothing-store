<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0%;
            padding: 0%;
        }

        /* CSS styling for the navigation bar */
        .navbar {
            background-color: #181823;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 1.3rem;
            font-weight: 800;
            background-color: #181823;
        }

        .navbar a:hover {
            background-color: white;
            color: black;
        }

        .navbar .logo {
            float: left;
        }


        .navbar .login {
            float: right;
            background-color: #181823;

        }

        .navbar .menu-items {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .navbar .dropdown:hover .dropdown-content {
            display: block;
        }

        .navbar .dropdown-content a {
            color: black;
            background-color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .navbar .dropdown-content a:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <a href="#home">LOGO</a>
        </div>
        <div class="menu-items">
            <a href="index.php">Home</a>

            <div class="dropdown">

                <a href="#products">Products</a>
                <div class="dropdown-content">
                    <a href="tees.php">Tees</a>
                    <a href="jackets.php">Jacket</a>
                    <a href="accessories.php">Accessories</a>
                    <a href="pants.php">Pants</a>
                </div>
            </div>
            <a href="#about-us">About us</a>
            <a href="#message">Contact</a>
        </div>
        <div class="login">
            <a href="cart-page.php"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="login.php" id="loginBtn">Login</a>
        </div>
    </div>

    <!-- Your website content goes here -->
    <script>
        // Smooth scrolling functionality
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>