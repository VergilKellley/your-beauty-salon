<?php
require 'db.php';
//DISPLAY IMAGES
$sql = "SELECT * FROM landing_page_images;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $landing_page_img_1 = $row['landing_page_img_1'];
        $landing_page_img_1_desc = $row['landing_page_img_1_desc'];

        $landing_page_img_2 = $row['landing_page_img_2'];
        $landing_page_img_2_desc = $row['landing_page_img_2_desc'];

        $landing_page_img_3 = $row['landing_page_img_3'];
        $landing_page_img_3_desc = $row['landing_page_img_3_desc'];

        $landing_page_img_4 = $row['landing_page_img_4'];
        $landing_page_img_4_desc = $row['landing_page_img_4_desc'];

        $landing_page_img_5 = $row['landing_page_img_5'];
        $landing_page_img_5_desc = $row['landing_page_img_5_desc'];

        $landing_page_img_6 = $row['landing_page_img_6'];
        $landing_page_img_6_desc = $row['landing_page_img_6_desc'];

        $landing_page_img_7 = $row['landing_page_img_7'];
        $landing_page_img_7_desc = $row['landing_page_img_7_desc'];

        $landing_page_img_8 = $row['landing_page_img_8'];
        $landing_page_img_8_desc = $row['landing_page_img_8_desc'];

        $landing_page_img_9 = $row['landing_page_img_9'];
        $landing_page_img_9_desc = $row['landing_page_img_9_desc'];

        $landing_page_img_10 = $row['landing_page_img_10'];
        $landing_page_img_10_desc = $row['landing_page_img_10_desc'];

        $landing_page_img_11 = $row['landing_page_img_11'];
        $landing_page_img_11_desc = $row['landing_page_img_11_desc'];

        $landing_page_img_12 = $row['landing_page_img_12'];
        $landing_page_img_12_desc = $row['landing_page_img_12_desc'];

        $landing_page_img_13 = $row['landing_page_img_13'];
        $landing_page_img_13_desc = $row['landing_page_img_13_desc'];

        $landing_page_img_14 = $row['landing_page_img_14'];
        $landing_page_img_14_desc = $row['landing_page_img_14_desc'];

        $landing_page_img_15 = $row['landing_page_img_15'];
        $landing_page_img_15_desc = $row['landing_page_img_15_desc'];
    }
}