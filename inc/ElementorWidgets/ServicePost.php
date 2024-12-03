<?php

namespace Kerapy\Core\ElementorWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\WP_Query;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class ServicePost extends Widget_Base{

    public function get_name(){
        return 'kp-service';
    }

    public function get_title(){
        return 'Kerapy Services';
    }

    public function get_icon(){
        return 'eicon-post';
    }

    public function get_categories(){
        return [ 'kerapy-elements' ];
    }

    public function get_keywords(){
        return [ 'service', 'kerapy-core','post' ];
    }

    protected function _register_controls(){

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'kerapy-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'tmcard',
			[
				'label' => esc_html__( 'Services Post Style', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'servicepost1',
				'options' => [
					'servicepost1' => esc_html__( 'Style One', 'kerapy-core' ),
					'servicepost2' => esc_html__( 'Style Two', 'kerapy-core' ),
				],
			]
		);
        $this->add_control(
			'items_to_display',
			[
				'label' => esc_html__( 'Items to display', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
			]
		);
        $this->end_controls_section();

    }
    protected function render(){
        $settings = $this->get_settings_for_display();
        $args = array(
            'post_type'     => 'service',
            'posts_per_page' => $settings[ 'items_to_display' ]
        );
        $serices = new \WP_Query($args);

        if( $serices -> have_posts() ) {
            if($settings['tmcard'] == 'servicepost1' ){
                ?>
                    <div class="row service-carousel owl-carousel">
                        <?php
                            while($serices -> have_posts()) : $serices -> the_post();
                            include( "all-services/{$settings['tmcard']}.php" );
                        ?>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                    
                <?php   
            }
            if($settings['tmcard'] == 'servicepost2' ){
                ?>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5 justify-content-center">
                        <?php
                            while($serices -> have_posts()) : $serices -> the_post();
                            include( "all-services/{$settings['tmcard']}.php" );
                        ?>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                    
                <?php   
            }
            

        ?>
        <script>
        jQuery(document).ready(function ($) {
            $(".service-carousel").owlCarousel({
                loop: true,
                margin: 20,
                autoplay: false,
                autoHeight:true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                nav: false,
                dots: true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            });
        });
    </script>

        <?php
        }
    }    
    
}
