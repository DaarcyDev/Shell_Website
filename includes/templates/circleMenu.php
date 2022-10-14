<?php

if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;
//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- Link Swiper's CSS -->

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>Shell</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <div class="circle-container">
        <div class="circle">
            <button id="close">
                <i class="fas fa-times"></i>
            </button>
            <button id="open">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
    <?php if ($auth) : ?>
        <div class="circle-container-exit">
            <div class="circle-exit">
                <button id="exit">
                    <a href="exit.php">Exit</a>
                </button>

            </div>
        </div>
    <?php endif ?>