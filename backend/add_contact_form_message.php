<?php 
require 'db.php';
if(isset($_POST['submit_contact_form'])){
    $contact_form_name = mysqli_real_escape_string($conn, $_POST['contact_form_name']);
    $contact_form_phone = mysqli_real_escape_string($conn, $_POST['contact_form_phone']);
    $contact_form_email = mysqli_real_escape_string($conn, $_POST['contact_form_email']);
    $contact_form_message = mysqli_real_escape_string($conn, $_POST['contact_form_message']);
    
        $sql = "INSERT INTO contact_form_message (contact_form_name, contact_form_phone, contact_form_email, contact_form_message) VALUES ('$contact_form_name', '$contact_form_phone', '$contact_form_email', '$contact_form_message')";
        $result = mysqli_query($conn, $sql);

header("location: ../edit-homepage");
        die();
} else {
    header("location: ../contact.php");
    die();
}