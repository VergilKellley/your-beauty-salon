<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mobile-nav.css">
    <title>Document</title>
</head>
<body>
    <div class="mobile-header">
        <div class="mobile-navbar">
            <div class="mobile-nav-logo">
                <h1>SALON</h1>
            </div>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="mobile-nav-menu">
                <li><a href="">HOME</a></li>
                <li><a href="">BOOK NOW</a></li>
                <li><a href="">SERVICES</a></li>
                <li><a href="">GALLERY</a></li>
            </ul>
        </div>
    </div>

    <div class="bg"></div>

    <script>
        const hamburger = document.querySelector('.hamburger')

        const navMenu = document.querySelector('.mobile-nav-menu')

        hamburger.addEventListener('click', mobileMenu)

        function mobileMenu() {
            hamburger.classList.toggle('active')
            navMenu.classList.toggle('active')
        }
    </script>
</body>
</html>