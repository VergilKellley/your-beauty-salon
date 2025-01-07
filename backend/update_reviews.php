<?php
session_start();
require 'db.php';

// REVIEWS TITLE

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_reviews_title'])) {
    $reviews_title = filter_var($_POST['reviews_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE reviews SET reviews_title = '$reviews_title'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php#reviews');
        die();
    }
}

// REVIEWS 1

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_reviewers_comments_1'])) {
    $reviewers_name_1 = filter_var($_POST['reviewers_name_1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reviewers_comments_1 = filter_var($_POST['reviewers_comments_1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE reviews SET reviewers_name_1 = '$reviewers_name_1', reviewers_comments_1 = '$reviewers_comments_1'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php#reviews');
        die();
    }
}

// REVIEWS 2

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_reviewers_comments_2'])) {
    $reviewers_name_2 = filter_var($_POST['reviewers_name_2'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reviewers_comments_2 = filter_var($_POST['reviewers_comments_2'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE reviews SET reviewers_name_2 = '$reviewers_name_2', reviewers_comments_2 = '$reviewers_comments_2'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php#reviews');
        die();
    }
}

// REVIEWS 3

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_reviewers_comments_3'])) {
    $reviewers_name_3 = filter_var($_POST['reviewers_name_3'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reviewers_comments_3 = filter_var($_POST['reviewers_comments_3'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE reviews SET reviewers_name_3 = '$reviewers_name_3', reviewers_comments_3 = '$reviewers_comments_3'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php#reviews');
        die();
    }
}

// REVIEWS 4
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_reviewers_comments_4'])) {
    $reviewers_name_4 = filter_var($_POST['reviewers_name_4'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reviewers_comments_4 = filter_var($_POST['reviewers_comments_4'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE reviews SET reviewers_name_4 = '$reviewers_name_4', reviewers_comments_4 = '$reviewers_comments_4'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php#reviews');
        die();
    }
}

// REVIEWS 5
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_reviewers_comments_5'])) {
    $reviewers_name_5 = filter_var($_POST['reviewers_name_5'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reviewers_comments_5 = filter_var($_POST['reviewers_comments_5'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE reviews SET reviewers_name_5 = '$reviewers_name_5', reviewers_comments_5 = '$reviewers_comments_5'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php#reviews');
        die();
    }
} else {
    // redirect to index.php
    // $_SESSION_['color_not_updated'] = "Color not updated. Please try again. If problem persists, please contact your website administrator.";
header('location: ../index.php');
die();
}