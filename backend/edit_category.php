<?php
require 'db.php';
// print_r($_GET['id']);
// exit();
if ($_SERVER["REQUEST_METHOD"] != "GET") {
    exit("GET request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $category_query = "SELECT * FROM gallery_categories WHERE category_id = $id";
  $category_result = mysqli_query($conn, $category_query);
  $edit_category = mysqli_fetch_assoc($category_result);
} else {
  header('location: ../edit_gallery.php#gallery-edits');
  die();
}
?>

<!DOCTYPE php>
<php lang="en">
  <head>
    <!-- https://www.youtube.com/watch?v=izWc4pL_esc&list=PLFzi7Iy-LHGOTKhjjihNpnELb4go8q7JK&index=2 -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/media-query.css" />
    <!-- fontawesome  -->
    <script
      src="https://kit.fontawesome.com/7a6c6b42a6.js"
      crossorigin="anonymous"
    ></script>
    <title>Document</title>
  </head>
  <body>

    <section style='padding: 20px; width:100vw; display:flex; justify-content: center; align-content:center'>
        <div style='width: 100%; max-width: 525px;'>
            <a style='font-size:18px' href="../edit_gallery.php"><-- Back</a>
            <h2 style='font-size:22px; padding: 30px;'>Edit <?= $edit_category['gallery_category'] ?> category <small style="color:red"> No spaces are allowed, use dashes to separate words. ie. kids-hair-cuts</small></h2>
            
            <form style="text-align: center; display:flex; flex-direction:column; gap 1rem; width:100%"
                action="update_chosen_category_logic.php" enctype="multipart/form-data" method="POST">

                <input type="hidden" name="category_id" value="<?php $id ?>" placeholder="<?= $id ?>">
                <input style="margin-bottom:1rem" type="hidden" name="category_id" value="<?= $edit_category['category_id'] ?>" />

                <div style="display: flex; flex-direction:column; font-size:22px; gap: 1rem">

                <label for="gallery_category">category</label>
                <input style=" font-size: 22px; padding:10px" type="text" name="gallery_category"
                        id="gallery_category" value="<?= $edit_category['gallery_category'] ?>" />
                        <small style="color:red">All images in the "<?= $edit_category['gallery_category'] ?>" category will be changed to this new category.</small>

                    <button style=" font-size: 22px" type="submit" name="submit_edit_category">Update
                        <?= $edit_category['gallery_category'] ?></button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>