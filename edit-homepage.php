<?php
    // session_start();
    require_once 'header-edit-pages.php';
?>
<section style="margin:10px">
    <div class="popular-services-container">
        <form class="form-edit-website" id="contact-info" action="backend/update_contact_info.php" method="POST">
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
                    <label for="business_phone">phone</label>
                    <input type="tel" id="business_phone" name="business_phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?= $business_phone ?>">
                    <br>
                    <label for="email">email</label>
                    <input type="email" id="email" name="business_email" value="<?= $business_email ?>">
                </div>
                <button class="edit-pages-btn" type="submit" name="submit_contact_info">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>
    <div id="contact-page-title-text" class="popular-services-container">
        <form class="form-edit-website" id="contact-page-title-text" action="backend/update_contact_info.php" method="POST">
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
        <form class="form-edit-website" id="social-media" action="backend/update_contact_info.php" method="POST">
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


    <!-- WELCOME TITLE AND TEXT -->
    <div class="popular-services-container">
        <form class="form-edit-website" id="welcome-to" action="backend/update_index_page_welcome_to.php" method="POST">
            <div>
                <h3>welcome section</h3>
                <br>
                <div>
                    <label for="rotating_imgs_title">welcome title</label>
                    <br>
                    <input id="rotating_imgs_title" type="text" name="rotating_imgs_title"
                        value="<?= $rotating_imgs_title ?>">
                    <br>
                    <br>
                    <label for="rotating_imgs_text">welcome text (150 characters max)</label>
                    <textarea style="resize:none"  rows="4" cols="50" maxlength="150" name="rotating_imgs_text" id="rotating_imgs_text"><?= $rotating_imgs_text ?></textarea>
                </div>
                <button class="edit-pages-btn" type="submit" name="submit_welcome_to_title_text">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>

    <!-- WELCOME SECTION BACKGROUND IMAGE -->
    <div class="popular-services-container">
        <form class="form-edit-website" id="welcome_to_bkgd_img" action="backend/update_index_page_welcome_to.php"
            method="POST" enctype="multipart/form-data">
            <div>
                <div>
                    <p>welcome section background image</p>
                </div>
                <div style="display:flex; flex-direction:column">
                    <div style="display:flex; flex-direction:column">
                        <label>current image</label>
                        <img style="width:80%; border:1px solid #000; margin-top:10px" class="landing-page-img"
                            src="assets/<?= $rotating_imgs_bkgd_img ?>" alt="<?= $rotating_imgs_bkgd_img_desc ?>">
                        <br id="">
                        <label for="rotating_imgs_bkgd_img_desc">description</label>
                        <input id="" type="text" value="<?= $rotating_imgs_bkgd_img_desc ?>" maxlength="40" readonly>
                    </div>
                    <br>
                    <br>
                    <div id="welcome-to-bkgd-img"></div>
                    <?php
                        if (isset($_SESSION['empty_welcome_to_bkgd_img'])) {
                            echo "<div style='border:1px solid red; padding:10px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_welcome_to_bkgd_img'] . "</p>";
                            unset ($_SESSION['empty_welcome_to_bkgd_img']);
                        }
                    ?>
                    <label for="rotating_imgs_bkgd_img">select new image</label>
                    <input id='rotating_imgs_bkgd_img_desc' type="file" name="image">
                    <br>
                    <br>
                    <label for="rotating_imgs_bkgd_img_desc">enter new description</label>
                    <input type="text" name="rotating_imgs_bkgd_img_desc" value="">
                </div>
                <br>
                <br>
                <button class="edit-pages-btn" type="submit" name="submit_rotating_imgs_bkgd_img">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>
    <!-- REVIEWS SECTION BACKGROUND IMAGE -->
    <div class="popular-services-container">
        <form class="form-edit-website" id="reviews-section-bkgd-img" action="backend/update_index_page_welcome_to.php"
            method="POST" enctype="multipart/form-data">
            <div>
                <div>
                    <p>reviews background image</p>
                </div>
                <div style="display:flex; flex-direction:column">
                    <div style="display:flex; flex-direction:column">
                        <label>current image</label>
                        <img style="width:80%; border:1px solid #000; margin-top:10px" class="landing-page-img"
                            src="assets/<?= $reviews_bkgd_img ?>" alt="<?= $reviews_bkgd_img_desc ?>">
                        <br>
                        <label for="rotating_imgs_bkgd_img_desc">description</label>
                        <input id="" type="text" value="<?= $reviews_bkgd_img_desc ?>" maxlength="40" readonly>
                    </div>
                    <br>
                    <br>
                    <div id="reviews-no-bkgd-img"></div>
                    <?php
                        if (isset($_SESSION['empty_reviews_bkgd_img'])) {
                            echo "<div style='border:1px solid red; padding:10px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_reviews_bkgd_img'] . "</p>";
                            unset ($_SESSION['empty_reviews_bkgd_img']);
                        }
                    ?>
                    <label for="reviews_bkgd_img">select new image</label>
                    <input id='reviews_bkgd_img' type="file" name="image">
                    <br>
                    <br>
                    <label for="reviews_bkgd_img_desc">enter new description</label>
                    <input type="text" name="reviews_bkgd_img_desc" value="">
                </div>
                <br>
                <br>
                <button class="edit-pages-btn" type="submit" name="submit_reviews_bkgd_img">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>
    <!-- REVIEWS TITLE-->
    <div class="popular-services-container">
        <form class="form-edit-website" id="welcome-to-reviews" action="backend/update_index_page_welcome_to.php"
            method="POST">
            <div>
                <h3>client reviews</h3>
                <br>
                <div>
                    <label for="rotating_imgs_title">reviews title</label>
                    <br>
                    <input id="reviews_title" type="text" name="reviews_title" value="<?= $reviews_title ?>">
                    <br>
                    <br>
                </div>
                <button class="edit-pages-btn" type="submit" name="submit_reviews_title">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>

    <!-- REVEIW IMAGE 1 -->
    <div class="popular-services-container">
        <form class="form-edit-website" id="reviews-1" action="backend/update_index_page_welcome_to.php" method="POST"
            enctype="multipart/form-data">
            <div>
                <div>
                    <p>review image 1</p>
                </div>
                <div style="display:flex; flex-direction:column">
                    <div style="display:flex; flex-direction:column">
                        <label>current image</label>
                        <img style="width:80%; border:1px solid #000; margin-top:10px" class="landing-page-img"
                            src="images/<?= $reviewers_img_1 ?>" alt="<?= $reviewers_img_desc_1 ?>">
                        <br id="review-img-1">
                        <label for="reviewers_img_desc_1">description</label>
                        <input id="reviewers_img_desc_1" type="text" value="<?= $reviewers_img_desc_1 ?>" maxlength="40"
                            readonly>
                    </div>
                    <br>
                    <br>
                    <div id="reviews-no-img-1"></div>
                    <?php
                        if (isset($_SESSION['empty_reviews_img_1'])) {
                            echo "<div style='border:1px solid red; padding:10px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_reviews_img_1'] . "</p>";
                            unset ($_SESSION['empty_reviews_img_1']);
                        }
                    ?>
                    <label for="reviewers_img_desc_1">select new image</label>
                    <input id='reviewers_img_desc_1' type="file" name="image">
                    <br>
                    <p>enter new description</p>
                    <input type="text" name="reviewers_img_desc_1" value="">
                </div>
                <br>
                <br>
                <button class="edit-pages-btn" type="submit" name="submit_review_img_1">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>

    <!-- REVIEW COMMENTS 1 -->
    <div class="popular-services-container">
            <div id="reviews-comments-1" class="popular-services-container">
                <form class="form-edit-website" id="empty_image_para_2"
                    action="backend/update_index_page_welcome_to.php" method="POST">
                    <div>
                        <div style="font-size:1.5rem">
                            <p>review comments 1</p>
                            <label for="reviewers_name_1">reviewers name</label>
                            <input type="text" id="reviewers_name_1" name="reviewers_name_1" value="<?= $reviewers_name_1 ?>">
                            <br>
                            <br>
                            <label for="reviewers_comments_1">reviewers text (max 250 characters)</label>
                            <textarea style="resize:none"  rows="4" cols="50" maxlength="250" id="reviewers_comments_1" name="reviewers_comments_1"><?= $reviewers_comments_1 ?></textarea>
                        </div>
                        <br>
                        <button class="edit-pages-btn" type="submit" name="submit_reviewer_comments_1">SAVE</button>
                    </div>
                </form>
            </div>
        <br>
        <br>

    <!-- REVEIW IMAGE 2 -->
    <div class="popular-services-container">
        <form class="form-edit-website" id="reviews-2" action="backend/update_index_page_welcome_to.php" method="POST"
            enctype="multipart/form-data">
            <div>
                <div>
                    <p>review image 2</p>
                </div>
                <div style="display:flex; flex-direction:column">
                    <div style="display:flex; flex-direction:column">
                        <label>current image</label>
                        <img style="width:80%; border:1px solid #000; margin-top:20px" class="landing-page-img"
                            src="images/<?= $reviewers_img_2 ?>" alt="<?= $reviewers_img_desc_2 ?>">
                        <br id="review-img-2">
                        <label for="reviewers_img_desc_2">description</label>
                        <input id="reviewers_img_desc_2" type="text" value="<?= $reviewers_img_desc_2 ?>" maxlength="40"
                            readonly>
                    </div>
                    <br>
                    <br>
                    <div id="reviews-no-img-2"></div>
                    <?php
                        if (isset($_SESSION['empty_reviews_img_2'])) {
                            echo "<div style='border:1px solid red; padding:20px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_reviews_img_2'] . "</p>";
                            unset ($_SESSION['empty_reviews_img_2']);
                        }
                    ?>
                    <label for="para-four-img">select new image</label>
                    <input id='para-four-img' type="file" name="image">
                    <br>
                    <p>enter new description</p>
                    <input type="text" name="reviewers_img_desc_2" value="">
                </div>
                <br>
                <br>
                <button class="edit-pages-btn" type="submit" name="submit_review_img_2">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>

    <!-- REVIEW COMMENTS 2 -->
