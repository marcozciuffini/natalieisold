<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nats is Thirty</title>
    <meta name="nats-dirty-thirty" content="Happy Birthday Natalie!">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background:<?php echo the_field('page_color'); ?>">


<!--header-->

<header>
    <div class="header-title">
    </div>
</header>


<nav class="nav-bar__container" id="nav-bar" style="background:<?php echo the_field('page_color'); ?>">
    <div class="nav-bar wigglies">
        <?php wp_list_pages('&title_li='); ?>
    </div>
</nav>
    <button class="hamburger hamburger--arrowalt" type="button" onclick=toggleHamburger() id="hamburger">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
    </button>

