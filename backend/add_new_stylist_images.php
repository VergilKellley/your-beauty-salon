<?php 
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_stylist_images'])) {

    // $gallery_category = mysqli_real_escape_string($conn, $_POST['gallery_category']);
    
    // $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $stylist_img_alt = mysqli_real_escape_string($conn, $_POST['stylist_img_alt']);
    $stylist_name = mysqli_real_escape_string($conn, $_POST['stylist_name']);
    $stylist_title = mysqli_real_escape_string($conn, $_POST['stylist_title']);
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../uploads/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {

            $query = "INSERT INTO stylist_info (stylist_name, stylist_title, stylist_img, stylist_img_alt) VALUES ('$stylist_name', '$stylist_title', '$fileName', '$stylist_img_alt')";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit_stylist_images.php#");
            } else {
                echo "Image was not uploaded";
            }
        }else {
            echo "File is not uploaded";
        }
    } else {
        echo "File type not allowed";
    }
}
    