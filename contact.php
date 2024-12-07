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
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem sit quia commodi ipsam nostrum nisi
                aut sunt libero repudiandae deserunt?</p>
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
                <!-- background: #01dbc2; -->
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
            <div style="width:35vw" id='google-map' class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d94931.28526405447!2d-87.73376788659829!3d41.965868789513195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d42.043303699999996!2d-87.6876873!4m5!1s0x880e2cb8112c6f11%3A0xc0f69f2a2e5409ff!2s150%20N%20Wacker%20Drive%20Building%2C%20150%20N%20Wacker%20Dr%20Suite%20660%2C%20Chicago%2C%20IL%2060606!3m2!1d41.8847641!2d-87.6373378!5e0!3m2!1sen!2sus!4v1733508054309!5m2!1sen!2sus"  style="border:0; width:100%; height: 426px; padding:20px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
            <div class="contactForm">
                <form action="">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="" required="required">
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="" required="required">
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="" id="" required="required"></textarea>
                        <span>Type your message...</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Send">
                    </div>
                </form>
            </div>
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