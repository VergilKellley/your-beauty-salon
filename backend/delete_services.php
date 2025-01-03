<?php
require 'db.php';

if (isset($_POST['submit_services_delete_btn'])) {
    $delete_service_id = $_POST['submit_services_delete_btn'];

    $delete_service_query = "DELETE FROM services_chosen WHERE id = '$delete_service_id'";

    $delete_service = mysqli_query($conn, $delete_service_query);

    if($delete_service) {
        header("Location: ../services-chosen.php");
        exit();
    } else {
        echo "Something went wrong.";
        exit();
    }
}