<?php
    session_start();

    if (!isset($_SESSION["user_id"])) {

        header("location: index");
        exit();

    } elseif (isset($_SESSION["user_id"])) {
        require_once 'backend/db.php';
        require_once 'backend/display_contact_info.php';
        require_once 'backend/display_index_page_welcome_to.php';
        // require_once 'backend/display_popular_services.php';
        require_once 'backend/display_website_colors.php';
        require_once 'backend/display_landing_page_images.php';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit-pages.css">
    <!-- <link rel="stylesheet" href="css/edit-website.css">
    <link rel="stylesheet" href="css/edit-photo-gallery.css">
    <link rel="stylesheet" href="css/edit-images.css"> -->
    <title>Edit website</title>

    <style>

    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="index">HOME</a>
                </li>
                <li>
                    <a href="edit-website">EDIT HOMEPAGE</a>
                </li>
                <li>
                    <a href="edit-home-page-images">HOMEPAGE IMAGES</a>
                </li>
                <li>
                    <a href="edit-photo-gallery">PHOTO GALLERY</a>
                </li>
                <li>
                    <a href="services-chosen">SERVICES</a>
                </li>
                <li>
                    <a href="stylist-info">STYLIST</a>
                </li>
                <li>
                    <a href="appointments-view-edit">APPOINTMENTS</a>
                </li>
                <li>
                    <a href="contact_form_view_messages">MESSAGES</a>
                </li>             
                <!-- <li>
                    <a href="contact">CONTACT PAGE</a>
                </li> -->
                <li>
                    <a href="logout">LOGOUT</a>
                </li>
            </ul>
        </nav>
</header>