<?php

function kerapy_custom_post(){
    register_post_type( 'service', array(
        'labels'         => array(
            'name'          => esc_html__( 'Services', 'kerapy-core' ),
            'singular_name' => esc_html__( 'Service', 'kerapy-core' ),
            'all_items'     => esc_html__( 'All Services', 'kerapy-core' ),
            'add_new' => esc_html__( 'Add New Service', 'kerapy-core' ),
            'add_new_item' => esc_html__( 'Add New Service', 'kerapy-core' )
        ),
        'show_ui'       => true,
        'menu_icon'     => 'dashicons-admin-post',
        'menu_position' =>  5,
        'supports'      => array( 'title', 'excerpt', 'editor', 'thumbnail', 'revisions' ),
        'public' => true,
        'show_in_rest' => true,

    ));
}
add_action( 'init', 'kerapy_custom_post' );
