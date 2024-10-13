<?php 

namespace Kerapy\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class KerapyFooterContactWidget extends Widget {

    function __construct() {
        $this->setup( 'kerapy_footer_contact_widget', 'Kerapy Contact', 'Displays a contact with title/text', array(
            Field::make( 'text', 'kerapy_footer_contact_widget_title', 'Title' )->set_default_value( 'Contact'),
            Field::make( 'complex', 'kerapy_footer_contact_widget_contacts', 'Links' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'kerapy_footer_contact_widget_contact', 'Contact' ),
                    Field::make( 'text', 'kerapy_footer_contact_widget_link', 'Link' ),
                    Field::make( 'text', 'kerapy_footer_contact_widget_icon', 'Icon' ),
                ) )
                ->set_default_value( array(
                    array( 'kerapy_footer_contact_widget_contact' => 'ABC Street, New York, USA', 'kerapy_footer_contact_widget_icon' => 'fas fa-map-marker-alt', 'kerapy_footer_contact_widget_link' => "#" ),
                    array( 'kerapy_footer_contact_widget_contact' => '+123 4465 696', 'kerapy_footer_contact_widget_icon' => 'fas fa-phone pe-3', 'kerapy_footer_contact_widget_link' => "#" ),
                    array( 'kerapy_footer_contact_widget_contact' => 'infochiropactor@gmail.com', 'kerapy_footer_contact_widget_icon' => 'fas fa-envelope', 'kerapy_footer_contact_widget_link' => "#" ),
                ) ),
        ) );
    }
    
    function front_end( $args, $instance ) {
        echo $args['before_title'] . $instance['kerapy_footer_contact_widget_title'] . $args['after_title']; ?>
            <ul class="list-unstyled">
                <?php foreach($instance['kerapy_footer_contact_widget_contacts'] as $link) : ?>
                    <li class="mb-3 footer-list-item">
                        <a href="<?php echo $link['kerapy_footer_contact_widget_link'] ?>" class="text-white"><span><i class="<?php echo $link['kerapy_footer_contact_widget_icon'] ?> pe-3"></i></span><?php echo $link['kerapy_footer_contact_widget_contact'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php
    }
}