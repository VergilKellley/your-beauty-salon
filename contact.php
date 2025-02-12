<?php
    // session_start();
    require_once 'backend/db.php';
    require_once 'backend/display_business_address.php';
    require_once 'backend/display_contact_info.php';
    require_once 'backend/display_website_colors.php';
?>

    <section style="background:black" class="contact">
        <div class="contact-content">
            <h2><?= $contact_page_title ?></h2>
            <p><?= $contact_page_text ?></p>
        </div>
        <div class="contact-container">
            <div class="contactInfo">
                <div class="contact-box">
                    <div style="background: repeating-conic-gradient(from 27deg, white 0%, white 10%, transparent 10%, transparent 50%);" class="contact-icon"><b style="background:<?= $secondary_color ?>"></b><i class="fa-solid fa-location-pin"></i></div>
                    <div class="text">
                        <h3 style="color:<?= $secondary_color ?>; font-size:1.5rem; font-weight:bold">Address</h3>
                        <p><?= $street_number ?><span> </span><?= $street_name ?><br><?= $city_name ?>,
                            <?= $state_name ?>,<br><?= $zip_code ?></p>
                    </div>
                </div>
                <div class="contact-box">
                    <div class="contact-icon"><b style="background:<?= $secondary_color ?>"></b><i class="fa-solid fa-phone"></i></div>
                    <div class="text">
                        <h3 style="color:<?= $secondary_color ?>; font-size:1.5rem; font-weight:bold">Phone</h3>
                        <p><?= $business_phone ?></p>
                    </div>
                </div>
                <div class="contact-box">
                    <div class="contact-icon"><b style="background:<?= $secondary_color ?>"></b><i class="fa-solid fa-envelope"></i></div>
                    <div class="text">
                        <h3 style="color:<?= $secondary_color ?>; font-size:1.5rem; font-weight:bold">Email</h3>
                        <p><?= $business_email ?></p>
                    </div>
                </div>
                <h2 style="border-left: 15px solid <?= $secondary_color ?>; font-size:2rem" class="txt">Connect with us</h2>
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
            
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>

            <div class="contactForm">
                <form action="backend/add_contact_form_message.php" method="post">
                    <h2 style="color: <?= $secondary_color ?>">Send Message</h2>
                    <div style="border-bottom:2px solid <?= $secondary_color ?>" class="inputBox">
                        <input type="text" name="contact_form_name" required="required">
                        <span>Full Name</span>
                    </div>
                    <div style="border-bottom:2px solid <?= $secondary_color ?>" class="inputBox">
                        <input type="phone" name="contact_form_phone" required="required">
                        <span>Phone</span>
                    </div>
                    <div style="border-bottom:2px solid <?= $secondary_color ?>" class="inputBox">
                        <input type="email" name="contact_form_email" required="required">
                        <span>Email</span>
                    </div>
                    <div style="border-bottom:2px solid <?= $secondary_color ?>" class="inputBox">
                        <textarea name="contact_form_message" id="" required="required"></textarea>
                        <span>Type your message...</span>
                    </div>
                    <br />
                    
                    <div class="g-recaptcha" data-sitekey="6Lf1rMoqAAAAANIaD97DULvJR-RQt8FfgHlTN00a"></div>
                    <div class="inputBox">
                        
                        <!--<button style="background:<?= $secondary_color ?>; color:white;border:none" class="contact-form-send-btn" type="submit" value="submit" name="submit_contact_form">SEND</button>-->
                        
                        <!-- <input type="submit" value="Send" name="submit_contact_form"> -->
                    </div>
                    <br/>
                    <input type="submit" value="Submit"   style="background:<?= $secondary_color ?>; color:white;border:none" class="contact-form-send-btn" name="submit_contact_form">
                    
                    
                    <script>
                        $("form").submit(function(event) {
                          var recaptcha = $("#g-recaptcha-response").val();
                          if (recaptcha === "") {
                              event.preventDefault();
                              alert("Please check the recaptcha");
                          }
                        });
                    </script>

                </form>
    <!--                <form action="?" method="POST">-->
    <!--  <div class="g-recaptcha" data-sitekey="6Lf1rMoqAAAAANIaD97DULvJR-RQt8FfgHlTN00a"></div>-->
    <!--  <br/>-->
    <!--  <input type="submit" value="Submit">-->
    <!--</form>-->
            </div>
        </div>
    </section>

    <footer style='background:#000; position:relative; z-index:9999999999;'>
        <div class="fbox">
            <?php
        $year = date("Y");
        ?>
            <p style="text-align:center">Copyright &copy; <?= $year ?> <?= $business_name; ?> | Website designed & powered by <a style='color:#fff; text-decoration:none;padding:0' href="https://webqwick.com/" target='_blank'> webqwick.com.</a> <span> All other trademarks, service marks and trade names referenced in this material are the property of their respective owner.</span></p>
        </div>
    </footer>
</body>

</html>