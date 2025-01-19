<?php
    // session_start();
    require_once 'header-edit-pages.php';
?>
<section style="margin:10px">

    <div id="contact-page-title-text" class="popular-services-container">

        <div class="popular-services-container">
            <form class="form-edit-website" id="para-img-two" action="backend/update_about_page.php" method="POST"
                enctype="multipart/form-data">
                <div>
                    <div id="header-img">
                        <p>header image</p>
                    </div>
                    <div style="display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <label>current image</label>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" class="landing-page-img"
                                src="images/<?= $about_header_img ?>" alt="<?= $about_header_img_desc ?>">
                            <br id="para_2_img">
                            <label for="para-two-img">description</label>
                            <input id="empty_image_para_2" type="text" value="<?= $about_header_img_desc ?>"
                                maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_header_img'])) {
                            echo "<div style='border:1px solid red; padding:10px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_header_img'] . "</p>";
                            unset ($_SESSION['empty_header_img']);
                        }
                    ?>
                        <label for="about-header-img">select new image</label>
                        <input id='about-header-img' type="file" name="image">
                        <br>
                        <p>enter new description</p>
                        <input type="text" name="about_header_img_desc" value="<?= $about_header_img_desc ?>">
                    </div>
                    <br>
                    <button class="edit-pages-btn" type="submit" name="submit_update_about_header_img">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div id="about-header-title-text" class="popular-services-container">
            <form class="form-edit-website" id="para-img-two" action="backend/update_about_page.php" method="POST">
                <div>
                    <br>
                    <label for="about_header_title">header title</label>
                    <input type="text" name="about_header_title" value="<?= $about_header_title ?>">
                    <br>
                    <br>
                    <label for="about_header_text">header text</label>
                    <input type="text" name="about_header_text" value="<?= $about_header_text ?>" maxlength="500">

                    <button class="edit-pages-btn" type="submit"
                        name="submit_update_about_header_title_and_text">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div id="bkgd-img" class="popular-services-container">
            <form class="form-edit-website" id="para-img-four" action="backend/update_about_page.php" method="POST"
                enctype="multipart/form-data">
                <div>
                    <div>
                        <p>background image</p>
                    </div>
                    <div style="display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <label>current background image</label>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" class="landing-page-img"
                                src="bkgd-images/<?= $about_img_1 ?>" alt="<?= $about_img_desc_1 ?>">
                            <br id="about_img_1">
                            <label for="about_img_desc_1">description</label>
                            <input id="" type="text" value="<?= $about_img_desc_1 ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <div id="no-bkgd-img"></div>
                        <?php
                        if (isset($_SESSION['empty_bkgd_img'])) {
                            echo "<div style='border:1px solid red; padding:10px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_bkgd_img'] . "</p>";
                            unset ($_SESSION['empty_bkgd_img']);
                        }
                    ?>
                        <label for="about_img_1">select new image</label>
                        <input id='about_img_1' type="file" name="image">
                        <br>
                        <p>enter new description</p>
                        <input type="text" name="about_img_desc_1" value="">
                    </div>
                    <br>
                    <br>
                    <button class="edit-pages-btn" type="submit" name="submit_update_about_bkgd_img">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div id="foreground-img" class="popular-services-container">
            <form class="form-edit-website" id="para-img-four" action="backend/update_about_page.php" method="POST"
                enctype="multipart/form-data">
                <div>
                    <div>
                        <p>foreground image</p>
                    </div>
                    <div style="display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <label>current foreground image</label>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" class="landing-page-img"
                                src="images/<?= $about_img_2 ?>" alt="<?= $about_img_desc_2 ?>">
                            <br id="about_img_1">
                            <label for="about_img_desc_1">description</label>
                            <input id="" type="text" value="<?= $about_img_desc_2 ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <div id="no-foreground-img"></div>
                        <?php
                        if (isset($_SESSION['empty_foreground_img'])) {
                            echo "<div style='border:1px solid red; padding:10px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_foreground_img'] . "</p>";
                            unset ($_SESSION['empty_foreground_img']);
                        }
                    ?>
                        <label for="about_img_2">select new image</label>
                        <input id='about_img_2' type="file" name="image">
                        <br>
                        <p>enter new description</p>
                        <input type="text" name="about_img_desc_2" value="">
                    </div>
                    <br>
                    <br>
                    <button class="edit-pages-btn" type="submit" name="submit_update_foreground_img">SAVE</button>
                </div>
            </form>
        </div>

        <br>
        <br>
        <!-- TEXT UNDER IMAGE -->
        <div  id="about_text_under_image" class="popular-services-container">
            <div id="para-2-text" class="popular-services-container">
                <form class="form-edit-website" id="empty_image_para_2" action="backend/update_about_page.php"
                    method="POST">
                    <div>
                        <div>
                            <p>text under image</p>
                            <label for="about_text_under_image">text</label>
                            <br>
                            <input type="text" name="about_text_under_image" value="<?= $about_text_under_image ?>">
                            <br>
                            <br>
                        </div>
                        <br>
                        <button class="edit-pages-btn" type="submit" name="submit_text_under_image">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <br>

        <!-- OUR STORY -->
        <div id="our-story" class="popular-services-container">
            <form class="form-edit-website" id="empty_image_para_2" action="backend/update_about_page.php" method="POST">
                <div>
                    <div>
                        <p>our story</p>
                        <label for="our_story_title">small title</label>
                        <br>
                        <input type="text" name="our_story_title" value="<?= $our_story_title ?>">
                        <br>
                        <br>
                        <label for="our_story_title">large title</label>
                        <input type="text" name="our_story_large_title" value="<?= $our_story_large_title ?>">
                        <br>
                        <br>
                        <label for="our_story_text">first paragraph</label>
                        <textarea name="our_story_paragraph_1" id=""><?= $our_story_paragraph_1 ?></textarea>
                        <br>
                        <br>
                        <label for="our_story_paragraph_2">second paragraph</label>
                        <textarea name="our_story_paragraph_2" id=""><?= $our_story_paragraph_2 ?></textarea>
                        <br>
                        <br>
                        <label for="about_owner_name">owner text</label>
                        <input id="about_owner_name" type="text" name="about_owner_name"
                            value="<?= $about_owner_name ?>">
                    </div>
                    <br>
                    <button class="edit-pages-btn" type="submit" name="submit_update_our_story">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>

        <!-- CORE VALUES -->
        <div id="core-values" class="popular-services-container">
            <form class="form-edit-website" id="empty_image_para_2" action="backend/update_about_page.php" method="POST">
                <div>
                    <div>
                        <p>core values</p>
                        <label for="core_values_title">core values title</label>
                        <br>
                        <input type="text" name="core_values_title" value="<?= $core_values_title ?>">
                        <br>
                        <br>
                        <label for="core_values_large_title_1">first large title</label>
                        <input type="text" name="core_values_large_title_1" value="<?= $core_values_large_title_1 ?>">
                        <br>
                        <br>
                        <label for="core_values_large_title_text_1">first paragraph</label>
                        <textarea name="core_values_large_title_text_1"
                            id="core_values_large_title_text_1"><?= $core_values_large_title_text_1 ?></textarea>
                        <br>
                        <br>
                        <label for="core_values_title_2">second large title</label>
                        <input type="text" name="core_values_title_2" value="<?= $core_values_title_2 ?>">
                        <br>
                        <br>
                        <label for="core_values_large_title_text_2">second paragraph</label>
                        <textarea name="core_values_large_title_text_2"
                            id="core_values_large_title_text_2"><?= $core_values_large_title_text_2 ?></textarea>
                        <br>
                        <br>
                    </div>
                    <br>
                    <button class="edit-pages-btn" type="submit" name="submit_update_core_values">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>

        <!-- CORE VALUES IMAGE -->

        <div id="core-values-img" class="popular-services-container">
            <form class="form-edit-website" id="para-img-three" action="backend/update_about_page.php"
                method="POST" enctype="multipart/form-data">
                <div>
                    <div>
                        <p>bottom image</p>
                    </div>
                    <div style="display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <label>current image</label>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" class="landing-page-img"
                                src="images/<?= $core_values_img ?>" alt="<?= $core_values_img_desc ?>">
                            <br>
                            <label for="core_values_img">description</label>
                            <input id="" type="text" value="<?= $core_values_img_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <div id="no-core-values-img"></div>
                        <?php
                        if (isset($_SESSION['empty_core_values_img'])) {
                            echo "<div style='border:1px solid red; padding:10px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:3rem';>" . $_SESSION['empty_core_values_img'] . "</p>";
                            unset ($_SESSION['empty_core_values_img']);
                        }
                    ?>
                        <label for="core_values_img">select new image</label>
                        <input id='core_values_img' type="file" name="image">
                        <br>
                        <p>enter new description</p>
                        <input type="text" name="core_values_img" value="<?= $core_values_img_desc ?>">
                    </div>
                    <br>
                    <button class="edit-pages-btn" type="submit" name="submit_update_core_values_img">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <br>
</section>
</body>

</html>