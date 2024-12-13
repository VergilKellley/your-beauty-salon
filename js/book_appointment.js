const calendar = document.querySelector(".calendar"),
    // unclickDate = document.querySelector("#unclick"),
    date = document.querySelector(".date"),
    daysContainer = document.querySelector(".days"),
    prev = document.querySelector(".prev"),
    next = document.querySelector(".next"),
    todayBtn = document.querySelector(".today-btn"),
    gotoBtn = document.querySelector(".goto-btn"),
    dateInput = document.querySelector(".date-input"),
    eventDay = document.querySelector(".event-day"),
    eventDate = document.querySelector(".event-date"),
    eventsContainer = document.querySelector(".events"),
    addEventSubmit = document.querySelector(".add-event-btn"),
    inputDay = document.getElementById("input-day"),
    inputDate = document.getElementById("input-date"),
    calendarForm = document.getElementById("calendar-form"),
    dateInputError = document.getElementById("date-input-error"),
    servicesCheckbox = document.getElementsByClassName("servsices-checkbox"),
    custInputError = document.getElementById("cust-input-error"),
    custFirstName = document.getElementById("cust-first-name"),
    custLastName = document.getElementById("cust-last-name"),
    custPhone = document.getElementById("cust-phone"),
    custEmail = document.getElementById("cust-email");





/// CALENDAR FORM VALIDATION
calendarForm.addEventListener('submit', (e) => {
    let dateErrorMessages = [];
    if (inputDay.value === '' || inputDate === '' ) {
        dateErrorMessages.push("Select a date on the calendar for your service.");
    }

    // if (dateErrorMessages.length > 0) {
    //     e.preventDefault();
    //     dateInputError.innerText = dateErrorMessages.join(', ')
    // }

    let contactErrorMessages = [];
    if (custFirstName.value === '' || custLastName.value === '' || custPhone.value === '' || custEmail.value === '') {
        contactErrorMessages.push("All fields required.");
    }

    if (contactErrorMessages.length > 0) {
        e.preventDefault();
        custInputError.innerText = contactErrorMessages.join(', ')
    }
    // USE FOR PASSWORD VALIDATION
    // if (password.value.length <= 6) {
    //     dateErrorMessages.push('Password must be longer than 6 characters');
    // }
    
    // if (password.value.length >= 20) {
    //     dateErrorMessages.push('Password must be less than 20 characters');
    // }

    // if (password.value === 'password') {
    //     dateErrorMessages.push('Password cannot be password');
    // }
    
})


/////////  CHECK IF A SERVICE WAS SELECTED

$(document).ready(function() {
    $("#submit-appointment-btn").click(function() {
        if ($("input:checkbox").filter(":checked").length < 1) {
            event.preventDefault();
            $(".select-service-err").show();
            return false;
        } else {
            $(".err").hide();
            return true;
        }
    })
})


const nodeList = document.getElementsByClassName(".active");
for (let i = 0; i < nodeList.length; i++) {
    nodeList[i].style.backgroundColor = "red";
}
console.log("today is not: ", nodeList);

//////// CALENDAR START ///////
let today = new Date();
console.log("and today is: ", today);

let activeDay;
let month = today.getMonth();
let year = today.getFullYear();

const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];

let eventsArr = [];

// then call get
getEvents();

