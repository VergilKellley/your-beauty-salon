<?php
require "backend/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="stylist_info_container" style="height: 100vh; display:grid; place-items:center;">
    <h3><a href="admin.php"><-- Back</a></h3>
        <div style="display: flex; gap:4rem">
            <form action="backend/add_new_stylist_info.php" class="stylist_form" method="POST">
                <div>
                    <p>Add/Edit Service</p>
                </div>
                <div style="display: flex; flex-direction:column; gap:1rem">
                    <label for="stylist_name">Stylist Name</label>
                    <input type="text" name="stylist_name" id="stylist_name" placeholder="John Doe">

                    <label for="stylist_email">Email</label>
                    <input type="email" name="stylist_email" placeholder="JohnDoe@yoursalonname.com">

                    <label for="stylist_hours_textarea">Stylist Hours and Notes</label>
                    <textarea name="stylist_hours_textarea" id="" cols="30" rows="10" class="stylist_hours_textarea" style="resize: none" placeholder="Mon - Fri: 9am - 5pm Sun: By appointment only"></textarea>

                    <button name="submit_new_stylist_info" class="btn">Submit</button>
                </div>
            </form>
            <div>
                <div>
                    <p>Update Stylist Info</p>
                </div>
                <div style="display: flex; flex-direction:column; gap:1rem">
                    <?php
                    $stylist_info_query = "SELECT * FROM stylist_info";
                    $stylist_all_info = mysqli_query($conn, $stylist_info_query);
                    ?>
                    <?php while ($stylist = mysqli_fetch_assoc($stylist_all_info)) : ?>
                        <input type="hidden" name="id" value="<?php $tylist['stylist_id'] ?>">
                        <td><?= $stylist['stylist_name'] ?></td>
                        <br>
                        <td><?= $stylist['stylist_email'] ?></td>
                        <br>
                        <td><?= $stylist['stylist_hours_textarea'] ?></td>
                        <?php
                        echo "<td><a href='backend/update_stylist_info.php?id=" . $stylist['id'] . "class='btn sm'>Edit</a></td>";
                        ?>
                    <?php endwhile ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>