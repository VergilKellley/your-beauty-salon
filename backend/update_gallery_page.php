<?php

session_start();
require 'db.php';

// GALLERY HEADER IMG
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_gallery_header_img'])) {
    $gallery_header_img_description = $_POST["gallery_header_img_description"];
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../uploads/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE gallery_page SET gallery_header_img = '$fileName', gallery_header_img_description = '$gallery_header_img_description'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../gallery.php#gallery-header");
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

// GALLERY IMG FILTERS
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_gallery_img_filters'])) {
    // $about_since_year = filter_var($_POST['about_since_year'], FILTER_SANITIZE_NUMBER_INT);
    $gallery_img_filter_one = filter_var($_POST['gallery_img_filter_one'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $gallery_img_filter_two = filter_var($_POST['gallery_img_filter_two'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $gallery_img_filter_three = filter_var($_POST['gallery_img_filter_three'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $gallery_img_filter_four = filter_var($_POST['gallery_img_filter_four'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $gallery_img_filter_five = filter_var($_POST['gallery_img_filter_five'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE gallery_page SET gallery_img_filter_one = '$gallery_img_filter_one', gallery_img_filter_two = '$gallery_img_filter_two', gallery_img_filter_three = '$gallery_img_filter_three', gallery_img_filter_four = '$gallery_img_filter_four', gallery_img_filter_five = '$gallery_img_filter_five'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../gallery.php#filters');
        die();
    }
}

// PRODUCTS TEXT

// if ($_SERVER["REQUEST_METHOD"] != "POST") {
//     exit("POST request method required");
// } elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_about_products_text'])) {
//     $about_products_text = filter_var($_POST['about_products_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//     $sql = "UPDATE about_page SET about_products_text = '$about_products_text'";

//     $sql_result = mysqli_query($conn, $sql);

//     if(!mysqli_errno($conn)) {
//         header('location: ../about.php#since');
//         die();
//     }
// }


// check if php.ini is set to on
// if (empty($_FILES)) {
//     exit('$_FILES is empty - is file_uploads enabled in php.ini?');
// }

// check for file upload errors
// if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
//     switch ($_FILES["image"]["error"]) {
//         case UPLOAD_ERR_PARTIAL:
//             exit("File only partially uploaded");
//             break;
//         case UPLOAD_ERR_NO_FILE:
//             exit("No file was uploaded");
//             break;
//         case UPLOAD_ERR_EXTENSION:
//             exit("File upload stopped by a PHP extension");
//             break;
//         case UPLOAD_ERR_FORM_SIZE:
//             exit("File exceeds MAX_FILE_SIZE in the HTML form");
//             break;
//         case UPLOAD_ERR_INI_SIZE:
//             exit("File exceeds upload_max_filesize in php.ini");
//         case UPLOAD_ERR_NO_TMP_DIR:
//             exit("Temporary folder not found");
//             break;
//         case UPLOAD_ERR_CANT_WRITE:
//             exit("Faild to write file");
//             break;
//         default:
//             exit("Uknown upload error");
//             break;
//     }
// }

// if ($_FILES["image"]["size"] > 1048576) {
//     exit("File too large (max 1MB)");
// }

//else {
//     // redirect to index.php
//     $_SESSION_['color_not_updated'] = "Color not updated. Please try again. If problem persists, please contact your website administrator.";
// header('location: index.php');
// die();
// }