<?php
require 'db.php';

if (isset($_POST['submit_appointment_delete_btn'])) {
    $deleted_appointment_id = $_POST['submit_appointment_delete_btn'];

    $delete_appointment_query = "DELETE FROM appointments WHERE id = '$deleted_appointment_id'";

    $delete_appointment_run = mysqli_query($conn, $delete_appointment_query);

    if($delete_appointment_run) {
        header("Location: ../appointments-view-edit.php");
        exit();
    } else {
        echo "Something went wrong.";
    }
}