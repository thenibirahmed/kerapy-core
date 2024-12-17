<?php

namespace Kerapy\Core\ElementorWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\WP_Query;
use Elementor\Group_Control_Image_Size;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Testimonial2 extends Widget_Base{

    public function get_name(){
        return 'kp-testimonial2';
    }

    public function get_title(){
        return 'Kerapy Testimonial Two';
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
                        'name' => 'image',
                        'label' => esc_html__('Choose Image', 'kerapy-core'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
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
            'ts_content_color2',
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
                'name' => 'laft_title2_typography',
                'label' => esc_html__( 'Content Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .ts_content',
            ]
        );
        $this->add_control(
            'ts_name_color2',
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
                'name' => 'ts2_name_typography',
                'label' => esc_html__( 'Name Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .ts_name',
            ]
        );
        $this->add_control(
            'ts_designation_color2',
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
                'name' => 'ts2_designation_typography',
                'label' => esc_html__( 'Designation Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .ts_designation',
            ]
        );
        $this->add_control(
            'quotation_color2',
            [
                'label' => esc_html__( 'Quotation Icon Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#b8b8b9',
                'selectors' => [
                    '{{WRAPPER}} .tesimonial2-icon svg' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
			'quotation_font_size2',
			[
				'label' => esc_html__( 'Quotation Font Size', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 200,
					],
					'em' => [
						'min' => 1,
						'max' => 15,
					],
					'%' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tesimonial2-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};', 
					'{{WRAPPER}} .tesimonial2-icon i' => 'font-size: {{SIZE}}{{UNIT}};', 
				],
			]
		);
        $this->add_control(
            'ts_icon_font_color2',
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
            'icon_font_size2',
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
            'ts_btn_width2',
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
            'ts_btn_height2',
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
            'ts_border_color2',
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
            'border_width2',
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
            'border_radius2',
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
            'ts_bg_color2',
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
            'ts_sec_bg_color2',
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
			'ts_padding2',
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
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'ts_image_size', 
                'default' => 'large',
                'label' => esc_html__( 'Image Size', 'kerapy-core' ),
                'description' => esc_html__( 'Set the size of the image.', 'kerapy-core' ),
            ]
        );
        $this->end_controls_section();

    }
    protected function render(){
        $settings = $this->get_settings_for_display();
        ?>
            <div class="testimonial-box ts-nav-button">
                <div class="owl-testimonial-slider owl-carousel owl-theme">
                <?php
                    foreach($settings['list'] as $item ):
                        ?>
                        <div class="row testimonial-section mx-auto section-bg ">
                                <div class="col-12 col-md-6">
                                    <div>
                                        <div class="tesimonial2-icon pb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="" height="" viewBox="0 0 20 20"><path fill="currentColor" d="m7 6l1-2H6C3.79 4 2 6.79 2 9v7h7V9H5c0-3 2-3 2-3m7 3c0-3 2-3 2-3l1-2h-2c-2.21 0-4 2.79-4 5v7h7V9z"/></svg>
                                        </div>
                                        <h5 class="ts_content">
                                            <?php echo esc_html($item['content']);?>
                                        </h5>
                                        <div class="d-flex justify-content-between">
                                            <div class="mt-2 mt-md-4 author-name">
                                                <h6 class="ts_name">
                                                    <?php echo esc_html($item['author']);?>
                                                </h6>
                                                <p class="ts_designation">
                                                    <?php echo esc_html($item['designation']);?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 pt-2 pt-md-0">
                                    <?php  
                                        $id = $item['image']['id']; 
                                        $url = $item['image']['url'];
                                        if($id){
                                            $image_url = Group_Control_Image_Size::get_attachment_image_src( $id, 'ts_image_size', $settings );
                                            
                                        }else{
                                            $image_url = $url;
                                        }
                                        
                                    ?>
                                    <img class="tesimonial2-img img-fluid" src="<?php echo esc_url($image_url); ?>" alt="">
                                    
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
                    loop: true,
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
                    }
                });
            });
        </script>

        <?php
    }    
    
      
}