<div class="popular-services-container">
            <div id="para-2-text" class="popular-services-container">
                <form class="form-edit-website" id="reviews-comments-2"
                    action="backend/update_index_page_welcome_to.php" method="POST">
                    <div>
                        <div>
                            <p>review comments 2</p>
                            <label for="reviewers_name_2">reviewers name</label>
                            <input type="text" id="reviewers_name_2" name="reviewers_name_2" value="<?= $reviewers_name_2 ?>">
                            <br>
                            <br>
                            <label for="reviewers_comments_2">reviewers text (max 250 characters)</label>
                            <textarea style="resize:none"  rows="4" cols="50" maxlength="250" name="reviewers_comments_2" id="reviewers_comments_2"><?= $reviewers_comments_2 ?></textarea>
                        </div>
                        <br>
                        <button class="edit-pages-btn" type="submit" name="submit_reviewer_comments_2">SAVE</button>
                    </div>
                </form>
            </div>
            <br>
            <br>
    <!-- REVEIW IMAGE 3 -->
    <div class="popular-services-container">
        <form class="form-edit-website" id="reviews-3" action="backend/update_index_page_welcome_to.php" method="POST"
            enctype="multipart/form-data">
            <div>
                <div>
                    <p>review image 3</p>
                </div>
                <div style="display:flex; flex-direction:column">
                    <div style="display:flex; flex-direction:column">
                        <label>current image</label>
                        <img style="width:80%; border:1px solid #000; margin-top:30px" class="landing-page-img"
                            src="images/<?= $reviewers_img_3 ?>" alt="<?= $reviewers_img_desc_3 ?>">
                        <br id="review-img-3">
                        <label for="reviewers_img_desc_3">description</label>
                        <input id="reviewers_img_desc_3" type="text" value="<?= $reviewers_img_desc_3 ?>" maxlength="40"
                            readonly>
                    </div>
                    <br>
                    <br>
                    <div id="reviews-no-img-3"></div>
                    <?php
                        if (isset($_SESSION['empty_reviews_img_3'])) {
                            echo "<div style='border:1px solid red; padding:30px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:3rem';>" . $_SESSION['empty_reviews_img_3'] . "</p>";
                            unset ($_SESSION['empty_reviews_img_3']);
                        }
                    ?>
                    <label for="para-four-img">select new image</label>
                    <input id='para-four-img' type="file" name="image">
                    <br>
                    <p>enter new description</p>
                    <input type="text" name="reviewers_img_desc_3" value="">
                </div>
                <br>
                <br>
                <button class="edit-pages-btn" type="submit" name="submit_review_img_3">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>

    <!-- REVIEW COMMENTS 3 -->
