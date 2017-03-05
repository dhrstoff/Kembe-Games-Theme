<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
<div class="panel panel-default">
    <div class="panel-body blog-comment">
	<?php if ( have_comments() ) : ?>
        <h4>Reacties</h4>
                <!-- You can start editing here. -->
                <?php if ($comments) : ?>
                    <ul class="comment-list" style="list-style: none">
                        <?php foreach ($comments as $comment) : ?>
                            <li>
                            <div <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?>>
                                <div class="commentmetadata">
                                    <div class="pull-left">
                                    <strong class="name"><?php comment_author() ?></strong>
                                    <br/><a class="datum" href="<?php comment_reply_link() ?>" title=""><?php comment_date('j F, Y') ?></a> <?php edit_comment_link('Edit Comment','',''); ?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <?php if ($comment->comment_approved == '0') : ?>
                                        <br/><em><?php _e('Your comment is awaiting moderation.'); ?></em><br/>
                                    <?php endif; ?>
                                </div>
                                <?php comment_text() ?>
                            </div>
                                <div class="pijl-reactie"></div>
                            </li>

                            <?php /* Changes every other comment to a different class */
                            if ('alt' == $oddcomment) $oddcomment = '';
                            else $oddcomment = 'alt';
                            ?>

                        <?php endforeach; /* end for each comment */ ?>
                    </ul>

                <?php else : // this is displayed if there are no comments so far ?>

                    <?php if ('open' == $post->comment_status) : ?>
                        <!-- If comments are open, but there are no comments. -->
                    <?php else : // comments are closed ?>

                        <!-- If comments are closed. -->
                        <p class="nocomments">Reacties plaatsen niet mogelijk</p>
                    <?php endif; ?>

                <?php endif; ?>


                <?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
		<?php endif; ?>
        </div>
            <hr>
            <?php endif; // have_comments() ?>
            <div class="panel-body blog-comment">
                <?php $comment_args = array( 'title_reply'=>'Geef een reactie, of stel een vraag.',

                    'fields' => apply_filters( 'comment_form_default_fields', array(

                        'author' => '<input id="author" placeholder="Naam of schuilnaam *" class="form-control form-comment" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',

                        'email'  =>
                            '<input id="email" name="email" class="form-control form-comment" placeholder="E-Mail *" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.'</p>',

                        'url'    => '' ) ),

                    'comment_field' => '<p>' .

                        '<textarea placeholder="Reactie" style="max-width:100%" class="form-control form-comment-area" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' .

                        '</p>',

                    'comment_notes_after' => '',

                );?>
                <?php //comment_form($comment_args); ?>
                <?php comment_form($comment_args); ?>
            </div>
        </div><!-- #comments -->