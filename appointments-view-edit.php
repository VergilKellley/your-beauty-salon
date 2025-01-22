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
        var appointmentCount = 5;
        $("button").click(function() {
            appointmentCount = appointmentCount + 5;
            $("#add-appointments").load("load-appointments.php", {
                appointmentNewCount: appointmentCount
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
        <a href="edit-homepage">Back</a>
        <br>
        <br>
        <button type="submit" style="padding:5px 8px; width: 200px">Show more appointments</button>
        <div style="background:e0e0e0; border:1px solid #333; margin-top: 20px; padding:20px; overflow-x:scroll; width:fit-content" id="appointments">

            <div id="add-appointments">
                <?php
            $appiontments_made_query = "SELECT * FROM appointments ORDER BY time_booked DESC LIMIT 5";

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
                    echo 'There are no appointments.';
                }
            ?>
            </div>
        </div>
    </div>
</body>

</html>