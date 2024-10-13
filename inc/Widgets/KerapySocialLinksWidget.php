<?php 

namespace Kerapy\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class KerapySocialLinksWidget extends Widget {

    function __construct() {
        $this->setup( 'kerapy_foooter_social_link', 'Kerapy Social Link', 'Displays social links with title/text', array(
            Field::make( 'complex', 'kerapy_foooter_social_links', 'Links' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'kerapy_foooter_social_link_link', 'Link' ),
                    Field::make( 'text', 'kerapy_foooter_social_link_icon', 'Icon' ),
                ) )
                ->set_default_value( array(
                    array( 'kerapy_foooter_social_link_icon' => 'fab fa-x', 'kerapy_foooter_social_link_link' => "#" ),
                    array( 'kerapy_foooter_social_link_icon' => 'fab fa-facebook-f', 'kerapy_foooter_social_link_link' => "#" ),
                    array( 'kerapy_foooter_social_link_icon' => 'fab fa-twitter', 'kerapy_foooter_social_link_link' => "#" ),
                    array( 'kerapy_foooter_social_link_icon' => 'fab fa-instagram', 'kerapy_foooter_social_link_link' => "#" ),
                ) ),
        ) );
    }
    
    function front_end( $args, $instance ) {
        ?>
            <ul class="list-unstyled">
                <li class="mb-3 footer-list-item">
                    <?php foreach($instance['kerapy_foooter_social_links'] as $social_icon) : ?>
                        <a href="<?php echo $social_icon['kerapy_foooter_social_link_link'] ?>" class="text-white social-icon"><i class="<?php echo $social_icon['kerapy_foooter_social_link_icon'] ?>"></i></a>
                    <?php endforeach ?>
                </li>
            </ul>
        <?php
    }
}