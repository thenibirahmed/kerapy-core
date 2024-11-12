<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


// post custom fields
Container::make( 'post_meta', 'Posts Options' )
   ->where( 'post_type', '=', 'post' )
   ->add_fields( array(
      Field::make( 'text', 'test', 'Test Field' ),
   ));


// testimonial custom fields
Container::make( 'post_meta', 'Testimonial Options' )
   ->where( 'post_type', '=', 'testimonial' )
   ->add_fields( array(
      Field::make( 'image', 'avater', 'Profile Image' ),
      Field::make( 'textarea', 'content', 'Content' ),
      Field::make( 'text', 'client_name', 'Client Name' ),
      Field::make( 'text', 'designation', 'Designation' ),

   ));


