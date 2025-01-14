<?php
require 'db.php';
//DISPLAY ABOUT PAGE
$sql = "SELECT * FROM services_chosen;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $service_title = $row['service_title'];
        $services_description = $row['services_description'];
        $service_img = $row['service_img'];
        $service_img_desc = $row['service_img_desc'];
        // $service_video = $row['service_video'];
    }
}