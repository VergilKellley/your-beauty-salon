<?php
session_start();
require 'db.php';
// https://www.youtube.com/watch?v=adMjzWiG21U

// LANDING PAGE IMAGE ONE
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_1'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_1'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-1');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_1'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_1_desc = $_POST["landing_page_img_1_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_1 = '$fileName', landing_page_img_1_desc = '$landing_page_img_1_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-1");
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



// LANDING PAGE IMAGE TWO
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_2'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_2'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-2');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_2'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_2_desc = $_POST["landing_page_img_2_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_2 = '$fileName', landing_page_img_2_desc = '$landing_page_img_2_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-2");
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

// LANDING PAGE IMAGE THREE
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_3'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_3'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-3');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_3'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_3_desc = $_POST["landing_page_img_3_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_3 = '$fileName', landing_page_img_3_desc = '$landing_page_img_3_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-3");
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

// LANDING PAGE IMAGE FOUR
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_4'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_4'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-4');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_4'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_4_desc = $_POST["landing_page_img_4_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_4 = '$fileName', landing_page_img_4_desc = '$landing_page_img_4_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-4");
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

// LANDING PAGE IMAGE FIVE
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_5'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_5'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-5');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_5'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_5_desc = $_POST["landing_page_img_5_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_5 = '$fileName', landing_page_img_5_desc = '$landing_page_img_5_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-5");
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

// LANDING PAGE IMAGE SIX
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_6'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_6'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-6');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_6'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_6_desc = $_POST["landing_page_img_6_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_6 = '$fileName', landing_page_img_6_desc = '$landing_page_img_6_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-6");
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

// LANDING PAGE IMAGE SEVEN
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_7'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_7'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-7');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_7'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_7_desc = $_POST["landing_page_img_7_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_7 = '$fileName', landing_page_img_7_desc = '$landing_page_img_7_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-7");
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

// LANDING PAGE IMAGE EIGHT
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_8'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_8'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-8');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_8'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_8_desc = $_POST["landing_page_img_8_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_8 = '$fileName', landing_page_img_8_desc = '$landing_page_img_8_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-8");
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

// LANDING PAGE IMG NINE
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_9'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_9'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-9');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_9'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_9_desc = $_POST["landing_page_img_9_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_9 = '$fileName', landing_page_img_9_desc = '$landing_page_img_9_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-9");
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

// LANDING PAGE IMG TEN
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_10'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_10'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-10');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_10'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_10_desc = $_POST["landing_page_img_10_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_10 = '$fileName', landing_page_img_10_desc = '$landing_page_img_10_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-10");
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

// LANDING PAGE IMG ELEVEN
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_11'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_11'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-11');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_11'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_11_desc = $_POST["landing_page_img_11_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_11 = '$fileName', landing_page_img_11_desc = '$landing_page_img_11_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-11");
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

// LANDING PAGE IMG TWELVE
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_12'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_12'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-12');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_12'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_12_desc = $_POST["landing_page_img_12_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_12 = '$fileName', landing_page_img_12_desc = '$landing_page_img_12_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-12");
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

// LANDING PAGE IMG THIRTEEN
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_13'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_13'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-13');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_13'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_13_desc = $_POST["landing_page_img_13_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_13 = '$fileName', landing_page_img_13_desc = '$landing_page_img_13_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-13");
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

// LANDING PAGE IMG FOURTEEN
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_14'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_14'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-14');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_14'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_14_desc = $_POST["landing_page_img_14_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_14 = '$fileName', landing_page_img_14_desc = '$landing_page_img_14_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header("Location: ../edit-home-page-images.php#landing-page-img-14");
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

// LANDING PAGE IMG FIFTHTEEN
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ('Location: ../index');
    exit();
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit_landing_page_img_15'])) && (empty($_FILES["image"]["name"]))) {
    $_SESSION['empty_image_15'] = "Please select a image.";
    header ('Location: ../edit-home-page-images#landing-page-img-15');
    exit();
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_landing_page_img_15'])) && (!empty($_FILES["image"]["name"]))) {
    
    $fileName = $_FILES["image"]["name"];
    $landing_page_img_15_desc = $_POST["landing_page_img_15_desc"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../assets/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "UPDATE landing_page_images SET landing_page_img_15 = '$fileName', landing_page_img_15_desc = '$landing_page_img_15_desc'";
            if(mysqli_query($conn, $query)){
                // echo "Your image has been uploaded";
                header ('Location: ../edit-home-page-images.php#landing-page-img-15');
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

// print_r($_FILES);