// function to add days
function initCalendar() {
    // to get prev month days and current month all days and rem next month days
    const firstDay = new Date(year, month, 1);
    console.log("firstDay is:: ", firstDay);
    const lastDay = new Date(year, month + 1, 0);
    console.log("lastDay is: ", lastDay);
    const prevLastDay = new Date(year, month, 0);
    console.log("prevLastDay is: ", prevLastDay);
    const prevDays = prevLastDay.getDate();
    console.log("prevDays is :: ", prevDays);
    const lastDate = lastDay.getDate();
    const day = firstDay.getDay();
    console.log("today is ::", day);
    const nextDays = 7 - lastDay.getDay() - 1;
    console.log("nexDays is :: ", nextDays);

    //update date top of calendar
    date.innerHTML = months[month] + " " + year;

    // adding days on dom

    let days = "";

    // prev month days
    for (let x = day; x > 0; x--) {
        days += `<div class="day prev-date unclickable">${prevDays - x + 1}</div>`;
        // days += `<div class="day prev-date">${prevDays - x + 1}</div>`;
    }

    // current month days
    for (let i = 1; i <= lastDate; i++) {
        // check if event is present on current day
        let event = false;
        eventsArr.forEach((eventObj) => {
            if (
                eventObj.day == i &&
                eventObj.month == month + 1 &&
                eventObj.year == year
            ) {
                // if event found
                event = true;
            }
        });

        // if day is today add class today
        if (
            i == new Date().getDate() &&
            year == new Date().getFullYear() &&
            month == new Date().getMonth()
        ) {
            activeDay = i;
            getActiveDay(i);
            updateEvents(i);
            // if event found also add event class
            // add active on today at startup
            if (event) {
                days += `<div class="day today active event">${i}</div>`;
            } else {
                days += `<div class="day today active">${i}</div>`;
            }
        } else {
            if (event) {
                days += `<div class="day event">${i}</div>`;
            } else {
                days += `<div class="day">${i}</div>`;
            }
        }
    }

    // next month days
    for (let j = 1; j <= nextDays; j++) {
        days += `<div class = "day next-date">${j}</div>`
        // days += `<div class = "day next-date">${j}</div>`;
    }

    daysContainer.innerHTML = days;
    // add listener after calendar initialized
    addListener();
}

initCalendar();

// prev month
function prevMonth() {
    month--;
    if (month < 0) {
        month = 11;
        year--;
    }
    initCalendar();
}

// next month
function nextMonth() {
    month++;
    if (month > 11) {
        month = 0;
        year++;
    }
    initCalendar();
}

// add eventListener on prev and next buttons
prev.addEventListener("click", prevMonth);
next.addEventListener("click", nextMonth);
///////// end calendar functionality ///////////////

// add goto date and goto today functionality
todayBtn.addEventListener("click", () => {
    today = new Date();
    month = today.getMonth();
    year = today.getFullYear();
    initCalendar();
});

dateInput.addEventListener("input", (e) => {
    // allow only numbers in input, remove anything else
    dateInput.value = dateInput.value.replace(/[^0-9/]/g, "");
    // add a slash if two numbers are entered
    if (dateInput.value.length === 2) {
        dateInput.value += "/";
    }
    if (dateInput.value.length > 7) {
        // don't allow more than 7 characters
        dateInput.value = dateInput.value.slice(0, 7);
    }

    // if backspace is pressed delete characters
    if (e.inputType === "deleteContentBackward") {
        if (dateInput.value.length === 3) {
            dateInput.value = dateInput.value.slice(0, 2);
        }
    }
});

gotoBtn.addEventListener("click", gotoDate);

// function to go to date entered
function gotoDate() {
    const dateArr = dateInput.value.split("/");
    // date validation
    if (dateArr.length === 2) {
        if (dateArr[0] > 0 && dateArr[0] < 13 && dateArr[1].length === 4) {
            month = dateArr[0] - 1;
            year = dateArr[1];
            initCalendar();
            return;
        }
    }
    // if invalid date
    alert("invalid date");
}
/////// CALENDAR END ////////////

/////// ASIDE START ///////////
const addEventBtn = document.querySelector(".add-event"),
    addEventContainer = document.querySelector(".add-event-wrapper"),
    addEventCloseBtn = document.querySelector(".close"),
    addEventTitle = document.querySelector(".event-name"),
    addEventFrom = document.querySelector(".event-time-from"),
    addEventTo = document.querySelector(".event-time-to");

// open and close add event button
addEventBtn.addEventListener("click", () => {
    addEventContainer.classList.toggle("active");
});

document.addEventListener("click", (e) => {
    // if click outside of open close add event button above
    if (e.target != addEventBtn && !addEventContainer.contains(e.target)) {
        addEventContainer.classList.remove("active");
    }
});

// allow only 50 characters in title
addEventTitle.addEventListener("input", (e) => {
    addEventListener.value = addEventTitle.value.slice(0, 50);
});

