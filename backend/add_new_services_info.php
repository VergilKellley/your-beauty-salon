<?php 
require 'db.php';
if(isset($_POST['submit_new_service_info'])){

    $service_title = mysqli_real_escape_string($conn, $_POST['service_title']);

    $services_description = mysqli_real_escape_string($conn, $_POST['services_description']);

    $service_price = mysqli_real_escape_string($conn, $_POST['service_price']);

    $service_time = mysqli_real_escape_string($conn, $_POST['service_time']);

    $service_img_desc = mysqli_real_escape_string($conn, $_POST['service_img_desc']);

    $fileName = $_FILES["image"]["name"];

        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedTypes = array("jpeg", "jpg", "png", "gif");
        $tempName = $_FILES["image"]["tmp_name"];
        $targetPath = "../images/".$fileName;
        if(in_array($ext, $allowedTypes)) {
            if (move_uploaded_file($tempName, $targetPath)) {
    
        $sql = "INSERT INTO services_chosen (service_title, services_description, service_price, service_time, service_img, service_img_desc) VALUES ('$service_title', '$services_description', '$service_price', '$service_time', '$fileName', '$service_img_desc')";
        $result = mysqli_query($conn, $sql);
        // if($result){
        //     header("location: ../stylist_info.php");
            // echo "<strong>Banners inserted successfully!</strong>";
            // header("location: ../frontend/new_styles.php");
            
        // echo "<script>window.location.href='../../new_styles.php';</script>";
        // exit;
        // } else {
        //     header("location: ../admin.php");
        // //  header("location: ../../new_styles.php");
        //     // echo "something went wrong";
        //     // die(mysqli_error($conn));
        // }

//CREATE SERVICE ID START
// $id_query = "SELECT id, service_title FROM services_chosen ORDER BY id ASC;";
// $id_result = mysqli_query($conn, $id_query);
// $id_resultCheck = mysqli_num_rows($id_result);


// if ($id_resultCheck > 0) {
//     while ($row = mysqli_fetch_assoc($id_result)) {
//         $stylist_id = $row['id'];
//         $stylist_name = $row['stylist_name'];       
//     }

//     $id_sql = "INSERT INTO stylist_ids (stylist_id, stylist_name) VALUES ('$stylist_id','$stylist_name')";
//         $stylist_id_result = mysqli_query($conn, $id_sql);
//         if($stylist_id_result){
//             header("location: ../stylist_info.php");
//             // echo "<strong>Banners inserted successfully!</strong>";
//             // header("location: ../frontend/new_styles.php");
            
//         // echo "<script>window.location.href='../../new_styles.php';</script>";
//         exit;
//         } else {
//             header("location: ../stylist_info.php");
//         //  header("location: ../../new_styles.php");
//             // echo "something went wrong";
//             // die(mysqli_error($conn));
//         }
// }
////////////CREATE STYLIST ID END

header("location: ../services-chosen.php");
        }
    }
}
    