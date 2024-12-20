let headerBackgrounds = document.querySelectorAll(".fade-background");

let imageIndex = 0;

function changeBackground(){
    // remove .showing class from current background
    headerBackgrounds[imageIndex].classList.remove("showing");

    // increment the image index by one
    imageIndex++

    // if the image index is more than there are elements (images), set imageIndex to 0
    if (imageIndex >= headerBackgrounds.length) {
        imageIndex = 0;
    }

    // add the .showing class to the next background image

    headerBackgrounds[imageIndex].classList.add("showing");
}

setInterval(changeBackground, 3000);