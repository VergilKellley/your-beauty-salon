<?php
session_start();
require 'backend/db.php';
require 'backend/display_website_colors.php';
require 'backend/display_contact_info.php';

// if (!isset($_SESSION['book'])) {
//     header("Location: index.php");
//     exit;
// }

// $name = $_SESSION['name'];
// $phone = $_SESSION['phone'];
// $email = $_SESSION['email'];

// if ($name == '' || $phone == '' || $email == '') {
//     header('Location: submit-index.php');
// }
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <!-- part 1 https://www.youtube.com/watch?v=6EVgmpm4z5U -->
    <!-- part 2 https://www.youtube.com/watch?v=r1devGCrm2Y -->

    <!-- reCapcha video   -->
    <!-- https://www.youtube.com/watch?v=CKoCRQPfvaY -->
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'
        integrity='sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- jQuery CDN -->
    <script src='https://code.jquery.com/jquery-3.7.1.min.js'
        integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>

    <script src='js/book_appointment.js' defer></script>
    <script src='js/book-appointment-calendar.js' defer></script>
    <script src='js/closeModals.js' defer></script>

    <link rel='stylesheet' href='css/book_appointment.css' />

    <script src="js/closeModals.js" defer></script>
    <title><?= $business_name ?></title>

    <style>
    .next-date {
        visibility: hidden;
    }
    </style>
</head>

