/* https://www.youtube.com/watch?v=U04TFalv4h0&list=PL07efmqYWHZ81_zqshUgM-tz40MtzOmN9&index=3 min 7:43 */

const navMenu = document.getElementById('mobile-nav-menu'),
navToggle = document.getElementById('mobile-nav-toggle'),
navClose = document.getElementById('mobile-nav-close')

/* SHOW MENU */
if(navToggle){
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu')
    })
}

/* HIDE MENU */
if(navClose){
    navClose.addEventListener('click', () => {
        navMenu.classList.remove('show-menu')
    })
}

/* REMOVE MENU MOBILE */
const navLink = document.querySelectorAll('.mobile-nav-link')

const linkAction = () => {
    const navMenu = document.getElementById('mobile-nav-menu')
    navMenu.classList.remove('show-menu')
}

navLink.forEach(n => n.addEventListener('click', linkAction))


/* SHOW DROPDOWN */

const showDropdown = (dropdownId) =>{
    const dropdown = document.getElementById(dropdownId)
 
    dropdown.addEventListener('click', ()=>{
       /* Show dropdown */
       dropdown.classList.toggle('show-dropdown')
    })
 }
 showDropdown('dropdown')
// const showDropdown = (dropdown) => {
//     const dropdownId = document.getElementById('dropdown')

//     dropdownId.addEventListener('click', () => {
//         /* SHOW DROPDOWN */
//         dropdownId.classList.toggle('show-dropdown')
//     })
// }

// showDropdown('dropdown')