// time format in from and to time
addEventFrom.addEventListener("input", (e) => {
    // remove anything that is not a number
    addEventFrom.value = addEventFrom.value.replace(/[^0-9:]/g, "");
    // if two numbers entered auto add :
    if (addEventFrom.value.length === 2) {
        addEventFrom.value += ":";
    }
    // don't let user enter more than 5 chars
    if (addEventFrom.value.length > 5) {
        addEventFrom.value = addEventFrom.value.slice(0, 5);
    }
});
// same with to time
addEventTo.addEventListener("input", (e) => {
    // remove anything that is not a number
    addEventTo.value = addEventTo.value.replace(/[^0-9:]/g, "");
    // if two numbers entered auto add :
    if (addEventTo.value.length === 2) {
        addEventTo.value += ":";
    }
    // don't let user enter more than 5 chars
    if (addEventTo.value.length > 5) {
        addEventTo.value = addEventTo.value.slice(0, 5);
    }
});

// create function to add listener on days after rendered

function addListener() {
    const days = document.querySelectorAll(".day");
    days.forEach((day) => {
        day.addEventListener("click", (e) => {
            // set current day as active day
            activeDay = Number(e.target.innerHTML);

            // call active day after click
            getActiveDay(e.target.innerHTML);
            updateEvents(Number(e.target.innerHTML));

            // remove active class from already active day

            days.forEach((day) => {
                day.classList.remove("active");
            });

            // if prev month day clicked, goto prev month and add active class

            if (e.target.classList.contains("prev-date")) {
                prevMonth();
                setTimeout(() => {
                    // select all days of that month
                    const days = document.querySelectorAll(".day");

                    // ater going to prev month add active class to clicked
                    days.forEach((day) => {
                        if (
                            !day.classList.contains("prev-date") &&
                            day.innerHTML == e.target.innerHTML
                        ) {
                            // day.classList.add("unclickable");
                            day.classList.add("active");
                        }
                    });
                }, 100);
                // same with next month days
            } else if (e.target.classList.contains("next-date")) {
                nextMonth();
                setTimeout(() => {
                    // select all days of that month
                    const days = document.querySelectorAll(".day");

                    // ater going to prev month add active class to clicked
                    days.forEach((day) => {
                        if (
                            !day.classList.contains("next-date") &&
                            day.innerHTML == e.target.innerHTML
                        ) {
                            day.classList.add("active");
                        }
                    });
                }, 100);
            } else {
                // remain on current month days
                e.target.classList.add("active");
            }
        });
    });
}

// show active day events and date at top

function getActiveDay(date) {
    const day = new Date(year, month, date);
    const dayName = day.toString().split(" ")[0];
    eventDay.value = dayName;
    eventDate.value = date + " " + months[month] + " " + year;

    // CHECK IF DATE SELECTED IS PRIOR TO CURRENT DAY
    let date1 = new Date(day);
    date1.setHours(0, 0, 0, 0);
    let date2 = new Date(today);
    date2.setHours(0, 0, 0, 0);


    console.log("console day: ", day);

    console.log("console today: ", today);

    


    if (date1 > date2) {
        console.log("Selectable, Date 1 is greater than Date 2");
    } else if (date1 < date2) {
        eventDay.value = "";
        eventDate.value = "";
            alert('Date selected has already passed.');

        // unclickDate.addEventListener('click', function(){
        //     // alert('haha');
        //     // Append to another element:
        //     validDateError = document.getElementById("valid-date-error");
        //     validDateError.appendChild(chooseValidDate);
        //     validDateError.style.display = "block";
        // })

        // if (date1 < date2) {
        //     console.log("what the hellllllllllllll");
        //     const chooseValidDate = document.createElement("h3");
        //     chooseValidDate.innerHTML = "Choose a valid date.";

        //     // Append to another element:
        //     validDateError = document.getElementById("valid-date-error")
        //     validDateError.appendChild(chooseValidDate);
        //     validDateError.style.display = "block";
        // }

        // $(document).ready(function() {
        //     // $(".calendar").load(function(){
        
        //     $(".day").css("color", "green");
        //     // })
        // });
        console.log("Not Selectable, Date 1 is less than Date 2");
    }
}

