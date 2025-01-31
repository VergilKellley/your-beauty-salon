<?php
    require_once 'header.php';
?>

<div class="about-header">
    <div style="position:absolute;top:75px; bottom:0; right:0; left:0;background:#000; opacity:.5;height:100%"></div>
    <!-- height (see above) should be 117% not 100% on inmotion hosting -->
    <div style="position:absolute;max-width:700px;width: 100vw;padding: 0 20px; color:#fff">
        <h2 style="position:relative;z-index:3"><?= $about_header_title ?></h2>
        <p style="margin-top:20px;line-height:1.5"><?= $about_header_text ?></p>
    </div>
    <div
        style="background:url('images/<?= $about_header_img ?>');background-repeat: no-repeat; background-position: center; background-size: cover;width:100vw;height:100vh; background-position:center;">
    </div>
</div>
<div class="about-section">
    <div>
        <div class="large-img-and-content">
            <div class="img-and-large-text">
                <div class="large-img-container" style="width: 70%; position:relative">
                    <img class="about-img-1" style="z-index:3; position:absolute; bottom:0"
                        src="images/<?= $about_img_2 ?>" alt="<?= $about_img_desc_2 ?>" />
                    <img class="about-img-2" style="position: absolute; left: -20px; z-index: 2;bottom:0"
                        src="bkgd-images/<?= $about_img_1 ?>" alt="<?= $about_img_desc_1 ?>" />
                </div>
                <div class="our-story-container" style="width: 55%;">
                    <p><?= $our_story_title ?></p>
                    <h1 style="position:relative;z-index: 4;"><?= $our_story_large_title ?></h1>
                    <div class="two-para-text">
                        <p style="border-left:8px solid <?= $secondary_color ?>;padding-left:10px"><?= $our_story_paragraph_1 ?></p>
                        <br />
                        <p style="border-left:8px solid <?= $secondary_color ?>;padding-left:10px"><?= $our_story_paragraph_2 ?></p>
                        <br />
                        <p>
                            <span style="font-style: italic; font-weight: 600"><?= $about_owner_name ?></span>
                        </p>
                    </div>
                    <br>
                    <div class="book-now-view-services-btn-container"
                        style="display: flex; justify-content: space-evenly;">
                        <a style="background:<?= $secondary_color ?>" class="btn" href="book-appointment">BOOK NOW</a>
                        <!-- <a class="btn btn-view-services" href="all-services">VIEW SERVICES</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="img-and-text-content">
            <div style="background:<?= $main_color ?>" class="text-under-large-image">
                <div>
                    <!-- <div>
                        <p>Luxuriously Simple</p>
                        <p>Naurally Potent</p>
                    </div> -->
                    <div>
                        <p>
                            <?= $about_text_under_image ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="core-values-container" style="display:flex;width:100%;margin-top:100px;padding-bottom:50px">
            <div style="display:flex">
                <div style="min-width:300px;">
                    <h3><?= $core_values_title ?></h3>
                    <br>
                    <div style="border-left:8px solid <?= $secondary_color ?>;padding-left:10px">
                        <h2><?= $core_values_large_title_1 ?></h2>
                        <p><?= $core_values_large_title_text_1 ?></p>
                    </div>

                    <br>
                    <div style="border-left:8px solid <?= $secondary_color ?>;padding-left:10px">
                        <h2><?= $core_values_title_2 ?></h2>
                        <p><?= $core_values_large_title_text_2 ?></p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div style="background:white">
        <div>
            <img src="images/<?= $core_values_img ?>" alt="<?= $core_values_img_desc ?>">
        </div>
    </div>
</div>



<?php
    require 'contact.php';
?>