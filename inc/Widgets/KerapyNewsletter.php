<?php
    namespace Kerapy\Core\Widgets;
    use Carbon_Fields\Widget;
    use Carbon_Fields\Field;

    class KerapyNewsletter extends Widget {
        // Register widget function. Must have the same name as the class
        function __construct() {
            $this->setup( 'kerapy_newsletter', 'Kerapy Newsletter', 'Newsletter For Kerapy Theme', array(
                Field::make( 'text', 'title', 'Title' )->set_default_value( 'Newsletter') ,
                Field::make( 'text', 'nl_shortcode', __( 'Newsletter Shortcode' ) ),
            ) );
        }
        
        // Called when rendering the widget in the front-end
        function front_end( $args, $instance ) {
            echo $args['before_title'] . $instance['title'] . $args['after_title'];
            echo do_shortcode( $instance['nl_shortcode'] ); 
        }
    }

    

?>