// function to show events of that day
function updateEvents(date) {
    let events = "";
    eventsArr.forEach((event) => {
        // get events of active day only
        if (date == event.day && month + 1 == event.month && year == event.year) {
            // then show event on document
            event.events.forEach((event) => {
                events += `
                <div class="event">
                    <div class="title">
                        <i class="fas fa-circle"></i>
                        <h3 class="event-title">${event.title}</h3>
                    </div>
                    <div class="event-time">${event.time}</div>
                </div>
                `;
            });
        }
    });

    // if no event is found

    if (events == "") {
        events = `<div class = "no-event">
                    <h3></h3>
                    </div>`;
    }
    console.log(events);
    eventsContainer.innerHTML = events;
    //save events when update event is called
    saveEvents();
}

// function to add events
addEventSubmit.addEventListener("click", () => {
    const eventTitle = addEventTitle.value;
    const eventTimeFrom = addEventFrom.value;
    const eventTimeTo = addEventTo.value;

    // some validation
    if (eventTitle == "" || eventTimeFrom == "" || eventTimeTo == "") {
        alert("Please fill in all fields.");
        return;
    }

    const timeFromArr = eventTimeFrom.split(":");
    const timeToArr = eventTimeTo.split(":");
    if (
        timeFromArr.length !== 2 ||
        timeToArr.length !== 2 ||
        timeFromArr[0] > 23 ||
        timeFromArr[1] > 59 ||
        timeToArr[0] > 23 ||
        timeToArr[1] > 59
    ) {
        alert("Invalid time format");
    }

    const timeFrom = convertTime(eventTimeFrom);
    const timeTo = convertTime(eventTimeTo);

    const newEvent = {
        title: eventTitle,
        time: timeFrom + " - " + timeTo,
    };

    let eventAdded = false;

    //check if eventsArr not empty
    if (eventsArr.length > 0) {
        // check if current day already has event then add to that
        eventsArr.forEach((item) => {
            if (
                item.day == activeDay &&
                item.month == month + 1 &&
                item.year == year
            ) {
                item.events.push(newEvent);
                eventAdded = true;
            }
        });
    }

    // if event array empty or current day has no event, create new

    if (!eventAdded) {
        eventsArr.push({
            day: activeDay,
            month: month + 1,
            year: year,
            events: [newEvent],
        });
    }

    // remove active from add event form
    addEventContainer.classList.remove("active");
    // clear the fields
    addEventTitle.vaue = "";
    addEventFrom.value = "";
    addEventTo.value = "";

    // show current added event
    updateEvents(activeDay);

    // add event class to newly added day if not already
    const activeDayElem = document.querySelector(".day.active");
    if (!activeDayElem.classList.contains("event")) {
        activeDayElem.classList.add("event");
    }
});

function convertTime(time) {
    let timeArr = time.split(":");
    let timeHour = timeArr[0];
    let timeMin = timeArr[1];
    let timeFormat = timeHour >= 12 ? "PM" : "AM";
    timeHour = timeHour % 12 || 12;
    time = timeHour + ":" + timeMin + " " + timeFormat;
    return time;
}

// create a function to remove events on click
eventsContainer.addEventListener("click", (e) => {
    if (e.target.classList.contains("event")) {
        const eventTitle = e.target.children[0].children[1].innerHTML;
        eventsArr.forEach((event) => {
            if (
                event.day == activeDay &&
                event.month == month + 1 &&
                event.year == year
            ) {
                event.events.forEach((item, index) => {
                    if (item.title == eventTitle) {
                        event.events.splice(index, 1);
                    }
                });
                // if no event remaining on that day, remove complete day
                if (event.events.length == 0) {
                    eventsArr.splice(eventsArr.indexOf(event), 1);
                    // after remove complete day also remove active class of that day
                    const activeDayElem = document.querySelector(".day.active");
                    if (activeDayElem.classList.contains("event")) {
                        activeDayElem.classList.remove("event");
                    }
                }
            }
        });
        // after removing from array update event
        updateEvents(activeDay);
    }
});

// store events in local storage get from there
function saveEvents() {
    localStorage.setItem("events", JSON.stringify(eventsArr));
}

function getEvents() {
    if (localStorage.getItem("events" == null)) {
        return;
    }
    // eventsArr.push(...JSON.parse(localStorage.getItem("events")));
}

//////  ASIDE END ///////////
