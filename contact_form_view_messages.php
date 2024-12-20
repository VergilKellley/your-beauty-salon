<?php
session_start();
require "backend/db.php";
// if (!isset($_SESSION["useruid"])) {

//     header("Location: index.php");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Delete from table tutorial https://www.youtube.com/watch?v=VgsBUHKjt1s -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery CDN -->
    <script src='https://code.jquery.com/jquery-3.7.1.min.js'
        integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>
    <title>Document</title>
    <script>
    $(document).ready(function() {
        var messageCount = 5;
        $("button").click(function() {
            messageCount = messageCount + 5;
            $("#add-messages").load("load-contact-form-messages.php", {
                messageNewCount: messageCount
            });
        });
    });
    </script>
    <style>
    table {
        border-spacing: 10px;
        border-collapse: separate;
    }

    table tr th {
        background-color: lightgray;
        padding: 8px;
    }

    table tr:nth-child(odd) {
        background-color: #eeeeee;
    }
    </style>
</head>

<body style='display:flex; justify-content:center; align-items:center'>
    <div style="margin: 0 auto; overflow-x:auto;">
        <a href="edit-website"><--Back</a>
        <br>
        <br>
        <button type="submit" style="padding:5px 8px; width: 200px">Show more messages</button>
        <div style="background:e0e0e0; border:1px solid #333; margin-top: 20px; padding:20px; overflow-x:scroll; width:fit-content" id="messages">

            <div id="add-messages">
                <?php
            $contact_message_received_query = "SELECT * FROM contact_form_message ORDER BY message_date DESC LIMIT 5";

                $contact_message_result = mysqli_query($conn, $contact_message_received_query);

                if (mysqli_num_rows($contact_message_result) > 0) {
                        echo "<table>
                                <tr>
                                    <th style='min-width:150px'>Date</th>
                                    <th style='min-width:150px'>Name</th>
                                    <th style='min-width:80px'>Phone</th>
                                    <th style='min-width:150px'>Email</th>
                                    <th style='min-width:180px'>Message</th>
                                    <th>Delete</th>
                                </tr>";
                    while($row = mysqli_fetch_assoc($contact_message_result)) {
                        $row['id'];
                        echo "<tr>
                                <td>" . $row['message_date'] . "</td>                             
                                <td>" . $row['contact_form_name'] . "</td>                              
                                <td>" . $row['contact_form_phone'] . "</td>
                                <td>" . $row['contact_form_email'] . "</td>
                                <td>" . $row['contact_form_message'] . "</td>
                                <td style='text-align:center'>
                                    <form action='backend\delete_messages.php' method='POST'>
                                        <button id='message-delete-btn' type='submit' name='submit_message_delete_btn' value='" . $row['id'] . "'>Delete</button>
                                    </form>
                                </td>";
                            "</tr>
                        </table>";
                    }
                } else {
                    echo 'There are no messages.';
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>