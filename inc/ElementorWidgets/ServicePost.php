<?php

namespace Kerapy\Core\ElementorWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\WP_Query;
use Elementor\Group_Control_Image_Size;

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
        $this->add_control(
			'slider_items_to_display',
			[
				'label' => esc_html__( 'Slider Items to display', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
                'condition' => [
                    'tmcard' => 'servicepost1',
                ],
			]
		);
        $this->add_responsive_control(
            'gap',
            [
                'label' => esc_html__('Column Gap', 'kerapy-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '0' => esc_html__('No Gap', 'kerapy-core'),
                    '2' => esc_html__('Small Gap', 'kerapy-core'),
                    '4' => esc_html__('Medium Gap', 'kerapy-core'),
                    '5' => esc_html__('Large Gap', 'kerapy-core'),
                ],
                'default' => '4', // Default gap size (Small Gap)
                'frontend_available' => true,
                'condition' => [
                    'tmcard' => 'servicepost2',
                ],
            ]
        );
        $this->end_controls_section();

        // style tab
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Content', 'kerapy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__( 'Heading Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-post-title' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
                'label' => __( 'Heading Typography', 'kerapy-core' ),
				'selector' => '{{WRAPPER}} .service-post-title',
			]
		);
        $this->add_control(
            'excerpt_color',
            [
                'label' => esc_html__( 'Content Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .service-post-text p' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
                'label' => __( 'Content Typography', 'kerapy-core' ),
				'selector' => '{{WRAPPER}} .service-post-text p',
			]
		);
        $this->add_control(
            'service_border_radius',
            [
                'label' => esc_html__( 'Image Border Radius', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-img-radius' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'post2_gap_elements',
            [
                'label' => esc_html__( 'Gap Between Image Heading & Text', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'default' => [ 'unit' => 'px', 'size' => 4 ],
                'selectors' => [
                    '{{WRAPPER}} .service-post-gap' => 'display: flex; flex-direction: column; gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'columns',
            [
                'label' => esc_html__('Columns', 'kerapy-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => esc_html__('1 Column', 'kerapy-core'),
                    '2' => esc_html__('2 Columns', 'kerapy-core'),
                    '3' => esc_html__('3 Columns', 'kerapy-core'),
                    '4' => esc_html__('4 Columns', 'kerapy-core'),
                ],
                'default' => '3',
                'frontend_available' => true, 
                'condition' => [
                    'tmcard' => 'servicepost2',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'service_image_size', 
                'label' => esc_html__( 'Image Size', 'kerapy-core' ),
                'description' => esc_html__( 'Choose the size of the image.', 'kerapy-core' ),
                'default' => 'large', // Default image size
            ]
        );
        $this->end_controls_section();

    }
    protected function render(){
        $settings = $this->get_settings_for_display();
        $columns = !empty($settings['columns']) ? intval($settings['columns']) : 2;
        $col_class = 'col-md-' . (12 / $columns);
        $args = array(
            'post_type'     => 'service',
            'posts_per_page' => $settings[ 'items_to_display' ]
        );
        $serices = new \WP_Query($args);

        if( $serices -> have_posts() ) {
            if($settings['tmcard'] == 'servicepost1' ){
                ?>
                    <div class="row service-carousel owl-carousel pb-4">
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
                    <div class="row justify-content-start <?php echo esc_attr($settings['gap'] === '0' ? 'g-0' : 'g-' . $settings['gap']); ?>">
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
                        items:<?php echo $settings[ 'slider_items_to_display' ];?>
                    },
                    600:{
                        items:<?php echo $settings[ 'slider_items_to_display' ];?>
                    },
                    1000:{
                        items:<?php echo $settings[ 'slider_items_to_display' ];?>
                    }
                }
            });
        });
    </script>

        <?php
        }
    }    
    
}
