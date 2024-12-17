<?php

namespace Kerapy\Core\ElementorWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\WP_Query;
use Elementor\Group_Control_Image_Size;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Testimonial1 extends Widget_Base{

    public function get_name(){
        return 'kp-testimonial1';
    }

    public function get_title(){
        return 'Kerapy Testimonial One';
    }

    public function get_icon(){
        return 'eicon-testimonial';
    }

    public function get_categories(){
        return [ 'kerapy-elements' ];
    }

    public function get_keywords(){
        return [ 'testimonial', 'kerapy-core','all-testimonial' ];
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
            'list',
            [
                'label' => esc_html__('Repeater List', 'kerapy-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'content',
                        'label' => esc_html__('Content', 'kerapy-core'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, We were happy that we found the best', 'kerapy-core'),
                        'rows' => 10,
                        'placeholder' => esc_html__('Type your text here', 'kerapy-core'),
                    ],
                    [
                        'name' => 'author',
                        'label' => esc_html__('Name', 'kerapy-core'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Amelia', 'kerapy-core'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'designation',
                        'label' => esc_html__('Designation', 'kerapy-core'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Co-Founder, Elegant', 'kerapy-core'),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'author' => esc_html__('Amelia', 'kerapy-core'),
                        'designation' => esc_html__('Co-Founder, Elegant', 'kerapy-core'),
                        'content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, We were happy that we found the best', 'kerapy-core'),
                    ],
                ],
                'title_field' => '{{{ author }}}',
            ]
        );
        
        $this->end_controls_section();
        // Start Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'kerapy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        // style one
        $this->add_control(
            'ts_content_color1',
            [
                'label' => esc_html__( 'Content Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#9b9b9b',
                'selectors' => [
                    '{{WRAPPER}} .ts_content' => 'color: {{VALUE}} ',
                ],
                
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ts_title1_typography',
                'label' => esc_html__( 'Content Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .ts_content',
            ]
        );
        $this->add_control(
            'ts_name_color1',
            [
                'label' => esc_html__( 'Name Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#212529',
                'selectors' => [
                    '{{WRAPPER}} .ts_name' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ts1_name_typography',
                'label' => esc_html__( 'Name Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .ts_name',
            ]
        );
        $this->add_control(
            'ts_designation_color1',
            [
                'label' => esc_html__( 'Designation Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#9b9b9b',
                'selectors' => [
                    '{{WRAPPER}} .ts_designation' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ts1_designation_typography',
                'label' => esc_html__( 'Designation Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .ts_designation',
            ]
        );
        
        $this->add_control(
            'ts_icon_font_color1',
            [
                'label' => esc_html__( 'Navigation Button Icon Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#b8b8b9',
                'selectors' => [
                    '{{WRAPPER}} .ts-nav-button .owl-nav button span' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'icon_font_size1',
            [
                'label' => esc_html__( 'Navigation Button Icon Font Size', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ts-nav-button .owl-nav button span' => 'font-size: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_control(
            'ts_btn_width1',
            [
                'label' => esc_html__( 'Navigation Button Width', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%' ],  
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'range' => [
                    'px' => [
                        'min' => 50, 
                        'max' => 1200,
                        'step' => 1, 
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ts-nav-button .owl-nav button' => 'width: {{SIZE}}{{UNIT}};', 
                ],
            ]
        );
        $this->add_control(
            'ts_btn_height1',
            [
                'label' => esc_html__( 'Navigation Button Height', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%' ],  
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'range' => [
                    'px' => [
                        'min' => 50, 
                        'max' => 1200,
                        'step' => 1, 
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ts-nav-button .owl-nav button' => 'height: {{SIZE}}{{UNIT}};', 
                ],
            ]
        );
        $this->add_control(
            'ts_border_color1',
            [
                'label' => esc_html__( 'Navigation Button Border Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#b8b8b9',
                'selectors' => [
                    '{{WRAPPER}} .ts-nav-button .owl-nav button' => 'border-color: {{VALUE}} ;',
                ],
            ]
        );
        $this->add_control(
            'border_width1',
            [
                'label' => esc_html__( 'Navigation Button Border Width', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => '1',
                    'right' => '1',
                    'bottom' => '1',
                    'left' => '1',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ts-nav-button .owl-nav button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; border-style: solid;',
                ],
            ]
        );
        $this->add_control(
            'border_radius1',
            [
                'label' => esc_html__( 'Navigation Button Border Radius', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => '50', 
                    'right' => '50',
                    'bottom' => '50',
                    'left' => '50',
                    'unit' => 'px', 
                ],
                'selectors' => [
                    '{{WRAPPER}} .ts-nav-button .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;', 
                ],
            ]
        );
        
        $this->add_control(
            'ts_bg_color',
            [
                'label' => esc_html__( 'Navigation Button BG Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#00DCC2',
                'selectors' => [
                    '{{WRAPPER}} .ts-nav-button .owl-nav button:hover' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'ts_sec_bg_color1',
            [
                'label' => esc_html__( 'Section BG Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f8f9fa',
                'selectors' => [
                    '{{WRAPPER}} .section-bg' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
			'ts_padding1',
			[
				'label' => esc_html__( 'Padding', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'top' => '20',
					'right' => '20',
					'bottom' => '20',
					'left' => '20',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .section-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_section();

    }
    protected function render(){
        $settings = $this->get_settings_for_display();
            ?>
            <div class="testimonial-slider ts-nav-button">
                <div class="section-bg owl-testimonial-slider owl-carousel">
                <?php
                    foreach($settings['list'] as $item ):
                    ?>
                    <div class="text-center text-md-start">
                        <h5 class="ts_content" >
                            <?php echo esc_html($item['content']);?>
                        </h5>
                        <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between mt-4">
                            <div class="">
                                <h6 class="ts_name">
                                    <?php echo esc_html($item['author']);?>
                                </h6>
                                <p class="ts_designation">
                                    <?php echo esc_html($item['designation']);?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                    endforeach;
                ?>
                </div>
            </div>
            <?php   
        ?>
        
        <script>
            jQuery(document).ready(function($) {
                $(".owl-testimonial-slider").owlCarousel({
                    loop: false,
                    margin: 20,
                    autoplay: true,
                    autoHeight:true,
                    autoplayTimeout: 2500,
                    autoplayHoverPause: true,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: { items: 1 },
                        600: { items: 1 },
                        1000: { items: 1 }
                    },
                });
                
            });
            
        </script>

        <?php
    }    
    
      
}