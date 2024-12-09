<?php
require "backend/db.php";

            $appointmentNewCount = $_POST['appointmentNewCount'];

            $appiontments_made_query = "SELECT * FROM appointments ORDER BY time_booked DESC LIMIT $appointmentNewCount";

            $appiontments_made_result = mysqli_query($conn, $appiontments_made_query);

            if (mysqli_num_rows($appiontments_made_result) > 0) {
                    echo "<table>
                            <tr>
                                <th style='min-width:80px'>Date</th>
                                <th>Day</th>
                                <th style='min-width:60px'>Time</th>
                                <th>Technician</th> 
                                <th style='min-width:150px'>Service</th>
                                <th style='min-width:150px'>Name</th>
                                <th style='min-width:150px'>Email</th>
                                <th style='min-width:80px'>Phone</th>
                                <th style='min-width:180px'>Notes</th>
                                <th style='min-width:80px'>Time</th>
                                <th>Delete</th>
                            </tr>";
                while($row = mysqli_fetch_assoc($appiontments_made_result)) {
                    $row['id'];
                    echo "<tr>
                            <td>" . $row['event_date'] . "</td>
                                <td>" . $row['event_day'] . "</td>
                                <td>" . $row['time_available'] . "</td>
                                <td>" . $row['stylist_name'] . "</td>                              
                                <td>" . $row['services_title'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['phone'] . "</td>
                                <td>" . $row['messages'] . "</td>
                                <td>" . $row['time_booked'] . "</td>
                            <td style='text-align:center'>
                                <form action='backend\delete_appointments.php' method='POST'>
                                    <button id='appointment-delete-btn' type='submit' name='submit_appointment_delete_btn' value='" . $row['id'] . "'>Delete</button>
                                </form>
                            </td>";
                        "</tr>
                    </table>";
                }
            } else {
                echo 'No appointments made.';
            }