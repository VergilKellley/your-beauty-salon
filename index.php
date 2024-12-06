<?php
require_once 'backend/db.php';
require 'header.php';
require_once 'backend/display_business_address.php';
require_once 'backend/display_contact_info.php';
?>
<section id="header-section">
    <div class="container">
        <div class="col c-1">
            <div class="item"><img src="./assets/img1.jpg" alt=""></div>
            <div class="item"><img src="./assets/img2.jpg" alt=""></div>
            <div class="item"><img src="./assets/img3.jpg" alt=""></div>
            <div class="item"><img src="./assets/img4.jpg" alt=""></div>
            <div class="item"><img src="./assets/img5.jpg" alt=""></div>
        </div>
        <div class="col c-2">
            <div class="item"><img src="./assets/img6.jpg" alt=""></div>
            <div class="item"><img src="./assets/img7.jpg" alt=""></div>
            <div class="item"><img src="./assets/img8.jpg" alt=""></div>
            <div class="item"><img src="./assets/img9.jpg" alt=""></div>
            <div class="item"><img src="./assets/img10.jpg" alt=""></div>
        </div>
        <div class="col c-3">
            <div class="item"><img src="./assets/img11.jpg" alt=""></div>
            <div class="item"><img src="./assets/img12.jpg" alt=""></div>
            <div class="item"><img src="./assets/img13.jpg" alt=""></div>
            <div class="item"><img src="./assets/img14.jpg" alt=""></div>
            <div class="item"><img src="./assets/img15.jpg" alt=""></div>
        </div>
        <div class="col c-4">
            <div class="item"><img src="./assets/img1.jpg" alt=""></div>
            <div class="item"><img src="./assets/img2.jpg" alt=""></div>
            <div class="item"><img src="./assets/img3.jpg" alt=""></div>
            <div class="item"><img src="./assets/img4.jpg" alt=""></div>
            <div class="item"><img src="./assets/img5.jpg" alt=""></div>
        </div>
        <div class="col c-5">
            <div class="item"><img src="./assets/img6.jpg" alt=""></div>
            <div class="item"><img src="./assets/img7.jpg" alt=""></div>
            <div class="item"><img src="./assets/img8.jpg" alt=""></div>
            <div class="item"><img src="./assets/img9.jpg" alt=""></div>
            <div class="item"><img src="./assets/img10.jpg" alt=""></div>
        </div>
    </div>
    <div class="content">
        <nav>
            <!-- <div class="nav-item">
                <a href="index.php" id="active">HOME<a>
            </div> -->
            <div class="nav-item">
                <a href="#" id="active">BOOK NOW<a>
            </div>
            <div class="nav-item">
                <a href="draggable-image-slider.php">GALLERY<a>
            </div>
            <div class="nav-item">
                <a href="contact.php">CONTACT<a>
            </div>
        </nav>

        <div class="hero">
            <div class="icon"><i></i></div>
            <!-- <div class="icon"><ion-icon name="add-sharp"></ion-icon></div> -->
            <div class="title">
                <p>Your Beauty Salon</p>
            </div>
            <!-- <div class="icon-2"><i>X</i></div> -->
            <!-- <div class="icon-2"><ion-icon name="add-sharp"></ion-icon></div> -->
        </div>

        <section id="top-footer">
            <div class="preview">
                <!-- <h1 style="position: relative; top: 100px;color:#fff">Hours</h1> -->
                <!-- <p style="position: relative; top: 100px;color:#fff; text-align: left; font-size: 1.5rem; ">Hours</p> -->
                <ul
                    style="display:flex; gap:15px; position: relative; top: 100px; list-style: none; color:#fff; position: relative; top: 100px">
                    <div>
                        <li>Mon - Closed</li>
                        <li>Tue - 9am - 6pm</li>
                        <li>Wed - 9am - 6pm</li>
                        <li>Thu - 9am - 6pm</li>
                    </div>
                    <div>
                        <li>Fri - 9am - 6pm</li>
                        <li>Sat - 8am - 5pm</li>
                        <li>Sun - Closed</li>
                    </div>

                </ul>

                <!-- <img src="./assets/img1.jpg" alt="">
                <img src="./assets/img2.jpg" alt="">
                <img src="./assets/img3.jpg" alt="">
                <img src="./assets/img4.jpg" alt="">
                <img src="./assets/img5.jpg" alt="">
                <img src="./assets/img6.jpg" alt="">
                <img src="./assets/img7.jpg" alt=""> -->
            </div>

            <!-- <div class="slide-num"><p>1 &mdash; 3</p></div> -->
        </section>
    </div>
