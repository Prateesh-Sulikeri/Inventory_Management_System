<?php

include "config.php";

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `suppliers` WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "<script>alert('Record deleted successfully.')</script>";
        header("location: SupView.php");

    } else {

        echo "Error:" . $sql;

    }

}

?>