<?php
session_start();
require "db.php";

// if (isset($_POST['friStylistTime'])) {
// if (isset($_POST['submit_appointment'])) {
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $customer_name = filter_var($_POST['customer_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $customer_last_name = filter_var($_POST['customer_last_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $customer_phone_number = filter_var($_POST['customer_phone_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $customer_email = filter_var($_POST['customer_email'], FILTER_VALIDATE_EMAIL);
    $event_day = filter_var($_POST['event_day'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $event_date = filter_var($_POST['event_date'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 
    $stylist_name = filter_var($_POST['stylist_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    $services = filter_var($_POST['services_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $service_price = $_POST['service_price'];
    // $time_available = filter_var($_POST['friStylistTime'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $time_available = filter_var($_POST['select-stylist-avail-time'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $time_available = filter_var($_POST['select-stylist-time'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = filter_var($_POST['messages'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($stylist_name == 'No Technicians Available' || $stylist_name == '') {
        header('Location: ../book_appointment_4.php?success=1');
        exit();
    }

    // GLOBAL $service_price;

    foreach($_POST['services_title'] as $service_title) {
        // echo $service_title;

        $appointments_query = "SELECT services_description, service_price, service_time FROM services_chosen WHERE service_title = '$service_title'";
        $appointments_result = mysqli_query($conn, $appointments_query);
        if(mysqli_num_rows($appointments_result) > 0) {
            $service_chosen = mysqli_fetch_assoc($appointments_result);
            $service_price = $service_chosen['service_price'];
            $services_description = $service_chosen['services_description'];
            $service_time = $service_chosen['service_time'];
        }

        $customer_appointment_insert = "INSERT INTO appointments (customer_name, customer_phone_number, customer_email, event_day, event_date, services_title, services_description, service_price, stylist_name, time_available, service_time, messages) VALUES ('$customer_name', '$customer_phone_number', '$customer_email', '$event_day', '$event_date', '$service_title', '$services_description', '$service_price', '$stylist_name', '$time_available', '$service_time', '$message')";

        $result = mysqli_query($conn, $customer_appointment_insert);



        ////////////// SEND EMAIL TO R AND L BARBERSHOP TO CONFIRM APPOINTMENT
        $message_sent = false;
        // if(isset($_POST['customer_email']) && $_POST['customer_email'] !="") {
        // if(filter_var($_POST['customer_email'], FILTER_VALIDATE_EMAIL)){


        //         // submit the form

        $event_date = filter_var($_POST['event_date'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $event_day = filter_var($_POST['event_day'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $time_available = filter_var($_POST['select-stylist-avail-time'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // $time_available = filter_var($_POST['time_available'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $services = filter_var($_POST['services_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $stylist_name = filter_var($_POST['stylist_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $customer_name = filter_var($_POST['customer_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // $customer_last_name = filter_var($_POST['customer_last_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $customer_phone_number = filter_var($_POST['customer_phone_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $customer_email = filter_var($_POST['customer_email'], FILTER_VALIDATE_EMAIL);
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $to = "info@webqwick.com";
        $body = "";

        $body .="From: " . $customer_name . "\r\n";
        $body .="Email: " . $customer_email . "\r\n";
        $body .="Phone: " . $customer_phone_number . "\r\n";
        $body .="Appointment Date: " . $event_day . " " . $event_date . "\r\n";
        $body .="Appointment Time: " . $time_available . "\r\n";
        $body .="Service: " . $service_title . "\r\n";
        $body .="Technician: " . $stylist_name . "\r\n";
        $body .="Notes to technician: " . $message . "\r\n";


        mail($to,$subject,$body);
        $message_sent = true;
        
        // }
        // else {
        //     $invalid_class_name = "form-invalid";
        // }
        // }
        }
        
        if($result > 0){
            $_SESSION['status'] = "Appointment Made Successfully!";  
            header("location: ../index.php");
        } else {
            $_SESSION['status'] = "Appointment Not Made Please Try Again!";
            header("location: ../book_appointment_4.php");
        }
        exit();
}