<?php
require 'db.php';

if (isset($_POST['submit_message_delete_btn'])) {
    $deleted_message_id = $_POST['submit_message_delete_btn'];

    $delete_message_query = "DELETE FROM contact_form_message WHERE id = '$deleted_message_id'";

    $delete_message_result = mysqli_query($conn, $delete_message_query);

    if($delete_message_result) {
        header("Location: ../contact_form_view_messages.php");
        exit();
    } else {
        echo "Something went wrong.";
    }
}