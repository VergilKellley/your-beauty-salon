<?php
require 'db.php';
//Display Website colors 
$sql = "SELECT * FROM business_address;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    $street_address = $row['street_address'];
    $suite_unit = $row['suite_number'];
    $city = $row['city'];
    $business_state = $row['business_state'];
    $zip = $row['zip_code'];
    }
}