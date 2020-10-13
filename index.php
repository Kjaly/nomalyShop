<?php require "parts/db.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Montserrat:400,700&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>clrnomaly</title>





    
</head>

<body>
<div class="wrapper">


    <?php  require_once  'parts/header.php'?>


    <div class="page">
        <div class="parallax">
            <ul class="parallax__list">
                <li data-depth = "0.10">
                   <div class="parallax__bg"></div>
                </li>
                <li data-depth = "0.15">
                    <div class="parallax__rope parallax__rope_1 ">
                        <div class="parallax__element parallax__element_1"><span></span></div>
                        <div class="parallax__element parallax__element_2"><span></span></div>
                        <div class="parallax__element parallax__element_3"><span></span></div>
                        <img src="images/rope.webp" alt="">
                    </div>
                </li>
                <li data-depth = "0.30">
                     <div class="parallax__rope parallax__rope_2 ">
                        <div class="parallax__element parallax__element_4"><span></span></div>
                        <div class="parallax__element parallax__element_5"><span></span></div>
                        <img src="images/rope.webp" alt="">
                    </div>
                </li>
                <li data-depth = "0.60">
                    <div class="parallax__rope parallax__rope_3 ">
                        <div class="parallax__element parallax__element_6"><span></span></div>
                        <div class="parallax__element parallax__element_7"><span></span></div>
                        <div class="parallax__element parallax__element_8"><span></span></div>
                        <img src="images/rope.webp" alt="">
                    </div>
                </li>
                <li data-depth = "0.30">
                    <div class="parallax__wave parallax__wave_1"></div>
                </li>
                <li data-depth = "0.40">
                     <div class="parallax__wave parallax__wave_2"></div>
                </li>
                <li data-depth = "0.50">
                     <div class="parallax__wave parallax__wave_3"></div>
                </li>
                <li data-depth = "0.60" >
                    <div class="parallax__evil"></div>
                </li>
                <li data-depth = "0.60" >
                    <div class="parallax__evil2"></div>
                </li>
                <li data-depth = "0.60">
                     <div class="parallax__wave parallax__wave_4"></div>
                </li>
                <li data-depth = "0.80">
                     <div class="parallax__wave parallax__wave_5"></div>
                </li>
                <li data-depth = "1.00">
                     <div class="parallax__wave parallax__wave_6"></div>
                </li>
            </ul>
        </div>
        <div class="content"> 
          <div class="intro">
            <div class="container">
              <div class="intro_inner">
                <h2 class="intro_suptitle">Streetwear</h2>

                <h1 class="intro_title">Welcome to ClrNomaly</h1>

                <h3><img class="logo" src="" alt=""></h3>
                <a class="btn" href="#what">Learn More</a>
              </div>

          </div>
        </div>
      </div>
    </div>

</div>

<script src='scripts/main.js'></script>
<script src='scripts/reg.js'></script>
<script src= 'scripts/jquery.parallax.js'></script>

</body>
</html>














