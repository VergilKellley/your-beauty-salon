let appt_date =  document.querySelector('#appointment-date');
let saveButton = document.querySelector('#saveButton');
let todays_date = document.querySelector("#new_appointment_date");

// function selectStylist() {
//     let stylist_id = document.getElementById('stylist-id').value;
//     document.getElementById("available_appointment_times").innerHTML = stylist_id;
//     console.log(stylist_id);
// }

saveButton.addEventListener("click", e => {
    console.log(appt_date.value);
    // console.log(appt_date.valueAsDate);
    // appt_date.value.innerHTML = todays_date;
})

// min 10:30
let nav = 0; // keeps track of which month we are on
let clicked = null; // whichever day we clicked on

let events = localStorage.getItem('events') ? JSON.parse(localStorage.getItem('events')) : []; // array of even objects or empty array

const container = document.getElementById("container");
const calendar = document.getElementById('calendar');
const newEventModal = document.getElementById('newEventModal');
const deleteEventModal = document.getElementById('deleteEventModal');
// const backDrop = document.getElementById('modalBackDrop');
const eventTitleInput = document.getElementById('eventTitleInput');
const weekdays = ['Sunday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']; // determines how many padding days we need


function openModal(date) {
    clicked = date;
    // container.style.opacity = 0;

    let clickeddate = Date.parse(clicked);
    let options = {
        day: 'numeric',
        month: 'long', // also numeric and 2-digit
        year: 'numeric',
        // hour: 'numeric',
        // minute: 'numeric',
        weekday: 'long' // also you can use 'short' and 'narrow'
    }

    let locale = navigator.language;
    let formattedUS = Intl.DateTimeFormat(locale, options).format(clickeddate);
    console.log(formattedUS);
    document.getElementById('new_appointment_date').innerText = formattedUS;
    

    let available_times_locale = navigator.language;
    let available_times_formattedUS = Intl.DateTimeFormat(available_times_locale, options).format(clickeddate);
    console.log(available_times_formattedUS);
 
    // added to display date selected from calendar under "4. Choose a time"
    document.getElementById('times_available_appointment_date').innerText = available_times_formattedUS;

    const eventForDay = events.find(e => e.date === clicked);

    if (eventForDay) {
        document.getElementById('eventText').innerText = eventForDay.title;
        deleteEventModal.style.display = 'block';
    } else {
        // newEventModal.style.display = 'block';
        // newEventModal.style.background = 'red';
    }

    console.log(clicked);

    // backDrop.style.display = 'block';
}



function load() {
    const dt = new Date();

    if(nav !== 0) {
        dt.setMonth(new Date(). getMonth() + nav);
    }
    const day = dt.getDate();
    const month = dt.getMonth();
    const year = dt.getFullYear();

    const firstDayOfMonth = new Date(year, month, 2);
    const daysInMonth = new Date(year, month + 1, 0).getDate();


    const dateString = firstDayOfMonth.toLocaleDateString('en-us', {
        weekday: 'long',
        year: 'numeric',
        month: 'numeric',
        day: 'numeric',
    });
    console.log('has day of the week', dateString);
    const paddingDays = weekdays.indexOf(dateString.split(', ')[0]);
    console.log(paddingDays);

    document.getElementById('monthDisplay').innerText = `${dt.toLocaleDateString('en-us', {month: 'long'})} ${year}`;

    calendar.innerHTML = '';

    for(let i = 1; i <= paddingDays + daysInMonth; i++) {
        const daySquare = document.createElement('div');
        daySquare.classList.add('day');

        const dayString = `${month + 1}/${i - paddingDays}/${year}`;

        if (i > paddingDays) {
            daySquare.innerText = i - paddingDays;

            const eventForDay = events.find(e => e.date === dayString);

            if (i - paddingDays === day && nav === 0) {
               daySquare.id = 'currentDay'; 
            }

            if (eventForDay) {
                const eventDiv = document.createElement('div');
                eventDiv.classList.add('event');
                eventDiv.innerText = eventForDay.title;
                daySquare.appendChild(eventDiv);
            }

            daySquare.addEventListener('click', () => openModal(dayString));
        } else {
            daySquare.classList.add('padding');
        }

        calendar.appendChild(daySquare);
    }
}

function closeModal() {
    eventTitleInput.classList.remove
    // newEventModal.style.display = 'none';
    deleteEventModal.style.display = 'none';
    // backDrop.style.display = 'none';
    eventTitleInput.value = '';
    clicked = null;
    // container.style.opacity = 1;
    load();
}

function saveEvent() {
    if (eventTitleInput.value) {
        eventTitleInput.classList.remove('error');

        events.push({
            date: clicked,
            title: eventTitleInput.value,
    });

    localStorage.setItem('events', JSON.stringify(events));
    closeModal();
    } else {
        eventTitleInput.classList.add(error);
    }
}

function deleteEvent(){
    events = events.filter(e => e.date !== clicked);
    localStorage.setItem('events', JSON.stringify(events));
    closeModal();
}

function initButtons() {
    document.getElementById('nextBtn').addEventListener('click', () => {
        nav++;
        load();
    });

    document.getElementById('backBtn').addEventListener('click', () => {
        nav--;
        load();
    });

    document.getElementById('saveButton').addEventListener('click', saveEvent);

    document.getElementById('cancelButton').addEventListener('click', closeModal);

    document.getElementById('deleteButton').addEventListener('click', deleteEvent);

    document.getElementById('closeButton').addEventListener('click', closeModal);

}

// //DISPLAY STYLIST NAME AND TIME CHOSEN ON CLICK
// function selectStylist() {
//     let myStylistName = document.getElementsByClassName('stylist-available-name');
//     for (let i = 0; i < myStylistName.length; i++) {
//         myStylistName[i].addEventListener('click', function() {
//             console.log(myStylistName[i].innerHTML);
//             let pTagName = document.getElementById('stylist-name');
//             let stylistName = myStylistName[i].innerHTML;
//             pTagName.innerText = stylistName;
//         })
//     }
// }

//// DISPLAY STYLIST NAME AND TIMES AVAILABLE ON CLICK
// function myFunction() {
//     let chooseStylistName = document.getElementsByClassName("choose-stylist-name");
//     for (let i = 0; i < chooseStylistName.length; i++) {
//         chooseStylistName[i].addEventListener('click', function() {
//             console.log(chooseStylistName[i].innerHTML);
//             let demo = document.getElementById('demo');
//             let chosenStylist = chooseStylistName[i].innerHTML;
//             demo.innerText = chosenStylist;
//         })
//     }
// }

initButtons();
load();

 
                                   
