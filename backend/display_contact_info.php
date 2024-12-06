<?php
require 'db.php';
//Display Website colors 
$sql = "SELECT * FROM contact_info;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    $business_name = $row['business_name'];
    $phone = $row['phone'];
    $email = $row['email'];
    }
}