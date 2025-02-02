<?php
session_start();
require 'db.php';

// WELCOME TITLE AND TEXT
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_welcome_to_title_text'])) {

    $rotating_imgs_title = filter_var($_POST['rotating_imgs_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rotating_imgs_text = filter_var($_POST['rotating_imgs_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // $about_since_year = filter_var($_POST['about_since_year'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "UPDATE index_page_welcome_to SET rotating_imgs_title = '$rotating_imgs_title', rotating_imgs_text = '$rotating_imgs_text'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../edit-homepage#welcome-to');
        die();
    }
}

// WELCOME BACKGROUND IMG
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
}    else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_rotating_imgs_bkgd_img'])) && (empty($_FILES["image"]["name"]))) {

        $_SESSION["empty_welcome_to_bkgd_img"] = 'Please choose an image.';
        header("location: ../edit-homepage#welcome-to-bkgd-img");
        exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_rotating_imgs_bkgd_img']) && (!empty($_FILES["image"]["name"]))) {

    $rotating_imgs_bkgd_img_desc = filter_var($_POST['rotating_imgs_bkgd_img_desc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE index_page_welcome_to SET rotating_imgs_bkgd_img = '$fileName', rotating_imgs_bkgd_img_desc = '$rotating_imgs_bkgd_img_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-homepage#welcome_to_bkgd_img");
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

// REVIEWS TITLE
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_reviews_title'])) {

    $reviews_title = filter_var($_POST['reviews_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // $about_since_year = filter_var($_POST['about_since_year'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "UPDATE reviews SET reviews_title = '$reviews_title'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        // redirect to index.php
        // $_SESSION['color_updated'] = "Color updated successfully";
        header('location: ../edit-homepage#welcome-to-reviews');
        die();
    }
}

// REVIEWS BACKGROUND IMAGE
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
}    else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_reviews_bkgd_img'])) && (empty($_FILES["image"]["name"]))) {

        $_SESSION["empty_reviews_bkgd_img"] = 'Please choose an image.';
        header("location: ../edit-homepage#reviews-no-bkgd-img");
        exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_reviews_bkgd_img'])) {

    $reviews_bkgd_img_desc = filter_var($_POST['reviews_bkgd_img_desc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../images/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE index_page_welcome_to SET reviews_bkgd_img = '$fileName', reviews_bkgd_img_desc = '$reviews_bkgd_img_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-homepage#reviews-section-bkgd-img");
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

// REVIEWS IMAGE 1
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
}    else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_review_img_1'])) && (empty($_FILES["image"]["name"]))) {

        $_SESSION["empty_reviews_img_1"] = 'Please choose an image.';
        header("location: ../edit-homepage#reviews-no-img-1");
        exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_review_img_1'])) {

    $reviewers_img_desc_1 = filter_var($_POST['reviewers_img_desc_1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../images/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE reviews SET reviewers_img_1 = '$fileName', reviewers_img_desc_1 = '$reviewers_img_desc_1'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-homepage#reviews-1");
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

// REVIEWS COMMENTS 1
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_reviewer_comments_1'])) {

    $reviewers_name_1 = filter_var($_POST['reviewers_name_1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reviewers_comments_1 = filter_var($_POST['reviewers_comments_1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE reviews SET reviewers_name_1 = '$reviewers_name_1', reviewers_comments_1 = '$reviewers_comments_1'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        header('location: ../edit-homepage#reviews-comments-1');
        die();
    }
}

// REVIEWS IMAGE 2
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
}    else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_review_img_2'])) && (empty($_FILES["image"]["name"]))) {

        $_SESSION["empty_reviews_img_2"] = 'Please choose an image.';
        header("location: ../edit-homepage#reviews-no-img-2");
        exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_review_img_2'])) {

    $reviewers_img_desc_2 = filter_var($_POST['reviewers_img_desc_2'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../images/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE reviews SET reviewers_img_2 = '$fileName', reviewers_img_desc_2 = '$reviewers_img_desc_2'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-homepage#reviews-2");
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

// REVIEWS COMMENTS 2
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_reviewer_comments_2'])) {

    $reviewers_name_2 = filter_var($_POST['reviewers_name_2'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reviewers_comments_2 = filter_var($_POST['reviewers_comments_2'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE reviews SET reviewers_name_2 = '$reviewers_name_2', reviewers_comments_2 = '$reviewers_comments_2'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        header('location: ../edit-homepage#reviews-comments-2');
        die();
    }
}

// REVIEWS IMAGE 3
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
}    else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_review_img_3'])) && (empty($_FILES["image"]["name"]))) {

        $_SESSION["empty_reviews_img_3"] = 'Please choose an image.';
        header("location: ../edit-homepage#reviews-no-img-3");
        exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_review_img_3'])) {

    $reviewers_img_desc_3 = filter_var($_POST['reviewers_img_desc_3'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../images/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE reviews SET reviewers_img_3 = '$fileName', reviewers_img_desc_3 = '$reviewers_img_desc_3'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-homepage#reviews-3");
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

// REVIEWS COMMENTS 3
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_reviewer_comments_3'])) {

    $reviewers_name_3 = filter_var($_POST['reviewers_name_3'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reviewers_comments_3 = filter_var($_POST['reviewers_comments_3'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE reviews SET reviewers_name_3 = '$reviewers_name_3', reviewers_comments_3 = '$reviewers_comments_3'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        header('location: ../edit-homepage#reviews-comments-3');
        die();
    }
}

// REVIEWS IMAGE 4
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
}    else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_review_img_4'])) && (empty($_FILES["image"]["name"]))) {

        $_SESSION["empty_reviews_img_4"] = 'Please choose an image.';
        header("location: ../edit-homepage#reviews-no-img-4");
        exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_review_img_4'])) {

    $reviewers_img_desc_4 = filter_var($_POST['reviewers_img_desc_4'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../images/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE reviews SET reviewers_img_4 = '$fileName', reviewers_img_desc_4 = '$reviewers_img_desc_4'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-homepage#reviews-4");
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

// REVIEWS COMMENTS 4
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_reviewer_comments_4'])) {

    $reviewers_name_4 = filter_var($_POST['reviewers_name_4'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reviewers_comments_4 = filter_var($_POST['reviewers_comments_4'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE reviews SET reviewers_name_4 = '$reviewers_name_4', reviewers_comments_4 = '$reviewers_comments_4'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        header('location: ../edit-homepage#reviews-comments-4');
        die();
    }
}

// REVIEWS IMAGE 5
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
}    else if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_reviewers_img_5'])) && (empty($_FILES["image"]["name"]))) {

        $_SESSION["empty_reviews_img_5"] = 'Please choose an image.';
        header("location: ../edit-homepage#reviews-no-img-5");
        exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_reviewers_img_5'])) {

    $reviewers_img_desc_5 = filter_var($_POST['reviewers_img_desc_5'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../images/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE reviews SET reviewers_img_5 = '$fileName', reviewers_img_desc_5 = '$reviewers_img_desc_5'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-homepage#reviews-5");
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

// REVIEWS COMMENTS 5
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location:../index");
    exit();
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_reviewer_comments_5'])) {

    $reviewers_name_5 = filter_var($_POST['reviewers_name_5'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reviewers_comments_5 = filter_var($_POST['reviewers_comments_5'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE reviews SET reviewers_name_5 = '$reviewers_name_5', reviewers_comments_5 = '$reviewers_comments_5'";

    $sql_result = mysqli_query($conn, $sql);

    if(!mysqli_errno($conn)) {
        header('location: ../edit-homepage#reviews-comments-5');
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
