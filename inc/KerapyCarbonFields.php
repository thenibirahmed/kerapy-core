<?php
namespace Kerapy\Core;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class KerapyCarbonFields {
    public function __construct()
    {
        $this->registerCustomFields();
    }

    public function registerCustomFields()
    {
        Container::make( 'post_meta', 'Options' )
            ->where( 'post_type', '=', 'kerapy-templates' )
            ->add_fields( array(
                Field::make( 'select', 'crb_select', __( 'Template Type' ) )
                    ->add_options( array(
                        'header' => __( 'Header', 'kerapy-core' ),
                        'footer' => __( 'Footer', 'kerapy-core' ),
                        'template' => __( 'Template', 'kerapy-core' ),
                    ) )
                    ->set_default_value( 'template' ),
            ))
            ->set_context('side');;
    }
}


