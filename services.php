<?php
  require_once 'header.php';
  require_once 'backend/display_services_images.php';
?>

<section class="sectionFirst">
    <div
        style="background-image: url('<?= $services_header_image; ?>'); width: 100%; height: 100%; position:absolute; top: 0; background-position: center; background-size: cover; background-repeat: no-repeat; z-index: -1;">
    </div>
    <h1>Services</h1>

    <section class="transform-img">
        <img src="img/curved-bkgd.svg" alt="curved background" />
    </section>
</section>

<!-- SECOND SECTION -->

<section class="aboutServices">
    <div class="ser-litText">Our Services</div>
    <p class="ser-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, esse.</p>

    <div class="ser-box">
        <div class="box">
            <div class="img">
                <img src="<?= $services_image_1; ?>" alt="<?= $services_image_1_alt; ?>">
            </div>
            <div class="boxinfo">
                <div class="ser-name">Fade Haircuts</div>
                <p class="ser-des">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet quae exercitationem
                    eius et, corrupti officiis.</p>
            </div>
        </div>
        <div class="box">
            <div class="img">
                <img src="<?= $services_image_2; ?>" alt="<?= $services_image_2_alt; ?>">
            </div>
            <div class="boxinfo">
                <div class="ser-name">Beard Trim</div>
                <p class="ser-des">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet quae exercitationem
                    eius et, corrupti officiis.</p>
            </div>
        </div>
        <div class="box">
            <div class="img">
                <img src="<?= $services_image_3; ?>" alt="<?= $services_image_3_alt; ?>">
            </div>
            <div class="boxinfo">
                <div class="ser-name">Line-up</div>
                <p class="ser-des">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet quae exercitationem
                    eius et, corrupti officiis.</p>
            </div>
        </div>
        <div class="box">
            <div class="img">
                <img src="<?= $services_image_4; ?>" alt="<?= $services_image_4_alt; ?>">
            </div>
            <div class="boxinfo">
                <div class="ser-name">Moustache and Goatee</div>
                <p class="ser-des">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet quae exercitationem
                    eius et, corrupti officiis.</p>
            </div>
        </div>
        <div class="box">
            <div class="img">
                <img src="<?= $services_image_5; ?>" alt="<?= $services_image_5_alt; ?>">
            </div>
            <div class="boxinfo">
                <div class="ser-name">Razor Fade</div>
                <p class="ser-des">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet quae exercitationem
                    eius et, corrupti officiis.</p>
            </div>
        </div>
        <div class="box">
            <div class="img">
                <img src="<?= $services_image_6; ?>" alt="<?= $services_image_6_alt; ?>">
            </div>
            <div class="boxinfo">
                <div class="ser-name">Kids Cuts</div>
                <p class="ser-des">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet quae exercitationem
                    eius et, corrupti officiis.</p>
            </div>
        </div>
    </div>
</section>


<!-- DISCOUNT SECTION -->
<section>
    <div style='display:flex; position:relative'>
        <div id='overlay'></div>
        <div style='position:relative; width: 100vw; overflow:hidden;'>

            <img style='position:absolute; width:100vw; height:100%; z-index: -3' src="img/discount-bkgd.jpg"
                alt="pink background">



            <div style='display:flex; justify-content:center; align-items:center'>
                <!-- <img style='width: 50%' src="img/25percent-discount.png" alt="25% discount" /> -->
                <div id='discount-text-div' class="textInfo;"
                    style='text-align:center; color:#fff; overflow:hidden; display:flex; flex-direction:column; justify-content:center; align-items: center; padding:0 20px'>
                    <h2 style='font-size: 28px'>Book Your Appointment Now and Get 25% off</h2>
                    <p style='font-size: 24px'>Awesome Summer Sale - 25% Off On All Professional Services</p>
                    <a style='color:#fff; font-size:20px; border:2px solid #fff; padding:10px 8px; text-decoration:none; max-width: 300px; border-radius:5px; margin-top: 20px' href="#">Book
                        Appointment</a>
                </div>
                <!-- <img style='width: 50%' src="img/25percent-discount.png" alt="25% discount" /> -->
            </div>
        </div>
    </div>
</section>

<!-- DISCOUNT SECTION -->
<!-- <section class="discountSection">
    <div class="img">
        <img src="img/25percent-discount.png" alt="25% discount" />
    </div>

    <div class="textInfo">
        <h2>Book Your Appointment Now and Get 25% off</h2>
        <p>Awesome Summer Sale - 25% Off On All Professional Services</p>
    </div>
    <a href="#">Book Appointment</a>
</section> -->

<!-- IMAGE SLIDER -->
<section class="slider">
    <div class="imgslider">
        <img class="slide" src="<?= $services_image_7; ?>" alt="<?= $services_image_7_alt; ?>">
        <img class="slide" src="<?= $services_image_8; ?>" alt="<?= $services_image_8_alt; ?>">
        <img class="slide" src="<?= $services_image_9; ?>" alt="<?= $services_image_9_alt; ?>">
        <img class="slide" src="<?= $services_image_10; ?>" alt="<?= $services_image_10_alt; ?>">
        <img class="slide" src="<?= $services_image_11; ?>" alt="<?= $services_image_11_alt; ?>">
        <img class="slide" src="<?= $services_image_12; ?>" alt="<?= $services_image_12_alt; ?>">

        <i class="fa-solid fa-chevron-left Prev" onclick="Prev()"></i>
        <i class="fa-solid fa-chevron-right Next" onclick="Next()"></i>
    </div>

    <div class="sliderText">
        <div class="st-heading">The Best Nail Technicians</div>
        <p class="lit-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, inventore laboriosam?
            Velit atque unde amet iusto nam, at reprehenderit repellendus!</p>

        <div class="lit-service">
            <div class="textinfo">
                <div class="ti-head">Nail Art Specials</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis impedit ipsa dolore numquam
                    eveniet accusantium.</p>
            </div>
            <div class="textinfo">
                <div class="ti-head">Popula Name Brands</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis impedit ipsa dolore numquam
                    eveniet accusantium.</p>
            </div>
            <div class="textinfo">
                <div class="ti-head">Nail care</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis impedit ipsa dolore numquam
                    eveniet accusantium.</p>
            </div>
        </div>
    </div>
</section>

<?php
      require_once 'footer.php';
    ?>