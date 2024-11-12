<?php

namespace Kerapy\Core\ElementorWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\WP_Query;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Alltestimonial extends Widget_Base{

    public function get_name(){
        return 'kp-testimonial';
    }

    public function get_title(){
        return 'Kerapy Testimonials';
    }

    public function get_icon(){
        return 'eicon-testimonial';
    }

    public function get_categories(){
        return [ 'kerapy_element' ];
    }

    public function get_keywords(){
        return [ 'testimonial', 'kerapy','all-testimonial' ];
    }

    protected function _register_controls(){

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'kerapy' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'items_to_display',
			[
				'label' => esc_html__( 'Items to display', 'kerapy' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 2,
			]
		);
        $this->add_control(
			'tmcard',
			[
				'label' => esc_html__( 'Testimonial Card Style', 'kerapy' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'testimonial1',
				'options' => [
					'testimonial1' => esc_html__( 'Style One', 'kerapy' ),
					'testimonial2' => esc_html__( 'Style Two', 'kerapy' ),
				],
			]
		);
        $options = [];        
		$tm = new \WP_Query([
			'post_type'	=> 'testimonial',
			'posts_per_page' => -1
		]);
		while($tm->have_posts()){
			$tm->the_post();
			$options[get_the_ID()] = get_the_title();
		}
        
        $this->add_control(
            'postid',
            [
                'label' => __( 'Select Testimonial Title', 'kerapy' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => $options,      
            ]
        );

        $this->end_controls_section();

    }
    protected function render(){
        $settings = $this->get_settings_for_display();
        $args = array(
            'post_type'     => 'testimonial',
            'posts_per_page' => $settings[ 'items_to_display' ]
        );
        if( $settings['postid'] != null ){
            $args['post__in'] = $settings['postid'];
        }
        $testimonial = new \WP_Query($args);

        if( $testimonial -> have_posts() ) {
            if($settings['tmcard'] == 'testimonial1' ){
                ?>
                    <div class="">
                    <?php
                        while($testimonial -> have_posts()) : $testimonial -> the_post();
                        include( "all-testimonial/{$settings['tmcard']}.php" );
                    ?>
                    <?php endwhile; wp_reset_postdata(); ?>

                    </div>
                    <script>
                    </script>
                <?php   
            }
            
        ?>
        
            
        <?php
        }
    }    
}