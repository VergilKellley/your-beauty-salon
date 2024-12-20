<?php
session_start();
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_para_one']))) {

    $para_one = filter_var($_POST['para_one'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE index_page_welcome_to SET para_one = '$para_one'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../edit-website#paragraph-1');
        // die();
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_para_2_img'])) && (empty($_FILES["image"]["name"]))) {

    $_SESSION["empty_image_para_2"] = 'Please choose an image.';
    header("location:../edit-website#empty_image_para_2");

} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_para_2_img'])) && (!empty($_FILES["image"]["name"]))) {

    $para_two_img_desc = filter_var($_POST['para_two_img_desc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE index_page_welcome_to SET para_two_img = '$fileName', para_two_img_desc = '$para_two_img_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-website#para-img-two");
            } else {
                echo "Image was not uploaded";
            }
        }else {
            echo "File is not uploaded";
        }
    } else {
        echo "File type not allowed";
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_para_2_text']))) {

    $para_two = filter_var($_POST['para_two'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE index_page_welcome_to SET para_two = '$para_two'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../edit-website#para-2-text');
        // die();
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_para_3_img'])) && (empty($_FILES["image"]["name"]))) {

    $_SESSION["empty_image_para_3"] = 'Please choose an image.';
    header("location:../edit-website#empty_image_para_3");
    
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_para_3_img'])) && (!empty($_FILES["image"]["name"]))) {
    
    $para_three_img_desc = filter_var($_POST['para_three_img_desc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $fileName = $_FILES["image"]["name"];
    
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../images/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE index_page_welcome_to SET para_three_img = '$fileName', para_three_img_desc = '$para_three_img_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-website#para-img-three");
            } else {
                echo "Image was not uploaded";
            }
        }else {
            echo "File is not uploaded";
        }
    } else {
        echo "File type not allowed";
    }
}  else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_para_3_text']))) {

    $para_three = filter_var($_POST['para_three'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE index_page_welcome_to SET para_three = '$para_three'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../edit-website#para-3-text');
        // die();
    } 
    
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_para_4_img'])) && (empty($_FILES["image"]["name"]))) {

    $_SESSION["empty_image_para_4"] = 'Please choose an image.';
    header("location: ../edit-website#empty_image_para_4");
    
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_para_4_img'])) && (!empty($_FILES["image"]["name"]))) {
    
    $para_four_img_desc = filter_var($_POST['para_four_img_desc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $fileName = $_FILES["image"]["name"];
    
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE index_page_welcome_to SET para_four_img = '$fileName', para_four_img_desc = '$para_four_img_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-website#para-img-four");
                die();
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
    else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_para_5_img'])) && (empty($_FILES["image"]["name"]))) {

        $_SESSION["empty_image_para_5"] = 'Please choose an image.';
        header("location: ../edit-website#empty_image_para_5");
        
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_para_5_img'])) && (!empty($_FILES["image"]["name"]))) {
        
        $para_five_img_desc = filter_var($_POST['para_five_img_desc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $fileName = $_FILES["image"]["name"];
        
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedTypes = array("jpeg", "jpg", "png", "gif");
        $tempName = $_FILES["image"]["tmp_name"];
        $targetPath = "../assets/".$fileName;
        if(in_array($ext, $allowedTypes)) {
            if (move_uploaded_file($tempName, $targetPath)) {
                $query = "UPDATE index_page_welcome_to SET para_five_img = '$fileName', para_five_img_desc = '$para_five_img_desc'";
                if(mysqli_query($conn, $query)){
                    // echo "Your image has been uploaded";
                    header("Location: ../edit-website#para-img-five");
                    die();
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

// check if php.ini is set to on
if (empty($_FILES)) {
    exit('$_FILES is empty - is file_uploads enabled in php.ini?');
}

// check for file upload errors
if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
    switch ($_FILES["image"]["error"]) {
        case UPLOAD_ERR_PARTIAL:
            exit("File only partially uploaded");
            break;
        case UPLOAD_ERR_NO_FILE:
            exit("No filesss was uploaded");
            break;
        case UPLOAD_ERR_EXTENSION:
            exit("File upload stopped by a PHP extension");
            break;
        case UPLOAD_ERR_FORM_SIZE:
            exit("File exceeds MAX_FILE_SIZE in the HTML form");
            break;
        case UPLOAD_ERR_INI_SIZE:
            exit("File exceeds upload_max_filesize in php.ini");
        case UPLOAD_ERR_NO_TMP_DIR:
            exit("Temporary folder not found");
            break;
        case UPLOAD_ERR_CANT_WRITE:
            exit("Faild to write file");
            break;
        default:
            exit("Uknown upload error");
            break;
    }
}

if ($_FILES["image"]["size"] > 1048576) {
    exit("File too large (max 1MB)");
}

// mime type can be spuffed so we should get mime type using $finfo below
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime_type = $finfo->file($_FILES["image"]["tmp_name"]);



$mime_types = ["image/gif", "image/png", "image/jpeg", "image/jpg"];

if ( ! in_array($_FILES["image"]["type"], $mime_types)) {
    exit("Invalid file type");
}

print_r($_FILES);
