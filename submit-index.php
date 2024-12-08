<?php
session_start();
require 'backend/db.php';
require 'backend/display_submit_index_image.php';
require 'backend/display_website_colors.php';


//  else {  
$services = filter_var($_POST['services_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// $service_price = filter_var($_POST['service_price'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


$event_day = filter_var($_POST['event_day'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


$event_date = filter_var($_POST['event_date'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// $time_available = filter_var($_POST['select_stylist_time'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$time_available = filter_var($_POST['select-stylist-avail-time'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


$name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// $customer_last_name = filter_var($_POST['customer_last_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

$stylist_name = filter_var($_POST['stylist_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($stylist_name == ''){
    $_SESSION['stylist-name-empty'] = "Select a Technician";
    $_SESSION['check-date-selected'] = "Check your appointment date";
    // $_SESSION['select-your-service'] = "Select you service";
    //   header("location: index.php");
      header("location: book_appointment_4.php");
      exit();
    }
// if ($_POST['stylist_name'] == NULL  || $_POST['stylist_name'] == 'No Technicians Available') {
    
//     header('Location: book_appointment_4.php');
//     exit();
// }

// $time_available = filter_var($_POST['time_available'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$messages = filter_var($_POST['messages'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// 
// } 

// if($_SERVER['REQUEST_METHOD'] != 'POST' || $_POST['stylist_name'] = '') {

//     echo "<a href='book_appointment_4.php'><--Back</a>
//             <br>
//             Something went wrong. Try again or contact R and L Barbershop.";
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- https://www.youtube.com/watch?v=-yuqm6Vjt6w -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- PHP account activation by Email -->
    <!-- https://www.youtube.com/watch?v=kC0AIip7Bww&t=16s -->

    <!-- STRIPE CDN -->
    <script src="https://js.stripe.com/v3/"></script>

    <!-- jQuery CDN -->
    <script src='https://code.jquery.com/jquery-3.7.1.min.js'
        integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="css/submit-index.css">
    <title>Document</title>
</head>
<style>
#card-element {
    width: 400px;
}

/* .form-row div {
    margin-bottom: 10px;
} */

#payment-form {
    display: flex;
    flex-direction: column;
}

#payment-form button {
    width: 200px;
    padding: 5px 10px
}

#card-element {
    margin-top: 10px;
}

#book-now-btn {
    display: none;
}
</style>

<body>
    <!-- <div> -->
    <img id='full-size-img' style=" position: absolute; z-index: -1; height:100vh; width:100vw"
        src="<?= $submit_index_image; ?>" alt="<?= $submit_index_image_alt; ?>">
    <!-- <img style="width:100%" src="img/randl_logo.png" alt=""> -->
    <div style=" display:flex; width
    100vw;  justify-content:center; align-items:center; margin-bottom: 100px;">
        <div id='form-container'
            style="width: 65vw; border: 1px solid #333; padding: 20px; background-color: #e0e0e0; border-radius: 5px; position: absolute; transform:translateY(-50%); top:50%">
            <form action="submit-info.php" method="post" id="payment-form">


                <div style='' class="form-row">
                    <div id="appointment-container"
                        style="display:flex; justify-content:center; padding: 20px 0; gap:10%;">
                        <div style="max-width:40%; margin-left:10px">

                           

                            <a style="color: #333" href="book_appointment_4.php">
                                Previous Page </a>
                            <br>
                            <br>
                            <h3 style="margin-bottom: 10px">Review Appointment Details</h3>

                            <p class='max-width-65' style="margin-top: 0px">Please check that the services, appointment time and date are correct and provide your credit/debit card information below. <span style="font-weight: 600;">Your card
                                    WILL NOT be charged at this time.</span></p>
                            <div>
                                <br>
                                <label for="name">Name: </label>
                                <input style="width:60%" class="no-focus med-font input-styles" type="text" id="name"
                                    name="name" value='<?= $name ?>' readonly>
                            </div>
                            <div>
                                <label for="phone">Phone: </label>
                                <input class="input-styles" type="text" id="phone" name="phone" value='<?= $phone ?>'
                                    readonly>
                            </div>
                            <div>
                                <label for="email">Email: </label>
                                <input class="input-styles" style="width:100%" type="email" id="email" name="email"
                                    value='<?= $email ?>' readonly>
                            </div>
                            <div>
                                <label for="messages">Note to Technician</label>
                                <br>
                                <textarea style='width:200px; resize:none; border:none' name='messages' cols=' 20'
                                    rows='2' id="messages" readonly><?= $messages ?></textarea>
                            </div>

                            <label for="card-element">
                                <p style='color:red'>Enter Credit/Debit Card Info</p>
                            </label>
                            <div id="card-element" style='border:2px solid red; padding:10px 5px'>
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display Element errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <div style='display:flex; flex-direction:column; max-width: 60%; padding-left: 10px'>
                            <div>
                                <div>
                                    <img id='randl-logo' style="width:15%; position:absolute; right:30px; top:30px"
                                        src="<?= $submit_index_image; ?>" alt="<?= $submit_index_image_alt; ?>">
                                    <div style='display:flex; flex-direction:column'>
                                        <div>
                                            <label for="time_available">Time: </label>
                                            <input class="input-styles" type="text" id="time_available"
                                                name="select-stylist-avail-time" value='<?= $time_available ?>'
                                                readonly>
                                        </div>
                                        <div>
                                            <label for="event_dat">Date:</label>
                                            <input class="input-styles" style="width: 14%" type="text" id="event_day"
                                                name="event_day" value='<?= $event_day ?>' readonly>,
                                            <input class="input-styles" style="width: 40%" type="text" id="event_date"
                                                name="event_date" value='<?= $event_date ?>' readonly>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="stylist_name">Technician: </label>
                                        <input style="padding:0" class="input-styles" type="text" id="stylist_name" name="stylist_name"
                                            value="<?= $stylist_name ?>" readonly>
                                    </div>
                                </div>


                                <br>
                                <br>
                                <label class="large-font border-bottom" for='services_title'>Services</label>


                                <?php
                                $totals = 0;
                                foreach($_POST['services_title'] as $service_title) {

                                    $service_price_query ="SELECT service_price, service_time FROM services_chosen WHERE service_title = '$service_title'";
                                    $service_price_result = mysqli_query($conn, $service_price_query);

                                    
                                    if(($service_price_result) -> num_rows > 0) {
                                       
                                        
                                        
                                        while($row_total = $service_price_result->fetch_assoc()) {
                                            
                                            
                                            echo  "
                                            <div style='display:flex;padding-right:10px'>
                                   <input style='width:63%; padding:0; font-size:14px' class='input-styles' type='text' id='services_title' name='services_title[]' value='" . $service_title . "' readonly>
                                   
                                   <input class='input-styles' style='text-align:left; width: 25%; font-size:14px' type='text' id='service_time' name='service_time[]' value='" . $row_total['service_time'] . " min'readonly>
                                   
                                   <input class='input-styles' style='text-align: right; width: 20%; font-size:14px' type='text' id='service_price' name='service_price[]' value='$" . $row_total['service_price'] . "'readonly>
                                   </div>";
                                   

                                   global $total_time;
                                   
                                   $total_service_time = $row_total['service_time'];
                                   $total_time += $total_service_time;

                                   $price = $row_total['service_price'];
                                   $totals += $price;
                                   
                                //    $totals += array_sum($row_total);
                                
                                
                                       
                                  
                                   //    $sum = 0;
                                // foreach($row as $value) $sum = $sum + $value;
                                // echo $sum;
                                        }  
                                    } 
                                    
                                } 
                                
                                echo "
                                
                                <div style='display:flex; border: 2px solid #333; font-size: 1.2rem;padding:5px; margin-top: 20px; margin-right:10px; justify-content:space-evenly '>
                                
                                <div style='display:flex;padding-right:20px; gap: 10px'><h4 style=''; font-size:15px'>Total Time:  </h4> <span style=' '> " . $total_time. " min</span></div>

                                <div style='display:flex;padding-right:20px; gap: 10px'>
                                <h4>Total Charges: </h4> <span style=' left: 85%; display:flex; align-items:flex-end; justify-content: center'> $" . $totals . "</span></h4>
                                </div>
                                </div>";
   
                                ?>
                            </div>

                        </div>
                        <!-- <img style="width:50%" src="images/randl-logo.png" alt=""> -->
                    </div>


                    <div style='background-color: #fff; padding: 10px'>
                        <label for="no-show-charge-acknowledgement">Cancelation Policy</label>
                        <br>
                        <br>
                            <p>Your Barbershop requires a credit or debit card to reserve your appointment. We are happy to cancel your appointment with 24 hours notice. Cancellations must be made by emailing contact@yourbarbershop.com. All same-day (less than 24 hours notice) cancellations will incur a fee of 50% of the scheduled services. No-shows will result in a fee of 100% of your scheduled services.
                            <br>
                            <br>
                            <span style='text-decoration:italic; font-weight:600'>Complete your booking checking the box below then clicking 'Book Now'.</span>
                        </p>
                        <br>
                        <input id='no-show-charge-acknowledgement' type="checkbox"
                            name='no-show-charge-acknowledgement'> By
                        checking this box you agree to  Your Barbershop cancellation policy.
                    </div>
                    <br>
                    <button style='padding: 10px 8px; background-color:<?= $accent_color; ?>; color:#fff; border-radius: 5px' id="book-now-btn">Book Now</button>


                </div>


                <script>
                $(document).ready(function() {
                    $('#no-show-charge-acknowledgement').click(function() {
                        $('#book-now-btn').toggle();
                        // $('#yourDIV').animate({left:'0px',top:'100px'},1000);
                    });
                });

                // $('#book-now-btn').click(function() {
                //     $('#show-selected-stylist').show()
                // })
                </script>
            </form>

        </div>
    </div>
    <script>
    // Set your publishable key: remember to change this to your live publishable key in production
    // See your keys here: https://dashboard.stripe.com/apikeys
    // const stripe = Stripe(
    //     'pk_live_51MtyHaJtFce07bxBLUhjLaNrh7RAbprp6FdYIrXQNnH1QIDYuf5Lzp7PUzVr5mVY0kBrPPgRsw6gKQtT2j7kPMrd008dbWSha8'
    // );
    // const elements = stripe.elements();
    const stripe = Stripe(
        'pk_test_51MtyHaJtFce07bxBfi254ynXDni7O0bVezieaVlRpgusW4fhqfhd8rPdxPB0pv12e2tQKuyUK1yW82shdRNnLzNB00dMseBqR1'
    );
    const elements = stripe.elements();




    // Custom styling can be passed to options when creating an Element.
    const style = {
        base: {
            // Add your base input styles here. For example:
            fontSize: '16px',
            color: '#32325d',
        },
    };

    // Create an instance of the card Element.
    const card = elements.create('card', {
        style
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');





    // Create a token or display an error when the form is submitted.
    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const {
            token,
            error
        } = await stripe.createToken(card);

        if (error) {
            // Inform the customer that there was an error.
            const errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            // Send the token to your server.
            stripeTokenHandler(token);
        }
    });






    const stripeTokenHandler = (token) => {
        // Insert the token ID into the form so it gets submitted to the server
        const form = document.getElementById('payment-form');
        const hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
    </script>
</body>
</html>