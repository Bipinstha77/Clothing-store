<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    include('conn.php');
    include 'session.php';
    $id = $_POST['id'];
    $name = $_POST['productname'];
    $category = $_POST["productcategory"];
    $description = $_POST["productdetails"];
    $size = $_POST["size"];
    $price = $_POST["productprice"];
    $qty = $_POST["productquantity"];

    $img_name = $_FILES['productimage']['name'];
    $img_size = $_FILES['productimage']['size'];
    $tmp_name = $_FILES['productimage']['tmp_name'];
    $error = $_FILES['productimage']['error'];
    if ($error === 0) {
        if ($img_size > 125000) {
            $em = "Sorry, your file is too large.";
            header("Location: products.php?error=$em");
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
                header("Location: products.php?error=$em");
                exit();
            }
        }
    } else {
        $em = "Unknown error occurred!";
        header("Location: products.php?error=$em");
        exit();
    }
    $query = "UPDATE product_details 
          SET productname = '$name', 
          productcategory = '$category', 

              productimage = '$new_img_name', 
              productdetails = '$description', 
              size = '$size', 
              productprice = '$price', 
              productquantity = '$qty' 
          WHERE p_id = '$id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    ?>
    <script type="text/javascript">
        alert("Update Successfull.");
        window.location = "products.php";
    </script>
</body>

</html>