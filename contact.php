<?php
    // session_start();
    require_once 'backend/db.php';
    require_once 'backend/display_business_address.php';
    require_once 'backend/display_contact_info.php';
?>

    <section class="contact">
        <div class="contact-content">
            <h2><?= $contact_page_title ?></h2>
            <p><?= $contact_page_text ?></p>
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
            <div style="width:35vw" id='google-map' class="map">
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
                        <button class="contact-form-send-btn" type="submit" name="submit_contact_form">SEND</button>
                        <!-- <input type="submit" value="Send" name="submit_contact_form"> -->
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer style='background:#000; position:relative; z-index:9999999999;'>
        <div class="fbox">
            <p>Copyright &copy; 2025 <?= $business_name; ?> | Website designed & powered by<a style='color:#fff; text-decoration:none;padding:0' href="https://webqwick.com/" target='_blank'> webqwick.com</a>.</p>
            
            <p>All other trademarks, service marks and trade names referenced in this material are the property of their respective owner.</p>
        </div>
    </footer>
</body>

</html>