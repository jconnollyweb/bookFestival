<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (is_page('schedule')) {
        echo '<meta name="description" content="Your schedule page description here">';
        echo '<meta name="keywords" content="schedule, events, timetable">';
        echo '<title>Schedule Page Title</title>';
    } elseif (is_page('homepage')) {
        echo '<meta name="description" content="Book festival comming soon">';
        echo '<meta name="keywords" content="Books, tickets, authors">';
        echo '<title>Book Festival</title>';
    } elseif (is_page('authors-page')) {
        echo '<meta name="description" content="Authors attanding">';
        echo '<meta name="keywords" content="Tolkien, George R R Martin, Virginia Wolfe, Jane Austin">';
        echo '<title>Authors Attending</title>';
    }  else {
        echo '<meta name="description" content="Book festival comming soon">';
        echo '<meta name="keywords" content="Books, tickets, authors">';
        echo '<title>Book Festival</title>';
    }
  
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+15&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=New+Amsterdam&display=swap" rel="stylesheet">
    <!-- <meta name="description" content="Book festival coming soon">
    <meta name="keywords" content="book festival, tickets, Tolkien">
    <meta name="author" content="John Connolly"> -->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/header.css">


<header class="site-header">
    <div class="header-container">
        <div class="site-branding">
            <img src="<?php echo get_template_directory_uri(); ?>/images/book-icon.svg" alt="Book Icon" class="book-icon">
            <h1 class="site-title"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
        </div>
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'nav-menu',
            ));
            ?>
        </nav>
    </div>
</header>
