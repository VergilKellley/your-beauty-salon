<?php
require 'db.php';
//Display Website colors 
$sql = "SELECT * FROM website_colors;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    $main_color = $row['main_color'];
    $secondary_color = $row['secondary_color'];
    $accent_color = $row['accent_color'];
    }
}