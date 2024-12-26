<?php
require 'db.php';

// min part 2 min 6:51:10
// fetch stylist data from database if id is set
if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $stylist_info_query = "SELECT * FROM stylist_info WHERE id = $id";
  $stylist_info_result = mysqli_query($conn, $stylist_info_query);
  $stylist_info = mysqli_fetch_assoc($stylist_info_result);
} else {
  header('location: ../index.php');
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .time-container:nth-child(even) {
        background-color: #ededed;
    }

    .btn {
        width: 250px;
        padding: 8px 12px;
        border-radius: 5px;
        font-size: 20px;
        margin-top: 20px;
        margin-bottom: 20px;
        border-radius: 5px
    }

    .btn-blk {
        background-color: #333;
        color: #fff;
    }

    input {
      padding: 12px 18px;
      font-size: 16px
    }

    @media (max-width: 550px) {
      section, form {
        width: 100vw;
      }
    }
    </style>
</head>

<body>

    <section class="form_section add_post_form">

        <div class="container form_section_container;"
            style="display:flex;      flex-direction: column; align-items:center;">

            <a href="../stylist-info">
                <-- Back</a>
                    <h2>Edit <?= $stylist_info['stylist_name'] ?></h2>

                    <div>
                        <div>
                            <form style="padding: 10px; text-align: center;" action="update_stylist_info_logic.php"
                                enctype="multipart/form-data" method="POST">

                                <input type="hidden" name="id" value="<?php $id ?>" placeholder="<?= $id ?>">
                                <input style="margin-bottom:1rem" type="hidden" name="id"
                                    value="<?= $stylist_info['id'] ?>" />

                                <div
                                    style="display: flex; flex-direction:column; align-items:baseline; line-height:1.5; font-size: 1.2rem; border:1px solid #333; padding: 10px">

                                    <label for="services_description">image</label>
                                    <input type="file" name="image">

                                    <br>
                                    <label for="stylist_img_alt">image description</label>
                                    <input type="text" name="stylist_img_alt" value='<?= $stylist_info['stylist_img_alt'] ?>'>

                                    <br>
                                    <label for="stylist_name">Name</label>
                                    <input style="margin-bottom:1rem" type="text" name="stylist_name" id="stylist_name"
                                        value="<?= $stylist_info['stylist_name'] ?>" />

                                    <label for="stylist_name">Title</label>
                                    <input style="margin-bottom:10px" type="text" name="stylist_title" id="stylist_title"
                                        value="<?= $stylist_info['stylist_title'] ?>" />

                                    <br>
                                    <label for="stylist_email">Email</label>
                                    <input style="margin-bottom:10px" type="email" name="stylist_email"
                                        id="stylist_email" value="<?= $stylist_info['stylist_email'] ?>" />

                                    <label for="stylist_hours_textarea">Notes</label>
                                    <textarea style='margin: 10px 0; width: 97.5%; resize:none; padding:5px' name="stylist_hours_textarea" id="stylist_hours_textarea" cols="30"
                                        rows="10"><?= $stylist_info['stylist_hours_textarea'] ?></textarea>


      <div style="display: flex; flex-direction:column; align-items:baseline">

      <div>
          <h2>Days Available</h2>
      </div>
          <label style="margin:0 0 5px 0" for="Mon">Monday
              <?php
                if ($stylist_info['Mon'] === 'yes') {
                  echo "<input type='radio' name='Mon' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='Mon' id='no' value='no'>
                        No
                        </label>";
                } elseif ($stylist_info['Mon'] === 'no') {
                  echo "<input type='radio' name='Mon' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='Mon' id='no' value='no' checked>
                        No
                        </label>";
                } elseif ($stylist_info['Mon'] === '') {
                  echo "<input type='radio' name='Mon' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='Mon' id='no' value='no' >
                        No
                        </label>";
                }
                ?>
                                    </div>
                                    <div style="display: flex; flex-direction:column">

                                        <label style="margin:0 0 5px 0" for="Tue">Tuesday
                                            <?php
                if ($stylist_info['Tue'] === 'yes') {
                  echo "<input type='radio' name='Tue' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='Tue' id='no' value='no'>
                        No
                        </label>";
                } elseif ($stylist_info['Tue'] === 'no') {
                  echo "<input type='radio' name='Tue' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='Tue' id='no' value='no' checked>
                        No
                        </label>";
                } elseif ($stylist_info['Tue'] === '') {
                  echo "<input type='radio' name='Tue' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='Tue' id='no' value='no' >
                        No
                        </label>";
                }
                ?>
                                    </div>
                                    <div style="display: flex; flex-direction:column">

                                        <label style="margin:0 0 5px 0" for="Wed">Wednesday
                                            <?php
                if ($stylist_info['Wed'] === 'yes') {
                  echo "<input type='radio' name='Wed' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='Wed' id='no' value='no'>
                        No
                        </label>";
                } elseif ($stylist_info['Wed'] === 'no') {
                  echo "<input type='radio' name='Wed' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='Wed' id='no' value='no' checked>
                        No
                        </label>";
                } elseif ($stylist_info['Wed'] === '') {
                  echo "<input type='radio' name='Wed' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='Wed' id='no' value='no'>
                        No
                        </label>";
                }
                ?>
                                    </div>
                                    <div style="display: flex; flex-direction:column">

                                        <label style="margin:0 0 5px 0" for="Thur">Thursday
                                            <?php
                if ($stylist_info['Thur'] === 'yes') {
                  echo "<input type='radio' name='Thur' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='Thur' id='no' value='no'>
                        No
                        </label>";
                } elseif ($stylist_info['Thur'] === 'no') {
                  echo "<input type='radio' name='Thur' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='Thur' id='no' value='no' checked>
                        No
                        </label>";
                } elseif ($stylist_info['Thur'] === '') {
                  echo "<input type='radio' name='Thur' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='Thur' id='no' value='no'>
                        No
                        </label>";
                }
                ?>
                                    </div>
                                    <div style="display: flex; flex-direction:column">

                                        <label style="margin:0 0 5px 0" for="Fri">Friday
                                            <?php
                if ($stylist_info['Fri'] === 'yes') {
                  echo "<input type='radio' name='Fri' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='Fri' id='no' value='no'>
                        No
                        </label>";
                } elseif ($stylist_info['Fri'] === 'no') {
                  echo "<input type='radio' name='Fri' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='Fri' id='no' value='no' checked>
                        No
                        </label>";
                } elseif ($stylist_info['Fri'] === '') {
                  echo "<input type='radio' name='Fri' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='Fri' id='no' value='no'>
                        No
                        </label>";
                }
                ?>
                                    </div>
                                    <div style="display: flex; flex-direction:column">

                                        <label style="margin:0 0 5px 0" for="Sat">Saturday
                                            <?php
                if ($stylist_info['Sat'] === 'yes') {
                  echo "<input type='radio' name='Sat' id='yes' value='yes' checked >
          Yes
          <input type='radio' name='Sat' id='no' value='no'>
          No
          </label>";
                } elseif ($stylist_info['Sat'] === 'no') {
                  echo "<input type='radio' name='Sat' id='yes' value='yes'>
          Yes
          <input type='radio' name='Sat' id='no' value='no' checked>
          No
          </label>";
                } elseif ($stylist_info['Sat'] === '') {
                  echo "<input type='radio' name='Sat' id='yes' value='yes' checked>
          Yes
          <input type='radio' name='Sat' id='no' value='no' >
          No
          </label>";
                }
                ?>
                                    </div>
                                    <div style="display: flex; flex-direction:column">

                                        <label style="margin:0 0 5px 0" for="Sun">Sunday
                                            <?php
                if ($stylist_info['Sun'] === 'yes') {
                  echo "<input type='radio' name='Sun' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='Sun' id='no' value='no'>
                        No
                        </label>";
                } elseif ($stylist_info['Sun'] === 'no') {
                  echo "<input type='radio' name='Sun' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='Sun' id='no' value='no' checked>
                        No
                        </label>";
                }  elseif ($stylist_info['Sun'] === '') {
                  echo "<input type='radio' name='Sun' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='Sun' id='no' value='no'>
                        No
                        </label>";
                }
                ?>
                                    </div>




  <div style='display:flex; flex-direction: column; align-items:baseline'>
      <div>
          <h2>Time Available</h2>
      </div>

                                        <!----------- Monday ------------------------->
      <div class='time-container'
          style="height: 400px; overflow: scroll; text-align:left; border:1px solid #333; padding: 10px">
          <div>
              <label style="margin:0 0 5px 0" for="mon_900_am">Mon 9:00 am
                  <?php
                    if ($stylist_info['mon_900_am'] === 'yes') {
                      echo "<input type='radio' name='mon_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_900_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_900_am'] === 'no') {
                      echo "<input type='radio' name='mon_900_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_900_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_900_am'] === '') {
                      echo "<input type='radio' name='mon_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_900_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
          </div>
          <div>
              <label style="margin:0 0 5px 0" for="mon_915_am">Mon 9:15 am
                  <?php
                    if ($stylist_info['mon_915_am'] === 'yes') {
                      echo "<input type='radio' name='mon_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_915_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_915_am'] === 'no') {
                      echo "<input type='radio' name='mon_915_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_915_am' id='no' value='no' checked>
                        No
                        </label>";
                    }  elseif ($stylist_info['mon_915_am'] === '') {
                      echo "<input type='radio' name='mon_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_915_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_930_am">Mon 9:30 am
                                                    <?php
                    if ($stylist_info['mon_930_am'] === 'yes') {
                      echo "<input type='radio' name='mon_930_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_930_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_930_am'] === 'no') {
                      echo "<input type='radio' name='mon_930_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_930_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_930_am'] === '') {
                      echo "<input type='radio' name='mon_930_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_930_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_945_am">Mon 9:45 am
                                                    <?php
                    if ($stylist_info['mon_945_am'] === 'yes') {
                      echo "<input type='radio' name='mon_945_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_945_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_945_am'] === 'no') {
                      echo "<input type='radio' name='mon_945_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_945_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_945_am'] === '') {
                      echo "<input type='radio' name='mon_945_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_945_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_1000_am">Mon 10:00 am
                                                    <?php
                    if ($stylist_info['mon_1000_am'] === 'yes') {
                      echo "<input type='radio' name='mon_1000_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_1000_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1000_am'] === 'no') {
                      echo "<input type='radio' name='mon_1000_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_1000_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1000_am'] === '') {
                      echo "<input type='radio' name='mon_1000_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_1000_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_1015_am">Mon 10:15 am
                                                    <?php
                    if ($stylist_info['mon_1015_am'] === 'yes') {
                      echo "<input type='radio' name='mon_1015_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_1015_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1015_am'] === 'no') {
                      echo "<input type='radio' name='mon_1015_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_1015_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1015_am'] === '') {
                      echo "<input type='radio' name='mon_1015_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_1015_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_1030_am">Mon 10:30 am
                                                    <?php
                    if ($stylist_info['mon_1030_am'] === 'yes') {
                      echo "<input type='radio' name='mon_1030_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_1030_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1030_am'] === 'no') {
                      echo "<input type='radio' name='mon_1030_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_1030_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1030_am'] === '') {
                      echo "<input type='radio' name='mon_1030_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_1030_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_1045_am">Mon 10:45 am
                                                    <?php
                    if ($stylist_info['mon_1045_am'] === 'yes') {
                      echo "<input type='radio' name='mon_1045_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_1045_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1045_am'] === 'no') {
                      echo "<input type='radio' name='mon_1045_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_1045_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1045_am'] === '') {
                      echo "<input type='radio' name='mon_1045_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_1045_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_1100_am">Mon 11:00 am
                                                    <?php
                    if ($stylist_info['mon_1100_am'] === 'yes') {
                      echo "<input type='radio' name='mon_1100_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_1100_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1100_am'] === 'no') {
                      echo "<input type='radio' name='mon_1100_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_1100_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1100_am'] === '') {
                      echo "<input type='radio' name='mon_1100_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_1100_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_1115_am">Mon 11:15 am
                                                    <?php
                    if ($stylist_info['mon_1115_am'] === 'yes') {
                      echo "<input type='radio' name='mon_1115_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_1115_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1115_am'] === 'no') {
                      echo "<input type='radio' name='mon_1115_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_1115_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1115_am'] === '') {
                      echo "<input type='radio' name='mon_1115_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_1115_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_1130_am">Mon 11:30 am
                                                    <?php
                    if ($stylist_info['mon_1130_am'] === 'yes') {
                      echo "<input type='radio' name='mon_1130_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_1130_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1130_am'] === 'no') {
                      echo "<input type='radio' name='mon_1130_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_1130_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1130_am'] === '') {
                      echo "<input type='radio' name='mon_1130_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_1130_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_1145_am">Mon 11:45 am
                                                    <?php
                    if ($stylist_info['mon_1145_am'] === 'yes') {
                      echo "<input type='radio' name='mon_1145_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_1145_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1145_am'] === 'no') {
                      echo "<input type='radio' name='mon_1145_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_1145_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1145_am'] === '') {
                      echo "<input type='radio' name='mon_1145_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_1145_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_1200_pm">Mon 12:00 pm
                                                    <?php
                    if ($stylist_info['mon_1200_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_1200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1200_pm'] === 'no') {
                      echo "<input type='radio' name='mon_1200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_1200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1200_pm'] === '') {
                      echo "<input type='radio' name='mon_1200_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='mon_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_1215_pm">Mon 12:15 pm
                                                    <?php
                    if ($stylist_info['mon_1215_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_1215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1215_pm'] === 'no') {
                      echo "<input type='radio' name='mon_1215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_1215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1215_pm'] === '') {
                      echo "<input type='radio' name='mon_1215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_1230_pm">Mon 12:30 pm
                                                    <?php
                    if ($stylist_info['mon_1230_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_1230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1230_pm'] === 'no') {
                      echo "<input type='radio' name='mon_1230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_1230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1230_pm'] === '') {
                      echo "<input type='radio' name='mon_1230_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='mon_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_1245_pm">Mon 12:45 pm
                                                    <?php
                    if ($stylist_info['mon_1245_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_1245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1245_pm'] === 'no') {
                      echo "<input type='radio' name='mon_1245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_1245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_1245_pm'] === '') {
                      echo "<input type='radio' name='mon_1245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_100_pm">Mon 1:00 pm
                                                    <?php
                    if ($stylist_info['mon_100_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_100_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_100_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_100_pm'] === 'no') {
                      echo "<input type='radio' name='mon_100_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_100_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_100_pm'] === '') {
                      echo "<input type='radio' name='mon_100_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='mon_100_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_115_pm">Mon 1:15 pm
                                                    <?php
                    if ($stylist_info['mon_115_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_115_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_115_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_115_pm'] === 'no') {
                      echo "<input type='radio' name='mon_115_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_115_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_115_pm'] === '') {
                      echo "<input type='radio' name='mon_115_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='mon_115_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_130_pm">Mon 1:30 pm
                                                    <?php
                    if ($stylist_info['mon_130_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_130_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_130_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_130_pm'] === 'no') {
                      echo "<input type='radio' name='mon_130_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_130_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_130_pm'] === '') {
                      echo "<input type='radio' name='mon_130_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='mon_130_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_145_pm">Mon 1:45 pm
                                                    <?php
                    if ($stylist_info['mon_145_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_145_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_145_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_145_pm'] === 'no') {
                      echo "<input type='radio' name='mon_145_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_145_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_145_pm'] === '') {
                      echo "<input type='radio' name='mon_145_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='mon_145_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_200_pm">Mon 2:00 pm
                                                    <?php
                    if ($stylist_info['mon_200_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_200_pm'] === 'no') {
                      echo "<input type='radio' name='mon_200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_200_pm'] === '') {
                      echo "<input type='radio' name='mon_200_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_215_pm">Mon 2:15 pm
                                                    <?php
                    if ($stylist_info['mon_215_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_215_pm'] === 'no') {
                      echo "<input type='radio' name='mon_215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_215_pm'] === '') {
                      echo "<input type='radio' name='mon_215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_230_pm">Mon 2:30 pm
                                                    <?php
                    if ($stylist_info['mon_230_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_230_pm'] === 'no') {
                      echo "<input type='radio' name='mon_230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_230_pm'] === '') {
                      echo "<input type='radio' name='mon_230_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_245_pm">Mon 2:45 pm
                                                    <?php
                    if ($stylist_info['mon_245_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_245_pm'] === 'no') {
                      echo "<input type='radio' name='mon_245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_245_pm'] === '') {
                      echo "<input type='radio' name='mon_245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_300_pm">Mon 3:00 pm
                                                    <?php
                    if ($stylist_info['mon_300_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_300_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_300_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_300_pm'] === 'no') {
                      echo "<input type='radio' name='mon_300_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_300_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_300_pm'] === '') {
                      echo "<input type='radio' name='mon_300_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_300_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_315_pm">Mon 3:15 pm
                                                    <?php
                    if ($stylist_info['mon_315_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_315_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_315_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_315_pm'] === 'no') {
                      echo "<input type='radio' name='mon_315_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_315_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_315_pm'] === '') {
                      echo "<input type='radio' name='mon_315_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_315_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_330_pm">Mon 3:30 pm
                                                    <?php
                    if ($stylist_info['mon_330_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_330_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_330_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_330_pm'] === 'no') {
                      echo "<input type='radio' name='mon_330_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_330_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_330_pm'] === '') {
                      echo "<input type='radio' name='mon_330_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_330_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_345_pm">Mon 3:45 pm
                                                    <?php
                    if ($stylist_info['mon_345_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_345_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_345_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_345_pm'] === 'no') {
                      echo "<input type='radio' name='mon_345_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_345_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_345_pm'] === '') {
                      echo "<input type='radio' name='mon_345_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_345_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_400_pm">Mon 4:00 pm
                                                    <?php
                    if ($stylist_info['mon_400_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_400_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_400_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_400_pm'] === 'no') {
                      echo "<input type='radio' name='mon_400_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_400_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_400_pm'] === '') {
                      echo "<input type='radio' name='mon_400_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_400_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_415_pm">Mon 4:15 pm
                                                    <?php
                    if ($stylist_info['mon_415_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_415_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_415_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_415_pm'] === 'no') {
                      echo "<input type='radio' name='mon_415_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_415_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_415_pm'] === '') {
                      echo "<input type='radio' name='mon_415_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_415_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_430_pm">Mon 4:30 pm
                                                    <?php
                    if ($stylist_info['mon_430_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_430_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_430_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_430_pm'] === 'no') {
                      echo "<input type='radio' name='mon_430_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_430_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_430_pm'] === '') {
                      echo "<input type='radio' name='mon_430_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_430_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_445_pm">Mon 4:45 pm
                                                    <?php
                    if ($stylist_info['mon_445_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_445_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_445_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_445_pm'] === 'no') {
                      echo "<input type='radio' name='mon_445_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_445_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_445_pm'] === '') {
                      echo "<input type='radio' name='mon_445_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_445_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_500_pm">Mon 5:00 pm
                                                    <?php
                    if ($stylist_info['mon_500_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_500_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_500_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_500_pm'] === 'no') {
                      echo "<input type='radio' name='mon_500_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_500_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_500_pm'] === '') {
                      echo "<input type='radio' name='mon_500_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_500_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_515_pm">Mon 5:15 pm
                                                    <?php
                    if ($stylist_info['mon_515_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_515_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_515_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_515_pm'] === 'no') {
                      echo "<input type='radio' name='mon_515_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_515_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_515_pm'] === '') {
                      echo "<input type='radio' name='mon_515_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_515_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_530_pm">Mon 5:30 pm
                                                    <?php
                    if ($stylist_info['mon_530_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_530_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_530_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_530_pm'] === 'no') {
                      echo "<input type='radio' name='mon_530_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_530_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_530_pm'] === '') {
                      echo "<input type='radio' name='mon_530_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_530_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_545_pm">Mon 5:45 pm
                                                    <?php
                    if ($stylist_info['mon_545_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_545_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_545_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_545_pm'] === 'no') {
                      echo "<input type='radio' name='mon_545_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_545_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_545_pm'] === '') {
                      echo "<input type='radio' name='mon_545_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_545_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="mon_600_pm">Mon 6:00 pm
                                                    <?php
                    if ($stylist_info['mon_600_pm'] === 'yes') {
                      echo "<input type='radio' name='mon_600_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='mon_600_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_600_pm'] === 'no') {
                      echo "<input type='radio' name='mon_600_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='mon_600_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['mon_600_pm'] === '') {
                      echo "<input type='radio' name='mon_600_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='mon_600_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>

                                            <!-- --------------Tuesday ----------------------->

                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_900_am">Tue 9:00 am
                                                    <?php
                    if ($stylist_info['tue_900_am'] === 'yes') {
                      echo "<input type='radio' name='tue_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_900_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_900_am'] === 'no') {
                      echo "<input type='radio' name='tue_900_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_900_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_900_am'] === '') {
                      echo "<input type='radio' name='tue_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_900_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_915_am">Tue 9:15 am
                                                    <?php
                    if ($stylist_info['tue_915_am'] === 'yes') {
                      echo "<input type='radio' name='tue_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_915_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_915_am'] === 'no') {
                      echo "<input type='radio' name='tue_915_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_915_am' id='no' value='no' checked>
                        No
                        </label>";
                    }  elseif ($stylist_info['tue_915_am'] === '') {
                      echo "<input type='radio' name='tue_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_915_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_930_am">Tue 9:30 am
                                                    <?php
                    if ($stylist_info['tue_930_am'] === 'yes') {
                      echo "<input type='radio' name='tue_930_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_930_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_930_am'] === 'no') {
                      echo "<input type='radio' name='tue_930_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_930_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_930_am'] === '') {
                      echo "<input type='radio' name='tue_930_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_930_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_945_am">Tue 9:45 am
                                                    <?php
                    if ($stylist_info['tue_945_am'] === 'yes') {
                      echo "<input type='radio' name='tue_945_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_945_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_945_am'] === 'no') {
                      echo "<input type='radio' name='tue_945_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_945_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_945_am'] === '') {
                      echo "<input type='radio' name='tue_945_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_945_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_1000_am">Tue 10:00 am
                                                    <?php
                    if ($stylist_info['tue_1000_am'] === 'yes') {
                      echo "<input type='radio' name='tue_1000_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_1000_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1000_am'] === 'no') {
                      echo "<input type='radio' name='tue_1000_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_1000_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1000_am'] === '') {
                      echo "<input type='radio' name='tue_1000_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_1000_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_1015_am">Tue 10:15 am
                                                    <?php
                    if ($stylist_info['tue_1015_am'] === 'yes') {
                      echo "<input type='radio' name='tue_1015_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_1015_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1015_am'] === 'no') {
                      echo "<input type='radio' name='tue_1015_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_1015_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1015_am'] === '') {
                      echo "<input type='radio' name='tue_1015_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_1015_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_1030_am">Tue 10:30 am
                                                    <?php
                    if ($stylist_info['tue_1030_am'] === 'yes') {
                      echo "<input type='radio' name='tue_1030_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_1030_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1030_am'] === 'no') {
                      echo "<input type='radio' name='tue_1030_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_1030_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1030_am'] === '') {
                      echo "<input type='radio' name='tue_1030_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_1030_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_1045_am">Tue 10:45 am
                                                    <?php
                    if ($stylist_info['tue_1045_am'] === 'yes') {
                      echo "<input type='radio' name='tue_1045_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_1045_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1045_am'] === 'no') {
                      echo "<input type='radio' name='tue_1045_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_1045_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1045_am'] === '') {
                      echo "<input type='radio' name='tue_1045_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_1045_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_1100_am">Tue 11:00 am
                                                    <?php
                    if ($stylist_info['tue_1100_am'] === 'yes') {
                      echo "<input type='radio' name='tue_1100_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_1100_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1100_am'] === 'no') {
                      echo "<input type='radio' name='tue_1100_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_1100_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1100_am'] === '') {
                      echo "<input type='radio' name='tue_1100_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_1100_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_1115_am">Tue 11:15 am
                                                    <?php
                    if ($stylist_info['tue_1115_am'] === 'yes') {
                      echo "<input type='radio' name='tue_1115_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_1115_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1115_am'] === 'no') {
                      echo "<input type='radio' name='tue_1115_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_1115_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1115_am'] === '') {
                      echo "<input type='radio' name='tue_1115_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_1115_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_1130_am">Tue 11:30 am
                                                    <?php
                    if ($stylist_info['tue_1130_am'] === 'yes') {
                      echo "<input type='radio' name='tue_1130_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_1130_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1130_am'] === 'no') {
                      echo "<input type='radio' name='tue_1130_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_1130_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1130_am'] === '') {
                      echo "<input type='radio' name='tue_1130_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_1130_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_1145_am">Tue 11:45 am
                                                    <?php
                    if ($stylist_info['tue_1145_am'] === 'yes') {
                      echo "<input type='radio' name='tue_1145_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_1145_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1145_am'] === 'no') {
                      echo "<input type='radio' name='tue_1145_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_1145_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1145_am'] === '') {
                      echo "<input type='radio' name='tue_1145_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_1145_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_1200_pm">Tue 12:00 pm
                                                    <?php
                    if ($stylist_info['tue_1200_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_1200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1200_pm'] === 'no') {
                      echo "<input type='radio' name='tue_1200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_1200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1200_pm'] === '') {
                      echo "<input type='radio' name='tue_1200_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='tue_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_1215_pm">Tue 12:15 pm
                                                    <?php
                    if ($stylist_info['tue_1215_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_1215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1215_pm'] === 'no') {
                      echo "<input type='radio' name='tue_1215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_1215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1215_pm'] === '') {
                      echo "<input type='radio' name='tue_1215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_1230_pm">Tue 12:30 pm
                                                    <?php
                    if ($stylist_info['tue_1230_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_1230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1230_pm'] === 'no') {
                      echo "<input type='radio' name='tue_1230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_1230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1230_pm'] === '') {
                      echo "<input type='radio' name='tue_1230_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='tue_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_1245_pm">Tue 12:45 pm
                                                    <?php
                    if ($stylist_info['tue_1245_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_1245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1245_pm'] === 'no') {
                      echo "<input type='radio' name='tue_1245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_1245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_1245_pm'] === '') {
                      echo "<input type='radio' name='tue_1245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_100_pm">Tue 1:00 pm
                                                    <?php
                    if ($stylist_info['tue_100_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_100_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_100_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_100_pm'] === 'no') {
                      echo "<input type='radio' name='tue_100_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_100_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_100_pm'] === '') {
                      echo "<input type='radio' name='tue_100_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='tue_100_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_115_pm">Tue 1:15 pm
                                                    <?php
                    if ($stylist_info['tue_115_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_115_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_115_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_115_pm'] === 'no') {
                      echo "<input type='radio' name='tue_115_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_115_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_115_pm'] === '') {
                      echo "<input type='radio' name='tue_115_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='tue_115_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_130_pm">Tue 1:30 pm
                                                    <?php
                    if ($stylist_info['tue_130_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_130_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_130_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_130_pm'] === 'no') {
                      echo "<input type='radio' name='tue_130_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_130_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_130_pm'] === '') {
                      echo "<input type='radio' name='tue_130_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='tue_130_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_145_pm">Tue 1:45 pm
                                                    <?php
                    if ($stylist_info['tue_145_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_145_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_145_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_145_pm'] === 'no') {
                      echo "<input type='radio' name='tue_145_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_145_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_145_pm'] === '') {
                      echo "<input type='radio' name='tue_145_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='tue_145_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_200_pm">Tue 2:00 pm
                                                    <?php
                    if ($stylist_info['tue_200_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_200_pm'] === 'no') {
                      echo "<input type='radio' name='tue_200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_200_pm'] === '') {
                      echo "<input type='radio' name='tue_200_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_215_pm">Tue 2:15 pm
                                                    <?php
                    if ($stylist_info['tue_215_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_215_pm'] === 'no') {
                      echo "<input type='radio' name='tue_215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_215_pm'] === '') {
                      echo "<input type='radio' name='tue_215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_230_pm">Tue 2:30 pm
                                                    <?php
                    if ($stylist_info['tue_230_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_230_pm'] === 'no') {
                      echo "<input type='radio' name='tue_230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_230_pm'] === '') {
                      echo "<input type='radio' name='tue_230_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_245_pm">Tue 2:45 pm
                                                    <?php
                    if ($stylist_info['tue_245_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_245_pm'] === 'no') {
                      echo "<input type='radio' name='tue_245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_245_pm'] === '') {
                      echo "<input type='radio' name='tue_245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_300_pm">Tue 3:00 pm
                                                    <?php
                    if ($stylist_info['tue_300_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_300_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_300_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_300_pm'] === 'no') {
                      echo "<input type='radio' name='tue_300_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_300_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_300_pm'] === '') {
                      echo "<input type='radio' name='tue_300_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_300_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_315_pm">Tue 3:15 pm
                                                    <?php
                    if ($stylist_info['tue_315_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_315_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_315_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_315_pm'] === 'no') {
                      echo "<input type='radio' name='tue_315_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_315_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_315_pm'] === '') {
                      echo "<input type='radio' name='tue_315_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_315_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_330_pm">Tue 3:30 pm
                                                    <?php
                    if ($stylist_info['tue_330_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_330_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_330_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_330_pm'] === 'no') {
                      echo "<input type='radio' name='tue_330_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_330_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_330_pm'] === '') {
                      echo "<input type='radio' name='tue_330_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_330_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_345_pm">Tue 3:45 pm
                                                    <?php
                    if ($stylist_info['tue_345_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_345_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_345_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_345_pm'] === 'no') {
                      echo "<input type='radio' name='tue_345_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_345_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_345_pm'] === '') {
                      echo "<input type='radio' name='tue_345_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_345_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_400_pm">Tue 4:00 pm
                                                    <?php
                    if ($stylist_info['tue_400_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_400_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_400_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_400_pm'] === 'no') {
                      echo "<input type='radio' name='tue_400_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_400_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_400_pm'] === '') {
                      echo "<input type='radio' name='tue_400_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_400_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_415_pm">Tue 4:15 pm
                                                    <?php
                    if ($stylist_info['tue_415_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_415_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_415_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_415_pm'] === 'no') {
                      echo "<input type='radio' name='tue_415_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_415_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_415_pm'] === '') {
                      echo "<input type='radio' name='tue_415_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_415_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_430_pm">Tue 4:30 pm
                                                    <?php
                    if ($stylist_info['tue_430_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_430_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_430_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_430_pm'] === 'no') {
                      echo "<input type='radio' name='tue_430_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_430_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_430_pm'] === '') {
                      echo "<input type='radio' name='tue_430_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_430_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_445_pm">Tue 4:45 pm
                                                    <?php
                    if ($stylist_info['tue_445_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_445_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_445_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_445_pm'] === 'no') {
                      echo "<input type='radio' name='tue_445_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_445_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_445_pm'] === '') {
                      echo "<input type='radio' name='tue_445_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_445_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_500_pm">Tue 5:00 pm
                                                    <?php
                    if ($stylist_info['tue_500_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_500_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_500_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_500_pm'] === 'no') {
                      echo "<input type='radio' name='tue_500_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_500_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_500_pm'] === '') {
                      echo "<input type='radio' name='tue_500_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_500_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_515_pm">Tue 5:15 pm
                                                    <?php
                    if ($stylist_info['tue_515_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_515_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_515_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_515_pm'] === 'no') {
                      echo "<input type='radio' name='tue_515_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_515_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_515_pm'] === '') {
                      echo "<input type='radio' name='tue_515_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_515_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_530_pm">Tue 5:30 pm
                                                    <?php
                    if ($stylist_info['tue_530_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_530_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_530_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_530_pm'] === 'no') {
                      echo "<input type='radio' name='tue_530_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_530_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_530_pm'] === '') {
                      echo "<input type='radio' name='tue_530_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_530_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_545_pm">Tue 5:45 pm
                                                    <?php
                    if ($stylist_info['tue_545_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_545_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_545_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_545_pm'] === 'no') {
                      echo "<input type='radio' name='tue_545_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_545_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_545_pm'] === '') {
                      echo "<input type='radio' name='tue_545_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_545_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="tue_600_pm">Tue 6:00 pm
                                                    <?php
                    if ($stylist_info['tue_600_pm'] === 'yes') {
                      echo "<input type='radio' name='tue_600_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='tue_600_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_600_pm'] === 'no') {
                      echo "<input type='radio' name='tue_600_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='tue_600_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['tue_600_pm'] === '') {
                      echo "<input type='radio' name='tue_600_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='tue_600_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>

                                            <!-- WEDNESDAY -->

                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_900_am">Wed 9:00 am
                                                    <?php
                    if ($stylist_info['wed_900_am'] === 'yes') {
                      echo "<input type='radio' name='wed_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_900_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_900_am'] === 'no') {
                      echo "<input type='radio' name='wed_900_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_900_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_900_am'] === '') {
                      echo "<input type='radio' name='wed_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_900_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_915_am">Wed 9:15 am
                                                    <?php
                    if ($stylist_info['wed_915_am'] === 'yes') {
                      echo "<input type='radio' name='wed_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_915_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_915_am'] === 'no') {
                      echo "<input type='radio' name='wed_915_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_915_am' id='no' value='no' checked>
                        No
                        </label>";
                    }  elseif ($stylist_info['wed_915_am'] === '') {
                      echo "<input type='radio' name='wed_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_915_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_930_am">Wed 9:30 am
                                                    <?php
                    if ($stylist_info['wed_930_am'] === 'yes') {
                      echo "<input type='radio' name='wed_930_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_930_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_930_am'] === 'no') {
                      echo "<input type='radio' name='wed_930_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_930_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_930_am'] === '') {
                      echo "<input type='radio' name='wed_930_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_930_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_945_am">Wed 9:45 am
                                                    <?php
                    if ($stylist_info['wed_945_am'] === 'yes') {
                      echo "<input type='radio' name='wed_945_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_945_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_945_am'] === 'no') {
                      echo "<input type='radio' name='wed_945_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_945_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_945_am'] === '') {
                      echo "<input type='radio' name='wed_945_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_945_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_1000_am">Wed 10:00 am
                                                    <?php
                    if ($stylist_info['wed_1000_am'] === 'yes') {
                      echo "<input type='radio' name='wed_1000_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_1000_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1000_am'] === 'no') {
                      echo "<input type='radio' name='wed_1000_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_1000_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1000_am'] === '') {
                      echo "<input type='radio' name='wed_1000_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_1000_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_1015_am">Wed 10:15 am
                                                    <?php
                    if ($stylist_info['wed_1015_am'] === 'yes') {
                      echo "<input type='radio' name='wed_1015_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_1015_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1015_am'] === 'no') {
                      echo "<input type='radio' name='wed_1015_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_1015_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1015_am'] === '') {
                      echo "<input type='radio' name='wed_1015_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_1015_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_1030_am">Wed 10:30 am
                                                    <?php
                    if ($stylist_info['wed_1030_am'] === 'yes') {
                      echo "<input type='radio' name='wed_1030_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_1030_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1030_am'] === 'no') {
                      echo "<input type='radio' name='wed_1030_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_1030_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1030_am'] === '') {
                      echo "<input type='radio' name='wed_1030_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_1030_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_1045_am">Wed 10:45 am
                                                    <?php
                    if ($stylist_info['wed_1045_am'] === 'yes') {
                      echo "<input type='radio' name='wed_1045_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_1045_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1045_am'] === 'no') {
                      echo "<input type='radio' name='wed_1045_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_1045_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1045_am'] === '') {
                      echo "<input type='radio' name='wed_1045_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_1045_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_1100_am">Wed 11:00 am
                                                    <?php
                    if ($stylist_info['wed_1100_am'] === 'yes') {
                      echo "<input type='radio' name='wed_1100_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_1100_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1100_am'] === 'no') {
                      echo "<input type='radio' name='wed_1100_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_1100_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1100_am'] === '') {
                      echo "<input type='radio' name='wed_1100_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_1100_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_1115_am">Wed 11:15 am
                                                    <?php
                    if ($stylist_info['wed_1115_am'] === 'yes') {
                      echo "<input type='radio' name='wed_1115_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_1115_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1115_am'] === 'no') {
                      echo "<input type='radio' name='wed_1115_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_1115_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1115_am'] === '') {
                      echo "<input type='radio' name='wed_1115_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_1115_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_1130_am">Wed 11:30 am
                                                    <?php
                    if ($stylist_info['wed_1130_am'] === 'yes') {
                      echo "<input type='radio' name='wed_1130_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_1130_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1130_am'] === 'no') {
                      echo "<input type='radio' name='wed_1130_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_1130_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1130_am'] === '') {
                      echo "<input type='radio' name='wed_1130_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_1130_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_1145_am">Wed 11:45 am
                                                    <?php
                    if ($stylist_info['wed_1145_am'] === 'yes') {
                      echo "<input type='radio' name='wed_1145_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_1145_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1145_am'] === 'no') {
                      echo "<input type='radio' name='wed_1145_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_1145_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1145_am'] === '') {
                      echo "<input type='radio' name='wed_1145_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_1145_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_1200_pm">Wed 12:00 pm
                                                    <?php
                    if ($stylist_info['wed_1200_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_1200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1200_pm'] === 'no') {
                      echo "<input type='radio' name='wed_1200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_1200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1200_pm'] === '') {
                      echo "<input type='radio' name='wed_1200_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='wed_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_1215_pm">Wed 12:15 pm
                                                    <?php
                    if ($stylist_info['wed_1215_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_1215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1215_pm'] === 'no') {
                      echo "<input type='radio' name='wed_1215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_1215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1215_pm'] === '') {
                      echo "<input type='radio' name='wed_1215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_1230_pm">Wed 12:30 pm
                                                    <?php
                    if ($stylist_info['wed_1230_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_1230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1230_pm'] === 'no') {
                      echo "<input type='radio' name='wed_1230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_1230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1230_pm'] === '') {
                      echo "<input type='radio' name='wed_1230_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='wed_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_1245_pm">Wed 12:45 pm
                                                    <?php
                    if ($stylist_info['wed_1245_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_1245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1245_pm'] === 'no') {
                      echo "<input type='radio' name='wed_1245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_1245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_1245_pm'] === '') {
                      echo "<input type='radio' name='wed_1245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_100_pm">Wed 1:00 pm
                                                    <?php
                    if ($stylist_info['wed_100_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_100_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_100_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_100_pm'] === 'no') {
                      echo "<input type='radio' name='wed_100_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_100_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_100_pm'] === '') {
                      echo "<input type='radio' name='wed_100_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='wed_100_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_115_pm">Wed 1:15 pm
                                                    <?php
                    if ($stylist_info['wed_115_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_115_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_115_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_115_pm'] === 'no') {
                      echo "<input type='radio' name='wed_115_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_115_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_115_pm'] === '') {
                      echo "<input type='radio' name='wed_115_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='wed_115_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_130_pm">Wed 1:30 pm
                                                    <?php
                    if ($stylist_info['wed_130_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_130_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_130_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_130_pm'] === 'no') {
                      echo "<input type='radio' name='wed_130_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_130_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_130_pm'] === '') {
                      echo "<input type='radio' name='wed_130_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='wed_130_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_145_pm">Wed 1:45 pm
                                                    <?php
                    if ($stylist_info['wed_145_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_145_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_145_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_145_pm'] === 'no') {
                      echo "<input type='radio' name='wed_145_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_145_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_145_pm'] === '') {
                      echo "<input type='radio' name='wed_145_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='wed_145_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_200_pm">Wed 2:00 pm
                                                    <?php
                    if ($stylist_info['wed_200_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_200_pm'] === 'no') {
                      echo "<input type='radio' name='wed_200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_200_pm'] === '') {
                      echo "<input type='radio' name='wed_200_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_215_pm">Wed 2:15 pm
                                                    <?php
                    if ($stylist_info['wed_215_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_215_pm'] === 'no') {
                      echo "<input type='radio' name='wed_215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_215_pm'] === '') {
                      echo "<input type='radio' name='wed_215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_230_pm">Wed 2:30 pm
                                                    <?php
                    if ($stylist_info['wed_230_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_230_pm'] === 'no') {
                      echo "<input type='radio' name='wed_230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_230_pm'] === '') {
                      echo "<input type='radio' name='wed_230_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_245_pm">Wed 2:45 pm
                                                    <?php
                    if ($stylist_info['wed_245_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_245_pm'] === 'no') {
                      echo "<input type='radio' name='wed_245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_245_pm'] === '') {
                      echo "<input type='radio' name='wed_245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_300_pm">Wed 3:00 pm
                                                    <?php
                    if ($stylist_info['wed_300_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_300_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_300_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_300_pm'] === 'no') {
                      echo "<input type='radio' name='wed_300_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_300_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_300_pm'] === '') {
                      echo "<input type='radio' name='wed_300_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_300_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_315_pm">Wed 3:15 pm
                                                    <?php
                    if ($stylist_info['wed_315_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_315_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_315_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_315_pm'] === 'no') {
                      echo "<input type='radio' name='wed_315_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_315_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_315_pm'] === '') {
                      echo "<input type='radio' name='wed_315_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_315_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_330_pm">Wed 3:30 pm
                                                    <?php
                    if ($stylist_info['wed_330_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_330_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_330_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_330_pm'] === 'no') {
                      echo "<input type='radio' name='wed_330_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_330_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_330_pm'] === '') {
                      echo "<input type='radio' name='wed_330_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_330_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_345_pm">Wed 3:45 pm
                                                    <?php
                    if ($stylist_info['wed_345_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_345_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_345_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_345_pm'] === 'no') {
                      echo "<input type='radio' name='wed_345_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_345_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_345_pm'] === '') {
                      echo "<input type='radio' name='wed_345_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_345_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_400_pm">Wed 4:00 pm
                                                    <?php
                    if ($stylist_info['wed_400_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_400_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_400_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_400_pm'] === 'no') {
                      echo "<input type='radio' name='wed_400_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_400_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_400_pm'] === '') {
                      echo "<input type='radio' name='wed_400_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_400_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_415_pm">Wed 4:15 pm
                                                    <?php
                    if ($stylist_info['wed_415_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_415_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_415_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_415_pm'] === 'no') {
                      echo "<input type='radio' name='wed_415_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_415_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_415_pm'] === '') {
                      echo "<input type='radio' name='wed_415_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_415_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_430_pm">Wed 4:30 pm
                                                    <?php
                    if ($stylist_info['wed_430_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_430_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_430_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_430_pm'] === 'no') {
                      echo "<input type='radio' name='wed_430_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_430_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_430_pm'] === '') {
                      echo "<input type='radio' name='wed_430_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_430_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_445_pm">Wed 4:45 pm
                                                    <?php
                    if ($stylist_info['wed_445_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_445_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_445_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_445_pm'] === 'no') {
                      echo "<input type='radio' name='wed_445_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_445_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_445_pm'] === '') {
                      echo "<input type='radio' name='wed_445_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_445_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_500_pm">Wed 5:00 pm
                                                    <?php
                    if ($stylist_info['wed_500_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_500_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_500_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_500_pm'] === 'no') {
                      echo "<input type='radio' name='wed_500_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_500_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_500_pm'] === '') {
                      echo "<input type='radio' name='wed_500_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_500_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_515_pm">Wed 5:15 pm
                                                    <?php
                    if ($stylist_info['wed_515_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_515_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_515_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_515_pm'] === 'no') {
                      echo "<input type='radio' name='wed_515_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_515_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_515_pm'] === '') {
                      echo "<input type='radio' name='wed_515_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_515_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_530_pm">Wed 5:30 pm
                                                    <?php
                    if ($stylist_info['wed_530_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_530_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_530_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_530_pm'] === 'no') {
                      echo "<input type='radio' name='wed_530_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_530_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_530_pm'] === '') {
                      echo "<input type='radio' name='wed_530_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_530_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_545_pm">Wed 5:45 pm
                                                    <?php
                    if ($stylist_info['wed_545_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_545_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_545_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_545_pm'] === 'no') {
                      echo "<input type='radio' name='wed_545_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_545_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_545_pm'] === '') {
                      echo "<input type='radio' name='wed_545_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_545_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="wed_600_pm">Wed 6:00 pm
                                                    <?php
                    if ($stylist_info['wed_600_pm'] === 'yes') {
                      echo "<input type='radio' name='wed_600_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='wed_600_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_600_pm'] === 'no') {
                      echo "<input type='radio' name='wed_600_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='wed_600_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['wed_600_pm'] === '') {
                      echo "<input type='radio' name='wed_600_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='wed_600_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>

                                            <!-- Thur -->

                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_900_am">Thur 9:00 am
                                                    <?php
                    if ($stylist_info['thur_900_am'] === 'yes') {
                      echo "<input type='radio' name='thur_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_900_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_900_am'] === 'no') {
                      echo "<input type='radio' name='thur_900_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_900_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_900_am'] === '') {
                      echo "<input type='radio' name='thur_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_900_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_915_am">Thur 9:15 am
                                                    <?php
                    if ($stylist_info['thur_915_am'] === 'yes') {
                      echo "<input type='radio' name='thur_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_915_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_915_am'] === 'no') {
                      echo "<input type='radio' name='thur_915_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_915_am' id='no' value='no' checked>
                        No
                        </label>";
                    }  elseif ($stylist_info['thur_915_am'] === '') {
                      echo "<input type='radio' name='thur_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_915_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_930_am">Thur 9:30 am
                                                    <?php
                    if ($stylist_info['thur_930_am'] === 'yes') {
                      echo "<input type='radio' name='thur_930_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_930_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_930_am'] === 'no') {
                      echo "<input type='radio' name='thur_930_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_930_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_930_am'] === '') {
                      echo "<input type='radio' name='thur_930_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_930_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_945_am">Thur 9:45 am
                                                    <?php
                    if ($stylist_info['thur_945_am'] === 'yes') {
                      echo "<input type='radio' name='thur_945_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_945_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_945_am'] === 'no') {
                      echo "<input type='radio' name='thur_945_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_945_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_945_am'] === '') {
                      echo "<input type='radio' name='thur_945_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_945_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_1000_am">Thur 10:00 am
                                                    <?php
                    if ($stylist_info['thur_1000_am'] === 'yes') {
                      echo "<input type='radio' name='thur_1000_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_1000_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1000_am'] === 'no') {
                      echo "<input type='radio' name='thur_1000_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_1000_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1000_am'] === '') {
                      echo "<input type='radio' name='thur_1000_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_1000_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_1015_am">Thur 10:15 am
                                                    <?php
                    if ($stylist_info['thur_1015_am'] === 'yes') {
                      echo "<input type='radio' name='thur_1015_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_1015_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1015_am'] === 'no') {
                      echo "<input type='radio' name='thur_1015_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_1015_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1015_am'] === '') {
                      echo "<input type='radio' name='thur_1015_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_1015_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_1030_am">Thur 10:30 am
                                                    <?php
                    if ($stylist_info['thur_1030_am'] === 'yes') {
                      echo "<input type='radio' name='thur_1030_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_1030_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1030_am'] === 'no') {
                      echo "<input type='radio' name='thur_1030_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_1030_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1030_am'] === '') {
                      echo "<input type='radio' name='thur_1030_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_1030_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_1045_am">Thur 10:45 am
                                                    <?php
                    if ($stylist_info['thur_1045_am'] === 'yes') {
                      echo "<input type='radio' name='thur_1045_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_1045_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1045_am'] === 'no') {
                      echo "<input type='radio' name='thur_1045_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_1045_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1045_am'] === '') {
                      echo "<input type='radio' name='thur_1045_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_1045_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_1100_am">Thur 11:00 am
                                                    <?php
                    if ($stylist_info['thur_1100_am'] === 'yes') {
                      echo "<input type='radio' name='thur_1100_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_1100_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1100_am'] === 'no') {
                      echo "<input type='radio' name='thur_1100_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_1100_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1100_am'] === '') {
                      echo "<input type='radio' name='thur_1100_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_1100_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_1115_am">Thur 11:15 am
                                                    <?php
                    if ($stylist_info['thur_1115_am'] === 'yes') {
                      echo "<input type='radio' name='thur_1115_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_1115_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1115_am'] === 'no') {
                      echo "<input type='radio' name='thur_1115_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_1115_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1115_am'] === '') {
                      echo "<input type='radio' name='thur_1115_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_1115_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_1130_am">Thur 11:30 am
                                                    <?php
                    if ($stylist_info['thur_1130_am'] === 'yes') {
                      echo "<input type='radio' name='thur_1130_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_1130_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1130_am'] === 'no') {
                      echo "<input type='radio' name='thur_1130_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_1130_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1130_am'] === '') {
                      echo "<input type='radio' name='thur_1130_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_1130_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_1145_am">Thur 11:45 am
                                                    <?php
                    if ($stylist_info['thur_1145_am'] === 'yes') {
                      echo "<input type='radio' name='thur_1145_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_1145_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1145_am'] === 'no') {
                      echo "<input type='radio' name='thur_1145_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_1145_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1145_am'] === '') {
                      echo "<input type='radio' name='thur_1145_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_1145_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_1200_pm">Thur 12:00 pm
                                                    <?php
                    if ($stylist_info['thur_1200_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_1200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1200_pm'] === 'no') {
                      echo "<input type='radio' name='thur_1200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_1200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1200_pm'] === '') {
                      echo "<input type='radio' name='thur_1200_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='thur_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_1215_pm">Thur 12:15 pm
                                                    <?php
                    if ($stylist_info['thur_1215_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_1215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1215_pm'] === 'no') {
                      echo "<input type='radio' name='thur_1215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_1215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1215_pm'] === '') {
                      echo "<input type='radio' name='thur_1215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_1230_pm">Thur 12:30 pm
                                                    <?php
                    if ($stylist_info['thur_1230_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_1230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1230_pm'] === 'no') {
                      echo "<input type='radio' name='thur_1230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_1230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1230_pm'] === '') {
                      echo "<input type='radio' name='thur_1230_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='thur_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_1245_pm">Thur 12:45 pm
                                                    <?php
                    if ($stylist_info['thur_1245_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_1245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1245_pm'] === 'no') {
                      echo "<input type='radio' name='thur_1245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_1245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_1245_pm'] === '') {
                      echo "<input type='radio' name='thur_1245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_100_pm">Thur 1:00 pm
                                                    <?php
                    if ($stylist_info['thur_100_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_100_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_100_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_100_pm'] === 'no') {
                      echo "<input type='radio' name='thur_100_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_100_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_100_pm'] === '') {
                      echo "<input type='radio' name='thur_100_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='thur_100_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_115_pm">Thur 1:15 pm
                                                    <?php
                    if ($stylist_info['thur_115_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_115_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_115_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_115_pm'] === 'no') {
                      echo "<input type='radio' name='thur_115_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_115_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_115_pm'] === '') {
                      echo "<input type='radio' name='thur_115_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='thur_115_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_130_pm">Thur 1:30 pm
                                                    <?php
                    if ($stylist_info['thur_130_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_130_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_130_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_130_pm'] === 'no') {
                      echo "<input type='radio' name='thur_130_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_130_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_130_pm'] === '') {
                      echo "<input type='radio' name='thur_130_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='thur_130_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_145_pm">Thur 1:45 pm
                                                    <?php
                    if ($stylist_info['thur_145_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_145_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_145_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_145_pm'] === 'no') {
                      echo "<input type='radio' name='thur_145_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_145_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_145_pm'] === '') {
                      echo "<input type='radio' name='thur_145_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='thur_145_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_200_pm">Thur 2:00 pm
                                                    <?php
                    if ($stylist_info['thur_200_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_200_pm'] === 'no') {
                      echo "<input type='radio' name='thur_200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_200_pm'] === '') {
                      echo "<input type='radio' name='thur_200_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_215_pm">Thur 2:15 pm
                                                    <?php
                    if ($stylist_info['thur_215_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_215_pm'] === 'no') {
                      echo "<input type='radio' name='thur_215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_215_pm'] === '') {
                      echo "<input type='radio' name='thur_215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_230_pm">Thur 2:30 pm
                                                    <?php
                    if ($stylist_info['thur_230_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_230_pm'] === 'no') {
                      echo "<input type='radio' name='thur_230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_230_pm'] === '') {
                      echo "<input type='radio' name='thur_230_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_245_pm">Thur 2:45 pm
                                                    <?php
                    if ($stylist_info['thur_245_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_245_pm'] === 'no') {
                      echo "<input type='radio' name='thur_245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_245_pm'] === '') {
                      echo "<input type='radio' name='thur_245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_300_pm">Thur 3:00 pm
                                                    <?php
                    if ($stylist_info['thur_300_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_300_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_300_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_300_pm'] === 'no') {
                      echo "<input type='radio' name='thur_300_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_300_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_300_pm'] === '') {
                      echo "<input type='radio' name='thur_300_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_300_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_315_pm">Thur 3:15 pm
                                                    <?php
                    if ($stylist_info['thur_315_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_315_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_315_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_315_pm'] === 'no') {
                      echo "<input type='radio' name='thur_315_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_315_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_315_pm'] === '') {
                      echo "<input type='radio' name='thur_315_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_315_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_330_pm">Thur 3:30 pm
                                                    <?php
                    if ($stylist_info['thur_330_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_330_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_330_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_330_pm'] === 'no') {
                      echo "<input type='radio' name='thur_330_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_330_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_330_pm'] === '') {
                      echo "<input type='radio' name='thur_330_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_330_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_345_pm">Thur 3:45 pm
                                                    <?php
                    if ($stylist_info['thur_345_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_345_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_345_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_345_pm'] === 'no') {
                      echo "<input type='radio' name='thur_345_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_345_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_345_pm'] === '') {
                      echo "<input type='radio' name='thur_345_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_345_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_400_pm">Thur 4:00 pm
                                                    <?php
                    if ($stylist_info['thur_400_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_400_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_400_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_400_pm'] === 'no') {
                      echo "<input type='radio' name='thur_400_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_400_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_400_pm'] === '') {
                      echo "<input type='radio' name='thur_400_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_400_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_415_pm">Thur 4:15 pm
                                                    <?php
                    if ($stylist_info['thur_415_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_415_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_415_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_415_pm'] === 'no') {
                      echo "<input type='radio' name='thur_415_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_415_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_415_pm'] === '') {
                      echo "<input type='radio' name='thur_415_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_415_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_430_pm">Thur 4:30 pm
                                                    <?php
                    if ($stylist_info['thur_430_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_430_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_430_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_430_pm'] === 'no') {
                      echo "<input type='radio' name='thur_430_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_430_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_430_pm'] === '') {
                      echo "<input type='radio' name='thur_430_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_430_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_445_pm">Thur 4:45 pm
                                                    <?php
                    if ($stylist_info['thur_445_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_445_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_445_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_445_pm'] === 'no') {
                      echo "<input type='radio' name='thur_445_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_445_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_445_pm'] === '') {
                      echo "<input type='radio' name='thur_445_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_445_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_500_pm">Thur 5:00 pm
                                                    <?php
                    if ($stylist_info['thur_500_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_500_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_500_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_500_pm'] === 'no') {
                      echo "<input type='radio' name='thur_500_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_500_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_500_pm'] === '') {
                      echo "<input type='radio' name='thur_500_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_500_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_515_pm">Thur 5:15 pm
                                                    <?php
                    if ($stylist_info['thur_515_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_515_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_515_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_515_pm'] === 'no') {
                      echo "<input type='radio' name='thur_515_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_515_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_515_pm'] === '') {
                      echo "<input type='radio' name='thur_515_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_515_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_530_pm">Thur 5:30 pm
                                                    <?php
                    if ($stylist_info['thur_530_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_530_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_530_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_530_pm'] === 'no') {
                      echo "<input type='radio' name='thur_530_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_530_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_530_pm'] === '') {
                      echo "<input type='radio' name='thur_530_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_530_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_545_pm">Thur 5:45 pm
                                                    <?php
                    if ($stylist_info['thur_545_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_545_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_545_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_545_pm'] === 'no') {
                      echo "<input type='radio' name='thur_545_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_545_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_545_pm'] === '') {
                      echo "<input type='radio' name='thur_545_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_545_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="thur_600_pm">Thur 6:00 pm
                                                    <?php
                    if ($stylist_info['thur_600_pm'] === 'yes') {
                      echo "<input type='radio' name='thur_600_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='thur_600_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_600_pm'] === 'no') {
                      echo "<input type='radio' name='thur_600_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='thur_600_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['thur_600_pm'] === '') {
                      echo "<input type='radio' name='thur_600_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='thur_600_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>

                                            <!-- Fri -->

                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_900_am">Fri 9:00 am
                                                    <?php
                    if ($stylist_info['fri_900_am'] === 'yes') {
                      echo "<input type='radio' name='fri_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_900_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_900_am'] === 'no') {
                      echo "<input type='radio' name='fri_900_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_900_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_900_am'] === '') {
                      echo "<input type='radio' name='fri_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_900_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_915_am">Fri 9:15 am
                                                    <?php
                    if ($stylist_info['fri_915_am'] === 'yes') {
                      echo "<input type='radio' name='fri_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_915_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_915_am'] === 'no') {
                      echo "<input type='radio' name='fri_915_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_915_am' id='no' value='no' checked>
                        No
                        </label>";
                    }  elseif ($stylist_info['fri_915_am'] === '') {
                      echo "<input type='radio' name='fri_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_915_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_930_am">Fri 9:30 am
                                                    <?php
                    if ($stylist_info['fri_930_am'] === 'yes') {
                      echo "<input type='radio' name='fri_930_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_930_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_930_am'] === 'no') {
                      echo "<input type='radio' name='fri_930_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_930_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_930_am'] === '') {
                      echo "<input type='radio' name='fri_930_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_930_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_945_am">Fri 9:45 am
                                                    <?php
                    if ($stylist_info['fri_945_am'] === 'yes') {
                      echo "<input type='radio' name='fri_945_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_945_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_945_am'] === 'no') {
                      echo "<input type='radio' name='fri_945_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_945_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_945_am'] === '') {
                      echo "<input type='radio' name='fri_945_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_945_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_1000_am">Fri 10:00 am
                                                    <?php
                    if ($stylist_info['fri_1000_am'] === 'yes') {
                      echo "<input type='radio' name='fri_1000_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_1000_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1000_am'] === 'no') {
                      echo "<input type='radio' name='fri_1000_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_1000_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1000_am'] === '') {
                      echo "<input type='radio' name='fri_1000_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_1000_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_1015_am">Fri 10:15 am
                                                    <?php
                    if ($stylist_info['fri_1015_am'] === 'yes') {
                      echo "<input type='radio' name='fri_1015_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_1015_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1015_am'] === 'no') {
                      echo "<input type='radio' name='fri_1015_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_1015_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1015_am'] === '') {
                      echo "<input type='radio' name='fri_1015_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_1015_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_1030_am">Fri 10:30 am
                                                    <?php
                    if ($stylist_info['fri_1030_am'] === 'yes') {
                      echo "<input type='radio' name='fri_1030_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_1030_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1030_am'] === 'no') {
                      echo "<input type='radio' name='fri_1030_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_1030_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1030_am'] === '') {
                      echo "<input type='radio' name='fri_1030_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_1030_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_1045_am">Fri 10:45 am
                                                    <?php
                    if ($stylist_info['fri_1045_am'] === 'yes') {
                      echo "<input type='radio' name='fri_1045_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_1045_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1045_am'] === 'no') {
                      echo "<input type='radio' name='fri_1045_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_1045_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1045_am'] === '') {
                      echo "<input type='radio' name='fri_1045_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_1045_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_1100_am">Fri 11:00 am
                                                    <?php
                    if ($stylist_info['fri_1100_am'] === 'yes') {
                      echo "<input type='radio' name='fri_1100_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_1100_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1100_am'] === 'no') {
                      echo "<input type='radio' name='fri_1100_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_1100_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1100_am'] === '') {
                      echo "<input type='radio' name='fri_1100_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_1100_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_1115_am">Fri 11:15 am
                                                    <?php
                    if ($stylist_info['fri_1115_am'] === 'yes') {
                      echo "<input type='radio' name='fri_1115_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_1115_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1115_am'] === 'no') {
                      echo "<input type='radio' name='fri_1115_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_1115_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1115_am'] === '') {
                      echo "<input type='radio' name='fri_1115_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_1115_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_1130_am">Fri 11:30 am
                                                    <?php
                    if ($stylist_info['fri_1130_am'] === 'yes') {
                      echo "<input type='radio' name='fri_1130_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_1130_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1130_am'] === 'no') {
                      echo "<input type='radio' name='fri_1130_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_1130_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1130_am'] === '') {
                      echo "<input type='radio' name='fri_1130_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_1130_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_1145_am">Fri 11:45 am
                                                    <?php
                    if ($stylist_info['fri_1145_am'] === 'yes') {
                      echo "<input type='radio' name='fri_1145_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_1145_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1145_am'] === 'no') {
                      echo "<input type='radio' name='fri_1145_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_1145_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1145_am'] === '') {
                      echo "<input type='radio' name='fri_1145_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_1145_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_1200_pm">Fri 12:00 pm
                                                    <?php
                    if ($stylist_info['fri_1200_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_1200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1200_pm'] === 'no') {
                      echo "<input type='radio' name='fri_1200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_1200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1200_pm'] === '') {
                      echo "<input type='radio' name='fri_1200_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='fri_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_1215_pm">Fri 12:15 pm
                                                    <?php
                    if ($stylist_info['fri_1215_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_1215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1215_pm'] === 'no') {
                      echo "<input type='radio' name='fri_1215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_1215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1215_pm'] === '') {
                      echo "<input type='radio' name='fri_1215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_1230_pm">Fri 12:30 pm
                                                    <?php
                    if ($stylist_info['fri_1230_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_1230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1230_pm'] === 'no') {
                      echo "<input type='radio' name='fri_1230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_1230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1230_pm'] === '') {
                      echo "<input type='radio' name='fri_1230_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='fri_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_1245_pm">Fri 12:45 pm
                                                    <?php
                    if ($stylist_info['fri_1245_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_1245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1245_pm'] === 'no') {
                      echo "<input type='radio' name='fri_1245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_1245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_1245_pm'] === '') {
                      echo "<input type='radio' name='fri_1245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_100_pm">Fri 1:00 pm
                                                    <?php
                    if ($stylist_info['fri_100_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_100_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_100_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_100_pm'] === 'no') {
                      echo "<input type='radio' name='fri_100_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_100_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_100_pm'] === '') {
                      echo "<input type='radio' name='fri_100_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='fri_100_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_115_pm">Fri 1:15 pm
                                                    <?php
                    if ($stylist_info['fri_115_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_115_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_115_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_115_pm'] === 'no') {
                      echo "<input type='radio' name='fri_115_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_115_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_115_pm'] === '') {
                      echo "<input type='radio' name='fri_115_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='fri_115_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_130_pm">Fri 1:30 pm
                                                    <?php
                    if ($stylist_info['fri_130_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_130_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_130_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_130_pm'] === 'no') {
                      echo "<input type='radio' name='fri_130_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_130_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_130_pm'] === '') {
                      echo "<input type='radio' name='fri_130_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='fri_130_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_145_pm">Fri 1:45 pm
                                                    <?php
                    if ($stylist_info['fri_145_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_145_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_145_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_145_pm'] === 'no') {
                      echo "<input type='radio' name='fri_145_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_145_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_145_pm'] === '') {
                      echo "<input type='radio' name='fri_145_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='fri_145_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_200_pm">Fri 2:00 pm
                                                    <?php
                    if ($stylist_info['fri_200_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_200_pm'] === 'no') {
                      echo "<input type='radio' name='fri_200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_200_pm'] === '') {
                      echo "<input type='radio' name='fri_200_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_215_pm">Fri 2:15 pm
                                                    <?php
                    if ($stylist_info['fri_215_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_215_pm'] === 'no') {
                      echo "<input type='radio' name='fri_215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_215_pm'] === '') {
                      echo "<input type='radio' name='fri_215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_230_pm">Fri 2:30 pm
                                                    <?php
                    if ($stylist_info['fri_230_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_230_pm'] === 'no') {
                      echo "<input type='radio' name='fri_230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_230_pm'] === '') {
                      echo "<input type='radio' name='fri_230_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_245_pm">Fri 2:45 pm
                                                    <?php
                    if ($stylist_info['fri_245_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_245_pm'] === 'no') {
                      echo "<input type='radio' name='fri_245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_245_pm'] === '') {
                      echo "<input type='radio' name='fri_245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_300_pm">Fri 3:00 pm
                                                    <?php
                    if ($stylist_info['fri_300_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_300_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_300_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_300_pm'] === 'no') {
                      echo "<input type='radio' name='fri_300_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_300_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_300_pm'] === '') {
                      echo "<input type='radio' name='fri_300_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_300_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_315_pm">Fri 3:15 pm
                                                    <?php
                    if ($stylist_info['fri_315_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_315_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_315_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_315_pm'] === 'no') {
                      echo "<input type='radio' name='fri_315_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_315_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_315_pm'] === '') {
                      echo "<input type='radio' name='fri_315_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_315_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_330_pm">Fri 3:30 pm
                                                    <?php
                    if ($stylist_info['fri_330_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_330_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_330_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_330_pm'] === 'no') {
                      echo "<input type='radio' name='fri_330_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_330_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_330_pm'] === '') {
                      echo "<input type='radio' name='fri_330_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_330_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_345_pm">Fri 3:45 pm
                                                    <?php
                    if ($stylist_info['fri_345_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_345_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_345_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_345_pm'] === 'no') {
                      echo "<input type='radio' name='fri_345_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_345_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_345_pm'] === '') {
                      echo "<input type='radio' name='fri_345_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_345_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_400_pm">Fri 4:00 pm
                                                    <?php
                    if ($stylist_info['fri_400_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_400_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_400_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_400_pm'] === 'no') {
                      echo "<input type='radio' name='fri_400_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_400_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_400_pm'] === '') {
                      echo "<input type='radio' name='fri_400_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_400_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_415_pm">Fri 4:15 pm
                                                    <?php
                    if ($stylist_info['fri_415_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_415_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_415_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_415_pm'] === 'no') {
                      echo "<input type='radio' name='fri_415_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_415_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_415_pm'] === '') {
                      echo "<input type='radio' name='fri_415_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_415_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_430_pm">Fri 4:30 pm
                                                    <?php
                    if ($stylist_info['fri_430_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_430_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_430_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_430_pm'] === 'no') {
                      echo "<input type='radio' name='fri_430_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_430_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_430_pm'] === '') {
                      echo "<input type='radio' name='fri_430_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_430_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_445_pm">Fri 4:45 pm
                                                    <?php
                    if ($stylist_info['fri_445_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_445_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_445_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_445_pm'] === 'no') {
                      echo "<input type='radio' name='fri_445_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_445_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_445_pm'] === '') {
                      echo "<input type='radio' name='fri_445_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_445_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_500_pm">Fri 5:00 pm
                                                    <?php
                    if ($stylist_info['fri_500_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_500_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_500_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_500_pm'] === 'no') {
                      echo "<input type='radio' name='fri_500_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_500_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_500_pm'] === '') {
                      echo "<input type='radio' name='fri_500_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_500_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_515_pm">Fri 5:15 pm
                                                    <?php
                    if ($stylist_info['fri_515_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_515_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_515_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_515_pm'] === 'no') {
                      echo "<input type='radio' name='fri_515_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_515_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_515_pm'] === '') {
                      echo "<input type='radio' name='fri_515_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_515_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_530_pm">Fri 5:30 pm
                                                    <?php
                    if ($stylist_info['fri_530_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_530_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_530_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_530_pm'] === 'no') {
                      echo "<input type='radio' name='fri_530_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_530_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_530_pm'] === '') {
                      echo "<input type='radio' name='fri_530_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_530_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_545_pm">Fri 5:45 pm
                                                    <?php
                    if ($stylist_info['fri_545_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_545_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_545_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_545_pm'] === 'no') {
                      echo "<input type='radio' name='fri_545_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_545_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_545_pm'] === '') {
                      echo "<input type='radio' name='fri_545_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_545_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="fri_600_pm">Fri 6:00 pm
                                                    <?php
                    if ($stylist_info['fri_600_pm'] === 'yes') {
                      echo "<input type='radio' name='fri_600_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='fri_600_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_600_pm'] === 'no') {
                      echo "<input type='radio' name='fri_600_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='fri_600_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['fri_600_pm'] === '') {
                      echo "<input type='radio' name='fri_600_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='fri_600_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>

                                            <!-- Sat -->

                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_900_am">Sat 9:00 am
                                                    <?php
                    if ($stylist_info['sat_900_am'] === 'yes') {
                      echo "<input type='radio' name='sat_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_900_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_900_am'] === 'no') {
                      echo "<input type='radio' name='sat_900_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_900_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_900_am'] === '') {
                      echo "<input type='radio' name='sat_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_900_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_915_am">Sat 9:15 am
                                                    <?php
                    if ($stylist_info['sat_915_am'] === 'yes') {
                      echo "<input type='radio' name='sat_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_915_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_915_am'] === 'no') {
                      echo "<input type='radio' name='sat_915_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_915_am' id='no' value='no' checked>
                        No
                        </label>";
                    }  elseif ($stylist_info['sat_915_am'] === '') {
                      echo "<input type='radio' name='sat_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_915_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_930_am">Sat 9:30 am
                                                    <?php
                    if ($stylist_info['sat_930_am'] === 'yes') {
                      echo "<input type='radio' name='sat_930_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_930_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_930_am'] === 'no') {
                      echo "<input type='radio' name='sat_930_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_930_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_930_am'] === '') {
                      echo "<input type='radio' name='sat_930_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_930_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_945_am">Sat 9:45 am
                                                    <?php
                    if ($stylist_info['sat_945_am'] === 'yes') {
                      echo "<input type='radio' name='sat_945_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_945_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_945_am'] === 'no') {
                      echo "<input type='radio' name='sat_945_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_945_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_945_am'] === '') {
                      echo "<input type='radio' name='sat_945_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_945_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_1000_am">Sat 10:00 am
                                                    <?php
                    if ($stylist_info['sat_1000_am'] === 'yes') {
                      echo "<input type='radio' name='sat_1000_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_1000_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1000_am'] === 'no') {
                      echo "<input type='radio' name='sat_1000_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_1000_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1000_am'] === '') {
                      echo "<input type='radio' name='sat_1000_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_1000_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_1015_am">Sat 10:15 am
                                                    <?php
                    if ($stylist_info['sat_1015_am'] === 'yes') {
                      echo "<input type='radio' name='sat_1015_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_1015_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1015_am'] === 'no') {
                      echo "<input type='radio' name='sat_1015_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_1015_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1015_am'] === '') {
                      echo "<input type='radio' name='sat_1015_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_1015_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_1030_am">Sat 10:30 am
                                                    <?php
                    if ($stylist_info['sat_1030_am'] === 'yes') {
                      echo "<input type='radio' name='sat_1030_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_1030_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1030_am'] === 'no') {
                      echo "<input type='radio' name='sat_1030_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_1030_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1030_am'] === '') {
                      echo "<input type='radio' name='sat_1030_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_1030_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_1045_am">Sat 10:45 am
                                                    <?php
                    if ($stylist_info['sat_1045_am'] === 'yes') {
                      echo "<input type='radio' name='sat_1045_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_1045_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1045_am'] === 'no') {
                      echo "<input type='radio' name='sat_1045_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_1045_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1045_am'] === '') {
                      echo "<input type='radio' name='sat_1045_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_1045_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_1100_am">Sat 11:00 am
                                                    <?php
                    if ($stylist_info['sat_1100_am'] === 'yes') {
                      echo "<input type='radio' name='sat_1100_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_1100_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1100_am'] === 'no') {
                      echo "<input type='radio' name='sat_1100_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_1100_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1100_am'] === '') {
                      echo "<input type='radio' name='sat_1100_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_1100_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_1115_am">Sat 11:15 am
                                                    <?php
                    if ($stylist_info['sat_1115_am'] === 'yes') {
                      echo "<input type='radio' name='sat_1115_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_1115_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1115_am'] === 'no') {
                      echo "<input type='radio' name='sat_1115_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_1115_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1115_am'] === '') {
                      echo "<input type='radio' name='sat_1115_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_1115_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_1130_am">Sat 11:30 am
                                                    <?php
                    if ($stylist_info['sat_1130_am'] === 'yes') {
                      echo "<input type='radio' name='sat_1130_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_1130_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1130_am'] === 'no') {
                      echo "<input type='radio' name='sat_1130_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_1130_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1130_am'] === '') {
                      echo "<input type='radio' name='sat_1130_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_1130_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_1145_am">Sat 11:45 am
                                                    <?php
                    if ($stylist_info['sat_1145_am'] === 'yes') {
                      echo "<input type='radio' name='sat_1145_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_1145_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1145_am'] === 'no') {
                      echo "<input type='radio' name='sat_1145_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_1145_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1145_am'] === '') {
                      echo "<input type='radio' name='sat_1145_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_1145_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_1200_pm">Sat 12:00 pm
                                                    <?php
                    if ($stylist_info['sat_1200_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_1200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1200_pm'] === 'no') {
                      echo "<input type='radio' name='sat_1200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_1200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1200_pm'] === '') {
                      echo "<input type='radio' name='sat_1200_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='sat_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_1215_pm">Sat 12:15 pm
                                                    <?php
                    if ($stylist_info['sat_1215_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_1215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1215_pm'] === 'no') {
                      echo "<input type='radio' name='sat_1215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_1215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1215_pm'] === '') {
                      echo "<input type='radio' name='sat_1215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_1230_pm">Sat 12:30 pm
                                                    <?php
                    if ($stylist_info['sat_1230_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_1230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1230_pm'] === 'no') {
                      echo "<input type='radio' name='sat_1230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_1230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1230_pm'] === '') {
                      echo "<input type='radio' name='sat_1230_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='sat_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_1245_pm">Sat 12:45 pm
                                                    <?php
                    if ($stylist_info['sat_1245_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_1245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1245_pm'] === 'no') {
                      echo "<input type='radio' name='sat_1245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_1245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_1245_pm'] === '') {
                      echo "<input type='radio' name='sat_1245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_100_pm">Sat 1:00 pm
                                                    <?php
                    if ($stylist_info['sat_100_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_100_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_100_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_100_pm'] === 'no') {
                      echo "<input type='radio' name='sat_100_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_100_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_100_pm'] === '') {
                      echo "<input type='radio' name='sat_100_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='sat_100_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_115_pm">Sat 1:15 pm
                                                    <?php
                    if ($stylist_info['sat_115_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_115_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_115_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_115_pm'] === 'no') {
                      echo "<input type='radio' name='sat_115_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_115_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_115_pm'] === '') {
                      echo "<input type='radio' name='sat_115_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='sat_115_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_130_pm">Sat 1:30 pm
                                                    <?php
                    if ($stylist_info['sat_130_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_130_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_130_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_130_pm'] === 'no') {
                      echo "<input type='radio' name='sat_130_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_130_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_130_pm'] === '') {
                      echo "<input type='radio' name='sat_130_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='sat_130_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_145_pm">Sat 1:45 pm
                                                    <?php
                    if ($stylist_info['sat_145_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_145_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_145_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_145_pm'] === 'no') {
                      echo "<input type='radio' name='sat_145_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_145_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_145_pm'] === '') {
                      echo "<input type='radio' name='sat_145_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='sat_145_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_200_pm">Sat 2:00 pm
                                                    <?php
                    if ($stylist_info['sat_200_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_200_pm'] === 'no') {
                      echo "<input type='radio' name='sat_200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_200_pm'] === '') {
                      echo "<input type='radio' name='sat_200_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_215_pm">Sat 2:15 pm
                                                    <?php
                    if ($stylist_info['sat_215_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_215_pm'] === 'no') {
                      echo "<input type='radio' name='sat_215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_215_pm'] === '') {
                      echo "<input type='radio' name='sat_215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_230_pm">Sat 2:30 pm
                                                    <?php
                    if ($stylist_info['sat_230_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_230_pm'] === 'no') {
                      echo "<input type='radio' name='sat_230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_230_pm'] === '') {
                      echo "<input type='radio' name='sat_230_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_245_pm">Sat 2:45 pm
                                                    <?php
                    if ($stylist_info['sat_245_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_245_pm'] === 'no') {
                      echo "<input type='radio' name='sat_245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_245_pm'] === '') {
                      echo "<input type='radio' name='sat_245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_300_pm">Sat 3:00 pm
                                                    <?php
                    if ($stylist_info['sat_300_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_300_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_300_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_300_pm'] === 'no') {
                      echo "<input type='radio' name='sat_300_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_300_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_300_pm'] === '') {
                      echo "<input type='radio' name='sat_300_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_300_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_315_pm">Sat 3:15 pm
                                                    <?php
                    if ($stylist_info['sat_315_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_315_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_315_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_315_pm'] === 'no') {
                      echo "<input type='radio' name='sat_315_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_315_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_315_pm'] === '') {
                      echo "<input type='radio' name='sat_315_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_315_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_330_pm">Sat 3:30 pm
                                                    <?php
                    if ($stylist_info['sat_330_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_330_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_330_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_330_pm'] === 'no') {
                      echo "<input type='radio' name='sat_330_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_330_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_330_pm'] === '') {
                      echo "<input type='radio' name='sat_330_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_330_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_345_pm">Sat 3:45 pm
                                                    <?php
                    if ($stylist_info['sat_345_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_345_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_345_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_345_pm'] === 'no') {
                      echo "<input type='radio' name='sat_345_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_345_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_345_pm'] === '') {
                      echo "<input type='radio' name='sat_345_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_345_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_400_pm">Sat 4:00 pm
                                                    <?php
                    if ($stylist_info['sat_400_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_400_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_400_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_400_pm'] === 'no') {
                      echo "<input type='radio' name='sat_400_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_400_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_400_pm'] === '') {
                      echo "<input type='radio' name='sat_400_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_400_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_415_pm">Sat 4:15 pm
                                                    <?php
                    if ($stylist_info['sat_415_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_415_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_415_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_415_pm'] === 'no') {
                      echo "<input type='radio' name='sat_415_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_415_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_415_pm'] === '') {
                      echo "<input type='radio' name='sat_415_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_415_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_430_pm">Sat 4:30 pm
                                                    <?php
                    if ($stylist_info['sat_430_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_430_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_430_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_430_pm'] === 'no') {
                      echo "<input type='radio' name='sat_430_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_430_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_430_pm'] === '') {
                      echo "<input type='radio' name='sat_430_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_430_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_445_pm">Sat 4:45 pm
                                                    <?php
                    if ($stylist_info['sat_445_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_445_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_445_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_445_pm'] === 'no') {
                      echo "<input type='radio' name='sat_445_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_445_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_445_pm'] === '') {
                      echo "<input type='radio' name='sat_445_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_445_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_500_pm">Sat 5:00 pm
                                                    <?php
                    if ($stylist_info['sat_500_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_500_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_500_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_500_pm'] === 'no') {
                      echo "<input type='radio' name='sat_500_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_500_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_500_pm'] === '') {
                      echo "<input type='radio' name='sat_500_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_500_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_515_pm">Sat 5:15 pm
                                                    <?php
                    if ($stylist_info['sat_515_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_515_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_515_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_515_pm'] === 'no') {
                      echo "<input type='radio' name='sat_515_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_515_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_515_pm'] === '') {
                      echo "<input type='radio' name='sat_515_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_515_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_530_pm">Sat 5:30 pm
                                                    <?php
                    if ($stylist_info['sat_530_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_530_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_530_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_530_pm'] === 'no') {
                      echo "<input type='radio' name='sat_530_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_530_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_530_pm'] === '') {
                      echo "<input type='radio' name='sat_530_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_530_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_545_pm">Sat 5:45 pm
                                                    <?php
                    if ($stylist_info['sat_545_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_545_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_545_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_545_pm'] === 'no') {
                      echo "<input type='radio' name='sat_545_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_545_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_545_pm'] === '') {
                      echo "<input type='radio' name='sat_545_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_545_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                            </div>
                                            <div>
                                                <label style="margin:0 0 5px 0" for="sat_600_pm">Sat 6:00 pm
                                                    <?php
                    if ($stylist_info['sat_600_pm'] === 'yes') {
                      echo "<input type='radio' name='sat_600_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sat_600_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_600_pm'] === 'no') {
                      echo "<input type='radio' name='sat_600_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sat_600_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sat_600_pm'] === '') {
                      echo "<input type='radio' name='sat_600_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sat_600_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>

                                                    <!-- Sun -->

                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_900_am">Sun 9:00 am
                                                            <?php
                    if ($stylist_info['sun_900_am'] === 'yes') {
                      echo "<input type='radio' name='sun_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_900_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_900_am'] === 'no') {
                      echo "<input type='radio' name='sun_900_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_900_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_900_am'] === '') {
                      echo "<input type='radio' name='sun_900_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_900_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_915_am">Sun 9:15 am
                                                            <?php
                    if ($stylist_info['sun_915_am'] === 'yes') {
                      echo "<input type='radio' name='sun_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_915_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_915_am'] === 'no') {
                      echo "<input type='radio' name='sun_915_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_915_am' id='no' value='no' checked>
                        No
                        </label>";
                    }  elseif ($stylist_info['sun_915_am'] === '') {
                      echo "<input type='radio' name='sun_915_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_915_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_930_am">Sun 9:30 am
                                                            <?php
                    if ($stylist_info['sun_930_am'] === 'yes') {
                      echo "<input type='radio' name='sun_930_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_930_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_930_am'] === 'no') {
                      echo "<input type='radio' name='sun_930_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_930_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_930_am'] === '') {
                      echo "<input type='radio' name='sun_930_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_930_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_945_am">Sun 9:45 am
                                                            <?php
                    if ($stylist_info['sun_945_am'] === 'yes') {
                      echo "<input type='radio' name='sun_945_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_945_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_945_am'] === 'no') {
                      echo "<input type='radio' name='sun_945_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_945_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_945_am'] === '') {
                      echo "<input type='radio' name='sun_945_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_945_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_1000_am">Sun 10:00 am
                                                            <?php
                    if ($stylist_info['sun_1000_am'] === 'yes') {
                      echo "<input type='radio' name='sun_1000_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_1000_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1000_am'] === 'no') {
                      echo "<input type='radio' name='sun_1000_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_1000_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1000_am'] === '') {
                      echo "<input type='radio' name='sun_1000_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_1000_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_1015_am">Sun 10:15 am
                                                            <?php
                    if ($stylist_info['sun_1015_am'] === 'yes') {
                      echo "<input type='radio' name='sun_1015_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_1015_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1015_am'] === 'no') {
                      echo "<input type='radio' name='sun_1015_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_1015_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1015_am'] === '') {
                      echo "<input type='radio' name='sun_1015_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_1015_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_1030_am">Sun 10:30 am
                                                            <?php
                    if ($stylist_info['sun_1030_am'] === 'yes') {
                      echo "<input type='radio' name='sun_1030_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_1030_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1030_am'] === 'no') {
                      echo "<input type='radio' name='sun_1030_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_1030_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1030_am'] === '') {
                      echo "<input type='radio' name='sun_1030_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_1030_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_1045_am">Sun 10:45 am
                                                            <?php
                    if ($stylist_info['sun_1045_am'] === 'yes') {
                      echo "<input type='radio' name='sun_1045_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_1045_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1045_am'] === 'no') {
                      echo "<input type='radio' name='sun_1045_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_1045_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1045_am'] === '') {
                      echo "<input type='radio' name='sun_1045_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_1045_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_1100_am">Sun 11:00 am
                                                            <?php
                    if ($stylist_info['sun_1100_am'] === 'yes') {
                      echo "<input type='radio' name='sun_1100_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_1100_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1100_am'] === 'no') {
                      echo "<input type='radio' name='sun_1100_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_1100_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1100_am'] === '') {
                      echo "<input type='radio' name='sun_1100_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_1100_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_1115_am">Sun 11:15 am
                                                            <?php
                    if ($stylist_info['sun_1115_am'] === 'yes') {
                      echo "<input type='radio' name='sun_1115_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_1115_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1115_am'] === 'no') {
                      echo "<input type='radio' name='sun_1115_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_1115_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1115_am'] === '') {
                      echo "<input type='radio' name='sun_1115_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_1115_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_1130_am">Sun 11:30 am
                                                            <?php
                    if ($stylist_info['sun_1130_am'] === 'yes') {
                      echo "<input type='radio' name='sun_1130_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_1130_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1130_am'] === 'no') {
                      echo "<input type='radio' name='sun_1130_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_1130_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1130_am'] === '') {
                      echo "<input type='radio' name='sun_1130_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_1130_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_1145_am">Sun 11:45 am
                                                            <?php
                    if ($stylist_info['sun_1145_am'] === 'yes') {
                      echo "<input type='radio' name='sun_1145_am' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_1145_am' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1145_am'] === 'no') {
                      echo "<input type='radio' name='sun_1145_am' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_1145_am' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1145_am'] === '') {
                      echo "<input type='radio' name='sun_1145_am' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_1145_am' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_1200_pm">Sun 12:00 pm
                                                            <?php
                    if ($stylist_info['sun_1200_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_1200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1200_pm'] === 'no') {
                      echo "<input type='radio' name='sun_1200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_1200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1200_pm'] === '') {
                      echo "<input type='radio' name='sun_1200_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='sun_1200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_1215_pm">Sun 12:15 pm
                                                            <?php
                    if ($stylist_info['sun_1215_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_1215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1215_pm'] === 'no') {
                      echo "<input type='radio' name='sun_1215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_1215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1215_pm'] === '') {
                      echo "<input type='radio' name='sun_1215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_1215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_1230_pm">Sun 12:30 pm
                                                            <?php
                    if ($stylist_info['sun_1230_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_1230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1230_pm'] === 'no') {
                      echo "<input type='radio' name='sun_1230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_1230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1230_pm'] === '') {
                      echo "<input type='radio' name='sun_1230_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='sun_1230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_1245_pm">Sun 12:45 pm
                                                            <?php
                    if ($stylist_info['sun_1245_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_1245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1245_pm'] === 'no') {
                      echo "<input type='radio' name='sun_1245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_1245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_1245_pm'] === '') {
                      echo "<input type='radio' name='sun_1245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_1245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_100_pm">Sun 1:00 pm
                                                            <?php
                    if ($stylist_info['sun_100_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_100_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_100_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_100_pm'] === 'no') {
                      echo "<input type='radio' name='sun_100_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_100_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_100_pm'] === '') {
                      echo "<input type='radio' name='sun_100_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='sun_100_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_115_pm">Sun 1:15 pm
                                                            <?php
                    if ($stylist_info['sun_115_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_115_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_115_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_115_pm'] === 'no') {
                      echo "<input type='radio' name='sun_115_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_115_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_115_pm'] === '') {
                      echo "<input type='radio' name='sun_115_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='sun_115_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_130_pm">Sun 1:30 pm
                                                            <?php
                    if ($stylist_info['sun_130_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_130_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_130_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_130_pm'] === 'no') {
                      echo "<input type='radio' name='sun_130_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_130_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_130_pm'] === '') {
                      echo "<input type='radio' name='sun_130_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='sun_130_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_145_pm">Sun 1:45 pm
                                                            <?php
                    if ($stylist_info['sun_145_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_145_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_145_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_145_pm'] === 'no') {
                      echo "<input type='radio' name='sun_145_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_145_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_145_pm'] === '') {
                      echo "<input type='radio' name='sun_145_pm' id='yes' value='yes'  checked>
                        Yes
                        <input type='radio' name='sun_145_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_200_pm">Sun 2:00 pm
                                                            <?php
                    if ($stylist_info['sun_200_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_200_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_200_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_200_pm'] === 'no') {
                      echo "<input type='radio' name='sun_200_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_200_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_200_pm'] === '') {
                      echo "<input type='radio' name='sun_200_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_200_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_215_pm">Sun 2:15 pm
                                                            <?php
                    if ($stylist_info['sun_215_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_215_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_215_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_215_pm'] === 'no') {
                      echo "<input type='radio' name='sun_215_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_215_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_215_pm'] === '') {
                      echo "<input type='radio' name='sun_215_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_215_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_230_pm">Sun 2:30 pm
                                                            <?php
                    if ($stylist_info['sun_230_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_230_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_230_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_230_pm'] === 'no') {
                      echo "<input type='radio' name='sun_230_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_230_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_230_pm'] === '') {
                      echo "<input type='radio' name='sun_230_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_230_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_245_pm">Sun 2:45 pm
                                                            <?php
                    if ($stylist_info['sun_245_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_245_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_245_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_245_pm'] === 'no') {
                      echo "<input type='radio' name='sun_245_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_245_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_245_pm'] === '') {
                      echo "<input type='radio' name='sun_245_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_245_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_300_pm">Sun 3:00 pm
                                                            <?php
                    if ($stylist_info['sun_300_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_300_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_300_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_300_pm'] === 'no') {
                      echo "<input type='radio' name='sun_300_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_300_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_300_pm'] === '') {
                      echo "<input type='radio' name='sun_300_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_300_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_315_pm">Sun 3:15 pm
                                                            <?php
                    if ($stylist_info['sun_315_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_315_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_315_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_315_pm'] === 'no') {
                      echo "<input type='radio' name='sun_315_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_315_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_315_pm'] === '') {
                      echo "<input type='radio' name='sun_315_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_315_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_330_pm">Sun 3:30 pm
                                                            <?php
                    if ($stylist_info['sun_330_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_330_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_330_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_330_pm'] === 'no') {
                      echo "<input type='radio' name='sun_330_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_330_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_330_pm'] === '') {
                      echo "<input type='radio' name='sun_330_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_330_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_345_pm">Sun 3:45 pm
                                                            <?php
                    if ($stylist_info['sun_345_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_345_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_345_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_345_pm'] === 'no') {
                      echo "<input type='radio' name='sun_345_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_345_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_345_pm'] === '') {
                      echo "<input type='radio' name='sun_345_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_345_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_400_pm">Sun 4:00 pm
                                                            <?php
                    if ($stylist_info['sun_400_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_400_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_400_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_400_pm'] === 'no') {
                      echo "<input type='radio' name='sun_400_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_400_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_400_pm'] === '') {
                      echo "<input type='radio' name='sun_400_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_400_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_415_pm">Sun 4:15 pm
                                                            <?php
                    if ($stylist_info['sun_415_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_415_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_415_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_415_pm'] === 'no') {
                      echo "<input type='radio' name='sun_415_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_415_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_415_pm'] === '') {
                      echo "<input type='radio' name='sun_415_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_415_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_430_pm">Sun 4:30 pm
                                                            <?php
                    if ($stylist_info['sun_430_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_430_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_430_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_430_pm'] === 'no') {
                      echo "<input type='radio' name='sun_430_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_430_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_430_pm'] === '') {
                      echo "<input type='radio' name='sun_430_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_430_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_445_pm">Sun 4:45 pm
                                                            <?php
                    if ($stylist_info['sun_445_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_445_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_445_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_445_pm'] === 'no') {
                      echo "<input type='radio' name='sun_445_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_445_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_445_pm'] === '') {
                      echo "<input type='radio' name='sun_445_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_445_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_500_pm">Sun 5:00 pm
                                                            <?php
                    if ($stylist_info['sun_500_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_500_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_500_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_500_pm'] === 'no') {
                      echo "<input type='radio' name='sun_500_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_500_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_500_pm'] === '') {
                      echo "<input type='radio' name='sun_500_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_500_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_515_pm">Sun 5:15 pm
                                                            <?php
                    if ($stylist_info['sun_515_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_515_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_515_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_515_pm'] === 'no') {
                      echo "<input type='radio' name='sun_515_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_515_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_515_pm'] === '') {
                      echo "<input type='radio' name='sun_515_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_515_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_530_pm">Sun 5:30 pm
                                                            <?php
                    if ($stylist_info['sun_530_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_530_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_530_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_530_pm'] === 'no') {
                      echo "<input type='radio' name='sun_530_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_530_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_530_pm'] === '') {
                      echo "<input type='radio' name='sun_530_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_530_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_545_pm">Sun 5:45 pm
                                                            <?php
                    if ($stylist_info['sun_545_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_545_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_545_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_545_pm'] === 'no') {
                      echo "<input type='radio' name='sun_545_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_545_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_545_pm'] === '') {
                      echo "<input type='radio' name='sun_545_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_545_pm' id='no' value='no'>
                        No
                        </label>";
                    }
                    ?>
                                                    </div>
                                                    <div>
                                                        <label style="margin:0 0 5px 0" for="sun_600_pm">Sun 6:00 pm
                                                            <?php
                    if ($stylist_info['sun_600_pm'] === 'yes') {
                      echo "<input type='radio' name='sun_600_pm' id='yes' value='yes' checked >
                        Yes
                        <input type='radio' name='sun_600_pm' id='no' value='no'>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_600_pm'] === 'no') {
                      echo "<input type='radio' name='sun_600_pm' id='yes' value='yes'>
                        Yes
                        <input type='radio' name='sun_600_pm' id='no' value='no' checked>
                        No
                        </label>";
                    } elseif ($stylist_info['sun_600_pm'] === '') {
                      echo "<input type='radio' name='sun_600_pm' id='yes' value='yes' checked>
                        Yes
                        <input type='radio' name='sun_600_pm' id='no' value='no'>
                        No
                        </label>";
                    }

                    ?>
                                                    </div>
                                            </div>

                                        </div>
                                        <button type="submit" name="submit_update_stylist_info"
                                            class="btn btn-blk">Update
                                            <?= $stylist_info['stylist_name'] ?> Info</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
    </section>
</body>

</html>