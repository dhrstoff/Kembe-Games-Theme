<?php
/*
Template Name: Blog Page
*/
get_header(); ?>
    <div class="row content">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-top-gray">Blog berichten</div>
                <div class="panel-body" style="padding-top: 2px;">
                    <div class="recente-blog-berichten">
                        <ul>
                            <?php
                            $recent_posts = wp_get_recent_posts();
                            foreach( $recent_posts as $recent ){
                                echo '<li>'.get_the_post_thumbnail($recent["ID"],'thumbnail').'<a href="' . get_permalink($recent["ID"]) . '">' .   substr($recent["post_title"], 0, 18).'</a> </li> ';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <?php
                $args = array( 'numberposts' => '1' );
                $recent_posts = wp_get_recent_posts( $args );
                foreach( $recent_posts as $recent ){
                ?>

                <div class="panel-top-whit"><?php echo $recent["post_title"]; ?></div>
                <div class="panel-body">
                    <?php
                    echo $recent['post_content'];
                    }
                    ?>
                </div>

            </div>
            <?php comments_template(); ?>
        </div>
    </div>
<?php get_footer(); ?>