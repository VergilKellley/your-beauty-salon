<?php
session_start();
require "backend/db.php";
// if (!isset($_SESSION["useruid"])) {

//     header("Location: index.php");
// }
require "backend/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing:border-box;
        }

        input {
            font-size: 16px;
            padding: 12px 18px;
        }

        textarea {
            padding: 10px;
            font-size: 16px !important;
        }
        .nth-child-bkgd-color:nth-child(even) {
            background-color: #ededed;
        }

        a {
            text-decoration: none;
            line-height: normal !important;
            text-align: center
        }
        /* .nth-child-bkgd-color:nth-child(even) {
            background-color: #ededed;
        } */

        .btn {
            width: 100px;
            padding: 12px 16px;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-blk {
            background-color: #333;
            color: #fff;
        }

        .btn-blk:hover {
            background-color: #fff;
            color: #333;
        }
        .btn-edit {
            background-color: green;
            color: #fff;
        }

        .btn-edit:hover {
            background-color: #fff;
            color: green;
            border: 1px solid green
        }
        .btn-delete {
            background-color: red;
            color: #fff;
        }

        .btn-delete:hover {
            background-color: #fff;
            color: red;
            border: 1px solid red;
        }

        @media (max-width:550px) {
            #form-container {
                flex-direction: column;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <section class="stylist_info_container" style="height: 100vh; display:grid; place-items:center;">
        <h3 style='padding-top: 40px'><a href="/">Back</a>
        </h3>
        <div id='form-container' style="display: flex; gap:4rem">
            <form action="backend/add_new_stylist_info.php" class="stylist_form" method="POST" enctype="multipart/form-data">
                <div>
                    <h2>Add New Technician</h2>
                </div>
                <br>
                <div style="display: flex; flex-direction:column; gap:1rem">

                    <label for="services_description">image</label>
                    <input type="file" name="image">

                    <label for="stylist_img_alt">image description</label>
                    <input type="text" name="stylist_img_alt">

                    <label for="stylist_name">Technician Name</label>
                    <input type="text" name="stylist_name" id="stylist_name" placeholder="John Doe">

                    <label for="stylist_name">Technician Title</label>
                    <input type="text" name="stylist_title" id="stylist_title" placeholder="Stylist or Technician">

                    <label for="stylist_email">Email</label>
                    <input type="email" name="stylist_email" placeholder="JohnDoe@yoursalonname.com">

                    <label for="stylist_hours_textarea">Technician Notes</label>
                    <textarea name="stylist_hours_textarea" id="" cols="30" rows="10" class="stylist_hours_textarea"
                        style="resize: none" placeholder="Mon - Fri 10am to 6pm Saturdays by appointment only"></textarea>

                    <button style='margin-top: 20px' name="submit_new_stylist_info" class="btn btn-blk">Submit</button>
                </div>
            </form>
            <div>
                <div>
                    <h2>Edit Technician Name, Email & Hours</h2>
                    <br>
                    <div id='edit'>
                    <?php
                        if(isset($_SESSION['empty_image'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_image'] . "</p>";
                            unset ($_SESSION['empty_image']);
                        }
                    ?>
                    </div>  
                </div>
                <br>
                <div style="display: flex; flex-direction:column; gap:1rem; height:500px; border:1px solid #333; overflow-y:scroll; padding:10px;">
                    <?php
                    $stylist_info_query = "SELECT * FROM stylist_info";
                    $stylist_all_info = mysqli_query($conn, $stylist_info_query);
                    ?>
                    <?php while ($stylist = mysqli_fetch_assoc($stylist_all_info)) : ?>
                    <div class='nth-child-bkgd-color' style='border:1px solid #333; padding: 10px; line-height:1.5;'>
                        
                        <input type="hidden" name="id" value="<?php $tylist['stylist_id'] ?>">


                        <td><strong>Image: </strong></td>
                        <br>
                        <td><img style="max-width:200px" src="images/<?= $stylist['stylist_img'] ?>" alt=""></td>
                        <br>
                        <td><strong>Image Description: </strong><?= $stylist['stylist_img_alt'] ?></td>
                        <br>
                        <td><strong>Name: </strong><?= $stylist['stylist_name'] ?></td>
                        <br>
                        <td><strong>Title: </strong><?= $stylist['stylist_title'] ?></td>
                        <br>
                        <td><strong>Email: </strong><?= $stylist['stylist_email'] ?></td>
                        <br>
                        <td><strong>Notes: </strong><?= $stylist['stylist_hours_textarea'] ?></td>
                        
                        <?php
                        echo "<div style='display:flex; margin-top:20px'>
                        <td><a class='btn btn-edit' href='backend/update-stylist-info?id=" . $stylist['id'] . "'>Edit</a></td>
                        
                        <form action='backend/delete_stylist.php' method='POST'>
                                        <button class='btn btn-delete' style='margin-left:20px' id='stylist-delete-btn' type='submit' name='submit_stylist_delete_btn' value='" . $stylist['id'] . "'> Delete</button>
                                    </form>
                                    </div>
                        ";
                        ?>
                        </div>
                        <?php endwhile ?>
                    
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </section>
</body>

</html>