<?php
session_start();
require "backend/db.php";
// if (!isset($_SESSION["useruid"])) {

//     header("Location: index.php");
// }
// require "backend/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    input {
        padding: 12px 18px;
        font-size: 16px;
    }

    textarea {
        padding: 20px;
    }

    a {
        text-decoration: none;
        line-height: normal !important;
        text-align: center
    }

    .nth-child-bkgd-color:nth-child(even) {
        background-color: #ededed;
    }

    .btn {
        width: 100px;
        padding: 12px 16px;
        border-radius: 5px;
    }

    .btn-blk {
        background-color: #333;
        color: #fff;
    }

    .btn-blk:hover {
        background-color: #fff;
        color: #333;
    }

    .btn-edit {
        background-color: green;
        color: #fff;
    }

    .btn-edit:hover {
        background-color: #fff;
        color: green;
        border: 1px solid green
    }

    .btn-delete {
        background-color: red;
        color: #fff;
    }

    .btn-delete:hover {
        background-color: #fff;
        color: red;
        border: 1px solid red;
        cursor: pointer;
    }
    #edit-gallery-photo {
        width: 200px;
    }

    @media (max-width:550px) {
        .form-container {
            flex-direction: column;
        }
        #edit-gallery-photo {
            width: 100% !important;
        }
    }
    </style>
</head>