</section>
<section class="content-container">

    <div class="section-containers second-container">
        
        <div class="second-section-left-container" style="position: relative;display:flex; flex-direction:column;align-items:center">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi consequatur accusantium sit?</p>
            <div style="border:8px solid #f40212; position:relative; height:270px; width:300px; margin-top:200px" class="sec-two-right-side-img-container">
                <img style="position:absolute;bottom:0; z-index:2;height:175%" src="./assets/img21.jpg" alt="">
            </div>
        </div>
        <div class="second-section-right-container">
            <!-- <div>
                    <div class="service-container">
                        <p style="text-align: left; font-size: 1.5rem; ">Hours</p>
                        <ul style="list-style: none; color:#fff">
                            <li>Monday - Closed</li>
                            <li>Tues - 9am - 6pm</li>
                            <li>Wednesday - 9am - 6pm</li>
                            <li>Thursday - 9am - 6pm</li>
                            <li>Friday - 9am - 6pm</li>
                            <li>Saturday - 8am - 5pm</li>
                            <li>Suday - Closed</li>
                        </ul>
                    </div>
                </div> -->
            <div>
                <h1 style="color:aliceblue; font-size: 2rem; text-align: center;">Your Beauty Salon</h1>
            </div>

            <div class="small-photos">
                <img style="border-radius:5px" src="images/salon.jpg" alt="">
                <!-- <img src="./assets/img11.jpg" alt="">
                <img src="./assets/img2.jpg" alt="">
                <img class="display-none-on-mobile" src="./assets/img1.jpg" alt="">
                <img class="display-none-on-mobile" src="./assets/img8.jpg" alt=""> -->
            </div>
            <div style="display: flex; gap: 20px;">
                <button class="btn sec-two-btn">Book Now</button>
                <button class="btn sec-two-btn">Photo Gallery</button>
            </div>
        </div>
    </div>

    <section class="stylist-section">

        <div class="stylist-container swiper">

            <div class="stylist-slider-container">
                <h2 style="text-align: center;margin-bottom: 20px;color:#fff">OUR STYLISTS</h2>
                <div class="stylist-card-wrapper swiper-wrapper">
                    <div class="stylist-card swiper-slide">
                        <img class="stylist-card-image" src="./images/stylist1.jpg" alt="">
                        <h2>Ella</h2>
                        <p>Hair Stylist</p>
                        <button>Book Now</button>
                    </div>
                    <div class="stylist-card swiper-slide">
                        <img class="stylist-card-image" src="./images/stylist2.jpg" alt="">
                        <h2>Virginia</h2>
                        <p>Makeup Artist</p>
                        <button>Book Now</button>
                    </div>
                    <div class="stylist-card swiper-slide">
                        <img class="stylist-card-image" src="./images/stylist3.jpg" alt="">
                        <h2>Maria</h2>
                        <p>Manicurist</p>
                        <button>Book Now</button>
                    </div>
                    <div class="stylist-card swiper-slide">
                        <img class="stylist-card-image" src="./images/stylist4.jpg" alt="">
                        <h2>Josie</h2>
                        <p>Hair Stylist</p>
                        <button>Book Now</button>
                    </div>
                    <div class="stylist-card swiper-slide">
                        <img class="stylist-card-image" src="./images/stylist5.jpg" alt="">
                        <h2>Jaycell</h2>
                        <p>Manicurist</p>
                        <button>Book Now</button>
                    </div>
                    <div style="width: 300px !important;" class="stylist-card swiper-slide">
                        <img class="stylist-card-image" src="./images/stylist6.jpg" alt="">
                        <h2>Nina</h2>
                        <p>Makeup Artist</p>
                        <button>Book Now</button>
                    </div>
                </div>
                <div class="swiper-button-next swiperNav_btn"></div>
                <div class="swiper-button-prev swiperNav_btn"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>


    <div style="color:aliceblue; text-align: left; padding: 0 0 6rem;">
        <div style=" width: 80vw; margin:0 auto; border-radius: 5px; padding: 10px;">
            <div
                style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 10px;">
                <p style="color:#fff; text-align: center; font-size: 2rem; padding: 4rem 0 2rem;">POPULAR SERVICES</p>
            </div>

            <div style="position:relative; height: fit-content;" class="services-containers">
                <div class="service-container" style="position: relative;">
                    <h2>Hair Cuts</h2>
                    <p>Expert haircuts deliver precision, style, and personalized attention for a perfect look every
                        time.</p>
                </div>

                <div class="service-container">
                    <h2>Hair Styling</h2>
                    <p>Expert hairstyling offers creative, tailored designs that enhance and transform your hair with
                        professional finesse.</p>
                </div>
                <div class="service-container">
                    <h2>Hair Color</h2>
                    <p>Expert hair coloring provides vibrant, customized shades with professional techniques for
                        flawless, long-lasting results with a gentle plant based formula.</p>
                </div>
            </div>
            <div class="services-containers">
                <div class="service-container">
                    <h2>Smoothing Treatments</h2>
                    <p>Hair smoothing treatments, like Keratin Complex, s4Tec & Japanese Relaxer deliver sleek,
                        frizz-free hair with long-lasting, silky results.</p>
                </div>
                <div class="service-container">
                    <h2>Perms</h2>
                    <p>Professional perms and processes like American Wave, & Quantum create defined, lasting curls and
                        waves we can help style with expert precision and after care.</p>
                </div>
                <div class="service-container">
                    <h2>Hair Extensions</h2>
                    <p>Expert tape in & sew in hair extensions seamlessly add length and volume for a natural, luxurious
                        look.</p>
                </div>
            </div>
            <!-- <div class="services-containers">
                    <div class="service-container">
                        <h2>SCALP
                            TREATMENTS</h2>
                            <p>Expert scalp treatments like our Botanical Repair treatment rejuvenate and heal the scalp, promoting healthier hair growth and overall scalp wellness.</p>
                    </div>
                    <div class="service-container">
                        <h2>BEAUTY SERVICES</h2>
                        <p>Select treatments such as makeup applications, facial waxing, hand & scalp massages are available at select Gordon Salon locations!</p>
                    </div>
                    <div class="service-container">
                        <h2>WEDDING &
                            EVENTS</h2>
                            <p>Expert wedding and event services provide on location flawless, personalized styling to make you look stunning for your special occasion.</p>
                    </div>
                </div>    -->
        </div>
        <div style="width:100%; display: flex; justify-content: center;">
            <button
                style="border-radius:3px;background-color: white;color:#F40212;border: none;margin-top: 2rem; padding: 10px 17px; font-weight: bolder;">VIEW
                ALL SERVICES</button>
        </div>
    </div>
