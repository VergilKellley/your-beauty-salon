<?php

session_start();
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_contact_info']))) {

    $business_name = filter_var($_POST['business_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $street_name = filter_var($_POST['street_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $street_number = filter_var($_POST['street_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $suite_number = filter_var($_POST['suite_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $city_name = filter_var($_POST['city_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $state_name = filter_var($_POST['state_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $zip_code = filter_var($_POST['zip_code'], FILTER_VALIDATE_INT);
    $phone = filter_var($_POST['phone'], FILTER_VALIDATE_INT);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE contact_info SET business_name = '$business_name', phone = '$phone', email = '$email', street_name = '$street_name', street_number = '$street_number', suite_number = '$suite_number', city_name = '$city_name', state_name = '$state_name', zip_code = '$zip_code'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../edit-website#contact-info');
        die();
    }
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_contact_page_title_text']))) {

    $contact_page_title = filter_var($_POST['contact_page_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $contact_page_text = filter_var($_POST['contact_page_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE contact_info SET contact_page_title = '$contact_page_title', contact_page_text = '$contact_page_text'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../edit-website#contact-page-title-text');
        die();
    }
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_social_media']))) {

    $facebook = filter_var($_POST['facebook'], FILTER_VALIDATE_URL);
    $instagram = filter_var($_POST['instagram'], FILTER_VALIDATE_URL);
    $tiktok = filter_var($_POST['tiktok'], FILTER_VALIDATE_URL);
    $linkedin = filter_var($_POST['linkedin'], FILTER_VALIDATE_URL);

    

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE contact_info SET facebook = '$facebook', instagram = '$instagram', tiktok = '$tiktok',  linkedin = '$linkedin'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../edit-website#social-media');
        die();
    }
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_google_map_url']))) {

    // $google_map_url = $_POST['google_map_url'];
    $google_map_url = filter_var($_POST['google_map_url'], FILTER_VALIDATE_URL);


    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE contact_info SET google_map_url = '$google_map_url'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../edit-website#google-map');
        die();
    }
} else {
    // redirect to index.php
    // $_SESSION_['color_not_updated'] = "Color not updated. Please try again. If problem persists, please contact your website administrator.";
header('location: index');
die();
}