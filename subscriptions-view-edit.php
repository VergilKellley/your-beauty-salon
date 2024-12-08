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
        var emailCount = 5;
        $("button").click(function() {
            emailCount = emailCount + 5;
            $("#add-subscriptions").load("load-subscription-email-addresses.php", {
                emailNewCount: emailCount
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
        <a href="/">Back</a>
        <br>
        <br>
        <button type="submit" style="padding:5px 8px; width: 200px">Show more emails</button>
        <div style="background:e0e0e0; border:1px solid #333; margin-top: 20px; padding:20px; overflow-x:scroll; width:fit-content" id="emails">

            <div id="add-subscriptions">
                <?php
            $emails_added_query = "SELECT * FROM subscriptions ORDER BY date_added DESC LIMIT 5";

            $emails_added_result = mysqli_query($conn, $emails_added_query);

                if (mysqli_num_rows($emails_added_result) > 0) {
                        echo "<table>
                                <tr>
                                    <th style='min-width:80px'>Date</th>
                                    <th style='min-width:80px'>Email</th>
                                    <th>Delete</th>
                                </tr>";
                    while($row = mysqli_fetch_assoc($emails_added_result)) {
                        $row['id'];
                        echo "<tr>
                                <td>" . $row['date_added'] . "</td>
                                <td>" . $row['email_address'] . "</td>
                                <td style='text-align:center'>
                                    <form action='backend/delete_subscription_emails.php' method='POST'>
                                        <button id='subscription-email-delete-btn' type='submit' 
                                        name='submit_subscription_email_delete_btn' value='" . $row['id'] . "'>Delete</button>
                                    </form>
                                </td>";
                            "</tr>
                        </table>";
                    }
                } else {
                    echo 'There are no subscription emails.';
                }
            ?>
            </div>
        </div>
    </div>
</body>

</html>