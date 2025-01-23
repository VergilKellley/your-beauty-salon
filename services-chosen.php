<?php
session_start();
require "backend/db.php";

if (!isset($_SESSION["user_id"])) {

    header("location: index");
    exit();
}
// if (!isset($_SESSION["useruid"])) {

//     header("Location: index.php");
// }
// require "backend/db.php";
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
    <section class="services_chosen_container" style="height: 100vh; display:grid; place-items:center;">
        <h3 style='padding-top: 40px'><a href="edit-homepage">Back</a>
        </h3>
        <div id='form-container' style="display: flex; gap:4rem">
            <form action="backend/add_new_services_info.php" class="services_form" method="POST" enctype="multipart/form-data">
                <div>
                    <h2>add new service</h2>
                </div>
                <br>
                <div style="display: flex; flex-direction:column; gap:1rem">

                    <label for="services_description">image</label>
                    <input type="file" name="image">

                    <label for="service_img_desc">image description</label>
                    <input type="text" name="service_img_desc">

                    <label for="service_title">service title</label>
                    <input type="text" name="service_title" id="service_title" placeholder="Haircuts">

                    <label for="services-description">service description</label>
                    <textarea name="services_description" id="" cols="30" rows="10" class="services_hours_textarea"
                        style="resize: none" placeholder="Haircuts by skilled professionals"></textarea>

                    <label for="service-price">price</label>
                    <input type="text" name="service_price" placeholder="20">

                    <label for="service_time">service time</label>
                    <input type="number" name="service_time" placeholder="20" max="1000" min="5">

                    <button style='margin-top: 20px' name="submit_new_service_info" class="btn btn-blk">Submit</button>
                </div>
            </form>
            <div style="max-width:400px; min-width:300px">
                <div>
                    <h2>edit services</h2>
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
                <div style="display: flex; flex-direction:column; gap:1rem; height:600px; border:1px solid #333; overflow-y:scroll; padding:10px;">
                    <?php
                    $services_chosen_query = "SELECT * FROM services_chosen";
                    $services_all_info = mysqli_query($conn, $services_chosen_query);
                    ?>
                    <?php while ($services = mysqli_fetch_assoc($services_all_info)) : ?>
                    <div class='nth-child-bkgd-color' style='border:1px solid #333; padding: 10px; line-height:1.5;'>
                        
                        <input type="hidden" name="id" value="<?php $services['id'] ?>">

                        <div id='edit<?php $services['id'] ?>'>
                    <?php
                        if(isset($_SESSION['empty_edit_image'])) {
                            echo "<div style='border:1px solid red; padding:10px'>
                                    <p style='color:red;font-weight:bold; font-size:2rem';>" . $_SESSION['empty_edit_image'] . "</p>";
                            unset ($_SESSION['empty_edit_image']);
                        }
                    ?>
                    </div>


                        <td><strong>image: </strong></td>
                        <br>
                        <td><img style="max-width:200px" src="images/<?= $services['service_img'] ?>" alt=""></td>
                        <br>
                        <td><strong>image description: </strong><?= $services['service_img_desc'] ?></td>
                        <br>
                        <td><strong>title: </strong><?= $services['service_title'] ?></td>
                        <br>
                        <td><strong>service description: </strong><?= $services['services_description'] ?></td>
                        <br>
                        <td><strong>price: </strong><?= $services['service_price'] ?></td>
                        <br>
                        <td><strong>service duration (in minutes): </strong><?= $services['service_time'] ?></td>
                        
                        <?php
                        echo "<div style='display:flex; margin-top:20px'>
                        <td><a class='btn btn-edit' href='backend/update_chosen_services_info?id=" . $services['id'] . "'>Edit</a></td>
                        
                        <form action='backend/delete_services.php' method='POST'>
                                        <button class='btn btn-delete' style='margin-left:20px' id='services-delete-btn' type='submit' name='submit_services_delete_btn' value='" . $services['id'] . "'> Delete</button>
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