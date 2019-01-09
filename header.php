
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php the_title(); ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animsition.css">
    <link rel="stylesheet" href="<?php bloginfo(stylesheet_url); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">


    <?php
    include("header-metas.php");
    ?>
</head>
<body>
<main class="animsition">
    <div class="boton-menu">
        <div class="linea-menu-1">
            <img src="<?php echo get_template_directory_uri(); ?>/img/linea-menu.svg" alt="">
        </div>
        <div class="linea-menu-2">
            <img src="<?php echo get_template_directory_uri(); ?>/img/linea-menu.svg" alt="">
        </div>
        <div class="linea-menu-3">
            <img src="<?php echo get_template_directory_uri(); ?>/img/linea-menu.svg" alt="">
        </div>
    </div>
    <div class="boton-menu-cerrar">
        <img src="<?php echo get_template_directory_uri(); ?>/img/cerrar-menu.svg" alt="">
    </div>
    <section id="menu">
        <nav>
            <?php include TEMPLATEPATH .  '/php/nav-desktop.php';?>
        </nav>
    </section>
