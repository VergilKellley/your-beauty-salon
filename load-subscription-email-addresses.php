<?php
require "backend/db.php";

            $messageNewCount = $_POST['emailNewCount'];

            $email_subscriptions_query = "SELECT * FROM subscriptions ORDER BY date_added DESC LIMIT $messageNewCount";

            $email_subscriptions_result = mysqli_query($conn, $email_subscriptions_query);

            if (mysqli_num_rows($email_subscriptions_result) > 0) {
                    echo "<table>
                            <tr>
                                <th style='min-width:80px'>Date</th>
                                <th style='min-width:150px'>Email</th>
                                <th>Delete</th>
                            </tr>";
                while($row = mysqli_fetch_assoc($email_subscriptions_result)) {
                    $row['id'];
                    echo "<tr>
                            <td>" . $row['date_added'] . "</td>
                                <td>" . $row['email_address'] . "</td>
                            <td style='text-align:center'>
                                <form action='backend\delete_subscription_emails.php' method='POST'>
                                    <button id='message-delete-btn' type='submit' name='submit_subscription_email_delete_btn' value='" . $row['id'] . "'>Delete</button>
                                </form>
                            </td>";
                        "</tr>
                    </table>";
                }
            } else {
                echo 'No subscription emails available.';
            }