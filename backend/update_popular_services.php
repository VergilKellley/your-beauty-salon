<?php

session_start();
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_popular_services_title']))) {
    $popular_services_title = filter_var($_POST['popular_services_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE popular_services SET popular_services_title = '$popular_services_title'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../edit-popular-services.php');
        die();
    }
} else {
    // redirect to index.php
    // $_SESSION_['color_not_updated'] = "Color not updated. Please try again. If problem persists, please contact your website administrator.";
header('location: ../index.php');
die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $popular_service_1_title = filter_var($_POST['popular_service_1_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $popular_service_1_text = filter_var($_POST['popular_service_1_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE popular_services SET popular_service_1_title = '$popular_service_1_title', popular_service_1_text = '$popular_service_1_text'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php');
        die();
    }
} else {
    // redirect to index.php
    // $_SESSION_['color_not_updated'] = "Color not updated. Please try again. If problem persists, please contact your website administrator.";
    header('location: index.php');
    die();
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $popular_service_2_title = filter_var($_POST['popular_service_2_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $popular_service_2_text = filter_var($_POST['popular_service_2_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE popular_services SET popular_service_2_title = '$popular_service_2_title', popular_service_2_text = '$popular_service_2_text'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php');
        die();
    }
} else {
    // redirect to index.php
    // $_SESSION_['color_not_updated'] = "Color not updated. Please try again. If problem persists, please contact your website administrator.";
header('location: index.php');
die();
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $popular_service_3_title = filter_var($_POST['popular_service_3_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $popular_service_3_text = filter_var($_POST['popular_service_3_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE popular_services SET popular_service_3_title = '$popular_service_3_title', popular_service_3_text = '$popular_service_3_text'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php');
        die();
    }
} else {
    // redirect to index.php
    // $_SESSION_['color_not_updated'] = "Color not updated. Please try again. If problem persists, please contact your website administrator.";
header('location: index.php');
die();
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $popular_service_4_title = filter_var($_POST['popular_service_4_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $popular_service_4_text = filter_var($_POST['popular_service_4_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE popular_services SET popular_service_4_title = '$popular_service_4_title', popular_service_4_text = '$popular_service_4_text'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php');
        die();
    }
} else {
    // redirect to index.php
    // $_SESSION_['color_not_updated'] = "Color not updated. Please try again. If problem persists, please contact your website administrator.";
header('location: index.php');
die();
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $popular_service_5_title = filter_var($_POST['popular_service_5_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $popular_service_5_text = filter_var($_POST['popular_service_5_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE popular_services SET popular_service_5_title = '$popular_service_5_title', popular_service_5_text = '$popular_service_5_text'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php');
        die();
    }
} else {
    // redirect to index.php
    // $_SESSION_['color_not_updated'] = "Color not updated. Please try again. If problem persists, please contact your website administrator.";
header('location: index.php');
die();
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $popular_service_6_title = filter_var($_POST['popular_service_6_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $popular_service_6_text = filter_var($_POST['popular_service_6_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE popular_services SET popular_service_6_title = '$popular_service_6_title', popular_service_6_text = '$popular_service_6_text'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php');
        die();
    }
} else {
    // redirect to index.php
    // $_SESSION_['color_not_updated'] = "Color not updated. Please try again. If problem persists, please contact your website administrator.";
header('location: index.php');
die();
}