<body>
    <br>
    <br>
    <div class='container' id='desk-top-calendar' styles='margin-top:50px'>
        <div class='left'>
            <div style="display:flex;justify-content:center;gap:10px">
                <a style="color:#333;text-decoration:none" href="index"><span
                        style="color:<?= $accent_color ?>">HOME</span></a>
                <a style="color:#333;text-decoration:none" href="#"><span
                        style="color:<?= $accent_color ?>">BOOK NOW</span></a>
                <a style="color:#333;text-decoration:none" href="all-services"><span
                        style="color:<?= $accent_color ?>">SERVICES</span></a>
                <a style="color:#333;text-decoration:none" href="photo-gallery"><span
                        style="color:<?= $accent_color ?>">GALLERY</span></a>
                <a style="color:#333;text-decoration:none" href="about"><span
                        style="color:<?= $accent_color ?>">ABOUT</span></a>
                <a style="color:#333;text-decoration:none" href="index#contact"><span
                        style="color:<?= $accent_color ?>">CONTACT</span></a>
            </div>

            <br>
            <p id='select-a-date-mobile' class='large-font'><span
                    style='color:<?= $accent_color; ?>; font-size: var(--large-font)'>1.</span> <span
                    style="color:#000"> Select Date</span></p>
            <div style='border: 2px solid <?= $accent_color; ?>' class='calendar'>
                <div class='month'>
                    <i class='fa fa-angle-left prev'></i>
                    <div style='display:flex; flex-direction:column; align-items:center'>
                        <h3 style='margin:25px 0 10px; color:<?= $accent_color; ?>'><?= $business_name ?></h3>
                        <div class='date'></div>
                    </div>
                    <i class='fa fa-angle-right next'></i>
                </div>
                <div class='weekdays'>
                    <div>sun</div>
                    <div>mon</div>
                    <div>tue</div>
                    <div>wed</div>
                    <div>thu</div>
                    <div>fri</div>
                    <div>sat</div>
                </div>
                <div class='days' id='unclick'>

                    <!-- days are added using javascript -->
                </div>
                <div class='days'></div>
                <div class='goto-today'>
                    <!-- <div style='border:1px solid <?= $accent_color; ?>; color:<?= $accent_color; ?>' class='goto'>
                        <input type='text' placeholder='mm/yyyy' class='date-input' />
                        <button style='border-left:1px solid <?= $accent_color; ?>; color:<?= $accent_color; ?>' class='goto-btn'>go</button>
                    </div> -->
                    <button style='border:1px solid <?= $accent_color; ?>; color:<?= $accent_color; ?>'
                        class='today-btn'>today</button>
                </div>
            </div>
        </div>


        <!-- ON THE RIGHT SIDE OF CALENDAR PAGE -->
        <div class='right'>

            <form style='display:flex; flex-direction: column; position:relative' id='calendar-form'
                action='submit-index.php' method='POST'>


                <p id='select-service-mobile' class='large-font mt-10 mb-10'><span
                        style='color:<?= $accent_color ?>;font-size:var(--large-font)'>2. </span><span
                        style='color:#000'>Select Services</span></p>
                <p id='select-service-desk-top' class=' mt-10 mb-10'><span
                        style='color:<?= $accent_color; ?>; font-size: var(--large-font)'>1.</span> Select Services</p>
                <div id="select-date-modal" class='select-service-err' style='background-color: <?= $accent_color; ?>; color: #fff; font-size:16px;position:absolute;top: 50%; left:50%; transform:translate(-50%, -50%); height: 50px; width: 70%
                ; text-align:center; font-size:25px; padding-top: 12px;  border-radius: 50px; font-size:16px'>Select a
                    Service <button id="select-date-err-btn"
                        style="position:absolute; right: 10px; height: 20px; width: 20px; font-size: 12px; background-color: <?= $accent_color; ?>; border-radius: 50%; top: -10px; cursor:pointer; color:#fff; border:none"
                        onclick="closeSelectDateModal()">x</button></div>
                <!-- <div class='select-service-err' style='color: red; font-size: 1.2rem;'>Select Services</div> -->
                <div id='services-checkbox-error-message'></div>
                <?php
                    $service_chosen_query = 'SELECT * FROM services_chosen';
                    $service_chosen_info = mysqli_query($conn, $service_chosen_query);
                ?>
                <div
                    style='border-radius: 5px; background-color: <?= $accent_color; ?>; color: #fff; height: 250px; padding: 10px; overflow-y:scroll; border: 2px solid #fff'>
                    <?php while ($service_chosen = mysqli_fetch_assoc($service_chosen_info)) : ?>
                    <div style='margin-bottom: 20px'>

                        <input style='font-size:35px;' type='checkbox' name='services_title[]' class='check'
                            value='<?=$service_chosen['service_title'] ?>'> <?=$service_chosen['service_title'] ?> |

                        <input type='hidden' name='id' value='<?=$service_chosen['id'] ?>'>

                        <input style='font-size:15px;' type='hidden' name='service_price'
                            value='<?=$service_chosen['service_price'] ?>' readonly>$
                        <?=$service_chosen['service_price'] ?>

                        <input style='font-size:15px;' type='hidden' name='service_time'
                            value='<?=$service_chosen['service_time'] ?>' readonly>|
                        <?=$service_chosen['service_time'] ?> min

                        <!-- <span>| <?=$service_chosen['service_time'] ?></span> -->
                        <br>
                        <span><?=$service_chosen['services_description'] ?></span>


                    </div>
                    <?php endwhile ?>

                </div>


                <?php
                        // if(isset($_SESSION['status']))
                        // {
                        //     echo '<div id="success-modal" style="position:absolute; top: 50%; left:50%; transform:translate(-50%, -50%); width: 100%; height: 50px; padding:20px; z-index: 2; border: 1px solid green; background-color: green; border-radius:50px; display: flex; align-items: center; justify-content:center;">
                            
                        //     <button style="position:absolute; top:-10px; right:10px; color:#fff; cursor:pointer; height: 20px; width:20px; background-color: green; border-radius: 50%; border:none; font-size: 12px;"  onclick="closeSuccessModal()">x</button>
                            
                        //     <h3 id="success-modal-text" style="color:#fff; text-align:center; font-size:16px">' . $_SESSION['status'] . '<h3>
                        //     </div>';
                        //     unset($_SESSION['status']);
                        // } 
                        if (isset($_SESSION['stylist-name-empty'])) {
                            echo '<div id="stylist-name-empty-modal" style="position:absolute; top: 50%; left:50%; transform:translate(-50%, -50%); width: 70%; height: 50px; padding:20px; z-index: 2; border: 1px solid green; background-color: red; border-radius:50px; display: flex; align-items: center; justify-content:center; font-size: 16px">
                            
                            <button id="closse-stylist-name-err-btn" style="position:absolute; top:-10px; right:10px; color:#fff; cursor:pointer; height: 20px; width:20px; background-color: red; border-radius: 50%; border:none;"  onclick="closeStylistNameEmptyModal()">x</button>
                            
                            <h3 id="stylist-name-empty-text" style="color:#fff; text-align:center; font-size:16px">' . $_SESSION['stylist-name-empty'] . '</h3>
                            </div>';
                            unset($_SESSION['stylist-name-empty']);
                        }

                        // if (isset($_SESSION['check-date-selected'])) {
                        //     echo '<div id="check-appointment-date-modal" style="position:absolute; top: 30%; left:50%; transform:translateX(-50%); width: 70%; height: 50px; padding:20px; z-index: 2; border: 1px solid green; background-color: red; border-radius:50px; display: flex; align-items: center; justify-content:center; font-size: 16px">
                            
                        //     <button id="closse-check-date-selected-btn" style="position:absolute; top:-10px; right:10px; color:#fff; cursor:pointer; height: 20px; width:20px; background-color: red; border-radius: 50%; border:none;"  onclick="closeCheckDateSelectedModal()">x</button>
                            
                        //     <h3 id="check-date-selected-text" style="color:#fff; text-align:center; font-size:16px">' . $_SESSION['check-date-selected'] . '</h3>
                        //     </div>';
                        //     unset($_SESSION['check-date-selected']);
                        // }
                        // if (isset($_SESSION['select-your-service'])) {
                        //     echo '<div id="select-your-service-modal" style="position:absolute; top: 10%; left:50%; transform:translateX(-50%); width: 70%; height: 50px; padding:20px; z-index: 2; border: 1px solid green; background-color: red; border-radius:50px; display: flex; align-items: center; justify-content:center; font-size: 16px">
                            
                        //     <button id="closse-select-your-service-btn" style="position:absolute; top:-10px; right:10px; color:#fff; cursor:pointer; height: 20px; width:20px; background-color: red; border-radius: 50%; border:none; font-size: 1.5vw;"  onclick="closeSelectYourServiceModal()">x</button>
                            
                        //     <h3 id="select-your-service-text" style="color:#fff; text-align:center; font-size:16px">' . $_SESSION['select-your-service'] . '</h3>
                        //     </div>';
                        //     unset($_SESSION['check-date-selected']);
                        // }
                    ?>
                <script>
                // function closeSuccessModal() {
                //          document.getElementById("success-modal").style.display = "none";
                //          event.preventDefault()
                //     };

                // function closeSelectDateModal() {
                //     event.preventDefault()
                //          document.getElementById("select-date-modal").style.display = "none";
                //          event.preventDefault()
                //     };

                //     function closeStylistNameEmptyModal() {
                //          document.getElementById("stylist-name-empty-modal").style.display = "none";
                //          event.preventDefault()
                //     };

                //     function closeCheckDateSelectedModal() {
                //          document.getElementById("check-appointment-date-modal").style.display = "none";
                //          event.preventDefault()
                //     };

                // function closeSelectYourServiceModal() {
                //      document.getElementById("select-your-service-modal").style.display = "none";
                //      event.preventDefault()
                // };
                </script>

                <div class='today-date'>
                    <p style='margin-top: 20px' id='select-a-date-desk-top' class='large-font'><span
                            style='color:<?= $accent_color; ?>; font-size:var(--large-font)'>2.</span> Select Date</p>
                    <p style='margin-top: 20px' id='date-chosen-mobile'>Date Chosen:</p>




                    <script>
                    function closeChoseValidDateModal() {
                        document.getElementById("valid-date-error").style.display = "none";
                        event.preventDefault()
                    };
                    </script>

                    <!-- <div id='date-input-error' style='color: red; font-size: 1.2rem'></div> -->

                    <div style='display:flex'>
                        <input
                            style='width: 50px; margin-left: 27px; background-color:transparent; border:none; color:#333'
                            id='input-day' class='event-day no-focus' type='text' name='event_day' readonly>
                        <input style='background-color:transparent; border:none; color:#333' id='input-date'
                            class='event-date no-focus' type='text' name='event_date' readonly>
                    </div>
                    <br><br>
                    <div id='time-input-error' style='color: red; font-size: 1.2rem'></div>

                    <div style='display:flex; flex-direction:column; margin-bottom: 20px'>
                        <span class='large-font' id='pick-time'><span
                                style='color:<?= $accent_color; ?>; font-size: var(--large-font)'>3.</span> Select
                            Time</span>
                        <!-- <button id='pick-time'>Choose Time</button> -->
                        <div id='display-mon-time' style='height:50px; margin-left: 40px; margin-top:5px'>
                            <!-- <select id='select-stylist-avail-time' name='select-stylist-time'> -->
                            <select id='select-stylist-avail-time' name='select-stylist-avail-time'>
                                <option value='9:00 am'>9:00 am</option>
                                <option value='9:15 am'>9:15 am</option>
                                <option value='9:30 am'>9:30 am</option>
                                <option value='9:45 am'>9:45 am</option>
                                <option value='10:00 am'>10:00 am</option>
                                <option value='10:15 am'>10:15 am</option>
                                <option value='10:30 am'>10:30 am</option>
                                <option value='10:45 am'>10:45 am</option>
                                <option value='11:00 am'>11:00 am</option>
                                <option value='11:15 am'>11:15 am</option>
                                <option value='11:30 am'>11:30 am</option>
                                <option value='11:45 am'>11:45 am</option>
                                <option value='12:00 pm'>12:00 pm</option>
                                <option value='12:15 pm'>12:15 pm</option>
                                <option value='12:30 pm'>12:30 pm</option>
                                <option value='12:45 pm'>12:45 pm</option>
                                <option value='1:00 pm'>1:00 pm</option>
                                <option value='1:15 pm'>1:15 pm</option>
                                <option value='1:30 pm'>1:30 pm</option>
                                <option value='1:45 pm'>1:45 pm</option>
                                <option value='2:00 pm'>2:00 pm</option>
                                <option value='2:15 pm'>2:15 pm</option>
                                <option value='2:30 pm'>2:30 pm</option>
                                <option value='2:45 pm'>2:45 pm</option>
                                <option value='3:00 pm'>3:00 pm</option>
                                <option value='3:15 pm'>3:15 pm</option>
                                <option value='3:30 pm'>3:30 pm</option>
                                <option value='3:45 pm'>3:45 pm</option>
                                <option value='4:00 pm'>4:00 pm</option>
                                <option value='4:15 pm'>4:15 pm</option>
                                <option value='4:30 pm'>4:30 pm</option>
                                <option value='4:45 pm'>4:45 pm</option>
                                <option value='5:00 pm'>5:00 pm</option>
                                <option value='5:15 pm'>5:15 pm</option>
                                <option value='5:30 pm'>5:30 pm</option>
                                <option value='5:45 pm'>5:45 pm</option>
                                <option value='6:00 pm'>6:00 pm</option>
                            </select>
                        </div>
                    </div>

                    <script>
                    $(document).ready(function() {


                        let pickTime = document.getElementById('pick-time');
                        pickTime.addEventListener('click', function() {
                            const pickDay = document.getElementById('input-day').value;
                            let mon = 'Mon'
                            let tue = 'Tue'
                            let wed = 'Wed';
                            let thu = 'Thu';
                            let fri = 'Fri';
                            let sat = 'Sat';
                            let sun = 'Sun';

                            console.log('star wars on: ', thu);
                        });


                        // HIDE AND SHOW AVAILABLE TIME
                        $('.day').click(function() {
                            $('#show-selected-stylist').hide();
                        });
                        // $('.day').click(function() {
                        //     $('#select-stylist-avail-time').hide();
                        // });



                        // $('.day').click(function() {
                        //     $('.select-stylist-avail-time').toggle();
                        // });
                        // $('#pick-time').click(function() {
                        //     $('#select-stylist-avail-time').show();
                        // });





                        $('#select-stylist-avail-time').click(function() {
                            $('#show-selected-stylist').hide();
                        });
                        $('#select-stylist-btn').click(function() {
                            $('#show-selected-stylist').show()
                        })
                        // $('select-stylist-avail-time').click(function() {
                        //     $('select').attr('name: select-stylist-time');
                        // })

                    });
                    </script>

                    <!-- <p class='medium-font mt-10 mb-10'>Select Technician</p> -->
                    <div>
                        <?php 
                                if ( isset($_GET['success']) && $_GET['success'] == 1 )
                                {
                                    echo 

                                "<div>
                                    <h3 style='color:red; font-size: 1.2rem'; border: 1px solid red>Appointment NOT booked! No technician available at time selected.       
                                </div>";
                                }            
                                ?>
                    </div>
                    <span class='large-font' style='color:<?= $accent_color; ?>; font-size:var(--large-font)'>4. </span>


                    <button style='margin-right: 20px; margin-left: 5px; font-size: 16px; width: 210px;' class='mb-10'
                        type='button' id='select-stylist-btn' name='select_your_technician'>Select Technician</button>

                    <div>
                        <h3></h3>
                    </div>


                    <!-- <div id='no-tech-error' style='color: red; font-size: 1.2rem;'></div>
                    <p></p> -->

                    <select style='margin-left: 56px; width: 210px' id='show-selected-stylist'
                        name='stylist_name'></select>
                </div>


                <script>
                var dayClicked = document.querySelectorAll(".days"); // this element contains more than 1 DOMs.
                for (var i = 0; i < dayClicked.length; i++) {
                    dayClicked[i].onclick = function() {
                        // alert("Now you see the day clicked")};
                        hideSelectedStylist = document.getElementById("show-selected-stylist");
                        hideSelectedStylist.style.display = "none";
                        document.getElementById('show-selected-stylist').value = '';

                    }

                    // document.getElementById('input-day').value = '';
                    // document.getElementById('input-date').value = '';
                }
                </script>
                <!-- This function loads select_stylist.php -->
                <script>
                $(document).ready(function() {

                    // var optionText = document.getElementsByClassName('no-tech-avail-err').value;

                    // $('#select-stylist-btn').click(function() {
                    //     console.log('the option is: ', optionText);
                    //     if (optionText = 'Nooo Technicians Available') {
                    //         $('#submit-appointment-btn').hide();
                    //     } else {
                    //         $('#submit-appointment-btn').show();
                    //     }
                    // });





                    //    let inputDaysSelected = document.querySelector('event-day');
                    $('#select-stylist-btn').click(function() {
                        var inputDays = $('#input-day').val();
                        var inputDate = $('#input-date').val();
                        var stylistTime = $('#select-stylist-avail-time').val();
                        // var techError = $('no-tech-avail-err').innerText;

                        // var monStylistTime = $('.mon-select-stylist-time').val();
                        // var tueStylistTime = $('.tue-select-stylist-time').val();
                        // var wedStylistTime = $('.wed-select-stylist-time').val();
                        // var thurStylistTime = $('.thur-select-stylist-time').val();
                        // var friStylistTime = $('.fri-select-stylist-time').val();
                        // var satStylistTime = $('.sat-select-stylist-time').val();
                        // var sunStylistTime = $('.sun-select-stylist-time').val();
                        var showSelectedStylist = $('#show-selected-stylist').val();
                        // var timeInputError = $('#time-input-error');

                        console.log('this the time: ', stylistTime);
                        // console.log('this the time: ', wedStylistTime);
                        console.log('this the stylist name: ', showSelectedStylist);
                        console.log('this is your day: ', inputDays);
                        console.log('this is your date: ', inputDate);

                        var timeInputError = document.getElementById('time-input-error');

                        // var dateInputErrors = document.getElementById('date-input-error');

                        var technicianInputError = document.getElementById(
                            'technician-input-error');
                        // var noTechAvailErr = document.getElementById('no-tech-avail-err').innerText;

                        $('#show-selected-stylist').load('select_stylist.php', {
                            inputDaysSelected: inputDays,
                            stylistTimeSelected: stylistTime,
                            stylistNameSelected: showSelectedStylist,
                            inputDateSelected: inputDate
                            // tueStylistTimeSelected: tueStylistTime,
                            // wedStylistTimeSelected: wedStylistTime,
                            // thurStylistTimeSelected: thurStylistTime,
                            // friStylistTimeSelected: friStylistTime,
                            // satStylistTimeSelected: satStylistTime,
                            // sunStylistTimeSelected: sunStylistTime
                        });



                        console.log('input day selected: ', inputDays);
                        console.log('the time in davao is: ', stylistTime);


                        // if (noTechAvailErr = 'No Technicians Available') {
                        //     noTechAvailErr.innerText = '';
                        //     alert('No technians available at time selected.');

                        // }



                        //  HERE
                        let dateErrorMessages = [];
                        if (inputDays == '' || inputDate == '') {
                            dateErrorMessages.push(
                                'Select a date on the calendar for your service.');
                        };
                        if (dateErrorMessages.length > 0) {
                            // e.preventDefault();
                            dateInputErrors.innerText = dateErrorMessages.join(', ')
                        };




                        //  HERE
                        // let timeErrorMessages = [];
                        // if (stylistTime == '') {
                        //     timeErrorMessages.push('Select a time for your service.');
                        // };






                        // if (monStylistTime == '' || tueStylistTime == '' || wedStylistTime == '' ||
                        //     thurStylistTime == '' || friStylistTime == '' || satStylistTime == '') {
                        //     timeErrorMessages.push('Select a time for your service.');
                        // };






                        //  HERE
                        // if (timeErrorMessages.length > 0) {
                        //     // e.preventDefault();
                        //     timeInputError.innerText = timeErrorMessages.join(', ')
                        // };





                        //  HERE
                        // let showStylistErrorMessages = [];
                        // if (showSelectedStylist == '') {
                        //     showStylistErrorMessages.push('Select a technician.');
                        // };






                        //  HERE
                        // if (showStylistErrorMessages.length > 0) {
                        //     // e.preventDefault();
                        //     technicianInputError.innerText = showStylistErrorMessages.join(', ')
                        // };


                    });
                });
                </script>




                <script>
                // $(document).ready(function() {
                //     $('#select-stylist-btn').click(function() {
                //         if $('.no-tech-avail-err').val('No Technicians Available') {
                //     alert('no techs avail!');
                //     $('#sumbmit-appointment-btn').hide();
                //    } else {
                //     $('#sumbmit-appointment-btn').show();
                //    }
                //     });
                // });
                </script>



                <!-- <button style='margin-top:40vh' class='medium-font mt-10 mb-10' type='submit'
                        id='select-stylist-btn' name='select_your_technician'>Check Availabilty</button> -->







                <div id='display-form-contents-div' style='margin-top:350px;'>
                    <div>
                        <p class='large-font' style='margin-bottom: 20px; '><span
                                style='color:<?= $accent_color; ?>; font-size: var(--large-font'>5.</span> <span
                                style='color:#333'>Contact Information</span></p>
                    </div>
                    <div id='cust-input-error' style='color: red; font-size: 1.2rem'></div>
                    <label style='display:inline-block; width: 70px; color: #000; margin-bottom:10px'
                        for='name'>Name</label>
                    <input class="book-appointment-contact-inputs" style='width: 100%; margin-bottom:20px;' type="text"
                        name='name' id='name' placeholder='John Smith' required>
                    <!-- <label style='display:inline-block; width: 100px' for='customer_last_name'>Last Name</label>
                    <input style='margin-bottom:10px' id='cust-last-name' type='text' name='customer_last_name'
                        placeholder='Smith'> -->
                    <br>
                    <label style='display:inline-block; width: 70px; color: #000; margin-bottom:10px;'
                        for='phone'>Phone</label>
                    <input class="book-appointment-contact-inputs" style='width: 100%;margin-bottom:20px;' type="text"
                        name='phone' id='phone' placeholder='555-555-5555' required>
                    <br>
                    <label style='display:inline-block; width: 70px;color: #000; margin-bottom:10px;'
                        for='email'>Email</label>
                    <input class="book-appointment-contact-inputs" style='width: 100%;margin-bottom:20px;' type="email"
                        name='email' id='email' placeholder='JohnSmith@gmail.com' required>
                    <br>
                    <div style='display:flex; flex-direction:column; margin-top: 20px'>
                        <label style='margin-bottom: 10px; color:#000' for='messages'>Notes to technician
                            (optional)</label>
                        <textarea style="resize:none" name='messages' cols=' 20' rows='7'></textarea>
                    </div>
                    <button
                        style='width: 90px; margin-top: 10px; color:#fff; border: 1px solid <?= $accent_color; ?>; background:<?= $accent_color; ?>'
                        type='submit' name='submit_appointment' id='submit-appointment-btn'>Next</button>
                </div>
                <div class='events'>
                    add events
                </div>
            </form>
        </div>
        <!-- <script>
    function getInputValueMon900am() {
        // Selecting the input element and get its value 
        var monStylistTime_900_am = document.getElementById('mon-select-stylist-time_900_am').value;

        // Displaying the value
        alert(monStylistTime_900_am);
    }

    function getInputValueMon() {
        // Selecting the input element and get its value 
        var monStylistTime_915_am = document.getElementById('mon-select-stylist-time_915_am').value;

        // Displaying the value
        alert(monStylistTime_915_am);
    }
    </script> -->



        <script>
        $(document).ready(function() {


            //    let inputDaysSelected = document.querySelector('event-day');
            $('#select-stylist-btn').click(function() {
                var inputDays = $('#input-day').val();
                var inputDate = $('#input-date').val();
                // var noTech = $('#no-tech').val();

                // var sunStylistTime = $('#sun-select-stylist-time_915am').val();

                var selectStylistAvailTime = $('#select-stylist-avail-time').val();
                var selectStylistTime =
                    var showSelectedStylist = $('#show-selected-stylist').val();
                var timeInputError = $('#time-input-error');

                console.log('new time:', selectStylistAvailTime);
                console.log('this the avail time: ', selectStylistAvailTime);
                console.log('this the stylist name: ', showSelectedStylist);
                console.log('this is your day: ', inputDays);

                var timeInputError = document.getElementById('time-input-error');

                // var dateInputErrors = document.getElementById('date-input-error');

                var technicianInputError = document.getElementById('technician-input-error');
                var noTechError = document.getElementById('no-tech-error');
                console.log('no tech error: ', noTechError)

                $('#show-selected-stylist').load('select_stylist.php', {
                    inputDaysSelected: inputDays,
                    StylistTimeSelected: selectStylistAvailTime
                    // monStylistTimeSelected_900_am: monStylistTime_900_am,
                });

                console.log('input day selected: ', inputDays);
                console.log('mondays time selectedjjjj: ', selectStylistAvailTime);

                let noTechErrorMessages = [];
                if (noTech == 'No Technicians Available' || noTech == '') {
                    noTechErrorMessages.push('Select another Time or day');
                };
                if (noTechErrorMessages.length > 0) {
                    noTechError.innerText = noTechErrorMessages.join(', ')
                };

                let dateErrorMessages = [];
                if (inputDays == '' || inputDate == '') {
                    dateErrorMessages.push('Select a date on the calendar for your service.');


                    const chooseValidDate = document.createElement("h3");
                    chooseValidDate.innerHTML = "Choose a valid date.";

                    // Append to another element:
                    validDateError = document.getElementById("valid-date-error")
                    validDateError.appendChild(chooseValidDate);
                    validDateError.style.display = "block"; <
                    ?
                    $_SESSION['chose-valid-date'] = "Chose a valid date"; ?
                    >
                };


                <?php
                    if (isset($_SESSION['chose-valid-date'])) {
                            echo '<div id="valid-date-error" style="position:relative; top: 0; left:0; right:0; bottom:0; background-color: #333; opacity: .5; z-index: 2; border: 1px solid green; background-color: red; border-radius:50px; display: flex; align-items: center; justify-content:center; font-size: 25px">
                            
                            <button style="position:absolute; z-index:3; top:50%; left:50%; transform:translate(-50%, -50%); top:-15px; right:10px; color:#fff; cursor:pointer; height: 40px; width:40px; background-color: red; border-radius: 50%; border:none; font-size: 25px;"  onclick="closeValidDateModal()">x</button>
                            
                            <h3 id="chose-valid-date-text" style="position:absolute; top: 50%; left:50%; transform:translate(-50%, -50%); width: 100%; height: 50px; padding:20px; z-index: 3;color:#fff; text-align:center; font-size:20px ">' . $_SESSION['chose-valid-date'] . '</h3>
                            </div>';
                            unset($_SESSION['chose-valid-date']);
                        }
                        ?>


                function closeChoseValidDateModal() {
                    document.getElementById("chose-valid-date-modal").style.display = "none";
                    event.preventDefault()
                };



                if (dateErrorMessages.length > 0) {
                    // e.preventDefault();
                    dateInputErrors.innerText = dateErrorMessages.join(', ')
                };


                let timeErrorMessages = [];
                if (selectStylistAvailTime == '') {
                    timeErrorMessages.push('Select a time for your service.');
                };
                // if (monStylistTime_900_am == '' || monStylistTime_915_am == '' || tueStylistTime ==
                //     '' || wedStylistTime == '' ||
                //     thurStylistTime == '' || friStylistTime == '' || satStylistTime == '') {
                //     timeErrorMessages.push('Select a time for your service.');
                // };
                if (timeErrorMessages.length > 0) {
                    // e.preventDefault();
                    timeInputError.innerText = timeErrorMessages.join(', ')
                };


                let showStylistErrorMessages = [];
                if (showSelectedStylist == '') {
                    showStylistErrorMessages.push('Select a technician.');
                };
                if (showStylistErrorMessages.length > 0) {
                    // e.preventDefault();
                    technicianInputError.innerText = showStylistErrorMessages.join(', ')
                };

            });

        });
        </script>
        <script src='js/book_appointment.js'></script>

</body>

</html>