<?php
    require_once 'header-2.php';
?>
<?php
            $chosen_services_query = 'SELECT * FROM services_chosen ORDER BY id ASC LIMIT 1';
            $chosen_services_info = mysqli_query($conn, $chosen_services_query);
        ?>

<?php while ($chosen_services = mysqli_fetch_assoc($chosen_services_info)) : ?>

<div class="banner"
    style="margin-top:0px; background: url('images/<?= $chosen_services['service_img'] ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">

    <?php
            $chosen_services_query = 'SELECT * FROM services_chosen ORDER BY id ASC LIMIT 1';
            $chosen_services_info = mysqli_query($conn, $chosen_services_query);
        ?>

    <?php while ($chosen_services = mysqli_fetch_assoc($chosen_services_info)) : ?>
    <div class='mobile-content-container'>
        <div class="service-description-container">
            <div class="content active">
                <img src="images/salon-logo.png" alt="" class="salon-title">
                <h4>
                    <span><?= $chosen_services['service_title'] ?></span><span>$<?= $chosen_services['service_price'] ?></span><span><?= $chosen_services['service_time'] ?>
                        minutes</span>
                </h4>
                <p><?= $chosen_services['services_description'] ?></p>
                <div>
                    <a style="position: relative;display: inline-block;margin-right: 10px;background: var(--primary);color: #fff;padding: 6px 20px;text-decoration: none;font-weight: 500;letter-spacing: 1px;text-transform: uppercase;transition: 0.5s;cursor: pointer;"
                        href="book-appointment">Book Now</a>
                    <!-- <a href=""><i class="fa-solid fa-play">Learn More</i></a>
                <a href=""><i class="fa-solid fa-plus">More</i></a> -->
                </div>
            </div>
            <?php endwhile ?>

            <?php
            $chosen_services_query = 'SELECT * FROM services_chosen ORDER BY id ASC';
            $chosen_services_info = mysqli_query($conn, $chosen_services_query);
            ?>

            <?php while ($chosen_services = mysqli_fetch_assoc($chosen_services_info)) : ?>
            <div class="content <?= $chosen_services['id'] ?>">
                
                <img src="images/salon-logo.png" alt="" class="salon-title">
                <h4>
                    <span><?= $chosen_services['service_title'] ?></span><span>$<?= $chosen_services['service_price'] ?></span><span><?= $chosen_services['service_time'] ?>
                        minutes</span>
                </h4>
                <p><?= $chosen_services['services_description'] ?></p>
                <div>
                
                    <a style="position: relative;display: inline-block;margin-right: 10px;background: var(--primary);color: #fff;padding: 6px 20px;text-decoration: none;font-weight: 500;letter-spacing: 1px;text-transform: uppercase;transition: 0.5s;cursor: pointer;"
                        href="book-appointment">Book Now</a>
                        
                    <!-- <a href=""><i class="fa-solid fa-play">Learn More</i></a>
                <a href=""><i class="fa-solid fa-plus">More</i></a> -->
                </div>
            </div>
            <?php endwhile ?>
            <?php endwhile ?>
        </div>

        <div>
            <div>
                <!-- CAROUSEL IMAGES -->
                <div class="carousel-box">
                    <div class="carousel">
                        <?php
                    $chosen_services_query = 'SELECT * FROM services_chosen ORDER BY id ASC';
                    $chosen_services_info = mysqli_query($conn, $chosen_services_query);
                    ?>

                        <?php while ($chosen_services = mysqli_fetch_assoc      ($chosen_services_info)) : ?>
                            
                        <div class="carousel-item"
                            onclick="changeBg('<?= $chosen_services['service_img'] ?>', '<?= $chosen_services['id'] ?>')">
                            <img src="images/<?= $chosen_services['service_img'] ?>" alt="">
                        </div>
                        <?php endwhile ?>
                    </div>
                </div>
                <!-- <a href="#" class="play" onclick="toggleVideo();"><i class="fa-regular fa-circle-play" aria-hidden="true">Watch
            Trailer</i></a> -->
                <ul class="sci">
                    <li><a href="" class="fa fa-facebook" aria-hidden="true"></a></li>
                    <li><a href="" class="fa-brands fa-instagram"></a></li>
                    <li><a href="" class="fa-brands fa-linkedin" aria-hidden="true"></a></li>
                </ul>
            </div>
            <div class="trailer">
                <video src="assets/hair-washing.mp4" muted controls="true" autoplay="true">x</video>
                <span class="close" onclick="toggleVideo();">x</span>
            </div>
        </div>
    </div>
</div>



<?php

require_once 'backend/display_business_address.php';
require_once 'backend/display_contact_info.php';

?>







<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

<!-- MATERIALIZE JAVASCRIPT CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"
    integrity="sha512-m2PhLxj2N91eYrIGU2cmIu2d0SkaE4A14bCjVb9zykvp6WtsdriFCiXQ/8Hdj0kssUB/Nz0dMBcoLsJkSCto0Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="js/about.js"></script>

<script>
// Materialize Carousel with jQuery

$(document).ready(function() {
    $('.carousel').carousel();
});
</script>

<!-- </body>

</html> -->
<div>
    <?php
    require_once "contact.php";
?>
</div>