<div class="popular-services-container">
            <div id="reviews-comments-3" class="popular-services-container">
                <form class="form-edit-website" id="empty_image_para_3"
                    action="backend/update_index_page_welcome_to.php" method="POST">
                    <div>
                        <div>
                            <p>review comments 3</p>
                            <label for="reviewers_name_3">reviewers name</label>
                            <input type="text" id="reviewers_name_3" name="reviewers_name_3" value="<?= $reviewers_name_3 ?>">
                            <br>
                            <br>
                            <label for="reviewers_comments_3">reviewers text (max 250 characters)</label>
                            <textarea style="resize:none"  rows="4" cols="50" maxlength="250" name="reviewers_comments_3" id="reviewers_comments_3"><?= $reviewers_comments_3 ?></textarea>
                        </div>
                        <br>
                        <button class="edit-pages-btn" type="submit" name="submit_reviewer_comments_3">SAVE</button>
                    </div>
                </form>
            </div>
            <br>
            <br>

    <!-- REVEIWS IMAGE 4 -->
    <div class="popular-services-container">
        <form class="form-edit-website" id="reviews-4" action="backend/update_index_page_welcome_to.php" method="POST"
            enctype="multipart/form-data">
            <div>
                <div>
                    <p>review image 4</p>
                </div>
                <div style="display:flex; flex-direction:column">
                    <div style="display:flex; flex-direction:column">
                        <label>current image</label>
                        <img style="width:80%; border:1px solid #000; margin-top:40px" class="landing-page-img"
                            src="images/<?= $reviewers_img_4 ?>" alt="<?= $reviewers_img_desc_4 ?>">
                        <br id="review-img-4">
                        <label for="reviewers_img_desc_4">description</label>
                        <input id="reviewers_img_desc_4" type="text" value="<?= $reviewers_img_desc_4 ?>" maxlength="40"
                            readonly>
                    </div>
                    <br>
                    <br>
                    <div id="reviews-no-img-4"></div>
                    <?php
                        if (isset($_SESSION['empty_reviews_img_4'])) {
                            echo "<div style='border:1px solid red; padding:40px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:4rem';>" . $_SESSION['empty_reviews_img_4'] . "</p>";
                            unset ($_SESSION['empty_reviews_img_4']);
                        }
                    ?>
                    <label for="para-four-img">select new image</label>
                    <input id='para-four-img' type="file" name="image">
                    <br>
                    <p>enter new description</p>
                    <input type="text" name="reviewers_img_desc_4" value="">
                </div>
                <br>
                <br>
                <button class="edit-pages-btn" type="submit" name="submit_review_img_4">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>
    <!-- REVIEW COMMENTS 4 -->
