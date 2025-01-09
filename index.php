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

<section id="header-section">
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
    <div style="height:200px !important; width:200px !important; position:absolute; top:100px; display:block!important;z-index:9999999999999999999999999999999999999999999999999999"
        class="content">

        <div class="hero">

            <div class="title">
                <p class="montserrat-alternates-semibold"><?= $business_name ?></p>
            </div>
        </div>

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
            <h2 style="position:relative;z-index:3;padding-top: 30px;">Pamper Yourself</h2>
            <p style="margin:20px 0;">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Voluptate optio amet explicabo velit dolor iusto saepe vel, quod ex eligendi omnis magnam incidunt
                cupiditate ipsa.</p>


            <div class="reviews-slider-container">
                <div class="reviews-box rotating-imgs-container">
                    <span style="--i:1;"><img src="images/09.jpg" alt=""></span>
                    <span style="--i:2;"><img src="images/02.jpg" alt=""></span>
                    <span style="--i:3;"><img src="images/03.jpg" alt=""></span>
                    <span style="--i:4;"><img src="images/04.jpg" alt=""></span>
                    <span style="--i:5;"><img src="images/05.jpg" alt=""></span>
                    <span style="--i:6;"><img src="images/06.jpg" alt=""></span>
                    <span style="--i:7;"><img src="images/07.jpg" alt=""></span>
                    <span style="--i:8;"><img src="images/08.jpg" alt=""></span>
                </div>
            </div>
            <div class="rotating-imgs-view-gallery-btn"
                style=" display: flex; justify-content: center;">
                <a style="background:black;color:white; opacity:.8" class="btn sec-two-btn" href="photo-gallery">GALLERY</a>
            </div>
        </div>
            <img style="background-attachment:fixed;background-repeat: no-repeat; background-position: center; background-size: cover;width:100vw;height:100vh; background-position:center;" src="images/<?= $para_three_img ?>" alt="">
        <!-- <div
            style="background:url('images/<?= $para_three_img ?>');background-attachment:fixed;background-repeat: no-repeat; background-position: center; background-size: cover;width:100vw;height:100vh; background-position:center;margin-top:60px">
        </div> -->
    </div>



    <!-- REVIEWS -->

    <section class="stylist-section" style="display:flex;justify-content: center;
    align-items: center;position: relative;background:black">
    <img style="position:absolute;top:0;background-attachment:fixed; background-repeat: no-repeat;width: 100%;height: 100vh;background-position: center" src="images/stylist-card-bkgd-1.jpg" alt="">
        <div class="stylist-container swiper">
            <div class="stylist-slider-container">
                <h2 style="text-align: center;margin:50px 0 20px;color:#fff"><?= $reviews_title ?></h2>
                <div style="margin-top:100px" class="stylist-card-wrapper swiper-wrapper">

                    <div style="height:440px; position:relative" class="stylist-card swiper-slide">
                        <img style="position:absolute;height:150px;width:150px; top:-50px"
                            class="photo-gallery-card-image" src="./images/<?= $reviewers_img_1 ?>"
                            alt="<?= $reviewers_img_desc_1 ?>">
                        <div
                            style="position:absolute;top:50px;display:flex;flex-direction:column;align-items:center;padding: 20px">
                            <h2><?= $reviewers_name_1 ?></h2>
                            <p><?= $reviewers_comments_1 ?></p>
                        </div>
                        <a class="btn reviews-btn" href="book-appointment">BOOK NOW</a>
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
                        <a class="btn reviews-btn" href="book-appointment">BOOK NOW</a>
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

                        <a class="btn reviews-btn" href="book-appointment">BOOK NOW</a>
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
                        <a class="btn reviews-btn" href="book-appointment">BOOK NOW</a>
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

                        <a class="btn reviews-btn" href="book-appointment">BOOK NOW</a>
                    </div>
                </div>
                <div class="swiper-button-next swiperNav_btn"></div>
                <div class="swiper-button-prev swiperNav_btn"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>


    <!-- POPULAR SERVICES -->

    <div class="popular-services" style="text-align: left;">

        <div class="popular-services-container">
            <div class="popular-services-text-and-imgs-container" style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                <div>
                    <img class="our-services-left-img"
                        style="width:200px;height:auto;position:absolute;z-index:9;top:50px;left:-20px;margin-top:-40px"
                        src="bkgd-images/makeup-cups.png" alt="">
                    <p style="color:#000; text-align: center; font-size: 2rem; padding: 4rem 0 2rem;text-decoration:underline;text-decoration-color:red;text-underline-offset:8px">OUR SERVICES</p>
                    <img class="our-services-right-img"
                        style="width:150px;height:auto;position:absolute;z-index:9;top:-40px;right:20px;margin-top:60px"
                        src="bkgd-images/nail-polish.png" alt="">
                    <p class="our-services-2nd-p-tag">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Et optio cumque
                        porro dolorum qui, assumenda exercitationem at dolor recusandae eligendi soluta ducimus in
                        libero corporis architecto deserunt officiis laborum facilis facere, fuga mollitia nostrum!
                        Eaque commodi fuga ex odio delectus!</p>
                </div>

                <!-- <p style="color:#fff; text-align: center; font-size: 2rem; padding: 4rem 0 2rem;">
                    <?= $service_title ?></p> -->
            </div>



            <div class="services-containers">
                <div class="service-container">

                    <?php
                            $chosen_services_query = 'SELECT * FROM services_chosen LIMIT 6';
                            $chosen_services_info = mysqli_query($conn, $chosen_services_query);
                        ?>

                    <?php while ($chosen_services = mysqli_fetch_assoc($chosen_services_info)) : ?>

                    <div>
                        <img style="max-height:400px;  border-top-left-radius: 50px; border-bottom-right-radius: 50px;"
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
                <a style="background:black;color:white" class="btn" href="all-services">VIEW SERVICES</a>
            </div>
        </div>



        <section class="stylist-section" style="background:black">
            <img style="position:absolute;background-attachment:fixed; background-repeat: no-repeat;width: 100%;height: 100vh;background-position: center" src="images/stylist-card-bkgd-1.jpg" alt="">
        <!-- <section class="stylist-section"
            style="background-image:url(images/stylist-card-bkgd-1.jpg);background-attachment:fixed; background-repeat: no-repeat;"> -->
            <div class="stylist-container swiper">
                <div class="stylist-slider-container">
                    <h2 style="text-align: center;margin-bottom: 20px;color:#fff">OUR STYLISTS</h2>
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
                            <a style="position:absolute;bottom:25px" class="btn" href="book-appointment">BOOK NOW</a>
                        </div>
                        <?php endwhile ?>
                    </div>
                    <div class="swiper-button-next swiperNav_btn"></div>
                    <div class="swiper-button-prev swiperNav_btn"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <?php
            require_once 'contact.php';
        ?>

        <!-- CONTACT -->
        <!-- <section id="contact" class="contact">
            <h1 style="color:#F40212">SALON</h1>
            <div class="contact-content">
                <h2><?= $contact_page_title ?></h2>
                
            </div>
            <div class="contact-container">
                <div class="contactInfo">
                    <div class="contact-box">
                        <div class="contact-icon"><b></b><i class="fa-solid fa-location-pin"></i></div>
                        <div class="text">
                            <h3>Address</h3>
                            <p><?= $street_number ?><span> </span><?= $street_name ?><br><?= $city_name ?>,
                                <?= $state_name ?>,<br><?= $zip_code ?></p>
                        </div>
                    </div>
                    <div class="contact-box">
                        
                        <div class="contact-icon"><b></b><i class="fa-solid fa-phone"></i></div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p><?= $phone ?></p>
                        </div>
                    </div>
                    <div class="contact-box">
                        <div class="contact-icon"><b></b><i class="fa-solid fa-envelope"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p><?= $email ?></p>
                        </div>
                    </div>
                    <div style="display:flex;flex-direction:column">
                        <h2 class="txt">Connect with us</h2>
                        <ul class="sci">
                            <li><a href="<?= $facebook ?>" target="_blank" rel="noreferrer noopener"><i
                                        class="fa-brands fa-facebook-f"></i></a></li>

                            <li><a href="<?= $instagram ?>" target="_blank" rel="noreferrer noopener"><i
                                        class="fa-brands fa-instagram"></i></a></li>

                            <li><a href="<?= $tiktok ?>" target="_blank" rel="noreferrer noopener"><i
                                        class="fa-brands fa-tiktok"></i></a></li>

                            <li><a href="<?= $linkedin ?>" target="_blank" rel="noreferrer noopener"><i
                                        class="fa-brands fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="map-and-message-container">
                    <div style="width:30vw" id='google-map' class="map">
                        <iframe src="<?= $google_map_url ?>" style="border:0; width:100%; height: 426px; padding:20px"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="contactForm">
                        <form action="backend/add_contact_form_message.php" method="post">
                            <h2>Send Message</h2>
                            <div class="inputBox">
                                <input type="text" name="contact_form_name" required="required">
                                <span>Full Name</span>
                            </div>
                            <div class="inputBox">
                                <input type="phone" name="contact_form_phone" required="required">
                                <span>Phone</span>
                            </div>
                            <div class="inputBox">
                                <input type="email" name="contact_form_email" required="required">
                                <span>Email</span>
                            </div>
                            <div class="inputBox">
                                <textarea name="contact_form_message" id="" required="required"></textarea>
                                <span>Type your message...</span>
                            </div>
                            <div class="inputBox">
                                <button class="contact-form-send-btn" type="submit"
                                    name="submit_contact_form">SEND</button>
                                
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>



        <footer style='background:#000; position:relative; z-index:9999999999;'>
            <div class="fbox">
                Copyright &copy; 2024 <?= $business_name; ?> | Website designed and powered by
                <a style='color:#fff; text-decoration:none' href="https://webqwick.com/"
                    target='_blank'>WebQwick.com</a>.
            </div>
            <div>
                All other trademarks, service marks and trade names referenced in this
                material are the property of their respective owner.
            </div>
        </footer> -->


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
            duration: 3,
            ease: "power4.inOut"
        }, "-=2");

        tl.to(".c-2 .item", {
            top: 0,
            stagger: -0.25,
            duration: 3,
            ease: "power4.inOut"
        }, "-=4");

        tl.to(".c-3 .item", {
            top: 0,
            stagger: 0.25,
            duration: 3,
            ease: "power4.inOut"
        }, "-=4");

        tl.to(".c-4 .item", {
            top: 0,
            stagger: -0.25,
            duration: 3,
            ease: "power4.inOut"
        }, "-=4");

        tl.to(".c-5 .item", {
            top: 0,
            stagger: 0.25,
            duration: 3,
            ease: "power4.inOut"
        }, "-=4");

        tl.to(".container", {
            scale: 6,
            duration: 4,
            ease: "powwer4.inOut"
        }, "-=1");

        tl.to("nav, .nav-item a, .title p, .slide-num p, .preview p, .preview ul", {
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