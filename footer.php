<?php
// require_once 'backend/db.php';
// require_once 'backend/display_about_page.php';
// require_once 'backend/display_about_images.php';
require_once 'backend/display_business_address.php';
// require_once 'backend/display_business_hours_mon.php';
// require_once 'backend/display_business_hours_tue.php';
// require_once 'backend/display_business_hours_wed.php';
// require_once 'backend/display_business_hours_thurs.php';
// require_once 'backend/display_business_hours_fri.php';
// require_once 'backend/display_business_hours_sat.php';
// require_once 'backend/display_business_hours_sun.php';
require_once 'backend/display_contact_info.php';
// require_once 'backend/display_gallery_page.php';
// require_once 'backend/display_header_image.php';
// require_once 'backend/display_index_images.php';
// require_once 'backend/display_index_page_styles_section.php';
// require_once 'backend/display_index_page_welcome_to.php';
// require_once 'backend/display_navigation.php';
// require_once 'backend/display_reviews.php';
// require_once 'backend/display_services_gallery.php';
// require_once 'backend/display_vip_services.php';
// require_once 'backend/display_website_colors.php';
// require_once 'backend/display_welcome_to_images.php';
?>
<!-- NAVIGATION BEFORE FOOTER -->
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