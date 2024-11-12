<?php

function kerapy_custom_post(){
    register_post_type( 'service', array(
        'labels'         => array(
            'name'          => esc_html__( 'Service Post', 'kerapy' ),
            'singular_name' =>'Service post', 
            'all_items'     =>  'All Service Post'
        ),
        'show_ui'       => true,
        'menu_icon'     => 'dashicons-admin-post',
        'menu_position' =>  5,
        'supports'      => array( 'title', 'excerpt', 'editor', 'thumbnail', 'revisions' ),
        'public' => true,
        'show_in_rest' => true

    ));
    register_post_type( 'testimonial', array(
        'labels'         => array(
            'name'          => esc_html__( 'Testimonial', 'kerapy' ),
            'singular_name' =>'Testimonial', 
            'all_items'     =>  'All Testimonial'
        ),
        'show_ui'       => true,
        'menu_icon'     => 'dashicons-admin-post',
        'menu_position' =>  4,
        'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
        'public' => true,
        'show_in_rest' => true

    ));
}
add_action( 'init', 'kerapy_custom_post' );
