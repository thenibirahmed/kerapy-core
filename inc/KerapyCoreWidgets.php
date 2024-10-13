<?php 

namespace Kerapy\Core;

class KerapyCoreWidgets {

    public function __construct() {
        register_widget( 'Kerapy\Core\Widgets\KerapyMenuWidget' );   
        register_widget( 'Kerapy\Core\Widgets\KerapyFooterContactWidget' );    
    }
}