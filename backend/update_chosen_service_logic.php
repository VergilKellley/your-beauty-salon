<?php
session_start();
require 'db.php';


if ($_SERVER['REQUEST_METHOD'] != 'POST' || (empty($_FILES["image"]["name"])) || (!isset($_POST['submit_update_chosen_service_info']))) {

    $_SESSION['empty_edit_image'] = 'Did not update. Please choose an image after pressing green edit button';
    header("location: ../services-chosen#edit");

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && (!empty($_FILES["image"]["name"])) && (isset($_POST['submit_update_chosen_service_info']))) {
    
    $service_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    $service_time = filter_var($_POST['service_time'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $service_price = filter_var($_POST['service_price'], FILTER_SANITIZE_NUMBER_INT);

    $services_description = filter_var($_POST['services_description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $service_title = filter_var($_POST['service_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $service_img_desc = filter_var($_POST['service_img_desc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpeg", "jpg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../images/".$fileName;
    if(in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
        $update_chosen_service_query = "UPDATE services_chosen SET service_title = '$service_title', services_description = '$services_description', service_price = '$service_price', service_time = '$service_time', service_img = '$fileName', service_img_desc = '$service_img_desc' WHERE id = $service_id;";

        $update_chosen_service_result = mysqli_query($conn, $update_chosen_service_query);
        // echo  $hours_900_am;

        // print_r($update_stylist_info_query);
        if(!mysqli_errno($conn)) {
            // redirect to manage users page with success message
            // $_SESSION['add-user-success'] = "New user $firstname $lastname added successfully";
            header('location: ../services-chosen.php');
   
        }
} else {
    header('location: ../photo-gallery.php');
    die();
        }
    }
}