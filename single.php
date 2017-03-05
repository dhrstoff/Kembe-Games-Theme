<?php get_header(); ?>

    <div class="container main-page">
        <div class="row-fluid">
            <?php
            if ( function_exists('custom_breadcrumb') ) {
                custom_breadcrumb();
            }
            ?>
        </div>
        <div class="row-fluid">
            <div class="col-md-12">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <p class="post-metaData">
                        by <span class="blog-name"><?php the_author_nickname(); ?></span> <?php the_time('M d, Y'); ?>, <?php the_time('G:i'); ?>
                    </p>
                <?php endwhile; else: ?>
                    <p><?php _e('Sorry, this page does not exist.'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-md-8">
                <div class="row-fluid blog-single">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php setPostViews(get_the_ID()); ?>
                        <div class="blog-item">
                            <div class="row-fluid">
                                <div class="blog-img">
                                    <?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <?php the_content(); ?>
                            </div>
                            <div class="row-fluid">
                                <div class="blog-socialmediabar">
                                    <p>
                                        Share:
                                        <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank" class="social-facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>" target="_blank" class="social-twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank" class="social-google-plus"><i class="fa fa-google-plus"></i></a>
                                        <a href="http://pinterest.com/pin/create/link/?url=<?php echo get_permalink(); ?>&media=<?php $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id,'large', true);
                                        echo $image_url[0];  ?>" target="_blank" class="social-pinterest"><i class="fa fa-pinterest"></i></a>
                                        <div class="blog-views">
                                            Views: <span><?php echo getPostViews(get_the_ID()); ?></span>
                                        </div>
                                            <div class="blog-tags">
                                                Tags: <span>Andy Souwer</span><?php $posttags = get_the_tags(); if ($posttags): ?>
                                                    <?php foreach($posttags as $tag) { echo ', ' . $tag->name;} ?>
                                                <?php endif ?>
                                            </div>
                                    </p>
                                </div>
                            </div>
                            <div class="row-fluid blog-otherPosts">
                                <div class="col-md-6">
                                    <?php previous_post_link('%link',  '%title'); ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="pull-right"><?php next_post_link( '%link',  '%title'); ?></div>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; else: ?>
                        <p><?php _e('Sorry, this page does not exist.'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>