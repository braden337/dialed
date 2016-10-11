<?php

$theme_slug = 'dialed';

if ( ! function_exists( 'dialed_setup' ) ) :

function dialed_setup() {

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'topnav' => esc_html__( 'Top Navigation', $theme_slug ),
  ) );

}
endif;
add_action( 'after_setup_theme', 'dialed_setup' );


function dialed_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'The Sidebar', $theme_slug ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', $theme_slug ),
    'before_widget' => '<section id="%1$s" class="widget %2$s panel panel-default"">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="panel-heading"><h3 class="panel-title">', // <h2 class="widget-title">
    'after_title'   => '</h3></div><div class="panel-body">',
  ) );
}
add_action( 'widgets_init', 'dialed_widgets_init' );


function dialed_scripts() {
  wp_enqueue_style( 'dialed-style', get_stylesheet_uri() );

  wp_enqueue_script('jquery');

  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/javascripts/bootstrap.min.js', array('jquery'), '20161009', true );
  wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/javascripts/main.js', array('jquery', 'fitvid'), '20161009', true );

  // if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
  //   wp_enqueue_script( 'comment-reply' );
  // }
}
add_action( 'wp_enqueue_scripts', 'dialed_scripts' );










