<?php 

namespace Kerapy\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class KerapyMenuWidget extends Widget {

    function __construct() {
        $this->setup( 'kerapy_menu_widget', 'Kerapy Menu', 'Displays a menu with title/text', array(
            Field::make( 'text', 'kerapy_menu_widget_title', 'Title' )->set_default_value( 'Pages'),
            Field::make( 'complex', 'kerapy_menu_widget_links', 'Links' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'kerapy_menu_widget_link_title', 'Title' ),
                    Field::make( 'text', 'kerapy_menu_widget_link', 'Link' ),
                ) )
                ->set_default_value( array(
                    array( 'kerapy_menu_widget_link_title' => 'Home', 'kerapy_menu_widget_link' => '/' ),
                    array( 'kerapy_menu_widget_link_title' => 'About', 'kerapy_menu_widget_link' => '/about' ),
                    array( 'kerapy_menu_widget_link_title' => 'Services', 'kerapy_menu_widget_link' => '/services' ),
                    array( 'kerapy_menu_widget_link_title' => 'Contact', 'kerapy_menu_widget_link' => '/contact' ),
                ) ),
        ) );
    }
    
    function front_end( $args, $instance ) {
        echo $args['before_title'] . $instance['title'] . $args['after_title'];
        echo '<p>' . $instance['content'] . '</p>';
    }
}