<div class="popular-services-container">
            <div id="reviews-comments-4" class="popular-services-container">
                <form class="form-edit-website" id="empty_image_para_4"
                    action="backend/update_index_page_welcome_to.php" method="POST">
                    <div>
                        <div>
                            <p>review comments 4</p>
                            <label for="reviewers_name_4">reviewers name</label>
                            <input type="text" id="reviewers_name_4" name="reviewers_name_4" value="<?= $reviewers_name_4 ?>">
                            <br>
                            <br>
                            <label for="reviewers_comments_4">reviewers text (max 250 characters)</label>
                            <textarea style="resize:none"  rows="4" cols="50" maxlength="250" name="reviewers_comments_4" id="reviewers_comments_4"><?= $reviewers_comments_4 ?></textarea>
                        </div>
                        <br>
                        <button class="edit-pages-btn" type="submit" name="submit_reviewer_comments_4">SAVE</button>
                    </div>
                </form>
            </div>
            <br>
            <br>

    <!-- REVEIWS IMAGE 5 -->
    <div class="popular-services-container">
        <form class="form-edit-website" id="reviews-5" action="backend/update_index_page_welcome_to.php" method="POST"
            enctype="multipart/form-data">
            <div>
                <div>
                    <p>review image 5</p>
                </div>
                <div style="display:flex; flex-direction:column">
                    <div style="display:flex; flex-direction:column">
                        <label>current image</label>
                        <img style="width:80%; border:1px solid #000; margin-top:50px" class="landing-page-img"
                            src="images/<?= $reviewers_img_5 ?>" alt="<?= $reviewers_img_desc_5 ?>">
                        <br id="review-img-5">
                        <label for="reviewers_img_desc_5">description</label>
                        <input id="reviewers_img_desc_5" type="text" value="<?= $reviewers_img_desc_5 ?>" maxlength="50"
                            readonly>
                    </div>
                    <br>
                    <br>
                    <div id="reviews-no-img-5"></div>
                    <?php
                        if (isset($_SESSION['empty_reviews_img_5'])) {
                            echo "<div style='border:1px solid red; padding:50px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:5rem';>" . $_SESSION['empty_reviews_img_5'] . "</p>";
                            unset ($_SESSION['empty_reviews_img_5']);
                        }
                    ?>
                    <label for="reviewer_img_desc_5">select new image</label>
                    <input id='reviewer_img_desc_5' type="file" name="image">
                    <br>
                    <p>enter new description</p>
                    <input type="text" name="reviewers_img_desc_5" value="">
                </div>
                <br>
                <br>
                <button class="edit-pages-btn" type="submit" name="submit_reviewers_img_5">SAVE</button>
            </div>
        </form>
    </div>
    <br>
    <br>

    <!-- REVIEW COMMENTS 5 -->
