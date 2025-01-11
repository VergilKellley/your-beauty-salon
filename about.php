<?php
    require_once 'header.php';
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/about.css" />
    <title>Document</title>
</head>

<body> -->
    <!-- <section style="height:75px; width:100vw;position:fixed;z-index:9999999">
    <div style="display:flex;justify-content:center;align-items:center;height: 100%;background:#000;width:100vw">
      <ul style="display:flex; gap:40px;color:#fff">
        <li><a style="color:#fff;font-size:18px;font-weight:bolder" href="index">HOME</a></li>
        <li><a style="color:#fff;font-size:18px;font-weight:bolder" href="book-appointment">BOOK NOW</a></li>
        <li><a style="color:#fff;font-size:18px;font-weight:bolder" href="all-services">SERVICES</a></li>
        <li><a style="color:#fff;font-size:18px;font-weight:bolder" href="photo-gallery">GALLERY</a></li>
        <li><a style="color:#fff;font-size:18px;font-weight:bolder" href="about">ABOUT</a></li>
        <li><a style="color:#fff;font-size:18px;font-weight:bolder" href="index#contact">CONTACT</a></li>
      </ul>
    </div>
    </section> -->
    <div class="about-header">
    <div style="position:absolute;top:75px; bottom:-35px; right:0; left:0;background:#000; opacity:.5"></div>
        <div style="position:absolute; text-align:center; width:50vw; color:#fff">
            <h2 style="position:relative;z-index:3">Style & Elegance</h2>
            <p style="margin-top:20px;line-height:1.5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati expedita corporis unde illo iure
                officia rem consequuntur doloremque tempore, ab fugit at odio veniam? Eius debitis assumenda pariatur.
                At, doloribus.</p>
        </div>
        <div
            style="background:url('images/glamorous-woman.jpg');background-repeat: no-repeat; background-position: center; background-size: cover;width:100vw;height:100vh; background-position:center;margin-top:120px">
        </div>
</div>
    <div class="about-section">
        <div>
            <div class="large-img-and-content">
                <div class="img-and-large-text">
                    <div class="large-img-container" style="width: 70%; position:relative">
                        <img style="z-index:3; position:absolute; bottom:0" src="images/pink-shirt-hand-on-chin.png"
                            alt="" />
                        <img style="position: absolute; left: -20px; z-index: 2;bottom:0"
                            src="bkgd-images/brown-powder-makeup.png" alt="" />
                    </div>
                    <div class="our-story-container" style="width: 55%; margin-right: 20px">
                        <p>Our Story</p>
                        <h1 style="position:relative;z-index: 4;">SALON</h1>
                        <div class="two-para-text">
                            <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Recusandae id voluptates iure consequuntur optio excepturi ut
                                non dolores vel totam! Reprehenderit in ratione rerum quam.
                            </p>
                            <br />
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Accusamus totam architecto porro adipisci officia aliquam nemo
                                in accusantium, quis numquam recusandae doloremque reiciendis
                                odio voluptatibus ea, eius enim. Molestias, impedit.
                            </p>
                            <br />
                            <p>
                                <span style="font-style: italic; font-weight: 600">Margaret Olsen - owner</span>
                            </p>
                        </div>
                        <div style="display: flex; justify-content: space-evenly;">
                            <a class="btn btn-book-appointment" href="book-appointment">BOOK NOW</a>
                            <a class="btn btn-view-services" href="all-services">VIEW SERVICES</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="img-and-text-content">
                <div class="text-under-large-image">
                    <div>
                        <div>
                            <p>Luxuriously Simple</p>
                            <p>Naurally Potent</p>
                        </div>
                        <div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Id,
                                odio corporis. Commodi.
                            </p>
                        </div>
                    </div>
                </div>
                <div style="position:relative; width: 45%;">
                    <img style="height: 100px;position: absolute;bottom:0;width:auto;
    left: 50%;
    transform: translateX(-50%);" src="bkgd-images/makeup-brushes.png" alt="">
                </div>
            </div>
        </div>
</div>

    <?php
      require 'contact.php';
    ?>