<?php

include('conn.php');
include 'session.php';

?>

<body>
    <?php



    if (!isset($_GET['do']) || $_GET['do'] != 1) {


        switch ($_GET['type']) {
            case 'people':
                $query = 'DELETE FROM message
							WHERE
							M_id = ' . $_GET['id'];
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    ?>
                <script type="text/javascript">
                    alert("Successfully Deleted.");
                    window.location = "message.php";
                </script>

    <?php
                //break;
        }
    }
    ?>

</body>

</html>