<body>
    <section id='gallery-edits' class="stylist_info_container;"
        style="height: 100vh; display:grid; place-items:center;">
        <h3 style='padding-top: 40px'><a href="/">
                Back</a>
        </h3>
        <div class='form-container' style="display:flex; flex-wrap:wrap; gap:2rem; padding: 20px">
            <div>
                <form action="backend/add_new_category_info.php" class="stylist_form" method="POST"
                    enctype="multipart/form-data">
                    <div>
                        <h2>add new category</h2>
                    </div>
                    <br>
                    <div style="display: flex; flex-direction:column; gap:1rem">
                        <label for="service_title">Category Name</label>
                        <input type="text" name="gallery_category" id="gallery_category_name" placeholder="Hair Cuts">
                        <button name="update_gallery_category_name" class="btn btn-blk">SAVE</button>
                    </div>
                </form>
                <br>
                <br>
                <div>
                    <h2>edit category</h2>
                </div>
                <br>
                <div id="closse-stylist-name-err-btn">
                <?php
                    if (isset($_SESSION['can_not_delete'])) {
                        echo '<div id="stylist-name-empty-modal" style="position:absolute; top: 50%; left:50%; transform:translate(-50%, -50%); width:300px; height: 150px; background:#333; padding:20px; z-index: 2; border: 1px solid green; border-radius:50px; display: flex; align-items: center; justify-content:center; font-size: 18px">
                        
                        <button style="position:absolute; top:-10px; right:10px; color:#fff; cursor:pointer; height: 40px; width:40px; background-color: #333; border-radius: 50%; border:none;"  onclick="closeStylistNameEmptyModal()">x</button>
                        
                        <h3 id="stylist-name-empty-text" style="color:#fff; text-align:center; font-size:16px">' . $_SESSION['can_not_delete'] . '</h3>
                        </div>';
                        unset($_SESSION['can_not_delete']);
                    }
                ?>
                </div>
                
                <div
                    style=" display: flex; flex-direction:column; align-items:center; gap:1rem; height: 300px; overflow-y:scroll; border:1px solid #333; padding: 10px">
                    <?php
                    $category_edit_query = "SELECT * FROM gallery_categories ORDER BY gallery_category ASC";
                    $category_edit_info = mysqli_query($conn, $category_edit_query);
                    ?>
                    <?php while ($category_edit = mysqli_fetch_assoc($category_edit_info)) : ?>
                    <div class='nth-child-bkgd-color' style='border:1px solid #333; padding:10px; line-height: 1.5'>
                        <input type="hidden" name="id" value="<?= $category_edit['category_id'] ?>">
                        <td><span style='font-weight:bold'>category: </span> <?= $category_edit['gallery_category'] ?>
                        </td>
                        <br>
                        <?php

                        if($category_edit['gallery_category'] != ""){
                            echo "<br><br>
                        <div style='display:flex'>
                        <td><a class='btn btn-edit' href='backend/edit_category.php?id=" . $category_edit['category_id'] . "'>Edit</a></td>

                        <form action='backend/delete_chosen_category_info.php' method='POST'>
                                        <button class='btn btn-delete' style='margin-left:20px' id='btn-delete' type='submit' name='delete_category_btn' value='" . $category_edit['category_id'] . "'> Delete</button>
                                    </form>
                                    </div>";
                         
                        }
                                              
                        ?>
                        </div>
                        <?php endwhile ?>
                        
                    </div>
                </div>
                <div class='form-container' style="display: flex; gap:4rem; padding: 20px">
                <form action="backend/add_new_category_info.php" class="stylist_form" method="POST"
                        enctype="multipart/form-data">
                        <div>
                            <h2>add image to category</h2>
                        </div>
                        <br>
                        <div style="display: flex; flex-direction:column; gap:1rem">
                            <label for="gallery_category">select category</label>
                            <?php
                            $sql = "SELECT * FROM gallery_categories ORDER BY gallery_category ASC";
                            $category_chosen_info = mysqli_query($conn, $sql);
                        ?>
                            <select style="padding: 12px 18px; font-size: 16px;" name="category_id"
                                id="category_id">
                                <?php while ($category_chosen = mysqli_fetch_assoc( $category_chosen_info)) : ?>
                                <option style="padding: 12px 18px; font-size: 16px;"
                                    value="<?= $category_chosen['category_id'] ?>">
                                     <?= $category_chosen['gallery_category']; ?></option>       
                                <?php endwhile; ?>
                            </select>
                                <input type="hidden" value='<?= $gallery_category; ?>' name='gallery_category'>
                            

                            <label for="services_description">image</label>
                            <input type="file" name="image">

                            <label for="gallery_img_alt">image description</label>
                            <input type="text" name="gallery_img_alt">
                            <button name="update_new_category_info" class="btn btn-blk">SAVE</button>
                        </div>
                    </form>
                </div>

                <br>
                <div>
                    <div>
                        <h2>edit photos</h2>
                    </div>
                    <br>
                    <div
                        style=" display: flex; flex-direction:column; align-items:center; gap:1rem; height: 500px; overflow-y:scroll; border:1px solid #333; padding: 10px">

                        <?php
                    $category_info_query = "SELECT * FROM gallery_images_and_categories ORDER BY gallery_category ASC";
                    $category_info = mysqli_query($conn, $category_info_query);
                    ?>
                        <?php while ($category = mysqli_fetch_assoc($category_info)) : ?>
                        <div class='nth-child-bkgd-color' style='border:1px solid #333; padding:10px; line-height: 1.5; width:100%'>
                            <input type="hidden" name="category_id" value="<?= $category['category_id'] ?>">

                            <!-- GET GALLERY CATEGORY USING CATEGORY ID -->
                            <?php
                            GLOBAL $category_id;
                            $category_id = $category['category_id'];
                            ?>
                            <?php

                                $cat_name_query = "SELECT * FROM gallery_categories WHERE category_id =  $category_id";

                                $cat_name_info = mysqli_query($conn, $cat_name_query);

                                
                            ?>
                            <?php while ($category_name = mysqli_fetch_assoc($cat_name_info)) : ?>
                            <td><span style='font-weight:bold'>category: </span> <?= $category_name['gallery_category'] ?>
                            </td>

                            <?php

                                GLOBAL $get_gallery_category;
                                $get_gallery_category = $category_name['gallery_category'];

                                $update_gallery_images_categories = "UPDATE gallery_images_and_categories SET gallery_category = '$get_gallery_category' WHERE category_id = $category_id";

                                $sql_result = mysqli_query($conn, $update_gallery_images_categories);

                                ?>

                            <?php endwhile; ?>
                            <br>
                            <td><span style='font-weight:bold'>image description:
                                </span><?= $category['gallery_img_alt'] ?></td>
                            <br>
                            <td><span
                                    style="display:flex; flex-direction:column; align-items:center; font-weight:bold">image:
                                    <img id="edit-gallery-photo"; src="uploads/<?= $category['gallery_img'] ?>"
                                        alt="<?= $category['gallery_img_alt'] ?>"></span></td>
                            <?php
                        echo "<br><br>
                        <div style='display:flex'>
                        <td><a class='btn btn-edit' href='backend/update_chosen_category_info.php?id=" . $category['id'] . "'>Edit</a></td>

                        <form action='backend/delete_chosen_category_info.php' method='POST'>
                                        <button class='btn btn-delete' style='margin-left:20px' id='btn-delete' type='submit' name='delete_img_btn' value='" . $category['id'] . "'> Delete</button>
                                    </form>
                                    </div>
                        </div>";                       
                        ?>
                            <?php endwhile ?>
                        </div>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
    </section>
    <script src="js/closeModals.js" defer></script>
</body>
</html>