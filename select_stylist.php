<?php
require "backend/db.php";

// if ($_SERVER['REQUEST_METHOD'] == "POST") {

$inputDaysSelected = $_POST['inputDaysSelected'];
$inputDateSelected = $_POST['inputDateSelected'];
$stylistTimeSelected = $_POST['stylistTimeSelected'];
$stylistNameSelected = $_POST['stylistNameSelected'];

// $monStylistTimeSelected_915_am = $_POST['monStylistTimeSelected_915_am'];
// $monStylistTimeSelected = $_POST['monStylistTimeSelected'];
// $tueStylistTimeSelected = $_POST['tueStylistTimeSelected'];
// $wedStylistTimeSelected = $_POST['wedStylistTimeSelected'];
// $thurStylistTimeSelected = $_POST['thurStylistTimeSelected'];
// $friStylistTimeSelected = $_POST['friStylistTimeSelected'];
// $satStylistTimeSelected = $_POST['satStylistTimeSelected'];
// $sunStylistTimeSelected = $_POST['sunStylistTimeSelected'];

/// 9:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME

if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '9:00 am') {
            
    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_900_am = 'yes'";
    $result = mysqli_query($conn, $input_day_chosen_query);
    
    if(mysqli_num_rows($result) < 1) {
        echo "<select class='mt-10 small-font' name='stylist_name'>
                <option id='no-tech' value='No Technicians Available' disabled>No Technicians Available</option>";
    } 
    
    if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
                            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                                
                            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                                    echo "<div>
                                            <select class='mt-10 small-font' name='stylist_name'>
                                            <option disabled value=''>Select Technician</option>";
                                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                                        }
                                    echo "<br> </select> 
                                        </div>";
    
                                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_900_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                                        
                                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                            }
                                    "<br> </select> 
                                        </div>";
                                            
                                } else {
                                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_900_am = 'yes'";
                        $result = mysqli_query($conn, $input_day_chosen_query);
    
                        if (mysqli_num_rows($result) > 0) {
                            echo "
                            <select class='mt-10 small-font' name='stylist_name'>";
                                //  <option value='none' selected disabled hidden >Technicians</option>";
                        while ($rows = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                                 $rows['stylist_name'] . "</option>
                                  </select>";
                                }
                            }
                        }                
                    }   
                }
    
    /// 9:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '9:15 am') {
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_915_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
            
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
    
            if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
    
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_915_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_915_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
    
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden >Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                        $rows['stylist_name'] . "</option>
                        </select>";
                    }
                }
            }                
        }   
    }
    
    
    
                
    /// 9:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '9:30 am') {
                        
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_930_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_930_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_930_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                 $rows['stylist_name'] . "</option>
                  </select>";
                }
            }
        }                
    }   
    }
    
    /// 9:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '9:45 am') {
                        
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_945_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_945_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_945_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                 $rows['stylist_name'] . "</option>
                  </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '10:00 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1000_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1000_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1000_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '10:15 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1015_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1015_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1015_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '10:30 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1030_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1030_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1030_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '10:45 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1045_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1045_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1045_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '11:00 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1100_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1100_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1100_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '11:15 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1115_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1115_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1115_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '11:30 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1130_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1130_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1130_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '11:45 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1145_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1145_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1145_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }  
    }
    
    /// 12:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '12:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '12:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '12:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '12:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_1245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '1:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_100_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_100_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_100_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '1:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_115_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_115_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_115_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '1:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_130_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_130_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_130_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '1:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_145_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_145_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_145_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '2:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '2:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '2:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '2:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '3:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_300_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_300_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_300_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '3:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_315_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_315_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_315_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '3:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_330_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_330_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_330_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '3:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_345_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_345_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_345_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '4:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_400_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_400_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_400_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '4:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_415_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_415_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_415_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '4:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_430_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_430_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_430_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '4:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_445_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_445_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_445_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '5:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_500_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_500_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_500_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '5:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_515_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_515_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_515_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '5:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_530_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_530_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_530_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '5:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_545_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_545_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_545_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 6:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Mon' && $stylistTimeSelected == '6:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_600_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME

                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_600_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '6:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Mon')";




                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Mon = 'yes' AND mon_600_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    


/// 9:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME

