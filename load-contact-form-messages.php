<?php
require "backend/db.php";

            $messageNewCount = $_POST['messageNewCount'];

            $contact_form_message_query = "SELECT * FROM contact_form_message ORDER BY message_date DESC LIMIT $messageNewCount";

            $contact_form_message_result = mysqli_query($conn, $contact_form_message_query);

            if (mysqli_num_rows($contact_form_message_result) > 0) {
                    echo "<table>
                            <tr>
                                <th style='min-width:80px'>Date</th>
                                <th style='min-width:150px'>Name</th>
                                <th style='min-width:80px'>Phone</th>
                                <th style='min-width:150px'>Email</th>
                                <th style='min-width:180px'>Message</th>
                                <th>Delete</th>
                            </tr>";
                while($row = mysqli_fetch_assoc($contact_form_message_result)) {
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
                echo 'No messages made.';
            }