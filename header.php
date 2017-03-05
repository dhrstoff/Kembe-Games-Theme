<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title><?php if( is_404() ) echo '404 page'; else the_title();?></title>

            <!-- Bootstrap -->
            <link href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
            <link href="<?php bloginfo('template_directory'); ?>/assets/css/font-awesome.min.css" rel="stylesheet">

            <!-- mobile menu -->
            <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/js/mmenu/jquery.mmenu.all.css">

            <!-- Our stuff -->
            <link href="<?php bloginfo('template_directory'); ?>/assets/css/style.css" rel="stylesheet">

            <?php wp_head(); ?>
        </head>
        <body>
            <div>
                <header class="navbar navbar-standard navbar-fixed-top Fixed">
                    <div class="container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="/" >
                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png" alt="Logo" class="logo">
                            </a>
                            <div class="main-navigation">
                                <?php wp_nav_menu (array('theme_location' => 'main-menu'));?>
                            </div>

                            <div class="mobile-menu-bar" style="display:none;">
                                <div class="mobile-button-wrap">
                                    <a href="#my-menu" id="mobile-menu-button" class="btn">
                                        <i class="fa fa-bars fa-2x"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <nav id="my-menu" class="mobile-menu">
                            <?php
                            $args = array(
                                'menu'            => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => '',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => '',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'theme_location' => 'mobile-menu',
                                'depth'          => 2,
                                'container'       => '',
                                'walker'         => new Bootstrap_Walker_Nav_Menu()
                            );
                            wp_nav_menu($args);
                            ?>
                        </nav>
                    </div>
                </header>