if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '9:00 am') {
            
    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_900_am = 'yes'";
    $result = mysqli_query($conn, $input_day_chosen_query);
    
    if(mysqli_num_rows($result) < 1) {
        echo "<select class='mt-10 small-font' name='stylist_name'>
                <option>No Technicians Available</option>";
    } 
    
    if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
                            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                                
                            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                                    echo "<div>
                                            <select class='mt-10 small-font' name='stylist_name'>
                                            <option disabled value=''>Select Technician</option>";
                                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                                        }
                                    echo "<br> </select> 
                                        </div>";
    
                                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_900_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                                        
                                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                            }
                                    "<br> </select> 
                                        </div>";
                                            
                                } else {
                                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_900_am = 'yes'";
                        $result = mysqli_query($conn, $input_day_chosen_query);
    
                        if (mysqli_num_rows($result) > 0) {
                            echo "
                            <select class='mt-10 small-font' name='stylist_name'>";
                                //  <option value='none' selected disabled hidden >Technicians</option>";
                        while ($rows = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                                 $rows['stylist_name'] . "</option>
                                  </select>";
                                }
                            }
                        }                
                    }   
                }
    
    /// 9:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '9:15 am') {
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_915_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
            
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
    
            if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
    
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_915_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_915_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
    
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden >Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                        $rows['stylist_name'] . "</option>
                        </select>";
                    }
                }
            }                
        }   
    }
    
    
    
                
    /// 9:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '9:30 am') {
                        
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_930_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_930_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_930_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                 $rows['stylist_name'] . "</option>
                  </select>";
                }
            }
        }                
    }   
    }
    
    /// 9:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '9:45 am') {
                        
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_945_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_945_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_945_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                 $rows['stylist_name'] . "</option>
                  </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '10:00 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1000_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1000_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1000_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '10:15 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1015_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1015_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1015_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '10:30 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1030_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1030_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1030_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '10:45 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1045_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1045_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1045_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '11:00 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1100_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1100_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1100_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '11:15 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1115_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1115_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1115_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '11:30 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1130_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1130_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1130_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '11:45 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1145_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1145_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1145_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }  
    }
    
    /// 12:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '12:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '12:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '12:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '12:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_1245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '1:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_100_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_100_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_100_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '1:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_115_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_115_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_115_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '1:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_130_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_130_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_130_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '1:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_145_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_145_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_145_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '2:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '2:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '2:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '2:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '3:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_300_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_300_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_300_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '3:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_315_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_315_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_315_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '3:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_330_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_330_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_330_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '3:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_345_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_345_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_345_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '4:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_400_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_400_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_400_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '4:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_415_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_415_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_415_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '4:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_430_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_430_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_430_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '4:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_445_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_445_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_445_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '5:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_500_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_500_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_500_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '5:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_515_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_515_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_515_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '5:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_530_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_530_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_530_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '5:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_545_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_545_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_545_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 6:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Tue' && $stylistTimeSelected == '6:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_600_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME

                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_600_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '6:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Tue')";




                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Tue = 'yes' AND tue_600_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    

/// 9:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME

