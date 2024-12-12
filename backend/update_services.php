<?php
session_start();
require 'db.php';

// SERVICES TEXT

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_services_text'])) {
    $services_text = filter_var($_POST['services_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //preg_replace("|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|", '', $_REQUEST['phone']);

    $sql = "UPDATE vip_services SET services_text = '$services_text'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../index.php#services');
        die();
    }
}


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_vip_service'])) {
    $vip_service_title = filter_var($_POST['vip_service_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $vip_service_subtitle = filter_var($_POST['vip_service_subtitle'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $vip_service_description = filter_var($_POST['vip_service_description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE vip_services SET vip_service_title = '$vip_service_title', vip_service_subtitle = '$vip_service_subtitle', vip_service_description = '$vip_service_description'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {

        header('location: ../index.php#services');
        die();
    }
}
// else {

// header('location: ../index.php#services');
// die();
// }

// VIP IMG
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['vip_img'])) {
    $vip_img_description = $_POST["vip_img_description"];
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../uploads/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE vip_services SET vip_img = '$fileName', vip_img_description = '$vip_img_description'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../index.php#services");
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
            exit("No file was uploaded");
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

