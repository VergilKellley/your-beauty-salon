<?php
session_start();
require 'db.php';

// ABOUT HEADER IMG
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_about_header_img'])) {
    $about_header_img_description = $_POST["about_header_img_description"];
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../uploads/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE about_page SET about_header_img = '$fileName', about_header_img_description = '$about_header_img_description'";
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

// SINCE YEAR AND PARAGRAPHS ONE AND TWO
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_about_paragraphs_and_since_year'])) {
    $about_since_year = filter_var($_POST['about_since_year'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $about_since_year = filter_var($_POST['about_since_year'], FILTER_SANITIZE_NUMBER_INT);
    $about_paragraph_one = filter_var($_POST['about_paragraph_one'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about_paragraph_two = filter_var($_POST['about_paragraph_two'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE about_page SET about_since_year = '$about_since_year', about_paragraph_one = '$about_paragraph_one', about_paragraph_two = '$about_paragraph_two'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../about.php#since');
        die();
    }
}

// OWNER/MANAGER NAME AND EMAIL

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_about_owner_manager_name_email'])) {
    $about_owner_manager_name = filter_var($_POST['about_owner_manager_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about_owner_manager_title = filter_var($_POST['about_owner_manager_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about_owner_manager_phone = filter_var($_POST['about_owner_manager_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about_owner_manager_email = filter_var($_POST['about_owner_manager_email'], FILTER_SANITIZE_EMAIL);

    $sql = "UPDATE about_page SET about_owner_manager_name = '$about_owner_manager_name', about_owner_manager_title = '$about_owner_manager_title', about_owner_manager_phone = '$about_owner_manager_phone', about_owner_manager_email = '$about_owner_manager_email'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        header('location: ../about.php#since');
        die();
    }
}

// OWNER/MANAGER IMG
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_about_owner_manager_img'])) {
    $about_owner_manager_img_description = $_POST["about_owner_manager_img_description"];
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../uploads/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE about_page SET about_owner_manager_img = '$fileName', about_owner_manager_img_description = '$about_owner_manager_img_description'";
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

// OUR SOLUTIONS TITLE AND TEXT

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_about_solutions'])) {
    $about_solutions_title = filter_var($_POST['about_solutions_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about_solutions_subtitle = filter_var($_POST['about_solutions_subtitle'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE about_page SET about_solutions_title = '$about_solutions_title', about_solutions_subtitle =  '$about_solutions_subtitle'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        header('location: ../about.php#since');
        die();
    }
}

// OUR STORY STYLIST IMG ONE
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_about_stylist_img_one'])) {
    $about_stylist_img_one_description = $_POST["about_stylist_img_one_description"];
    $about_stylist_img_one_name = $_POST["about_stylist_img_one_name"];
    $about_stylist_img_one_title = $_POST["about_stylist_img_one_title"];
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../uploads/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE about_page SET about_stylist_img_one = '$fileName', about_stylist_img_one_description = '$about_stylist_img_one_description', about_stylist_img_one_name = '$about_stylist_img_one_name', about_stylist_img_one_title = '$about_stylist_img_one_title'";
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

// OUR STORY STYLIST IMG TWO
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_about_stylist_img_two'])) {
    $about_stylist_img_two_description = $_POST["about_stylist_img_two_description"];
    $about_stylist_img_two_name = $_POST["about_stylist_img_two_name"];
    $about_stylist_img_two_title = $_POST["about_stylist_img_two_title"];
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../uploads/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE about_page SET about_stylist_img_two = '$fileName', about_stylist_img_two_description = '$about_stylist_img_two_description', about_stylist_img_two_name = '$about_stylist_img_two_name', about_stylist_img_two_title = '$about_stylist_img_two_title'";
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

// OUR STORY STYLIST IMG THREE
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_about_stylist_img_three'])) {
    $about_stylist_img_three_description = $_POST["about_stylist_img_three_description"];
    $about_stylist_img_three_name = $_POST["about_stylist_img_three_name"];
    $about_stylist_img_three_title = $_POST["about_stylist_img_three_title"];
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../uploads/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE about_page SET about_stylist_img_three = '$fileName', about_stylist_img_three_description = '$about_stylist_img_three_description', about_stylist_img_three_name = '$about_stylist_img_three_name', about_stylist_img_three_title = '$about_stylist_img_three_title'";
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

// PRODUCTS TEXT

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("POST request method required");
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_about_products_text'])) {
    $about_products_text = filter_var($_POST['about_products_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE about_page SET about_products_text = '$about_products_text'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        header('location: ../about.php#since');
        die();
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

//else {
//     // redirect to index.php
//     $_SESSION_['color_not_updated'] = "Color not updated. Please try again. If problem persists, please contact your website administrator.";
// header('location: index.php');
// die();
// }