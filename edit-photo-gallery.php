<?php

require_once 'header-edit-pages.php';
    // session_start();

    // if (!isset($_SESSION["user_id"])) {

    //     header("location: index.php");
    //     exit();

    // } elseif (isset($_SESSION["user_id"])) {
    //     require_once 'backend/db.php';
    //     require_once 'backend/display_index_page_welcome_to.php';
    //     require_once 'backend/display_popular_services.php';
    //     require_once 'backend/display_website_colors.php';
    // }
?>


<section>
    <!-- <a href="#back" id="showreel">Showreel</a> -->

    <div class="slider">

        <div class="slider-wrapper">

            <form id="add-image-form" action="backend/update_edit_photo_gallery.php" style="border:3px solid #000; margin-bottom:30px" method="post" enctype="multipart/form-data">
                <div style="padding:20px" id="back" class="slider-item">
                    <p>add image to photo gallery</p>
                    <figure style="display: flex;flex-direction: column;   align-items: left;">

                        <div style="display:flex; flex-direction:column; align-items:center">

                        <?php
                            if (isset($_SESSION['empty_add_image'])) {
                                echo "<div style='border:1px solid red; padding:10px; display:flex;flex-direction:column'>
                                        <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_add_image'] . "</p>";
                                unset ($_SESSION['empty_add_image']);
                            }
                        ?>
                            <label style="margin-bottom:10px;margin-top:30px; " for="landing-page-img-1">select new
                                image</label>

                            <input style="width:100%" id='landing-page-img-1' type="file" name="image">

                            <p style="margin-top:20px">enter new image description</p>
                            <input style="margin-top:10px; width:100%" type="text" name="photo_gallery_imgs_desc"
                                value="">

                            <button class="edit-home-page-images-btn" style="margin-top:30px; width:50%" type="submit"
                                name="submit-add-to-photo-gallery-btn">SAVE</button>
                        </div>
                    </figure>
                </div>
            </form>

            <?php
            $photo_gallery_query = 'SELECT * FROM photo_gallery ORDER BY id DESC';
            $photo_gallery_info = mysqli_query($conn, $photo_gallery_query);
            ?>

            <?php while ($photo_gallery = mysqli_fetch_assoc($photo_gallery_info)) : ?>


            <form id="top-of-form" class="form-edit-photo-gallery" action="backend/update_edit_photo_gallery.php" method="post"
                enctype="multipart/form-data">
                <?php
                        if (isset($_SESSION['empty_image'])) {
                            echo "<div style='border:1px solid red; padding:10px; display:flex;flex-direction:column'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image'] . "</p>";
                            unset ($_SESSION['empty_image']);
                        }
                    ?>
                <div id="back" class="slider-item">
                    <p>current image</p>
                    <figure style="display: flex;flex-direction: column;   align-items: left;">

                        <img style=" padding-top:20px" src="./images/<?= $photo_gallery['photo_gallery_imgs'] ?>"
                            alt="<?= $photo_gallery['photo_gallery_imgs_desc'] ?>">

                        <div style="display:flex; flex-direction:column; align-items:center">

                            
                            <p style="margin-top:10px">current image description</p>
                            <input style="width:97%;margin-top:10px" type="text"
                                value="<?= $photo_gallery['photo_gallery_imgs_desc'] ?>" readonly>

                            <button class="edit-photo-gallery-delete-btn" style="margin-top:10px; width:50%"
                                type="submit" name="submit-photo-gallery-delete-btn">DELETE</button>

                                <input type="hidden" name="id" value="<?= $photo_gallery['id'] ?>">

                            
                            <label id="<?= $photo_gallery['id'] ?>" style="margin-bottom:10px;margin-top:30px" for="landing-page-img-1">select new
                            image</label>

                            <input style="width:100%" id='landing-page-img-1' type="file" name="image">

                            <p style="margin-top:20px">enter new image description</p>
                            <input style="margin-top:10px; width:100%" type="text" name="photo-gallery-img-desc"
                                value="">

                            <button class="edit-home-page-images-btn" style="margin-top:30px; width:50%" type="submit"
                                name="submit-photo-gallery-save-img-btn">SAVE</button>
                        </div>
                    </figure>
                </div>
            </form>
            <?php endwhile ?>
        </div>
        <div class="slider-progress">
            <div class="slider-progress-bar"></div>
        </div>
    </div>
</section>
<br>
<br>
</body>

</html>