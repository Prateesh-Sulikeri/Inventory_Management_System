<?php

include "config.php";

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `products` WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "<script>alert('Record deleted successfully.')</script>";
        header("location: ProdView.php");

    } else {

        echo "Error:";

    }

}

?>