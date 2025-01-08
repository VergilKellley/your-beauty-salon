<?php
require 'db.php';
//Display Paragraphs
$sql = "SELECT * FROM index_page_welcome_to;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    $para_one = $row['para_one'];
    $para_two = $row['para_two'];
    $para_two_img = $row['para_two_img'];
    $para_two_img_desc = $row['para_two_img_desc'];
    $para_three = $row['para_three'];
    $para_three_img = $row['para_three_img'];
    $para_three_img_desc = $row['para_three_img_desc'];
    $para_four_img = $row['para_four_img'];
    $para_four_img_desc = $row['para_four_img_desc'];
    $para_five_img = $row['para_five_img'];
    $para_five_img_desc = $row['para_five_img_desc'];
    }
}