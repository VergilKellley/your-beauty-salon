<?php

session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_contact_form'])) {

    $contact_form_title = filter_var($_POST['contact_form_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $contact_form_text = filter_var($_POST['contact_form_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $contact_form_name = filter_var($_POST['contact_form_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $contact_form_phone = filter_var($_POST['contact_form_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $contact_form_email = filter_var($_POST['contact_form_email'], FILTER_SANITIZE_EMAIL);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE contact_page SET contact_form_title = '$contact_form_title', contact_form_text = '$contact_form_text'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../contact.php#contact-inputs');
        die();
    }
} else {
    // redirect to index.php
    // $_SESSION_['color_not_updated'] = "Color not updated. Please try again. If problem persists, please contact your website administrator.";
header('location: index.php');
die();
}