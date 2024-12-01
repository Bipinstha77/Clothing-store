<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    $id = $_POST['id'];
    $Name = $_POST['Name'];
    $email = $_POST['email'];

    include('conn.php');
    include 'session.php';
    $query = 'UPDATE customer_details set name ="' . $Name . '", 
					email="' . $email . '" WHERE
					c_id ="' . $id . '"';
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    ?>
    <script type="text/javascript">
        alert("Update Successfull.");
        window.location = "customer.php";
    </script>
</body>

</html>