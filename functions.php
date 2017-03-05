<?php
add_theme_support( 'post-thumbnails' );

add_filter('show_admin_bar', '__return_false');

function register_my_menu() {
  register_nav_menu('main-menu',__( 'main-menu' ));
    register_nav_menu('mobile-menu',__( 'mobile-menu' ));
}

add_action( 'after_setup_theme', 'bootstrap_setup' );

/*
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'agenda',
        array(
            'labels' => array(
                'name' => __( 'Agenda' ),
                'singular_name' => __( 'Agenda' )
            ),
            'public' => true,
            'has_archive' => false,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-calendar'
        )
    );
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

*/


if ( ! function_exists( 'bootstrap_setup' ) ):

    function bootstrap_setup(){

        add_action( 'init', 'register_menu' );

        function register_menu(){
            register_nav_menu( 'top-bar', 'Main Menu' );
        }

        class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {


            function start_lvl( &$output, $depth ) {

                $indent = str_repeat( "\t", $depth );
                $output    .= "\n$indent<ul class=\"dropdown-menu\">\n";

            }

            function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

                $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

                $li_attributes = '';
                $class_names = $value = '';

                $classes = empty( $item->classes ) ? array() : (array) $item->classes;
                $classes[] = ($args->has_children) ? 'dropdown' : '';
                $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
                $classes[] = 'menu-item-' . $item->ID;


                $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
                $class_names = ' class="' . esc_attr( $class_names ) . '"';

                $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
                $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

                $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

                $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
                $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
                $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
                $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
                $attributes .= ($args->has_children)        ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

                $item_output = $args->before;
                $item_output .= '<a'. $attributes .'>';
                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
                $item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
                $item_output .= $args->after;

                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }

            function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

                if ( !$element )
                    return;

                $id_field = $this->db_fields['id'];

                //display this element
                if ( is_array( $args[0] ) )
                    $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
                else if ( is_object( $args[0] ) )
                    $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
                $cb_args = array_merge( array(&$output, $element, $depth), $args);
                call_user_func_array(array(&$this, 'start_el'), $cb_args);

                $id = $element->$id_field;

                // descend only when the depth is right and there are childrens for this element
                if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

                    foreach( $children_elements[ $id ] as $child ){

                        if ( !isset($newlevel) ) {
                            $newlevel = true;
                            //start the child delimiter
                            $cb_args = array_merge( array(&$output, $depth), $args);
                            call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                        }
                        $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
                    }
                    unset( $children_elements[ $id ] );
                }

                if ( isset($newlevel) && $newlevel ){
                    //end the child delimiter
                    $cb_args = array_merge( array(&$output, $depth), $args);
                    call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
                }

                //end this element
                $cb_args = array_merge( array(&$output, $element, $depth), $args);
                call_user_func_array(array(&$this, 'end_el'), $cb_args);

            }

        }

    }

endif;