if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '9:00 am') {
            
    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_900_am = 'yes'";
    $result = mysqli_query($conn, $input_day_chosen_query);
    
    if(mysqli_num_rows($result) < 1) {
        echo "<select class='mt-10 small-font' name='stylist_name'>
                <option>No Technicians Available</option>";
    } 
    
    if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
                            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                                
                            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                                    echo "<div>
                                            <select class='mt-10 small-font' name='stylist_name'>
                                            <option disabled value=''>Select Technician</option>";
                                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                                        }
                                    echo "<br> </select> 
                                        </div>";
    
                                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_900_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                                        
                                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                            }
                                    "<br> </select> 
                                        </div>";
                                            
                                } else {
                                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_900_am = 'yes'";
                        $result = mysqli_query($conn, $input_day_chosen_query);
    
                        if (mysqli_num_rows($result) > 0) {
                            echo "
                            <select class='mt-10 small-font' name='stylist_name'>";
                                //  <option value='none' selected disabled hidden >Technicians</option>";
                        while ($rows = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                                 $rows['stylist_name'] . "</option>
                                  </select>";
                                }
                            }
                        }                
                    }   
                }
    
    /// 9:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '9:15 am') {
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_915_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
            
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
    
            if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
    
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_915_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_915_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
    
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden >Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                        $rows['stylist_name'] . "</option>
                        </select>";
                    }
                }
            }                
        }   
    }
    
    
    
                
    /// 9:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '9:30 am') {
                        
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_930_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_930_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_930_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                 $rows['stylist_name'] . "</option>
                  </select>";
                }
            }
        }                
    }   
    }
    
    /// 9:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '9:45 am') {
                        
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_945_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_945_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_945_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                 $rows['stylist_name'] . "</option>
                  </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '10:00 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1000_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1000_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1000_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '10:15 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1015_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1015_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1015_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '10:30 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1030_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1030_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1030_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '10:45 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1045_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1045_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1045_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '11:00 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1100_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1100_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1100_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '11:15 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1115_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1115_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1115_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '11:30 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1130_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1130_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1130_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '11:45 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1145_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1145_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1145_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }  
    }
    
    /// 12:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '12:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '12:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '12:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '12:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_1245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '1:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_100_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_100_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_100_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '1:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_115_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_115_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_115_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '1:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_130_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_130_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_130_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '1:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_145_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_145_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_145_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '2:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '2:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '2:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '2:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '3:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_300_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_300_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_300_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '3:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_315_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_315_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_315_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '3:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_330_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_330_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_330_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '3:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_345_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_345_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_345_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '4:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_400_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_400_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_400_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '4:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_415_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_415_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_415_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '4:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_430_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_430_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_430_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '4:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_445_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_445_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_445_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '5:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_500_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_500_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_500_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '5:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_515_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_515_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_515_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '5:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_530_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_530_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_530_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '5:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_545_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_545_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_545_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 6:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Wed' && $stylistTimeSelected == '6:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_600_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME

                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_600_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '6:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Wed')";




                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Wed = 'yes' AND wed_600_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }


    /// 9:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '9:00 am') {
                
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_900_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
        
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
        
        if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";

                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_900_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);

                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                                /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_900_am = 'yes'";
                    $result = mysqli_query($conn, $input_day_chosen_query);

                    if (mysqli_num_rows($result) > 0) {
                        echo "
                        <select class='mt-10 small-font' name='stylist_name'>";
                            //  <option value='none' selected disabled hidden >Technicians</option>";
                    while ($rows = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $rows['stylist_name'] . "'>" . 
                                $rows['stylist_name'] . "</option>
                                </select>";
                            }
                        }
                    }                
                }   
            }
        
        /// 9:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '9:15 am') {
                $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_915_am = 'yes'";
                $result = mysqli_query($conn, $input_day_chosen_query);
                
                if(mysqli_num_rows($result) < 1) {
                    echo "<select class='mt-10 small-font' name='stylist_name'>
                            <option>No Technicians Available</option>";
                } 
        
                if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                    $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                        
                    $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                        if(mysqli_num_rows($availDateTimeResult) > 0) { 
                            /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                            echo "<div>
                                    <select class='mt-10 small-font' name='stylist_name'>
                                    <option disabled value=''>Select Technician</option>";
                                    while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                    echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                                }
                            echo "<br> </select> 
                                </div>";
        
                                /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_915_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                                
                                    $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                    while ($show_stylist = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                        echo " <option value='" . $show_stylist['stylist_name'] . "'>" . $show_stylist['stylist_name'] . "</option>";
                                    }
                            "<br> </select> 
                                </div>";
                        
                                    
                        } else {
                            /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_915_am = 'yes'";
                $result = mysqli_query($conn, $input_day_chosen_query);
        
                if (mysqli_num_rows($result) > 0) {
                    echo "
                    <select class='mt-10 small-font' name='stylist_name'>";
                        //  <option value='none' selected disabled hidden >Technicians</option>";
                while ($rows = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $rows['stylist_name'] . "'>" . 
                            $rows['stylist_name'] . "</option>
                            </select>";
                        }
                    }
                }                
            }   
        }
        
        
        
                    
        /// 9:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '9:30 am') {
                            
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_930_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_930_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_930_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                     $rows['stylist_name'] . "</option>
                      </select>";
                    }
                }
            }                
        }   
        }
        
        /// 9:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '9:45 am') {
                            
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_945_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_945_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_945_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                     $rows['stylist_name'] . "</option>
                      </select>";
                    }
                }
            }                
        }   
        }
        
        /// 10:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '10:00 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1000_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1000_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1000_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 10:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '10:15 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1015_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1015_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1015_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 10:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '10:30 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1030_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1030_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1030_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 10:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '10:45 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1045_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1045_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1045_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 11:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '11:00 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1100_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1100_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1100_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 11:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '11:15 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1115_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1115_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1115_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 11:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '11:30 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1130_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1130_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1130_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 11:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '11:45 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1145_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1145_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1145_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }  
        }
        
        /// 12:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '12:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1200_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1200_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 12:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '12:15 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1215_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1215_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 12:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '12:30 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1230_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1230_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 12:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '12:45 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1245_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_1245_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 1:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '1:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_100_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_100_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_100_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 1:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '1:15 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_115_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_115_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_115_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 1:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '1:30 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_130_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_130_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_130_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 1:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '1:45 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_145_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_145_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_145_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 2:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '2:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_200_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_200_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 2:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '2:15 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_215_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_215_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 2:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '2:30 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_230_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_230_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 2:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '2:45 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_245_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_245_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 3:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '3:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_300_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_300_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_300_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 3:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '3:15 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_315_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_315_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_315_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 3:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '3:30 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_330_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_330_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_330_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 3:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '3:45 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_345_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_345_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_345_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 4:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '4:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_400_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_400_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_400_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 4:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '4:15 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_415_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_415_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_415_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 4:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '4:30 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_430_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_430_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_430_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 4:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '4:45 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_445_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_445_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_445_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 5:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '5:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_500_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_500_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_500_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 5:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '5:15 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_515_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_515_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_515_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 5:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '5:30 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_530_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_530_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_530_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 5:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '5:45 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_545_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_545_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_545_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 6:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Thu' && $stylistTimeSelected == '6:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_600_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
    
                                $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_600_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '6:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Thu')";
                  
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Thur = 'yes' AND thur_600_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }


