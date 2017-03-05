<?php
get_header(); ?>
    <div class="container-fluid blog-bg">
        <div class="container main-page">
            <div class="row-fluid">
                <ol class="breadcrumb"><li><a href="/">Home</a></li><li>BLOG</li></ol>
            </div>
            <div class="row row-bottom-margin">
                <h1 class="page-title pull-left">Blog</h1>
                <div class="home-socialmedia mediapage-socialmedia pull-right">
                    <a class="socialmedia socialemedia-twitter-btn" href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/img/socialmedia-twitter-btn.png" alt="Twitter"></a>
                    <a class="socialmedia socialemedia-facebook-btn" href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/img/socialmedia-facebook-btn.png" alt="Facebook"></a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row-fluid">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <a class="blog-item" href="<?php echo the_permalink() ?>">
                            <div class="col-md-5">
                                <div class="blog-img">
                                    <?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h1 class="blog-title"><?php the_title(); ?></h1>
                                <p class="post-metaData">
                                    by <span class="blog-name"><?php the_author_nickname(); ?></span> <?php the_time('M d, Y'); ?>, <?php the_time('G:i'); ?>
                                </p>
                                <?php the_excerpt(); ?>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
            <div class="row">
                <div class="blog-pagination">
                    <?php
                    global $wp_query;

                    $big = 999999999; // need an unlikely integer

                    echo paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $wp_query->max_num_pages
                    ) );
                    ?>
                </div>

            </div>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>