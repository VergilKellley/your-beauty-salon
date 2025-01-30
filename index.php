<?php
require 'header.php';


  if (isset($_SESSION["user_id"])) {

    require "backend/db.php";
    $msqli = $conn;
    // $msqli = require __DIR__ . "backend/db.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $msqli->query($sql);

    $user = $result->fetch_assoc();
} else {
    echo "";
}


?>

<section style="background:<?= $main_color ?>" id="header-section">
    <div class="container">
        <div class="col c-1">
            <div class="item"><img src="./assets/<?= $landing_page_img_1 ?>" alt="<?= $landing_page_img_1_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_2 ?>" alt="<?= $landing_page_img_2_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_3 ?>" alt="<?= $landing_page_img_3_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_4 ?>" alt="<?= $landing_page_img_4_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_5 ?>" alt="<?= $landing_page_img_5_desc ?>">
            </div>
        </div>
        <div class="col c-2">
            <div class="item"><img src="./assets/<?= $landing_page_img_6 ?>" alt="<?= $landing_page_img_6_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_7 ?>" alt="<?= $landing_page_img_7_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_8 ?>" alt="<?= $landing_page_img_8_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_9 ?>" alt="<?= $landing_page_img_9_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_10 ?>" alt="<?= $landing_page_img_10_desc ?>">
            </div>
        </div>
        <div class="col c-3">
            <div class="item"><img src="./assets/<?= $landing_page_img_11 ?>" alt="<?= $landing_page_img_11_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_12 ?>" alt="<?= $landing_page_img_12_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_13 ?>" alt="<?= $landing_page_img_13 ?>"></div>
            <div class="item"><img src="./assets/<?= $landing_page_img_14 ?>" alt="<?= $landing_page_img_14_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_15 ?>" alt="<?= $landing_page_img_15_desc ?>">
            </div>
        </div>
        <div class="col c-4">
            <div class="item"><img src="./assets/<?= $landing_page_img_1 ?>" alt="<?= $landing_page_img_1_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_2 ?>" alt="<?= $landing_page_img_2_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_3 ?>" alt="<?= $landing_page_img_3_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_4 ?>" alt="<?= $landing_page_img_4_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_5 ?>" alt="<?= $landing_page_img_5_desc ?>">
            </div>
        </div>
        <div class="col c-5">
            <div class="item"><img src="./assets/<?= $landing_page_img_6 ?>" alt="<?= $landing_page_img_6_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_7 ?>" alt="<?= $landing_page_img_7_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_8 ?>" alt="<?= $landing_page_img_8_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_9 ?>" alt="<?= $landing_page_img_9_desc ?>">
            </div>
            <div class="item"><img src="./assets/<?= $landing_page_img_10 ?>" alt="<?= $landing_page_img_10_desc ?>">
            </div>
        </div>
    </div>
    <div id="business-name"
        style="position:absolute; display:block!important;z-index:999"
        class="content active">

        <div style="display:flex; justify-content:center; align-items:center" class="hero">
            <div style="height:100%; width:100%" class="title">
                <p id="header-business-name" style="height:100%; width:100%; color:<?= $secondary_color ?>" class="montserrat-alternates-semibold">
                    <?= $business_name ?> </p>

                    <p><a id="header-phone" style="color:white;margin-top:10px;display:block;text-decoration:none" href="tel:<?= $business_phone ?>" href=""><?= $business_phone ?></a></p>

                    <p><a id="header-address" style="color:white;margin-top:10px;display:block;text-decoration:none" href="#contact"><?= $street_number ?> <?= $street_name ?> <?= $city_name ?>
                    <?= $state_name ?>, <?= $zip_code ?></a></p>
                    
                    <!-- <span ><a style="color:white;text-decoration:none;display:block"href="#contact"></a></span><span style="display:block;"></span> -->
            </div>
        </div>

        <script>
        let $businessName = $("#business-name");
        setTimeout(function() {
            $businessName.addClass("active");
        }, 5000);
        </script>
        <!-- <script>
        let $businessName = $("#business-name").removeClass("active");
        setTimeout(function() {
            $businessName.addClass("active");
        }, 5000);
        </script> -->
        <script>
        let $businessName = $("#business-name").removeClass("active");
        setTimeout(function() {
            $businessName.addClass("active");
        }, 5000);
        </script>

        <section id="top-footer">
            <div class="preview">
            </div>
        </section>
    </div>
</section>