/// 9:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME

if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '9:00 am') {
            
    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_900_am = 'yes'";
    $result = mysqli_query($conn, $input_day_chosen_query);
    
    if(mysqli_num_rows($result) < 1) {
        echo "<select class='mt-10 small-font' name='stylist_name'>
                <option>No Technicians Available</option>";
    } 
    
    if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
                            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                                
                            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                                    echo "<div>
                                            <select class='mt-10 small-font' name='stylist_name'>
                                            <option disabled value=''>Select Technician</option>";
                                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                                        }
                                    echo "<br> </select> 
                                        </div>";
    
                                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_900_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                                        
                                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                            }
                                    "<br> </select> 
                                        </div>";
                                            
                                } else {
                                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_900_am = 'yes'";
                        $result = mysqli_query($conn, $input_day_chosen_query);
    
                        if (mysqli_num_rows($result) > 0) {
                            echo "
                            <select class='mt-10 small-font' name='stylist_name'>";
                                //  <option value='none' selected disabled hidden >Technicians</option>";
                        while ($rows = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                                 $rows['stylist_name'] . "</option>
                                  </select>";
                                }
                            }
                        }                
                    }   
                }
    
    /// 9:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '9:15 am') {
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_915_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
            
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
    
            if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
    
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_915_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_915_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
    
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden >Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                        $rows['stylist_name'] . "</option>
                        </select>";
                    }
                }
            }                
        }   
    }
    
    
    
                
    /// 9:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '9:30 am') {
                        
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_930_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_930_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_930_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                 $rows['stylist_name'] . "</option>
                  </select>";
                }
            }
        }                
    }   
    }
    
    /// 9:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '9:45 am') {
                        
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_945_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_945_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_945_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                 $rows['stylist_name'] . "</option>
                  </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '10:00 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1000_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1000_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1000_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '10:15 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1015_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1015_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1015_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '10:30 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1030_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1030_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1030_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '10:45 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1045_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1045_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1045_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '11:00 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1100_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1100_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1100_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '11:15 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1115_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1115_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1115_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '11:30 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1130_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1130_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1130_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '11:45 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1145_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1145_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1145_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }  
    }
    
    /// 12:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '12:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '12:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '12:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '12:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_1245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '1:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_100_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_100_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_100_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '1:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_115_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_115_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_115_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '1:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_130_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_130_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_130_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '1:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_145_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_145_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_145_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '2:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '2:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '2:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '2:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '3:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_300_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_300_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_300_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '3:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_315_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_315_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_315_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '3:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_330_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_330_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_330_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '3:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_345_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_345_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_345_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '4:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_400_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_400_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_400_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '4:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_415_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_415_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_415_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '4:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_430_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_430_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_430_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '4:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_445_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_445_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_445_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '5:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_500_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_500_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_500_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '5:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_515_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_515_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_515_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '5:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_530_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_530_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_530_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '5:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_545_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_545_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_545_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 6:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Fri' && $stylistTimeSelected == '6:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_600_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME

                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_600_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '6:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Fri')";




                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Fri = 'yes' AND fri_600_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    

    /// 9:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '9:00 am') {
                
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_900_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
        
        if(mysqli_num_rows($result) < 1) {
            echo "
            <select  class='mt-10 small-font' name='stylist_name'>
                    <option style='color:red' value='No Technicians Available'>No Technicians Available</option>";
                
        } 
        
        if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                                    
                                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                                        echo "<div>
                                                <select class='mt-10 small-font' name='stylist_name'>
                                                <option disabled value=''>Select Technician</option>";
                                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                                            }
                                        echo "<br> </select> 
                                            </div>";
        
                                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_900_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                                            
                                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                                }
                                        "<br> </select> 
                                            </div>";
                                                
                                    } else {
                                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_900_am = 'yes'";
                            $result = mysqli_query($conn, $input_day_chosen_query);
        
                            if (mysqli_num_rows($result) > 0) {
                                echo "
                                <select class='mt-10 small-font' name='stylist_name'>";
                                    //  <option value='none' selected disabled hidden >Technicians</option>";
                            while ($rows = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                                     $rows['stylist_name'] . "</option>
                                      </select>";
                                    }
                                }
                            }                
                        }   
                    }
        
        /// 9:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '9:15 am') {
                $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_915_am = 'yes'";
                $result = mysqli_query($conn, $input_day_chosen_query);
                
                if(mysqli_num_rows($result) < 1) {
                    echo "<select class='mt-10 small-font' name='stylist_name'>
                            <option>No Technicians Available</option>";
                } 
        
                if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                    $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                        
                    $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                        if(mysqli_num_rows($availDateTimeResult) > 0) { 
                            /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                            echo "<div>
                                    <select class='mt-10 small-font' name='stylist_name'>
                                    <option disabled value=''>Select Technician</option>";
                                    while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                    echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                                }
                            echo "<br> </select> 
                                </div>";
        
                                /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_915_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                                
                                    $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                    while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                        echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                    }
                            "<br> </select> 
                                </div>";
                                    
                        } else {
                            /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_915_am = 'yes'";
                $result = mysqli_query($conn, $input_day_chosen_query);
        
                if (mysqli_num_rows($result) > 0) {
                    echo "
                    <select class='mt-10 small-font' name='stylist_name'>";
                        //  <option value='none' selected disabled hidden >Technicians</option>";
                while ($rows = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $rows['stylist_name'] . "'>" . 
                            $rows['stylist_name'] . "</option>
                            </select>";
                        }
                    }
                }                
            }   
        }
        
        
        
                    
        /// 9:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '9:30 am') {
                            
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_930_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_930_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_930_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                     $rows['stylist_name'] . "</option>
                      </select>";
                    }
                }
            }                
        }   
        }
        
        /// 9:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '9:45 am') {
                            
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_945_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_945_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_945_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                     $rows['stylist_name'] . "</option>
                      </select>";
                    }
                }
            }                
        }   
        }
        
        /// 10:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '10:00 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1000_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1000_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1000_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 10:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '10:15 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1015_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1015_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1015_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 10:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '10:30 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1030_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1030_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1030_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 10:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '10:45 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1045_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1045_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1045_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 11:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '11:00 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1100_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1100_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1100_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 11:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '11:15 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1115_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1115_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1115_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 11:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '11:30 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1130_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1130_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1130_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 11:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '11:45 am') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1145_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1145_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1145_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }  
        }
        
        /// 12:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '12:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1200_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1200_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 12:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '12:15 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1215_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1215_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 12:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '12:30 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1230_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1230_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 12:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '12:45 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1245_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_1245_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 1:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '1:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_100_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_100_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_100_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 1:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '1:15 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_115_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_115_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_115_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 1:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '1:30 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_130_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_130_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_130_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 1:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '1:45 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_145_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_145_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_145_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 2:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '2:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_200_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_200_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 2:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '2:15 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_215_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_215_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 2:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '2:30 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_230_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_230_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 2:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '2:45 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_245_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_245_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 3:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '3:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_300_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_300_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_300_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 3:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '3:15 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_315_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_315_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_315_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 3:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '3:30 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_330_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_330_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_330_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 3:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '3:45 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_345_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_345_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_345_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 4:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '4:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_400_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_400_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_400_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 4:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '4:15 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_415_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_415_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_415_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 4:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '4:30 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_430_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_430_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_430_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 4:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '4:45 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_445_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_445_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_445_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 5:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '5:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_500_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_500_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_500_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 5:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '5:15 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_515_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_515_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_515_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 5:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '5:30 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_530_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_530_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_530_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 5:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '5:45 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_545_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_545_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_545_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }
        
        /// 6:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
        
        if ($inputDaysSelected == 'Sat' && $stylistTimeSelected == '6:00 pm') {
                                
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_600_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
        
            if (mysqli_num_rows($result) > 0) {
        
        //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
        
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
        
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
    
                                $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_600_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '6:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sat')";

                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
        
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sat = 'yes' AND sat_600_pm = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
        
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden>Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                    $rows['stylist_name'] . "</option>
                    </select>";
                    }
                }
            }                
        }   
        }


