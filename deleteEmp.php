<?php

include "config.php";

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `employee` WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "<script>alert('Record deleted successfully.')</script>";
        header("location: EmpView.php");

    } else {

        echo "Error:" . $sql . "<br>";

    }

}

?>