</section>

<section style='position:relative;background: #000;color:#fff' class="navBeforeFooter">
      <div class="box box-1">
        <!-- <div><h2 style='font-size:2.3rem'><?= $business_name; ?></h2></div> -->
        <div class="bf-text">Sign Up For Special Offers</div>
        <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum tempore quas eaque pariatur consequuntur quos.</p>

        <div class="bf-text">
          <p>Subscribe For Offers</p>
        </div>

        <div class="subscribe">
          <form style="display:flex; flex-direction:column; gap:1rem; color:#fff" action="backend/subscribe_logic.php" method="POST">
          <label for="email-address">Enter Email</label>
          <input id="email-address" type="email" name="email_address" required>
          <button style='background: <?= $accent_color; ?>; border 1px solid <?= $accent_color; ?>;' class="btn" name="submit_email_address">Subscribe</button>
          </form>
          
        </div>
      </div>
      <div class="box box-2">
        <div class="bf-text">Site Links</div>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="Services.php">Services</a></li>
          <li><a href="Portfolio.php">Gallery</a></li>
          <li><a href="Contact.php">Contact</a></li>
        </ul>

        <div class="icons">
          <a href="#" class="fa-brands fa-facebook-f"></a>
          <a href="#" class="fa-brands fa-instagram"></a>
          <!-- <a href="" class="fa-brands fa-google"></a>
          <a href="" class="fa-brands fa-youtube"></a> -->
        </div>
      </div>
      <div class="box box-3">
        <div class="bf-text">Say Hi!</div>
        <ul class="sayHiItem">
          <li><a href="mailto:contact@yourbarbershop.com"><?= $email; ?></a></li>
          <!-- <li>
            <a href="">contact@yoursalon.com</a>
          </li> -->
        </ul>

        <div class="bf-text">Call Us</div>
        <ul class="sayHiItem">
          <li><a href="tel:+19803351233"><?= $phone; ?></a></li>
        </ul>

        <div class="bf-text">Visit Us</div>
        <a href="contact.php#google-map" style='color:#fff; text-decoration: none'>
          <p><?= $street_address; ?></p>
          <p><?= $suite_unit; ?></p>
        <p><?= $city; ?>, <?= $business_state; ?> <?= $zip; ?></p></a>
        
      </div>
     </section>

    <footer style='background:#000; position:relative; z-index:9999999999'>
      <div class="fbox">
        Copyright &copy; 2024 <?= $business_name; ?> | Website designed and powered by
        <a style='color:#fff; text-decoration:none' href="https://webqwick.com/" target='_blank'>WebQwick.com</a>.
      </div>
      <div>
        All other trademarks, service marks and trade names referenced in this
        material are the property of their respective owner.
      </div>
    </footer>


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Stylist Card Slider JS -->
<script src="js/stylist-card.js"></script>

<!-- GSAP JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<script>
let tl = gsap.timeline({
    delay: 0
});

tl.to(".col", {
    top: 0,
    duration: 3,
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

tl.to(".nav-item a, .title p, .slide-num p, .preview p, .preview ul", {
    top: 0,
    stagger: 0.075,
    duration: 1,
    ease: "power3.out"
}, "-=1.5")

tl.to(".icon i, .icon-2 i", {
    scale: 1,
    stagger: 0.05,
    ease: "power3.out"
}, "-=1")
</script>
</body>
</html>