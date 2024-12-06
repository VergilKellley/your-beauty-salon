<?php
    require_once 'backend/db.php';
    require_once 'backend/display_business_address.php';
    require_once 'backend/display_contact_info.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- https://www.youtube.com/watch?v=b1Tceo_x32I left off at 15:59 -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contact-form.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://kit.fontawesome.com/097e6a8a28.js" crossorigin="anonymous"></script>
    <title>Your Beauty Salon</title>
</head>
<body>
    <nav>
        <div class="nav-item">
            <a href="index.php" id="active">HOME<a>
        </div>
        <div class="nav-item">
            <a href="#" id="active">BOOK NOW<a>
        </div>
        <div class="nav-item">
            <a href="draggable-image-slider.php">GALLERY<a>
        </div>
        <!-- <div class="nav-item">
            <a href="contact.php">CONTACT<a>
        </div> -->
    </nav>
    <section class="contact">
        <div class="contact-content">
            <h2>Contact Us</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem sit quia commodi ipsam nostrum nisi aut sunt libero repudiandae deserunt?</p>
        </div>
        <div class="contact-container">
            <div class="contactInfo">
                <div class="contact-box">
                    <div class="contact-icon"><b></b><i class="fa-solid fa-location-pin"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>555 Broadway Road, <br>Chicago, Illinos,<br>60640</p>
                    </div>
                </div>
                <div class="contact-box">
                    <div class="contact-icon"><b></b><i class="fa-solid fa-phone"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>000-000-0000</p>
                    </div>
                </div>
                <div class="contact-box">
                    <div class="contact-icon"><b></b><i class="fa-solid fa-envelope"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>contact@yourbeautysalon.com</p>
                    </div>
                </div>
                <h2 class="txt">Connect with us</h2>
                <ul class="sci">
                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-tiktok"></i></a></li>
                    <!-- <li><a href=""></a></li> -->
                </ul>
            </div>
            <div class="contactForm"></div>
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
</body>
</html>