<?php
require 'db.php';

if (isset($_POST['submit_stylist_delete_btn'])) {
    $delete_stylist_id = $_POST['submit_stylist_delete_btn'];

    $delete_stylist_query = "DELETE FROM stylist_info WHERE id = '$delete_stylist_id'";

    $delete_stylist = mysqli_query($conn, $delete_stylist_query);

    if($delete_stylist) {
        header("Location: ../stylist-info.php");
        exit();
    } else {
        echo "Something went wrong.";
        exit();
    }
}