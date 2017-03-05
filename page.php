<?php get_header(); ?>
        <div class="container main-page">
            <?php
            if ( function_exists('custom_breadcrumb') ) {
                custom_breadcrumb();
            }
            ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            <?php endwhile; else: ?>
                <p><?php _e('Sorry, this page does not exist.'); ?></p>
            <?php endif; ?>

    </div>
<?php get_footer(); ?>