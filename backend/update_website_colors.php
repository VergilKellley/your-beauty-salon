<?php
session_start();
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $primary_color = filter_var($_POST['primary_color'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $secondary_color = filter_var($_POST['secondary_color'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $accent_color = filter_var($_POST['accent_color'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE website_colors SET primary_color = '$primary_color', secondary_color = '$secondary_color', accent_color = '$accent_color'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php');
        die();
    }
} else {
    // redirect to index.php
    $_SESSION_['color_not_updated'] = "Color not updated. Please try again. If problem persists, please contact your website administrator.";
header('location: index.php');
die();
}