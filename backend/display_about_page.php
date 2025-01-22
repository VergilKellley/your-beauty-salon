<?php
require 'db.php';
//DISPLAY IMAGES
$sql = "SELECT * FROM about_page;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // $logo = $row['logo'];
        $about_header_img = $row['about_header_img'];
        $about_header_img_desc = $row['about_header_img_desc'];
        $about_header_title = $row['about_header_title'];
        $about_header_text = $row['about_header_text'];
        $about_img_1 = $row['about_img_1'];
        $about_img_desc_1 = $row['about_img_desc_1'];
        $about_img_2 = $row['about_img_2'];
        $about_img_desc_2 = $row['about_img_desc_2'];
        $our_story_title = $row['our_story_title'];
        $our_story_large_title = $row['our_story_large_title'];
        $our_story_paragraph_1 = $row['our_story_paragraph_1'];
        $our_story_paragraph_2 = $row['our_story_paragraph_2'];
        $about_owner_name = $row['about_owner_name'];
        $about_text_under_image = $row['about_text_under_image'];
        $core_values_title = $row['core_values_title'];
        $core_values_large_title_1 = $row['core_values_large_title_1'];
        $core_values_large_title_text_1 = $row['core_values_large_title_text_1'];
        $core_values_title_2 = $row['core_values_title_2'];
        $core_values_large_title_text_2 = $row['core_values_large_title_text_2'];
        $core_values_img = $row['core_values_img'];
        $core_values_img_desc = $row['core_values_img_desc'];
    }
}