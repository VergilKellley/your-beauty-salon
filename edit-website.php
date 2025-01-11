<?php
    // session_start();
    require_once 'header-edit-pages.php';
?>
<section style="margin:10px">
    <div class="popular-services-container">
        <form class="form-edit-website" id="contact-info" action="backend/update_contact_info" method="POST">
            <div>
                <h3>Contact info</h3>
                <br>
                <div>
                    <label for="business-name">business name</label>
                    <input id="business-name" type="text" name="business_name" value="<?= $business_name ?>">
                    <br>
                    <label for="street-name">street name</label>
                    <input id="street-name" type="text" name="street_name" value="<?= $street_name ?>">
                    <br>
                    <label for="street-number">street number</label>
                    <input id="street-number" type="text" name="street_number" value="<?= $street_number ?>">
                    <br>
                    <label for="suite-number">suite number</label>
                    <input id="suite-number" type="text" name="suite_number" value="<?= $suite_number ?>">
                    <br>
                    <label for="city-name">city name</label>
                    <input id="city-name" type="text" name="city_name" value="<?= $city_name ?>">
                    <br>
                    <label for="state-name">state name</label>
                    <select id="state-name" name='state_name'>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>
                    <label for="zip-code">zip code</label>
                    <input type="text" id="zip-code" name="zip_code" value="<?= $zip_code ?>">
                    <br>
                    <label for="phone">phone</label>
                    <input type="text" id="phone" name="phone" value="<?= $phone ?>">
                    <br>
                    <label for="email">email</label>
                    <input type="email" id="email" name="email" value="<?= $email ?>">
                </div>
                <button class="edit-pages-btn" type="submit" name="submit_contact_info">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>
    <div id="contact-page-title-text" class="popular-services-container">
        <form class="form-edit-website" id="contact-page-title-text" action="backend/update_contact_info" method="POST">
            <div>
                <h3>Contact page title and text</h3>
                <br>
                <div>
                    <label for="contact-page-title">title</label>
                    <br>
                    <input type="text" name="contact_page_title" value="<?= $contact_page_title ?>">
                    <br>
                    <label for="contact-page-text">text</label>
                    <textarea name="contact_page_text" id="contact-page-text"><?= $contact_page_text ?></textarea>
                </div>
                <button class="edit-pages-btn" type="submit" name="submit_contact_page_title_text">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>

    <div id="contact-page-title-text" class="popular-services-container">
        <form class="form-edit-website" id="social-media" action="backend/update_contact_info" method="POST">
            <div>
                <h3>social media</h3>
                <br>
                <div>
                    <label for="facebook">facebook</label>
                    <br>
                    <input type="text" name="facebook" value="<?= $facebook ?>">
                    <br>
                    <label for="instagram">instagram</label>
                    <input type="text" name="instagram" value="<?= $instagram ?>">
                    <br>
                    <label for="tiktok">tiktok</label>
                    <input type="text" name="tiktok" value="<?= $tiktok ?>">
                    <br>
                    <label for="linkedin">linkedin</label>
                    <input type="text" name="linkedin" value="<?= $linkedin ?>">
                </div>
                <button class="edit-pages-btn" type="submit" name="submit_social_media">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>
    <div class="popular-services-container">
        <form class="form-edit-website" id="paragraph-1" action="backend/update_index_page_welcome_to" method="POST">
            <div>
                <h3>paragraphs</h3>
                <br>
                <div>
                    <label for="para-one">paragraph 1</label>
                    <br>
                    <textarea name="para_one" id="para-one"><?= $para_one ?></textarea>
                </div>
                <button class="edit-pages-btn" type="submit" name="submit_para_one">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>
    <div class="popular-services-container">
        <form class="form-edit-website" id="para-img-two" action="backend/update_index_page_welcome_to.php"
            method="POST" enctype="multipart/form-data">
            <div>
                <div>
                    <p>fading image 1</p>
                </div>
                <div style="display:flex; flex-direction:column">
                    <div style="display:flex; flex-direction:column">
                        <label>current image</label>
                        <img style="width:80%; border:1px solid #000; margin-top:10px" class="landing-page-img"
                            src="assets/<?= $para_two_img ?>" alt="<?= $para_two_img_desc ?>">
                        <br id="para_2_img">
                        <label for="para-two-img">description</label>
                        <input id="empty_image_para_2" type="text" value="<?= $para_two_img_desc ?>" maxlength="40"
                            readonly>
                    </div>
                    <br>
                    <br>
                    <?php
                        if (isset($_SESSION['empty_image_para_2'])) {
                            echo "<div style='border:1px solid red; padding:10px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_para_2'] . "</p>";
                            unset ($_SESSION['empty_image_para_2']);
                        }
                    ?>
                    <label for="para-two-img">select new image</label>
                    <input id='para-two-img' type="file" name="image">
                    <br>
                    <p>enter new image description</p>
                    <input type="text" name="para_two_img_desc" value="<?= $para_two_img_desc ?>">
                </div>
                <br>
                <br>
                <button class="edit-pages-btn" type="submit" name="submit_para_2_img">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>
    <div class="popular-services-container">
        <form class="form-edit-website" id="para-img-four" action="backend/update_index_page_welcome_to.php"
            method="POST" enctype="multipart/form-data">
            <div>
                <div>
                    <p>fading image 2</p>
                </div>
                <div style="display:flex; flex-direction:column">
                    <div style="display:flex; flex-direction:column">
                        <label>current image</label>
                        <img style="width:80%; border:1px solid #000; margin-top:10px" class="landing-page-img"
                            src="assets/<?= $para_four_img ?>" alt="<?= $para_four_img_desc ?>">
                        <br id="para_4_img">
                        <label for="para-four-img">description</label>
                        <input id="empty_image_para_4" type="text" value="<?= $para_four_img_desc ?>" maxlength="40"
                            readonly>
                    </div>
                    <br>
                    <br>
                    <?php
                        if (isset($_SESSION['empty_image_para_4'])) {
                            echo "<div style='border:1px solid red; padding:10px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_para_4'] . "</p>";
                            unset ($_SESSION['empty_image_para_4']);
                        }
                    ?>
                    <label for="para-four-img">select new image</label>
                    <input id='para-four-img' type="file" name="image">
                    <br>
                    <p>enter new image description</p>
                    <input type="text" name="para_four_img_desc" value="<?= $para_four_img_desc ?>">
                </div>
                <br>
                <br>
                <button class="edit-pages-btn" type="submit" name="submit_para_4_img">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>

    <div class="popular-services-container">
        <form class="form-edit-website" id="para-img-five" action="backend/update_index_page_welcome_to.php"
            method="POST" enctype="multipart/form-data">
            <div>
                <div>
                    <p>fading image 3</p>
                </div>
                <div style="display:flex; flex-direction:column">
                    <div style="display:flex; flex-direction:column">
                        <label>current image</label>
                        <img style="width:80%; border:1px solid #000; margin-top:10px" class="landing-page-img"
                            src="assets/<?= $para_five_img ?>" alt="<?= $para_five_img_desc ?>">
                        <br id="para_5_img">
                        <label for="para-five-img">description</label>
                        <input id="empty_image_para_5" type="text" value="<?= $para_five_img_desc ?>" maxlength="40"
                            readonly>
                    </div>
                    <br>
                    <br>
                    <?php
                        if (isset($_SESSION['empty_image_para_5'])) {
                            echo "<div style='border:1px solid red; padding:10px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_para_5'] . "</p>";
                            unset ($_SESSION['empty_image_para_5']);
                        }
                    ?>
                    <label for="para-five-img">select new image</label>
                    <input id='para-five-img' type="file" name="image">
                    <br>
                    <p>enter new image description</p>
                    <input type="text" name="para_five_img_desc" value="<?= $para_five_img_desc ?>">
                </div>
                <br>
                <br>
                <button class="edit-pages-btn" type="submit" name="submit_para_5_img">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>
    
    <br>
    <br>
    <div class="popular-services-container">
        <form class="form-edit-website" id="para-img-two" action="backend/update_index_page_welcome_to.php"
            method="POST" enctype="multipart/form-data">
            <div>
                <div id="para-2-text" class="popular-services-container">
                    <form class="form-edit-website" id="empty_image_para_2"
                        action="backend/update_index_page_welcome_to" method="POST">
                        <div>
                            <div>
                                <p>paragraph 2</p>
                                <label for="para-two-text">current text</label>
                                <textarea name="para_two" id="para-two-text"><?= $para_two ?></textarea>
                            </div>
                            <br>
                            <button class="edit-pages-btn" type="submit" name="submit_para_2_text">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
                <br>
                <br>

                <div class="popular-services-container">
                    <form class="form-edit-website" id="para-img-three"
                        action="backend/update_index_page_welcome_to.php" method="POST" enctype="multipart/form-data">
                        <div>
                            <div>
                                <p>current image</p>
                            </div>
                            <div style="display:flex; flex-direction:column">
                                <div style="display:flex; flex-direction:column">
                                    <label>paragraph 2 image</label>
                                    <img style="width:80%; border:1px solid #000; margin-top:10px"
                                        class="landing-page-img" src="images/<?= $para_three_img ?>"
                                        alt="<?= $para_three_img_desc ?>">
                                    <br id="para_3_img">
                                    <label for="para-three-img">description</label>
                                    <input id="empty_image_para_3" type="text" value="<?= $para_three_img_desc ?>"
                                        maxlength="40" readonly>
                                </div>
                                <br>
                                <br>
                                <?php
                        if (isset($_SESSION['empty_image_para_3'])) {
                            echo "<div style='border:1px solid red; padding:10px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:3rem';>" . $_SESSION['empty_image_para_3'] . "</p>";
                            unset ($_SESSION['empty_image_para_3']);
                        }
                    ?>
                                <label for="para-three-img">select new image</label>
                                <input id='para-three-img' type="file" name="image">
                                <br>
                                <p>enter new image description</p>
                                <input type="text" name="para_three_img_desc" value="<?= $para_three_img_desc ?>">
                            </div>

                            <br>
                            <button class="edit-pages-btn" type="submit" name="submit_para_3_img">SAVE</button>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <div id="para-3-text" class="popular-services-container">
                    <form class="form-edit-website" id="empty_image_para_3"
                        action="backend/update_index_page_welcome_to" method="POST">
                        <div>
                            <div>
                                <p>paragraph 3</p>
                                <label for="para-three">current text</label>
                                <textarea name="para_three" id="para-three"><?= $para_three ?></textarea>
                            </div>
                            <br>
                            <button class="edit-pages-btn" type="submit" name="submit_para_3_text">SAVE</button>
                        </div>
                    </form>
                </div>

                <br>
                <br>
                <div id="popular-services-title" class="popular-services-container">
                    <form class="form-edit-website" action="backend/update_popular_services.php" method="POST">
                        <div>
                            <h3>Popular Service Title</h3>
                            <div>
                                <label for="popular-services-title">services section title</label>
                                <br>
                                <input type="text" id="popular-services-title" name="popular_services_title"
                                    value="<?= $popular_services_title ?>">
                            </div>
                            <button class="edit-pages-btn" type="submit"
                                name="submit_popular_services_title">SAVE</button>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <div id="popular-services-1" class="popular-services-container">
                    <form class="form-edit-website" action="backend/update_popular_services.php" method="post">
                        <div>
                            <h3>POPULAR SERVICE 1</h3>
                            <div>
                                <label for="popular-service-1">title</label>
                                <br>
                                <input type="text" id="popular-service-1" name="popular_service_1_title"
                                    value="<?= $popular_service_1_title ?>">
                            </div>
                            <div>
                                <label for="popular-service-1-text">text</label>
                                <br>
                                <textarea name="popular_service_1_text"
                                    id="popular-service-1-text"><?= $popular_service_1_text ?></textarea>
                            </div>
                            <button class="edit-pages-btn" type="submit" name="submit_popular_service_1">SAVE</button>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <div id="popular-services-2" class="popular-services-container">
                    <form class="form-edit-website" action="backend/update_popular_services.php" method="post">
                        <div>
                            <h3>POPULAR SERVICE 2</h3>
                            <div>
                                <label for="popular-service-2-title">title</label>
                                <br>
                                <input type="text" id="popular-service-2-title" name="popular_service_2_title"
                                    value="<?= $popular_service_2_title ?>">
                            </div>
                            <div>
                                <label for="popular-service-2-text">text</label>
                                <br>
                                <textarea name="popular_service_2_text"
                                    id="popular-service-2-text"><?= $popular_service_2_text ?></textarea>
                            </div>
                            <button class="edit-pages-btn" type="submit" name="submit_popular_service_2">SAVE</button>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <div id="popular-services-3" class="popular-services-container">
                    <form class="form-edit-website" action="backend/update_popular_services.php" method="post">
                        <div>
                            <h3>POPULAR SERVICE 3</h3>
                            <div>
                                <label for="popular-service-3-title">title</label>
                                <br>
                                <input type="text" id="popular-service-3-title" name="popular_service_3_title"
                                    value="<?= $popular_service_3_title ?>">
                            </div>
                            <div>
                                <label for="popular-service-3-text">text</label>
                                <br>
                                <textarea name="popular_service_3_text"
                                    id="popular-service-3-text"><?= $popular_service_3_text ?></textarea>
                            </div>
                            <button class="edit-pages-btn" type="submit" name="submit_popular_service_3">SAVE</button>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <div id="popular-services-4" class="popular-services-container">
                    <form class="form-edit-website" action="backend/update_popular_services.php" method="post">
                        <div>
                            <h3>POPULAR SERVICE 4</h3>
                            <div>
                                <label for="popular-service-4-title">title</label>
                                <br>
                                <input type="text" id="popular-service-4-title" name="popular_service_4_title"
                                    value="<?= $popular_service_4_title ?>">
                            </div>
                            <div>
                                <label for="popular-service-1-text">text</label>
                                <br>
                                <textarea name="popular_service_4_text"
                                    id="popular-service-4-text"><?= $popular_service_4_text ?></textarea>
                            </div>
                            <button class="edit-pages-btn" type="submit" name="submit_popular_service_4">SAVE</button>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <div id="popular-services-5" class="popular-services-container">
                    <form class="form-edit-website" action="backend/update_popular_services.php" method="post">
                        <div>
                            <h3>POPULAR SERVICE 5</h3>
                            <div>
                                <label for="popular-service-1-title">title</label>
                                <br>
                                <input type="text" id="popular-service-5-title" name="popular_service_5_title"
                                    value="<?= $popular_service_5_title ?>">
                            </div>
                            <div>
                                <label for="popular-service-1-text">text</label>
                                <br>
                                <textarea name="popular_service_5_text"
                                    id="popular-service-5-text"><?= $popular_service_5_text ?></textarea>
                            </div>
                            <button class="edit-pages-btn" type="submit" name="submit_popular_service_5">SAVE</button>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <div id="popular-services-6" class="popular-services-container">
                    <form class="form-edit-website" action="backend/update_popular_services.php" method="post">
                        <div>
                            <h3>POPULAR SERVICE 6</h3>
                            <div>
                                <label for="popular-service-1-title">title</label>
                                <br>
                                <input type="text" id="popular-service-6-title" name="popular_service_6_title"
                                    value="<?= $popular_service_6_title ?>">
                            </div>
                            <div>
                                <label for="popular-service-1-text">text</label>
                                <br>
                                <textarea name="popular_service_6_text"
                                    id="popular-service-6-text"><?= $popular_service_6_text ?></textarea>
                            </div>
                            <button class="edit-pages-btn" type="submit" name="submit_popular_service_6">SAVE</button>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <div id="google-map" class="popular-services-container">
                    <form class="form-edit-website" action="backend/update_contact_info" method="post">
                        <div>
                            <h3>GOOGLE MAP</h3>
                            <div>
                                <label for="google-map-url">map url</label>
                                <br>
                                <input type="text" id="google-map-url" name="google_map_url"
                                    value="<?= $google_map_url ?>">
                            </div>
                            <button class="edit-pages-btn" type="submit" name="submit_google_map_url">SAVE</button>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <br>
</section>
</body>

</html>