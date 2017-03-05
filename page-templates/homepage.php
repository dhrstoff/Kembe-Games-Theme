<?php get_header(); /* Template Name: Homepage */?>
    <div class="row-fluid home-top">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php if( have_rows('home-caroussel') ):
                    $count = 0;
                    ?>
                    <?php while( have_rows('home-caroussel') ): the_row(); ?>
                    <?php $count++ ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo ($count - 1)?>" class="<?php if($count == 1){ echo 'active'; } ?>"></li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php if( have_rows('home-caroussel') ):
                    $count = 0;
                    ?>
                    <?php while( have_rows('home-caroussel') ): the_row();

                    // vars
                    $title = get_sub_field('title');
                    $subtitle = get_sub_field('subtitle');
                    $text = get_sub_field('text');
                    $button = get_sub_field('button');
                    $button_url = get_sub_field('button_url');
                    $background_image = get_sub_field('background_image');
                    $image_left = get_sub_field('image_left');
                    ?>
                        <?php $count++ ?>
                        <div class="item <?php if($count == 1){ echo 'active'; } ?>" style="background-image:url('<?php echo $background_image['url']?> ' )">
                            <div class="container">
                                <div class="col-md-5 col-sm-5 col-xs-5">
                                    <div class="carousel-left-img">
                                        <img src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt'] ?>"  />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                    <h1><?php echo $title; ?></h1>
                                    <h2><?php echo $subtitle; ?></h2>
                                    <p><?php echo $text; ?></p>
                                    <a href="<?php echo $button_url; ?>" class="button primary-button"><?php echo $button; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row-fluid home-socialmedia">
        <div class="container">
            <a class="socialmedia socialemedia-twitter-btn" href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/img/socialmedia-twitter-btn.png" alt="Twitter"></a>
            <a class="socialmedia socialemedia-facebook-btn" href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/img/socialmedia-facebook-btn.png" alt="Facebook"></a>
        </div>
    </div>

    <div class="row-fluid home-mid">
        <div class="container">
            <div class="row">
                <div class="col-md-4 home-blog-item">
                    <h2>Nieuws</h2>
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => '1'
                    );
                    $blog_loop = new WP_Query( $args );

                    if ( $blog_loop->have_posts() ) :
                        while ( $blog_loop->have_posts() ) : $blog_loop->the_post();
                            ?>
                            <div class="home-blog-img">
                                <?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                            <time><?php the_time('M d, Y'); ?></time>
                            <?php the_excerpt(); ?>
                            <div class="hidden-md hidden-lg">
                                <a href="/blog" class="btn-home-mid">Read more</a>
                            </div>
                        <?php endwhile; wp_reset_postdata();
                    endif;?>
                </div>
                <div class="col-md-4">
                    <h2>Seminars</h2>
                    <?php
                    $image = get_field('seminar_afbeelding');
                    if( !empty($image) ): ?>
                        <div class="seminars-img">
                            <a href='<?php echo $image['url']; ?>' rel="lightbox"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></a>
                        </div>
                    <?php endif; ?>
                    <h3><?php the_field('seminar_titel') ?></h3>
                    <div class="hidden-md hidden-lg">
                        <a href="/seminar" class="btn-home-mid">Read more</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2>Agenda</h2>

                    <?php
                    $today = date('Ymd');
                    $args = array(
                        'post_type' => 'Agenda',
                        'post_status' => 'publish',
                        'posts_per_page' => '3',
                        'meta_query' => array(
                            array(
                                'key'		=> 'date',
                                'compare'	=> '>=',
                                'value'		=> $today,
                            )
                        ),
                        'meta_key' => 'date', // name of custom field
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                    );
                    $agenda_loop = new WP_Query( $args );
                    $agendaCounter = 0;

                    if ( $agenda_loop->have_posts() ) :
                        while ( $agenda_loop->have_posts() ) : $agenda_loop->the_post();
                            $date = get_field('date');
                            $y = substr($date, 0, 4);
                            $m = substr($date, 4, 2);
                            $d = substr($date, 6, 2);
                            $time = strtotime("{$d}-{$m}-{$y}");
                            $image = get_field('image');
                            $agendaCounter++;
                            ?>
                            <a href="/agenda" class="home-agenda-item <?php if($agendaCounter == 1) echo 'first-agenda-item'; ?>" <?php if($agendaCounter == 1): ?>style="background-image: url('<?php echo $image['url']; ?>'); background-size: cover;" <?php endif ?>> <!-- TODO: door laten linken naar juiste onderdeel op agenda pagina-->
                                <div class="home-agenda-container">
                                    <div class="home-agenda-text">
                                        <h3><?php the_field('title') ?></h3>
                                        <i><?php echo date('d-m-Y', $time); ?> <span>|</span> <?php the_field('location') ?> <span>|</span> <?php the_field('category') ?></i>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile; wp_reset_postdata();
                    endif;?>
                    <div class="hidden-md hidden-lg">
                        <a href="/agenda" class="btn-home-mid">See agenda</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row hidden-sm hidden-xs">
            <div class="container">
                <div class="col-md-4">
                    <a href="/blog" class="btn-home-mid">Read more</a>
                </div>
                <div class="col-md-4">
                    <a href="/seminar" class="btn-home-mid">Read more</a>
                </div>
                <div class="col-md-4">
                    <a href="/agenda" class="btn-home-mid">See agenda</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid home-mediastream">
            <div class="home-mediastream-bgAndy">
                <img src="<?php bloginfo('template_directory'); ?>/assets/img/home-andySouwer3.png" alt="Andy-Souwer"  />
            </div>
        <div class="container">
            <div class="col-md-12 home-mediastream-title">
                <h1>Mediastream</h1>
                <a href="/media" class="home-mediastream-allmedia">See all media</a>
            </div>
            <?php if( have_rows('gallery') ): ?>
                <?php while( have_rows('gallery') ): the_row();
                    // vars
                    $image = get_sub_field('image');
                    $video_url = get_sub_field('video_url');
                    ?>
                    <div class="col-md-6 col-sm-6 gallery-item">
                        <a href="<?php if ($video_url != ""){ echo $video_url;} else{ echo $image['url']; }?>" rel="lightbox">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>"  />
                            <?php if ($video_url != ""): ?>
                                <div class="gallery-video-overlay"><i class="fa fa-play fa-2x"></i></div>
                            <?php endif?>
                            <div class="gallery-item-description">
                                <h3><?php echo $image['title'];?></h3>
                                <p><?php echo $image['caption'];?></p>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>