/// 9:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME

if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '9:00 am') {
            
    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_900_am = 'yes'";
    $result = mysqli_query($conn, $input_day_chosen_query);
    
    if(mysqli_num_rows($result) < 1) {
        echo "<select class='mt-10 small-font' name='stylist_name'>
                <option>No Technicians Available</option>";
    } 
    
    if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
                            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                                
                            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                                    echo "<div>
                                            <select class='mt-10 small-font' name='stylist_name'>
                                            <option disabled value=''>Select Technician</option>";
                                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                                        }
                                    echo "<br> </select> 
                                        </div>";
    
                                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_900_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                                        
                                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                            }
                                    "<br> </select> 
                                        </div>";
                                            
                                } else {
                                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_900_am = 'yes'";
                        $result = mysqli_query($conn, $input_day_chosen_query);
    
                        if (mysqli_num_rows($result) > 0) {
                            echo "
                            <select class='mt-10 small-font' name='stylist_name'>";
                                //  <option value='none' selected disabled hidden >Technicians</option>";
                        while ($rows = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                                 $rows['stylist_name'] . "</option>
                                  </select>";
                                }
                            }
                        }                
                    }   
                }
    
    /// 9:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '9:15 am') {
            $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_915_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
            
            if(mysqli_num_rows($result) < 1) {
                echo "<select class='mt-10 small-font' name='stylist_name'>
                        <option>No Technicians Available</option>";
            } 
    
            if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
                $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                    
                $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                    if(mysqli_num_rows($availDateTimeResult) > 0) { 
                        /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                        echo "<div>
                                <select class='mt-10 small-font' name='stylist_name'>
                                <option disabled value=''>Select Technician</option>";
                                while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                                echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                            }
                        echo "<br> </select> 
                            </div>";
    
                            /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_915_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                            
                                $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                                while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                    echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                                }
                        "<br> </select> 
                            </div>";
                                
                    } else {
                        /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_915_am = 'yes'";
            $result = mysqli_query($conn, $input_day_chosen_query);
    
            if (mysqli_num_rows($result) > 0) {
                echo "
                <select class='mt-10 small-font' name='stylist_name'>";
                    //  <option value='none' selected disabled hidden >Technicians</option>";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $rows['stylist_name'] . "'>" . 
                        $rows['stylist_name'] . "</option>
                        </select>";
                    }
                }
            }                
        }   
    }
    
    
    
                
    /// 9:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '9:30 am') {
                        
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_930_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_930_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_930_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                 $rows['stylist_name'] . "</option>
                  </select>";
                }
            }
        }                
    }   
    }
    
    /// 9:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '9:45 am') {
                        
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_945_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_945_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '9:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_945_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                 $rows['stylist_name'] . "</option>
                  </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '10:00 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1000_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1000_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1000_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '10:15 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1015_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1015_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1015_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '10:30 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1030_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1030_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1030_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 10:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '10:45 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1045_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1045_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '10:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1045_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:00 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '11:00 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1100_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1100_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:00 am' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1100_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:15 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '11:15 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1115_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1115_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:15 am' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1115_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:30 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '11:30 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1130_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1130_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:30 am' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1130_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 11:45 AM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '11:45 am') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1145_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1145_am = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '11:45 am' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1145_am = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }  
    }
    
    /// 12:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '12:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '12:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '12:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 12:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '12:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '12:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_1245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '1:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_100_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_100_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_100_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '1:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_115_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_115_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_115_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '1:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_130_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_130_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_130_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 1:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '1:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_145_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_145_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '1:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_145_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '2:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_200_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_200_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '2:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_215_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_215_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '2:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_230_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_230_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 2:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '2:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_245_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '2:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_245_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '3:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_300_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_300_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_300_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '3:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_315_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_315_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_315_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '3:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_330_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_330_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_330_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 3:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '3:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_345_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_345_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '3:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_345_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '4:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_400_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_400_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_400_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '4:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_415_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_415_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_415_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '4:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_430_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_430_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_430_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 4:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '4:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_445_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_445_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '4:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_445_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '5:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_500_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_500_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_500_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:15 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '5:15 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_515_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_515_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:15 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_515_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:30 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '5:30 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_530_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_530_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:30 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_530_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 5:45 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '5:45 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_545_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NPMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                        $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_545_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '5:45 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
                        
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_545_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    
    /// 6:00 PM CHECK IF STYLIST IS 'SCHEDULED' TO WORK ON REQUESTED DAY AND TIME
    
    if ($inputDaysSelected == 'Sun' && $stylistTimeSelected == '6:00 pm') {
                            
        $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_600_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if(mysqli_num_rows($result) < 1) {
            echo "<select class='mt-10 small-font' name='stylist_name'>
                    <option>No Technicians Available</option>";
        } 
    
        if (mysqli_num_rows($result) > 0) {
    
    //// CHECK IF STYLIST HAS PREVIOUSLY SCHEDULED APPOINTMENT ////////////////////
    
            $isDateTimeAvailQuery = "SELECT DISTINCT stylist_name FROM appointments WHERE event_date = '$inputDateSelected' AND time_available = '$stylistTimeSelected'";
                                
            $availDateTimeResult = mysqli_query($conn, $isDateTimeAvailQuery);
                if(mysqli_num_rows($availDateTimeResult) > 0) { 
                    /// DISPLAY STYLISTS NAMES THAT ARE NOT AVAILABLE    
                    echo "<div>
                            <select class='mt-10 small-font' name='stylist_name'>
                            <option disabled value=''>Select Technician</option>";
                            while ($rows = mysqli_fetch_assoc($availDateTimeResult)) {
                            echo " <option disabled value='" . $rows['stylist_name'] . "'>" . $rows['stylist_name'] . " is not available</option>";
                        }
                    echo "<br> </select> 
                        </div>";
    
                        /// DISPLAY AVAILABLE STYLISTS AFTER CHECKING APPPOINTMENTS TABLE TO SEE IF STYLIST IS ALREADY SCHEDULED ON REQUESTED DATE AND TIME

                            $show_avail_stylist_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_600_pm = 'yes' AND stylist_name NOT IN (SELECT stylist_name FROM appointments WHERE time_available = '6:00 pm' AND event_date = '$inputDateSelected' AND event_day = 'Sun')";
      
                            $show_stylist_avail_result = mysqli_query($conn, $show_avail_stylist_query);
    
                            while ($show_stylist_result = mysqli_fetch_assoc($show_stylist_avail_result)) {    
                                echo " <option value='" . $show_stylist_result['stylist_name'] . "'>" . $show_stylist_result['stylist_name'] . "</option>";
                            }
                    "<br> </select> 
                        </div>";
                            
                } else {
                    /// DISPLAY ALL STYLISTS IF NONE ARE ALREADY SCHEDULED ON REQUESTED DATE AND TIME
                    $input_day_chosen_query = "SELECT stylist_name FROM stylist_info WHERE Sun = 'yes' AND sun_600_pm = 'yes'";
        $result = mysqli_query($conn, $input_day_chosen_query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "
            <select class='mt-10 small-font' name='stylist_name'>";
                //  <option value='none' selected disabled hidden>Technicians</option>";
        while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $rows['stylist_name'] . "'>" . 
                $rows['stylist_name'] . "</option>
                </select>";
                }
            }
        }                
    }   
    }
    