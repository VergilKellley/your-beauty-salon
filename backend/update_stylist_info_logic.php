<?php
session_start();
require 'db.php';

// get form data if submit button was clicked

if (($_SERVER["REQUEST_METHOD"] != "POST") || (!isset($_POST['submit_update_stylist_info']))) {

    header ('Location: ../index.php');


    } elseif (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['submit_update_stylist_info'])) && (isset($_SESSION["user_id"])) && (empty($_FILES["image"]["name"]))) {

        $_SESSION["empty_image"] = 'No edits made. Please choose an image after pressing the edit button.';
        header('Location:../stylist-info.php');


    } elseif (isset($_POST['submit_update_stylist_info'])) {
    
    $stylist_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $stylist_name = filter_var($_POST['stylist_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $stylist_title = filter_var($_POST['stylist_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $stylist_email = filter_var($_POST['stylist_email'], FILTER_VALIDATE_EMAIL);
    $stylist_hours_textarea = filter_var($_POST['stylist_hours_textarea'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $stylist_img_alt = filter_var($_POST['stylist_img_alt'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $Mon = filter_var($_POST['Mon'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Tue = filter_var($_POST['Tue'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Wed = filter_var($_POST['Wed'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Thur = filter_var($_POST['Thur'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Fri = filter_var($_POST['Fri'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Sat = filter_var($_POST['Sat'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Sun = filter_var($_POST['Sun'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $mon_900_am = filter_var($_POST['mon_900_am'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_915_am = filter_var($_POST['mon_915_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_930_am = filter_var($_POST['mon_930_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_945_am = filter_var($_POST['mon_945_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $mon_1000_am = filter_var($_POST['mon_1000_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_1015_am = filter_var($_POST['mon_1015_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_1030_am = filter_var($_POST['mon_1030_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_1045_am = filter_var($_POST['mon_1045_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $mon_1100_am = filter_var($_POST['mon_1100_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_1115_am = filter_var($_POST['mon_1115_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_1130_am = filter_var($_POST['mon_1130_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_1145_am = filter_var($_POST['mon_1145_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $mon_1200_pm = filter_var($_POST['mon_1200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_1215_pm = filter_var($_POST['mon_1215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_1230_pm = filter_var($_POST['mon_1230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_1245_pm = filter_var($_POST['mon_1245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $mon_100_pm = filter_var($_POST['mon_100_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_115_pm = filter_var($_POST['mon_115_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_130_pm = filter_var($_POST['mon_130_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_145_pm = filter_var($_POST['mon_145_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $mon_200_pm = filter_var($_POST['mon_200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_215_pm = filter_var($_POST['mon_215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_230_pm = filter_var($_POST['mon_230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_245_pm = filter_var($_POST['mon_245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $mon_300_pm = filter_var($_POST['mon_300_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_315_pm = filter_var($_POST['mon_315_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_330_pm = filter_var($_POST['mon_330_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_345_pm = filter_var($_POST['mon_345_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $mon_400_pm = filter_var($_POST['mon_400_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_415_pm = filter_var($_POST['mon_415_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_430_pm = filter_var($_POST['mon_430_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_445_pm = filter_var($_POST['mon_445_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $mon_500_pm = filter_var($_POST['mon_500_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_515_pm = filter_var($_POST['mon_515_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_530_pm = filter_var($_POST['mon_530_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mon_545_pm = filter_var($_POST['mon_545_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $mon_600_pm = filter_var($_POST['mon_600_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    /////////////////Tue/////////////////////

    $tue_900_am = filter_var($_POST['tue_900_am'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_915_am = filter_var($_POST['tue_915_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_930_am = filter_var($_POST['tue_930_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_945_am = filter_var($_POST['tue_945_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $tue_1000_am = filter_var($_POST['tue_1000_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_1015_am = filter_var($_POST['tue_1015_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_1030_am = filter_var($_POST['tue_1030_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_1045_am = filter_var($_POST['tue_1045_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $tue_1100_am = filter_var($_POST['tue_1100_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_1115_am = filter_var($_POST['tue_1115_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_1130_am = filter_var($_POST['tue_1130_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_1145_am = filter_var($_POST['tue_1145_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $tue_1200_pm = filter_var($_POST['tue_1200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_1215_pm = filter_var($_POST['tue_1215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_1230_pm = filter_var($_POST['tue_1230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_1245_pm = filter_var($_POST['tue_1245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $tue_100_pm = filter_var($_POST['tue_100_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_115_pm = filter_var($_POST['tue_115_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_130_pm = filter_var($_POST['tue_130_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_145_pm = filter_var($_POST['tue_145_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $tue_200_pm = filter_var($_POST['tue_200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_215_pm = filter_var($_POST['tue_215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_230_pm = filter_var($_POST['tue_230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_245_pm = filter_var($_POST['tue_245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $tue_300_pm = filter_var($_POST['tue_300_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_315_pm = filter_var($_POST['tue_315_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_330_pm = filter_var($_POST['tue_330_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_345_pm = filter_var($_POST['tue_345_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $tue_400_pm = filter_var($_POST['tue_400_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_415_pm = filter_var($_POST['tue_415_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_430_pm = filter_var($_POST['tue_430_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_445_pm = filter_var($_POST['tue_445_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $tue_500_pm = filter_var($_POST['tue_500_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_515_pm = filter_var($_POST['tue_515_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_530_pm = filter_var($_POST['tue_530_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tue_545_pm = filter_var($_POST['tue_545_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $tue_600_pm = filter_var($_POST['tue_600_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    ////////////////Wed///////////////////

    $wed_900_am = filter_var($_POST['wed_900_am'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_915_am = filter_var($_POST['wed_915_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_930_am = filter_var($_POST['wed_930_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_945_am = filter_var($_POST['wed_945_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $wed_1000_am = filter_var($_POST['wed_1000_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_1015_am = filter_var($_POST['wed_1015_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_1030_am = filter_var($_POST['wed_1030_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_1045_am = filter_var($_POST['wed_1045_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $wed_1100_am = filter_var($_POST['wed_1100_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_1115_am = filter_var($_POST['wed_1115_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_1130_am = filter_var($_POST['wed_1130_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_1145_am = filter_var($_POST['wed_1145_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $wed_1200_pm = filter_var($_POST['wed_1200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_1215_pm = filter_var($_POST['wed_1215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_1230_pm = filter_var($_POST['wed_1230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_1245_pm = filter_var($_POST['wed_1245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $wed_100_pm = filter_var($_POST['wed_100_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_115_pm = filter_var($_POST['wed_115_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_130_pm = filter_var($_POST['wed_130_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_145_pm = filter_var($_POST['wed_145_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $wed_200_pm = filter_var($_POST['wed_200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_215_pm = filter_var($_POST['wed_215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_230_pm = filter_var($_POST['wed_230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_245_pm = filter_var($_POST['wed_245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $wed_300_pm = filter_var($_POST['wed_300_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_315_pm = filter_var($_POST['wed_315_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_330_pm = filter_var($_POST['wed_330_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_345_pm = filter_var($_POST['wed_345_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $wed_400_pm = filter_var($_POST['wed_400_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_415_pm = filter_var($_POST['wed_415_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_430_pm = filter_var($_POST['wed_430_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_445_pm = filter_var($_POST['wed_445_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $wed_500_pm = filter_var($_POST['wed_500_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_515_pm = filter_var($_POST['wed_515_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_530_pm = filter_var($_POST['wed_530_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $wed_545_pm = filter_var($_POST['wed_545_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $wed_600_pm = filter_var($_POST['wed_600_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    /////////////Thur///////////////////////

    $thur_900_am = filter_var($_POST['thur_900_am'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_915_am = filter_var($_POST['thur_915_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_930_am = filter_var($_POST['thur_930_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_945_am = filter_var($_POST['thur_945_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $thur_1000_am = filter_var($_POST['thur_1000_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_1015_am = filter_var($_POST['thur_1015_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_1030_am = filter_var($_POST['thur_1030_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_1045_am = filter_var($_POST['thur_1045_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $thur_1100_am = filter_var($_POST['thur_1100_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_1115_am = filter_var($_POST['thur_1115_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_1130_am = filter_var($_POST['thur_1130_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_1145_am = filter_var($_POST['thur_1145_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $thur_1200_pm = filter_var($_POST['thur_1200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_1215_pm = filter_var($_POST['thur_1215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_1230_pm = filter_var($_POST['thur_1230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_1245_pm = filter_var($_POST['thur_1245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $thur_100_pm = filter_var($_POST['thur_100_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_115_pm = filter_var($_POST['thur_115_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_130_pm = filter_var($_POST['thur_130_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_145_pm = filter_var($_POST['thur_145_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $thur_200_pm = filter_var($_POST['thur_200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_215_pm = filter_var($_POST['thur_215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_230_pm = filter_var($_POST['thur_230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_245_pm = filter_var($_POST['thur_245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $thur_300_pm = filter_var($_POST['thur_300_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_315_pm = filter_var($_POST['thur_315_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_330_pm = filter_var($_POST['thur_330_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_345_pm = filter_var($_POST['thur_345_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $thur_400_pm = filter_var($_POST['thur_400_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_415_pm = filter_var($_POST['thur_415_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_430_pm = filter_var($_POST['thur_430_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_445_pm = filter_var($_POST['thur_445_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $thur_500_pm = filter_var($_POST['thur_500_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_515_pm = filter_var($_POST['thur_515_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_530_pm = filter_var($_POST['thur_530_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thur_545_pm = filter_var($_POST['thur_545_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $thur_600_pm = filter_var($_POST['thur_600_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    ///////////////Fri///////////////////////////

    $fri_900_am = filter_var($_POST['fri_900_am'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_915_am = filter_var($_POST['fri_915_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_930_am = filter_var($_POST['fri_930_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_945_am = filter_var($_POST['fri_945_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $fri_1000_am = filter_var($_POST['fri_1000_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_1015_am = filter_var($_POST['fri_1015_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_1030_am = filter_var($_POST['fri_1030_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_1045_am = filter_var($_POST['fri_1045_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $fri_1100_am = filter_var($_POST['fri_1100_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_1115_am = filter_var($_POST['fri_1115_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_1130_am = filter_var($_POST['fri_1130_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_1145_am = filter_var($_POST['fri_1145_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $fri_1200_pm = filter_var($_POST['fri_1200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_1215_pm = filter_var($_POST['fri_1215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_1230_pm = filter_var($_POST['fri_1230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_1245_pm = filter_var($_POST['fri_1245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $fri_100_pm = filter_var($_POST['fri_100_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_115_pm = filter_var($_POST['fri_115_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_130_pm = filter_var($_POST['fri_130_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_145_pm = filter_var($_POST['fri_145_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $fri_200_pm = filter_var($_POST['fri_200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_215_pm = filter_var($_POST['fri_215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_230_pm = filter_var($_POST['fri_230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_245_pm = filter_var($_POST['fri_245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $fri_300_pm = filter_var($_POST['fri_300_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_315_pm = filter_var($_POST['fri_315_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_330_pm = filter_var($_POST['fri_330_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_345_pm = filter_var($_POST['fri_345_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $fri_400_pm = filter_var($_POST['fri_400_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_415_pm = filter_var($_POST['fri_415_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_430_pm = filter_var($_POST['fri_430_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_445_pm = filter_var($_POST['fri_445_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $fri_500_pm = filter_var($_POST['fri_500_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_515_pm = filter_var($_POST['fri_515_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_530_pm = filter_var($_POST['fri_530_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fri_545_pm = filter_var($_POST['fri_545_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $fri_600_pm = filter_var($_POST['fri_600_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    ////////////////Sat/////////////////////

    $sat_900_am = filter_var($_POST['sat_900_am'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_915_am = filter_var($_POST['sat_915_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_930_am = filter_var($_POST['sat_930_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_945_am = filter_var($_POST['sat_945_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sat_1000_am = filter_var($_POST['sat_1000_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_1015_am = filter_var($_POST['sat_1015_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_1030_am = filter_var($_POST['sat_1030_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_1045_am = filter_var($_POST['sat_1045_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sat_1100_am = filter_var($_POST['sat_1100_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_1115_am = filter_var($_POST['sat_1115_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_1130_am = filter_var($_POST['sat_1130_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_1145_am = filter_var($_POST['sat_1145_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sat_1200_pm = filter_var($_POST['sat_1200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_1215_pm = filter_var($_POST['sat_1215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_1230_pm = filter_var($_POST['sat_1230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_1245_pm = filter_var($_POST['sat_1245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sat_100_pm = filter_var($_POST['sat_100_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_115_pm = filter_var($_POST['sat_115_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_130_pm = filter_var($_POST['sat_130_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_145_pm = filter_var($_POST['sat_145_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sat_200_pm = filter_var($_POST['sat_200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_215_pm = filter_var($_POST['sat_215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_230_pm = filter_var($_POST['sat_230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_245_pm = filter_var($_POST['sat_245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sat_300_pm = filter_var($_POST['sat_300_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_315_pm = filter_var($_POST['sat_315_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_330_pm = filter_var($_POST['sat_330_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_345_pm = filter_var($_POST['sat_345_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sat_400_pm = filter_var($_POST['sat_400_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_415_pm = filter_var($_POST['sat_415_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_430_pm = filter_var($_POST['sat_430_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_445_pm = filter_var($_POST['sat_445_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sat_500_pm = filter_var($_POST['sat_500_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_515_pm = filter_var($_POST['sat_515_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_530_pm = filter_var($_POST['sat_530_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sat_545_pm = filter_var($_POST['sat_545_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sat_600_pm = filter_var($_POST['sat_600_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);



    ////////////////Sun/////////////////////

$sun_900_am = filter_var($_POST['sun_900_am'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_915_am = filter_var($_POST['sun_915_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_930_am = filter_var($_POST['sun_930_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_945_am = filter_var($_POST['sun_945_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$sun_1000_am = filter_var($_POST['sun_1000_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_1015_am = filter_var($_POST['sun_1015_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_1030_am = filter_var($_POST['sun_1030_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_1045_am = filter_var($_POST['sun_1045_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$sun_1100_am = filter_var($_POST['sun_1100_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_1115_am = filter_var($_POST['sun_1115_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_1130_am = filter_var($_POST['sun_1130_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_1145_am = filter_var($_POST['sun_1145_am'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$sun_1200_pm = filter_var($_POST['sun_1200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_1215_pm = filter_var($_POST['sun_1215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_1230_pm = filter_var($_POST['sun_1230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_1245_pm = filter_var($_POST['sun_1245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$sun_100_pm = filter_var($_POST['sun_100_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_115_pm = filter_var($_POST['sun_115_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_130_pm = filter_var($_POST['sun_130_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_145_pm = filter_var($_POST['sun_145_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$sun_200_pm = filter_var($_POST['sun_200_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_215_pm = filter_var($_POST['sun_215_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_230_pm = filter_var($_POST['sun_230_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_245_pm = filter_var($_POST['sun_245_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$sun_300_pm = filter_var($_POST['sun_300_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_315_pm = filter_var($_POST['sun_315_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_330_pm = filter_var($_POST['sun_330_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_345_pm = filter_var($_POST['sun_345_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$sun_400_pm = filter_var($_POST['sun_400_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_415_pm = filter_var($_POST['sun_415_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_430_pm = filter_var($_POST['sun_430_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_445_pm = filter_var($_POST['sun_445_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$sun_500_pm = filter_var($_POST['sun_500_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_515_pm = filter_var($_POST['sun_515_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_530_pm = filter_var($_POST['sun_530_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sun_545_pm = filter_var($_POST['sun_545_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$sun_600_pm = filter_var($_POST['sun_600_pm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    // $avatar = $_FILES['avatar'];

    
    // redirect back to add-user page if there was an error min 34348
        // insert new user into users table


        $fileName = $_FILES["image"]["name"];

        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedTypes = array("jpeg", "jpg", "png", "gif");
        $tempName = $_FILES["image"]["tmp_name"];
        $targetPath = "../images/".$fileName;
        if(in_array($ext, $allowedTypes)) {
            if (move_uploaded_file($tempName, $targetPath)) {

        $update_stylist_info_query = "UPDATE stylist_info SET stylist_name = '$stylist_name', stylist_title = '$stylist_title', stylist_img = '$fileName', stylist_img_alt = '$stylist_img_alt', stylist_email = '$stylist_email', stylist_hours_textarea = '$stylist_hours_textarea', Mon = '$Mon', Tue = '$Tue', Wed = '$Wed', Thur = '$Thur', Fri = '$Fri', Sat = '$Sat', Sun = '$Sun', mon_900_am = '$mon_900_am', mon_915_am = '$mon_915_am', mon_930_am = '$mon_930_am', mon_945_am = '$mon_945_am', mon_1000_am = '$mon_1000_am', mon_1015_am = '$mon_1015_am', mon_1030_am = '$mon_1030_am', mon_1045_am = '$mon_1045_am', mon_1100_am = '$mon_1100_am', mon_1115_am = '$mon_1115_am', mon_1130_am = '$mon_1130_am', mon_1145_am = '$mon_1145_am', mon_1200_pm = '$mon_1200_pm', mon_1215_pm = '$mon_1215_pm', mon_1230_pm = '$mon_1230_pm', mon_1245_pm = '$mon_1245_pm', mon_100_pm = '$mon_100_pm', mon_115_pm = '$mon_115_pm', mon_130_pm = '$mon_130_pm', mon_145_pm = '$mon_145_pm', mon_200_pm = '$mon_200_pm', mon_215_pm = '$mon_215_pm', mon_230_pm = '$mon_230_pm', mon_245_pm = '$mon_245_pm', mon_300_pm = '$mon_300_pm', mon_315_pm = '$mon_315_pm', mon_330_pm = '$mon_330_pm', mon_345_pm = '$mon_345_pm', mon_400_pm = '$mon_400_pm', mon_415_pm = '$mon_415_pm', mon_430_pm = '$mon_430_pm', mon_445_pm = '$mon_445_pm', mon_500_pm = '$mon_500_pm', mon_515_pm = '$mon_515_pm', mon_530_pm = '$mon_530_pm', mon_545_pm = '$mon_545_pm', mon_600_pm = '$mon_600_pm', tue_900_am = '$tue_900_am', tue_915_am = '$tue_915_am', tue_930_am = '$tue_930_am', tue_945_am = '$tue_945_am', tue_1000_am = '$tue_1000_am', tue_1015_am = '$tue_1015_am', tue_1030_am = '$tue_1030_am', tue_1045_am = '$tue_1045_am', tue_1100_am = '$tue_1100_am', tue_1115_am = '$tue_1115_am', tue_1130_am = '$tue_1130_am', tue_1145_am = '$tue_1145_am', tue_1200_pm = '$tue_1200_pm', tue_1215_pm = '$tue_1215_pm', tue_1230_pm = '$tue_1230_pm', tue_1245_pm = '$tue_1245_pm', tue_100_pm = '$tue_100_pm', tue_115_pm = '$tue_115_pm', tue_130_pm = '$tue_130_pm', tue_145_pm = '$tue_145_pm', tue_200_pm = '$tue_200_pm', tue_215_pm = '$tue_215_pm', tue_230_pm = '$tue_230_pm', tue_245_pm = '$tue_245_pm', tue_300_pm = '$tue_300_pm', tue_315_pm = '$tue_315_pm', tue_330_pm = '$tue_330_pm', tue_345_pm = '$tue_345_pm', tue_400_pm = '$tue_400_pm', tue_415_pm = '$tue_415_pm', tue_430_pm = '$tue_430_pm', tue_445_pm = '$tue_445_pm', tue_500_pm = '$tue_500_pm', tue_515_pm = '$tue_515_pm', tue_530_pm = '$tue_530_pm', tue_545_pm = '$tue_545_pm', tue_600_pm = '$tue_600_pm', wed_900_am = '$wed_900_am', wed_915_am = '$wed_915_am', wed_930_am = '$wed_930_am', wed_945_am = '$wed_945_am', wed_1000_am = '$wed_1000_am', wed_1015_am = '$wed_1015_am', wed_1030_am = '$wed_1030_am', wed_1045_am = '$wed_1045_am', wed_1100_am = '$wed_1100_am', wed_1115_am = '$wed_1115_am', wed_1130_am = '$wed_1130_am', wed_1145_am = '$wed_1145_am', wed_1200_pm = '$wed_1200_pm', wed_1215_pm = '$wed_1215_pm', wed_1230_pm = '$wed_1230_pm', wed_1245_pm = '$wed_1245_pm', wed_100_pm = '$wed_100_pm', wed_115_pm = '$wed_115_pm', wed_130_pm = '$wed_130_pm', wed_145_pm = '$wed_145_pm', wed_200_pm = '$wed_200_pm', wed_215_pm = '$wed_215_pm', wed_230_pm = '$wed_230_pm', wed_245_pm = '$wed_245_pm', wed_300_pm = '$wed_300_pm', wed_315_pm = '$wed_315_pm', wed_330_pm = '$wed_330_pm', wed_345_pm = '$wed_345_pm', wed_400_pm = '$wed_400_pm', wed_415_pm = '$wed_415_pm', wed_430_pm = '$wed_430_pm', wed_445_pm = '$wed_445_pm', wed_500_pm = '$wed_500_pm', wed_515_pm = '$wed_515_pm', wed_530_pm = '$wed_530_pm', wed_545_pm = '$wed_545_pm', wed_600_pm = '$wed_600_pm', thur_900_am = '$thur_900_am', thur_915_am = '$thur_915_am', thur_930_am = '$thur_930_am', thur_945_am = '$thur_945_am', thur_1000_am = '$thur_1000_am', thur_1015_am = '$thur_1015_am', thur_1030_am = '$thur_1030_am', thur_1045_am = '$thur_1045_am', thur_1100_am = '$thur_1100_am', thur_1115_am = '$thur_1115_am', thur_1130_am = '$thur_1130_am', thur_1145_am = '$thur_1145_am', thur_1200_pm = '$thur_1200_pm', thur_1215_pm = '$thur_1215_pm', thur_1230_pm = '$thur_1230_pm', thur_1245_pm = '$thur_1245_pm', thur_100_pm = '$thur_100_pm', thur_115_pm = '$thur_115_pm', thur_130_pm = '$thur_130_pm', thur_145_pm = '$thur_145_pm', thur_200_pm = '$thur_200_pm', thur_215_pm = '$thur_215_pm', thur_230_pm = '$thur_230_pm', thur_245_pm = '$thur_245_pm', thur_300_pm = '$thur_300_pm', thur_315_pm = '$thur_315_pm', thur_330_pm = '$thur_330_pm', thur_345_pm = '$thur_345_pm', thur_400_pm = '$thur_400_pm', thur_415_pm = '$thur_415_pm', thur_430_pm = '$thur_430_pm', thur_445_pm = '$thur_445_pm', thur_500_pm = '$thur_500_pm', thur_515_pm = '$thur_515_pm', thur_530_pm = '$thur_530_pm', thur_545_pm = '$thur_545_pm', thur_600_pm = '$thur_600_pm', fri_900_am = '$fri_900_am', fri_915_am = '$fri_915_am', fri_930_am = '$fri_930_am', fri_945_am = '$fri_945_am', fri_1000_am = '$fri_1000_am', fri_1015_am = '$fri_1015_am', fri_1030_am = '$fri_1030_am', fri_1045_am = '$fri_1045_am', fri_1100_am = '$fri_1100_am', fri_1115_am = '$fri_1115_am', fri_1130_am = '$fri_1130_am', fri_1145_am = '$fri_1145_am', fri_1200_pm = '$fri_1200_pm', fri_1215_pm = '$fri_1215_pm', fri_1230_pm = '$fri_1230_pm', fri_1245_pm = '$fri_1245_pm', fri_100_pm = '$fri_100_pm', fri_115_pm = '$fri_115_pm', fri_130_pm = '$fri_130_pm', fri_145_pm = '$fri_145_pm', fri_200_pm = '$fri_200_pm', fri_215_pm = '$fri_215_pm', fri_230_pm = '$fri_230_pm', fri_245_pm = '$fri_245_pm', fri_300_pm = '$fri_300_pm', fri_315_pm = '$fri_315_pm', fri_330_pm = '$fri_330_pm', fri_345_pm = '$fri_345_pm', fri_400_pm = '$fri_400_pm', fri_415_pm = '$fri_415_pm', fri_430_pm = '$fri_430_pm', fri_445_pm = '$fri_445_pm', fri_500_pm = '$fri_500_pm', fri_515_pm = '$fri_515_pm', fri_530_pm = '$fri_530_pm', fri_545_pm = '$fri_545_pm', fri_600_pm = '$fri_600_pm', sat_900_am = '$sat_900_am', sat_915_am = '$sat_915_am', sat_930_am = '$sat_930_am', sat_945_am = '$sat_945_am', sat_1000_am = '$sat_1000_am', sat_1015_am = '$sat_1015_am', sat_1030_am = '$sat_1030_am', sat_1045_am = '$sat_1045_am', sat_1100_am = '$sat_1100_am', sat_1115_am = '$sat_1115_am', sat_1130_am = '$sat_1130_am', sat_1145_am = '$sat_1145_am', sat_1200_pm = '$sat_1200_pm', sat_1215_pm = '$sat_1215_pm', sat_1230_pm = '$sat_1230_pm', sat_1245_pm = '$sat_1245_pm', sat_100_pm = '$sat_100_pm', sat_115_pm = '$sat_115_pm', sat_130_pm = '$sat_130_pm', sat_145_pm = '$sat_145_pm', sat_200_pm = '$sat_200_pm', sat_215_pm = '$sat_215_pm', sat_230_pm = '$sat_230_pm', sat_245_pm = '$sat_245_pm', sat_300_pm = '$sat_300_pm', sat_315_pm = '$sat_315_pm', sat_330_pm = '$sat_330_pm', sat_345_pm = '$sat_345_pm', sat_400_pm = '$sat_400_pm', sat_415_pm = '$sat_415_pm', sat_430_pm = '$sat_430_pm', sat_445_pm = '$sat_445_pm', sat_500_pm = '$sat_500_pm', sat_515_pm = '$sat_515_pm', sat_530_pm = '$sat_530_pm', sat_545_pm = '$sat_545_pm', sat_600_pm = '$sat_600_pm', sun_900_am = '$sun_900_am', sun_915_am = '$sun_915_am', sun_930_am = '$sun_930_am', sun_945_am = '$sun_945_am', sun_1000_am = '$sun_1000_am', sun_1015_am = '$sun_1015_am', sun_1030_am = '$sun_1030_am', sun_1045_am = '$sun_1045_am', sun_1100_am = '$sun_1100_am', sun_1115_am = '$sun_1115_am', sun_1130_am = '$sun_1130_am', sun_1145_am = '$sun_1145_am', sun_1200_pm = '$sun_1200_pm', sun_1215_pm = '$sun_1215_pm', sun_1230_pm = '$sun_1230_pm', sun_1245_pm = '$sun_1245_pm', sun_100_pm = '$sun_100_pm', sun_115_pm = '$sun_115_pm', sun_130_pm = '$sun_130_pm', sun_145_pm = '$sun_145_pm', sun_200_pm = '$sun_200_pm', sun_215_pm = '$sun_215_pm', sun_230_pm = '$sun_230_pm', sun_245_pm = '$sun_245_pm', sun_300_pm = '$sun_300_pm', sun_315_pm = '$sun_315_pm', sun_330_pm = '$sun_330_pm', sun_345_pm = '$sun_345_pm', sun_400_pm = '$sun_400_pm', sun_415_pm = '$sun_415_pm', sun_430_pm = '$sun_430_pm', sun_445_pm = '$sun_445_pm', sun_500_pm = '$sun_500_pm', sun_515_pm = '$sun_515_pm', sun_530_pm = '$sun_530_pm', sun_545_pm = '$sun_545_pm', sun_600_pm = '$sun_600_pm' WHERE id = $stylist_id;";

        // $update_stylist_info_query = "UPDATE stylist_info SET stylist_name = '$stylist_name', stylist_email = '$stylist_email', stylist_hours_textarea = '$stylist_hours_textarea', Mon = '$Mon', Tue = '$Tue', Wed = '$Wed', Thur = '$Thur', Fri = '$Fri', Sat = '$Sat', Sun = '$Sun', hours_900_am = '$hours_900_am', hours_915_am = '$hours_915_am', hours_930_am = '$hours_930_am', hours_945_am = '$hours_945_am', hours_1000_am = '$hours_1000_am', hours_1015_am = '$hours_1015_am', hours_1030_am = '$hours_1030_am', hours_1045_am = '$hours_1045_am', hours_1100_am = '$hours_1100_am', hours_1115_am = '$hours_1115_am', hours_1130_am = '$hours_1130_am', hours_1145_am = '$hours_1145_am', hours_1200_pm = '$hours_1200_pm', hours_1215_pm = '$hours_1215_pm', hours_1230_pm = '$hours_1230_pm', hours_1245_pm = '$hours_1245_pm', hours_100_pm = '$hours_100_pm', hours_115_pm = '$hours_115_pm', hours_130_pm = '$hours_130_pm', hours_145_pm = '$hours_145_pm', hours_200_pm = '$hours_200_pm', hours_215_pm = '$hours_215_pm', hours_230_pm = '$hours_230_pm', hours_245_pm = '$hours_245_pm', hours_300_pm = '$hours_300_pm', hours_315_pm = '$hours_315_pm', hours_330_pm = '$hours_330_pm', hours_345_pm = '$hours_345_pm', hours_400_pm = '$hours_400_pm', hours_415_pm = '$hours_415_pm', hours_430_pm = '$hours_430_pm', hours_445_pm = '$hours_445_pm', hours_500_pm = '$hours_500_pm', hours_515_pm = '$hours_515_pm', hours_530_pm = '$hours_530_pm', hours_545_pm = '$hours_545_pm', hours_600_pm = '$hours_600_pm' WHERE id = $stylist_id;";

        $update_stylist_info_result = mysqli_query($conn, $update_stylist_info_query);
        // echo  $hours_900_am;

        // print_r($update_stylist_info_query);
        if(!mysqli_errno($conn)) {
            // redirect to manage users page with success message
            // $_SESSION['add-user-success'] = "New user $firstname $lastname added successfully";
            header('location: ../stylist-info.php');
        }
} else {
    header('location: ../stylist-info.php');
    die();
    }
}
    }