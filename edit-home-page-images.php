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
    //     require_once 'backend/display_landing_page_images.php';
    // }
?>




    <section style="margin-bottom: 4rem">
        <div style="display:flex; flex-direction:column;align-items:center; padding:20px" class="images-container">
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                    <h3>Header Images</h3>
                    <div style="display:flex; flex-direction:column; width:100%">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-1">current image 1</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_1 ?>" alt="<?= $landing_page_img_1_desc ?>">
                            <br>
                            <label for="anding-page-img-1">image description</label>
                            <input type="text" value="<?= $landing_page_img_1_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_1'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_1'] . "</p>";
                            unset ($_SESSION['empty_image_1']);
                        }
                    ?>
                        <label for="landing-page-img-1">select new image</label>
                        <input id='landing-page-img-1' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_1_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_1">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                    <h3>Header Images</h3>
                    <div style="display:flex; flex-direction:column; width:100%">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-2">current image 2</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_2 ?>" alt="<?= $landing_page_img_2_desc ?>">
                            <br>
                            <label for="anding-page-img-2">image description</label>
                            <input type="text" value="<?= $landing_page_img_2_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_2'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_2'] . "</p>";
                            unset ($_SESSION['empty_image_2']);
                        }
                    ?>
                        <label for="landing-page-img-2">select new image</label>
                        <input id='landing-page-img-2' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_2_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_2">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                <h3>Header Images</h3>
                    <div style="width:100%; display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-3">current image 3</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_3 ?>" alt="<?= $landing_page_img_3_desc ?>">
                            <br>
                            <label for="anding-page-img-3">image description</label>
                            <input type="text" value="<?= $landing_page_img_3_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_3'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_3'] . "</p>";
                            unset ($_SESSION['empty_image_3']);
                        }
                    ?>
                        <label for="landing-page-img-3">select new image</label>
                        <input id='landing-page-img-3' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_3_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_3">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                <h3>Header Images</h3>
                    <div style="width:100%; display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-4">current image 4</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_4 ?>" alt="<?= $landing_page_img_4_desc ?>">
                            <br>
                            <label for="anding-page-img-4">image description</label>
                            <input type="text" value="<?= $landing_page_img_4_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_4'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_4'] . "</p>";
                            unset ($_SESSION['empty_image_4']);
                        }
                    ?>
                        <label for="landing-page-img-4">select new image</label>
                        <input id='landing-page-img-4' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_4_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_4">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                <h3>Header Images</h3>
                    <div style="width:100%; display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-5">current image 5</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_5 ?>" alt="<?= $landing_page_img_5_desc ?>">
                            <br>
                            <label for="anding-page-img-5">image description</label>
                            <input type="text" value="<?= $landing_page_img_5_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_5'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_5'] . "</p>";
                            unset ($_SESSION['empty_image_5']);
                        }
                    ?>
                        <label for="landing-page-imgs-5">select new image</label>
                        <input id='landing-page-imgs-5' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_5_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_5">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                <h3>Header Images</h3>
                    <div style="width:100%; display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-6">current image 6</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_6 ?>" alt="<?= $landing_page_img_6_desc ?>">
                            <br>
                            <label for="anding-page-img-6">image description</label>
                            <input type="text" value="<?= $landing_page_img_6_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_6'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_6'] . "</p>";
                            unset ($_SESSION['empty_image_6']);
                        }
                    ?>
                        <label for="landing-page-img-6">select new image</label>
                        <input id='landing-page-img-6' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_6_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_6">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                <h3>Header Images</h3>
                        <div style="width:100%; display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-7">current image 7</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_7 ?>" alt="<?= $landing_page_img_7_desc ?>">
                            <br>
                            <label for="anding-page-img-7">image description</label>
                            <input type="text" value="<?= $landing_page_img_7_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_7'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_7'] . "</p>";
                            unset ($_SESSION['empty_image_7']);
                        }
                    ?>
                        <label for="landing-page-img-7">select new image</label>
                        <input id='landing-page-img-7' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_7_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_7">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                <h3>Header Images</h3>
                    <div style="width:100%; display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-8">current image 8</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_8 ?>" alt="<?= $landing_page_img_8_desc ?>">
                            <br>
                            <label for="anding-page-img-8">image description</label>
                            <input type="text" value="<?= $landing_page_img_8_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_8'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_8'] . "</p>";
                            unset ($_SESSION['empty_image_8']);
                        }
                    ?>
                        <label for="landing-page-img-8">select new image</label>
                        <input id='landing-page-img-8' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_8_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_8">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                <h3>Header Images</h3>
                    <div style="width:100%; display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-9">current image 9</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_9 ?>" alt="<?= $landing_page_img_9_desc ?>">
                            <br>
                            <label for="anding-page-img-9">image description</label>
                            <input type="text" value="<?= $landing_page_img_9_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_9'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_9'] . "</p>";
                            unset ($_SESSION['empty_image_9']);
                        }
                    ?>
                        <label for="landing-page-img-9">select new image</label>
                        <input id='landing-page-img-9' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_9_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_9">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                <h3>Header Images</h3>
                    <div style="width:100%; display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-10">current image 10</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_10 ?>" alt="<?= $landing_page_img_10_desc ?>">
                            <br>
                            <label for="anding-page-img-10">image description</label>
                            <input type="text" value="<?= $landing_page_img_10_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_10'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_10'] . "</p>";
                            unset ($_SESSION['empty_image_10']);
                        }
                    ?>
                        <label for="landing-page-img-10">select new image</label>
                        <input id='landing-page-img-10' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_10_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_10">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                <h3>Header Images</h3>
                    <div style="width:100%; display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-11">current image 11</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_11 ?>" alt="<?= $landing_page_img_11_desc ?>">
                            <br>
                            <label for="anding-page-img-11">image description</label>
                            <input type="text" value="<?= $landing_page_img_11_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_11'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_11'] . "</p>";
                            unset ($_SESSION['empty_image_11']);
                        }
                    ?>
                        <label for="landing-page-img-11">select new image</label>
                        <input id='landing-page-img-11' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_11_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_11">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                <h3>Header Images</h3>
                    <div style="width:100%; display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-12">current image 12</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_12 ?>" alt="<?= $landing_page_img_12_desc ?>">
                            <br>
                            <label for="anding-page-img-12">image description</label>
                            <input type="text" value="<?= $landing_page_img_12_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_12'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_12'] . "</p>";
                            unset ($_SESSION['empty_image_12']);
                        }
                    ?>
                        <label for="landing-page-img-12">select new image</label>
                        <input id='landing-page-img-12' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_12_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_12">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                <h3>Header Images</h3>
                    <div style="width:100%; display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-13">current image 13</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_13 ?>" alt="<?= $landing_page_img_13_desc ?>">
                            <br>
                            <label for="anding-page-img-13">image description</label>
                            <input type="text" value="<?= $landing_page_img_13_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_13'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_13'] . "</p>";
                            unset ($_SESSION['empty_image_13']);
                        }
                    ?>
                        <label for="landing-page-img-13">select new image</label>
                        <input id='landing-page-img-13' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_13_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_13">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                <h3>Header Images</h3>
                    <div style="width:100%; display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-14">current image 14</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_14 ?>" alt="<?= $landing_page_img_14_desc ?>">
                            <br>
                            <label for="anding-page-img-14">image description</label>
                            <input type="text" value="<?= $landing_page_img_14_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_14'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_14'] . "</p>";
                            unset ($_SESSION['empty_image_14']);
                        }
                    ?>
                        <label for="landing-page-img-14">select new image</label>
                        <input id='landing-page-img-14' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_14_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_14">SAVE</button>
                </div>
            </form>
            <br>
            <br>
            <form class="form-edit-home-page-images" id="index-page" action="backend/update_home_page_images.php" method="POST" enctype="multipart/form-data">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                <h3>Header Images</h3>
                    <div style="width:100%; display:flex; flex-direction:column">
                        <div style="display:flex; flex-direction:column">
                            <p id="landing-page-img-15">current image 15</p>
                            <img style="width:80%; border:1px solid #000; margin-top:10px" src="assets/<?= $landing_page_img_15 ?>" alt="<?= $landing_page_img_15_desc ?>">
                            <br>
                            <label for="anding-page-img-15">image description</label>
                            <input type="text" value="<?= $landing_page_img_15_desc ?>" maxlength="40" readonly>
                        </div>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['empty_image_15'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image_15'] . "</p>";
                            unset ($_SESSION['empty_image_15']);
                        }
                    ?>
                        <label for="landing-page-img-15">select new image</label>
                        <input id='landing-page-img-15' type="file" name="image">
                        <br>
                        <p>enter new image description</p>
                        <input type="text" name="landing_page_img_15_desc">
                    </div>
                    <br>
                    <button class="edit-home-page-images-btn" type="submit" name="submit_landing_page_img_15">SAVE</button>
                </div>
            </form>
        </div>
    </section>
    <br>
    <br>
</body>

</html>