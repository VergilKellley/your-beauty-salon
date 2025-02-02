<?php
require 'db.php';
//Display Website colors 
$sql = "SELECT * FROM contact_info;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    $business_name = $row['business_name'];
    $business_phone = $row['business_phone'];
    $business_email = $row['business_email'];
    $street_name = $row['street_name'];
    $street_number = $row['street_number'];
    $suite_number = $row['suite_number'];
    $city_name = $row['city_name'];
    $state_name = $row['state_name'];
    $zip_code = $row['zip_code'];
    $contact_page_title = $row['contact_page_title'];
    $contact_page_text = $row['contact_page_text'];
    $facebook = $row['facebook'];
    $instagram = $row['instagram'];
    $tiktok = $row['tiktok'];
    $linkedin = $row['linkedin'];
    $google_map_url = $row['google_map_url'];
    }
}