stopped coding this!!!
<?php
session_start();
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_stylist_images'])) {
    $stylist_img_alt = $_POST["stylist_img_alt"];
    $stylist_name = $_POST["stylist_name"];
    $stylist_title = $_POST["stylist_title"];
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../uploads/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE stylist_images SET stylist_img = '$fileName', stylist_img_alt = '$stylist_img_alt', stylist_name = '$stylist_name', stylist_title = '$stylist_title'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../about.php#since");
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