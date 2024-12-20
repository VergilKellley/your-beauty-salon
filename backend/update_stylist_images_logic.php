<?php
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_update_stylist_images_info'])) {

    $stylist_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $stylist_img_alt = filter_var($_POST['stylist_img_alt'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $stylist_title = filter_var($_POST['stylist_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $stylist_name = filter_var($_POST['stylist_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../uploads/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
    

        $update_stylist_img_query = "UPDATE stylist_images SET stylist_img = '$fileName',  stylist_img_alt = '$stylist_img_alt', stylist_name = '$stylist_name', stylist_title = '$stylist_title' WHERE id = $stylist_id;";

        $stylist_img_result = mysqli_query($conn, $update_stylist_img_query);

        if(!mysqli_errno($conn)) {

            header('location: ../edit_stylist_images.php');
            die();
            }
        }
    }
}


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_edit_category'])) {

    $category_id = filter_var($_POST['category_id'], FILTER_SANITIZE_NUMBER_INT);
    $gallery_category = filter_var($_POST['gallery_category'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    

        
        $update_category_query = "UPDATE gallery_categories SET gallery_category = '$gallery_category' WHERE category_id = '$category_id';";

        $update_images_and_category_result = mysqli_query($conn, $update_category_query);

        if(!mysqli_errno($conn)) {
            // redirect to manage users page with success message
            // $_SESSION['add-user-success'] = "New user $firstname $lastname added successfully";
            header('location: ../edit_gallery.php#gallery-edits');
            die();
        }
} else {
    header('location: ../index.php');
    die();
        }


