<?php

require 'db.php';
//DISPLAY IMAGES
$sql = "SELECT * FROM gallery_page;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $gallery_header_img = $row['gallery_header_img'];
        $gallery_header_img_description = $row['gallery_header_img_description'];

        $gallery_img_filter_one = $row['gallery_img_filter_one'];
        $gallery_img_filter_two = $row['gallery_img_filter_two'];
        $gallery_img_filter_three = $row['gallery_img_filter_three'];
        $gallery_img_filter_four = $row['gallery_img_filter_four'];
        $gallery_img_filter_five = $row['gallery_img_filter_five'];
    }
}