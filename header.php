<?php
    session_start();
    require_once 'backend/db.php';
    require_once 'backend/display_about_page.php';
    require_once 'backend/display_business_address.php';
    require_once 'backend/display_contact_info.php';
    require_once 'backend/display_index_page_welcome_to.php';
    require_once 'backend/display_landing_page_images.php';
    require_once 'backend/display_reviews.php';
    require_once 'backend/display_services_chosen.php';
    require_once 'backend/display_website_colors.php';

    if (isset($_SESSION["user_id"])) {

        require "backend/db.php";
        $msqli = $conn;
        // $msqli = require __DIR__ . "backend/db.php";
    
        $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    
        $result = $msqli->query($sql);
    
        $user = $result->fetch_assoc();
    }
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- STYLIST CARD SLIDER -->
    <!-- https://www.youtube.com/watch?v=k-GqSFGZBHM -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CUSTOM CSS STYLE SHEETS -->
    <link rel="stylesheet" href="css/all-services.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/draggable-image-slider.css">
    <link rel="stylesheet" href="css/contact-form.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/about.css">

    <!-- REVIEWS SLIDER CSS -->
    <link rel="stylesheet" href="css/reviews-slider.css">

    <!-- MOBILE NAVAGATION CSS -->
    <link rel="stylesheet" href="css/mobile-nav.css">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Emilys+Candy&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- MOBILE NAVAGATION JAVASCRIPT-->
    <script src="js/mobile-nav.js" defer></script>

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/097e6a8a28.js" crossorigin="anonymous"></script>

    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title><?= $business_name ?></title>

</head>

<body>
    <nav class="mobile-nav-index" style="position:fixed;z-index:99999999999;background:<?= $main_color ?>;top:0">
        <div style="padding 0 20px;height:100%" class="mobile-header">
            <div style="height:100%" class="mobile-navbar">
                <?php if (!isset($user)): ?>
                <div class="mobile-nav-logo">
                    <h1 style="font-size: 2rem;margin-top:0 !important">SALON</h1>
                </div>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <ul style="background:<?= $main_color ?>" class="mobile-nav-menu">
                    <li style="display:inline-block;padding:1rem"><a href="index">HOME</a></li>
                    <li style="display:inline-block;padding:1rem"><a href="book-appointment">BOOK NOW</a></li>
                    <li style="display:inline-block;padding:1rem"><a href="all-services">SERVICES</a></li>
                    <li style="display:inline-block;padding:1rem"><a href="photo-gallery">GALLERY</a></li>
                    <li style="display:inline-block;padding:1rem"><a href="about">ABOUT</a></li>
                </ul>
                <?php elseif (isset($user)): ?>
                <div class="mobile-nav-logo">
                    <h1 style="font-size: 2rem">SALON</h1>
                </div>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <ul style="background:<?= $main_color ?>" class="mobile-nav-menu">
                    <li style="display:inline-block;padding:1rem"><a href="index">HOME</a></li>
                    <li style="display:inline-block;padding:1rem"><a href="book-appointment">BOOK NOW</a></li>
                    <li style="display:inline-block;padding:1rem"><a href="all-services">SERVICES</a></li>
                    <li style="display:inline-block;padding:1rem"><a href="photo-gallery">GALLERY</a></li>
                    <li style="display:inline-block;padding:1rem"><a href="about">ABOUT</a></li>
                    <li style="display:inline-block;padding:1rem"><a href="edit-homepage">EDIT WEBSITE</a></li>
                    <li style="display:inline-block;padding:1rem"><a href="logout">LOGOUT</a></li>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>