<div class="popular-services-container">
            <div id="reviews-comments-5" class="popular-services-container">
                <form class="form-edit-website" id="empty_image_para_5"
                    action="backend/update_index_page_welcome_to.php" method="POST">
                    <div>
                        <div>
                            <p>review comments 5</p>
                            <label for="reviewers_name_5">reviewers name</label>
                            <input type="text" id="reviewers_name_5" name="reviewers_name_5" value="<?= $reviewers_name_5 ?>">
                            <br>
                            <br>
                            <label for="reviewers_comments_5">reviewers text (max 250 characters)</label>
                            <textarea style="resize:none"  rows="4" cols="50" maxlength="250" name="reviewers_comments_5" id="reviewers_comments_5"><?= $reviewers_comments_5 ?></textarea>
                        </div>
                        <br>
                        <button class="edit-pages-btn" type="submit" name="submit_reviewer_comments_5">SAVE</button>
                    </div>
                </form>
            </div>
            <br>
            <br>
            <div id="google-map" class="popular-services-container">
                <form class="form-edit-website" action="backend/update_contact_info.php" method="post">
                    <div>
                        <h3>GOOGLE MAP</h3>
                        <div>
                            <label for="google-map-url">map url</label>
                            <br>
                            <input type="text" id="google-map-url" name="google_map_url" value="<?= $google_map_url ?>">
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