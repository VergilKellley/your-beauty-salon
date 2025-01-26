<?php
session_start();
require 'db.php';

// ABOUT HEADER IMG
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
}    else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_update_about_header_img'])) && (empty($_FILES["image"]["name"]))) {

        $_SESSION["empty_header_img"] = 'Please choose an image.';
        header("location: ../edit-about#header-img");
        exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_update_about_header_img'])) {

    $about_header_img_desc = filter_var($_POST['about_header_img_desc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../images/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE about_page SET about_header_img = '$fileName', about_header_img_desc = '$about_header_img_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-about#header-img");
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

// HEADER IMAGE TITLE AND TEXT
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_update_about_header_title_and_text'])) {

    $about_header_title = filter_var($_POST['about_header_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about_header_text = filter_var($_POST['about_header_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $about_since_year = filter_var($_POST['about_since_year'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "UPDATE about_page SET about_header_title = '$about_header_title', about_header_text = '$about_header_text'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../edit-about#about-header-title-text');
        die();
    }
}

// ABOUT BACKGROUND IMAGE
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
}    else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_update_about_bkgd_img'])) && (empty($_FILES["image"]["name"]))) {

        $_SESSION["empty_bkgd_img"] = 'Please choose an image.';
        header("location: ../edit-about#no-bkgd-img");
        exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_update_about_bkgd_img'])) {

    $about_img_desc_1 = filter_var($_POST['about_img_desc_1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../bkgd-images/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE about_page SET about_img_1 = '$fileName', about_img_desc_1 = '$about_img_desc_1'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-about#bkgd-img");
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

// ABOUT FOREGROUND IMAGE
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
}    else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_update_foreground_img'])) && (empty($_FILES["image"]["name"]))) {

        $_SESSION["empty_foreground_img"] = 'Please choose an image.';
        header("location: ../edit-about#no-foreground-img");
        exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_update_foreground_img'])) {

    $about_img_desc_2 = filter_var($_POST['about_img_desc_2'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../images/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE about_page SET about_img_2 = '$fileName', about_img_desc_2 = '$about_img_desc_2'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-about#foreground-img");
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

// TEXT UNDER IMAGE
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_text_under_image'])) {

    $about_text_under_image = filter_var($_POST['about_text_under_image'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE about_page SET about_text_under_image = '$about_text_under_image'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        header('location: ../edit-about#about_text_under_image');
        die();
    }
}

// OUR STORY
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_update_our_story'])) {

    $our_story_title = filter_var($_POST['our_story_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $our_story_large_title = filter_var($_POST['our_story_large_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $our_story_paragraph_1 = filter_var($_POST['our_story_paragraph_1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $our_story_paragraph_2 = filter_var($_POST['our_story_paragraph_2'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about_owner_name = filter_var($_POST['about_owner_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE about_page SET our_story_title = '$our_story_title', our_story_large_title = '$our_story_large_title', our_story_paragraph_1 = '$our_story_paragraph_1', our_story_paragraph_2 = '$our_story_paragraph_2', about_owner_name = '$about_owner_name'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        header('location: ../edit-about#our-story');
        die();
    }
}

// CORE VALUES
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_update_core_values'])) {

    $core_values_title = filter_var($_POST['core_values_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $core_values_large_title_1 = filter_var($_POST['core_values_large_title_1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $core_values_large_title_text_1 = filter_var($_POST['core_values_large_title_text_1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $core_values_title_2 = filter_var($_POST['core_values_title_2'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $core_values_large_title_text_2 = filter_var($_POST['core_values_large_title_text_2'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE about_page SET core_values_title = '$core_values_title', core_values_large_title_1 = '$core_values_large_title_1', core_values_large_title_text_1 = '$core_values_large_title_text_1', core_values_title_2 = '$core_values_title_2', core_values_large_title_text_2 = '$core_values_large_title_text_2'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        header('location: ../edit-about#core-values');
        die();
    }
}

// CORE VALUES IMAGE
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
}    else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_update_core_values_img'])) && (empty($_FILES["image"]["name"]))) {

        $_SESSION["empty_core_values_img"] = 'Please choose an image.';
        header("location: ../edit-about#no-core-values-img");
        exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_update_core_values_img'])) {

    $core_values_img_desc = filter_var($_POST['core_values_img_desc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../images/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE about_page SET core_values_img = '$fileName', core_values_img_desc = '$core_values_img_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-about#core-values-img");
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