<section class="content-container" style="background:white">
    <div style='position:relative; height:100vh'>

        <div style="position:absolute;top:0; bottom:0; right:0; left:0;background:#000; opacity:.5"></div>
        <div class="rotating-imgs-text" style="">
            <h2 style="position:relative;z-index:3;padding-top: 30px;"><?= $rotating_imgs_title ?></h2>
            <!-- <h2 style="position:relative;z-index:3;padding-top: 30px;">Pamper Yourself</h2> -->
            <p style="margin:20px 0;"><?= $rotating_imgs_text ?></p>
            <!-- <p style="margin:20px 0;">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Voluptate optio amet explicabo velit dolor iusto saepe vel, quod ex eligendi omnis magnam incidunt
                cupiditate ipsa.</p> -->


            <div class="reviews-slider-container">
                <div class="reviews-box rotating-imgs-container">
                    <span style="--i:1;"><img src="images/<?= $rotating_imgs_1 ?>"
                            alt="<?= $rotating_imgs_1_desc ?>"></span>
                    <span style="--i:2;"><img src="images/<?= $rotating_imgs_2 ?>"
                            alt="<?= $rotating_imgs_2_desc ?>"></span>
                    <span style="--i:3;"><img src="images/<?= $rotating_imgs_3 ?>"
                            alt="<?= $rotating_imgs_3_desc ?>"></span>
                    <span style="--i:4;"><img src="images/<?= $rotating_imgs_4 ?>"
                            alt="<?= $rotating_imgs_4_desc ?>"></span>
                    <span style="--i:5;"><img src="images/<?= $rotating_imgs_5 ?>"
                            alt="<?= $rotating_imgs_5_desc ?>"></span>
                    <span style="--i:6;"><img src="images/<?= $rotating_imgs_6 ?>"
                            alt="<?= $rotating_imgs_6_desc ?>"></span>
                    <span style="--i:7;"><img src="images/<?= $rotating_imgs_7 ?>"
                            alt="<?= $rotating_imgs_7_desc ?>"></span>
                    <span style="--i:8;"><img src="images/<?= $rotating_imgs_8 ?>"
                            alt="<?= $rotating_imgs_8_desc ?>"></span>
                </div>
            </div>
            <div class="rotating-imgs-view-gallery-btn" style=" display: flex; justify-content: center;">
                <a style="background:<?= $secondary_color ?>;color:white;" class="btn sec-two-btn"
                    href="photo-gallery">GALLERY</a>
            </div>
        </div>
        <img style="background-attachment:fixed;background-repeat: no-repeat; background-position: center; background-size: cover;width:100vw;height:100vh; background-position:center;"
            src="images/<?= $rotating_imgs_bkgd_img ?>" alt="<?= $rotating_imgs_bkgd_img_desc ?>">
    </div>



    <!-- REVIEWS -->

    <section class="stylist-section" style="display:flex;justify-content: center;
    align-items: center;position: relative;background:black">
        <img style="position:absolute;top:0;background-attachment:fixed; background-repeat: no-repeat;width: 100%;height: 100vh;background-position: center"
            src="images/<?= $reviews_bkgd_img ?>" alt="<?= $reviews_bkgd_img_desc ?>">
        <!-- <img style="position:absolute;top:0;background-attachment:fixed; background-repeat: no-repeat;width: 100%;height: 100vh;background-position: center" src="images/stylist-card-bkgd-1.jpg" alt=""> -->
        <div class="stylist-container swiper">
            <div class="stylist-slider-container">
                <h2 style="text-align: center;margin:50px 0 20px;color:#fff"><?= $reviews_title ?></h2>
                <div style="margin-top:100px" class="stylist-card-wrapper swiper-wrapper">

                    <div style="height:440px; position:relative" class="stylist-card swiper-slide">
                        <img style="position:absolute;height:150px;width:150px; top:-50px"
                            class="photo-gallery-card-image" src="./images/<?= $reviewers_img_1 ?>"
                            alt="<?= $reviewers_img_desc_1 ?>">
                        <div
                            style="position:absolute;top:50px;display:flex;flex-direction:column;align-items:center;padding: 30px">
                            <h2><?= $reviewers_name_1 ?></h2>
                            <p><?= $reviewers_comments_1 ?></p>
                        </div>
                        <a style="background:<?= $secondary_color ?>" class="btn reviews-btn"
                            href="book-appointment">BOOK NOW</a>
                    </div>
                    <div style="height:440px; position:relative" class="stylist-card swiper-slide">
                        <img style="position:absolute;height:150px;width:150px; top:-50px"
                            class="photo-gallery-card-image" src="./images/<?= $reviewers_img_2 ?>"
                            alt="<?= $reviewers_img_desc_2 ?>">
                        <div
                            style="position:absolute;top:50px;display:flex;flex-direction:column;align-items:center;padding: 20px">
                            <h2><?= $reviewers_name_2 ?></h2>
                            <p><?= $reviewers_comments_2 ?></p>
                        </div>
                        <a style="background:<?= $secondary_color ?>" class="btn reviews-btn"
                            href="book-appointment">BOOK NOW</a>
                    </div>
                    <div style="height:440px; position:relative" class="stylist-card swiper-slide">
                        <img style="position:absolute;height:150px;width:150px; top:-50px"
                            class="photo-gallery-card-image" src="./images/<?= $reviewers_img_3 ?>"
                            alt="<?= $reviewers_img_desc_3 ?>">
                        <div
                            style="position:absolute;top:50px;display:flex;flex-direction:column;align-items:center;padding: 20px">
                            <h2><?= $reviewers_name_3 ?></h2>
                            <p><?= $reviewers_comments_3 ?></p>
                        </div>

                        <a style="background:<?= $secondary_color ?>" class="btn reviews-btn"
                            href="book-appointment">BOOK NOW</a>
                    </div>
                    <div style="height:440px; position:relative" class="stylist-card swiper-slide">

                        <img style="position:absolute;height:150px;width:150px; top:-50px"
                            class="photo-gallery-card-image" src="./images/<?= $reviewers_img_4 ?>"
                            alt="<?= $reviewers_img_desc_4 ?>">
                        <div
                            style="position:absolute;top:50px;display:flex;flex-direction:column;align-items:center;    padding: 20px">
                            <h2><?= $reviewers_name_4 ?></h2>
                            <p><?= $reviewers_comments_4 ?></p>
                        </div>
                        <a style="background:<?= $secondary_color ?>" class="btn reviews-btn"
                            href="book-appointment">BOOK NOW</a>
                    </div>
                    <div style="height:440px; position:relative" class="stylist-card swiper-slide">
                        <img style="position:absolute;height:150px;width:150px; top:-50px;"
                            class="photo-gallery-card-image" src="./images/<?= $reviewers_img_5 ?>"
                            alt="<?= $reviewers_img_desc_5 ?>">
                        <div
                            style="position:absolute;top:50px;display:flex;flex-direction:column;align-items:center;    padding: 20px">
                            <h2><?= $reviewers_name_5 ?></h2>
                            <p><?= $reviewers_comments_5 ?></p>
                        </div>

                        <a style="background:<?= $secondary_color ?>" class="btn reviews-btn"
                            href="book-appointment">BOOK NOW</a>
                    </div>
                </div>
                <div class="swiper-button-next swiperNav_btn"></div>
                <div class="swiper-button-prev swiperNav_btn"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>


    <!-- SERVICES -->

    <div style="background:white" class="popular-services" style="text-align: left;">

        <div style="background:white;border:2px solid <?= $main_color ?>" class="popular-services-container">
            <div class="popular-services-text-and-imgs-container"
                style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                <div>
                    <img class="our-services-left-img"
                        style="width:200px;height:auto;position:absolute;z-index:9;top:50px;left:-20px;margin-top:-40px"
                        src="bkgd-images/<?= $left_services_img ?>" alt="<?= $left_services_img_desc ?>">
                    <h3
                        style="color:#000; text-align: center; font-size: 2rem; padding: 4rem 0 2rem;text-decoration:underline;text-decoration-color:<?= $secondary_color ?>;text-underline-offset:15px">
                        <?= $our_services_title ?></h3>
                    <img class="our-services-right-img"
                        style="width:150px;height:auto;position:absolute;z-index:9;top:-40px;right:20px;margin-top:60px"
                        src="bkgd-images/<?= $right_services_img ?>" alt="<?= $right_services_img_desc ?>">
                    <p class="our-services-2nd-p-tag"><?= $our_services_text ?></p>
                </div>
            </div>



            <div class="services-containers">
                <div class="service-container">
                    <?php
                            $chosen_services_query = 'SELECT * FROM services_chosen LIMIT 6';
                            $chosen_services_info = mysqli_query($conn, $chosen_services_query);
                        ?>

                    <?php while ($chosen_services = mysqli_fetch_assoc($chosen_services_info)) : ?>

                    <div style="background:<?= $main_color ?>">
                        <img style="max-height:400px;   border-top-left-radius: 50px; border-bottom-right-radius: 50px;"
                            src="images/<?= $chosen_services['service_img'] ?>"
                            alt="<?= $chosen_services['service_img_desc'] ?>">
                        <h2 style="margin-top:20px"><?= $chosen_services['service_title'] ?></h2>
                        <!-- <p><?= $chosen_services['services_description'] ?></p> -->
                    </div>
                    <?php endwhile ?>
                </div>
            </div>
            <div class="popular-services-btn"
                style="margin:2rem 0 6rem; width:100%; display: flex; justify-content: center;">
                <a style="background:<?= $secondary_color ?>;color:white" class="btn" href="all-services">VIEW
                    SERVICES</a>
            </div>
        </div>



        <section class="stylist-section" style="background:black">
            <img style="position:absolute;background-attachment:fixed; background-repeat: no-repeat;width: 100%;height: 100vh;background-position: center"
                src="images/<?= $stylist_bkgd_img ?>" alt="<?= $stylist_bkgd_img_desc ?>">
            <div class="stylist-container swiper">
                <div class="stylist-slider-container">
                    <h2 style="text-align: center;margin-bottom: 20px;color:#fff"><?= $our_stylist_title ?></h2>
                    <div class="stylist-card-wrapper swiper-wrapper">

                        <?php
                        $stylist_info_query = 'SELECT * FROM stylist_info ORDER BY id ASC';
                        $stylist_info_info = mysqli_query($conn, $stylist_info_query);
                    ?>

                        <?php while ($stylist_info = mysqli_fetch_assoc($stylist_info_info)) : ?>

                        <div style="height:500px; position:relative" class="stylist-card swiper-slide">

                            <img class="stylist-card-image" src="./images/<?= $stylist_info['stylist_img'] ?>" alt="">
                            <h2><?= $stylist_info['stylist_name'] ?></h2>
                            <p><?= $stylist_info['stylist_title'] ?></p>
                            <a style="background:<?= $secondary_color ?>" style="position:absolute;margin-top:0"
                                class="btn" href="book-appointment">BOOK NOW</a>
                        </div>
                        <?php endwhile ?>
                    </div>
                    <div class="swiper-button-next swiperNav_btn"></div>
                    <div class="swiper-button-prev swiperNav_btn"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <div id="contact"></div>
        <?php
            require_once 'contact.php';
        ?>


        <!-- FADE IMAGE -->
        <script src="js/image-fade.js"></script>

        <!-- <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
  -->

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Stylist Card Slider JS FOR OUR STYLIST SECTION-->
        <script src="js/stylist-card.js"></script>

        <!-- GSAP JS FOR LANDING PAGE IMAGES-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

        <script>
        let tl = gsap.timeline({
            delay: 0
        });

        tl.to(".col", {
            top: 0,
            duration: 1,
            ease: "power4.inOut"
        });

        tl.to(".c-1 .item", {
            top: 0,
            stagger: 0.25,
            duration: 2.5,
            ease: "power4.inOut"
        }, "-=2");

        tl.to(".c-2 .item", {
            top: 0,
            stagger: -0.25,
            duration: 2.5,
            ease: "power4.inOut"
        }, "-=4");

        tl.to(".c-3 .item", {
            top: 0,
            stagger: 0.25,
            duration: 2.5,
            ease: "power4.inOut"
        }, "-=4");

        tl.to(".c-4 .item", {
            top: 0,
            stagger: -0.25,
            duration: 2.5,
            ease: "power4.inOut"
        }, "-=4");

        tl.to(".c-5 .item", {
            top: 0,
            stagger: 0.25,
            duration: 2.5,
            ease: "power4.inOut"
        }, "-=4");

        tl.to(".container", {
            scale: 6,
            duration: 2,
            ease: "powwer4.inOut"
        }, "-=1");

        tl.to("nav, .nav-item a, .title > p, .slide-num p, .preview p, .preview ul", {
            top: 0,
            stagger: 0.075,
            duration: 1,
            ease: "power3.out"
        }, "-=1.5");

        tl.to(".icon i, .icon-2 i", {
            scale: 1,
            stagger: 0.05,
            ease: "power3.out"
        }, "-=1");
        </script>
        </body>

        </html>