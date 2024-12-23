<?php
require 'db.php';
//DISPLAY ABOUT PAGE
$sql = "SELECT * FROM contact_page;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $contact_form_title = $row['contact_form_title'];
        $contact_form_text = $row['contact_form_text'];
        // $contact_form_name = $row['contact_form_name'];
        // $contact_form_phone = $row['contact_form_phone'];
        // $contact_form_email = $row['contact_form_email'];    
    }
}