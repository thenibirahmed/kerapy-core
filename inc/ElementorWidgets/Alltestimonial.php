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
			'tmcard',
			[
				'label' => esc_html__( 'Testimonial Card Style', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'testimonial1',
				'options' => [
					'testimonial1' => esc_html__( 'Style One', 'kerapy-core' ),
					'testimonial2' => esc_html__( 'Style Two', 'kerapy-core' ),
				],
			]
		);
        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'img',
                        'label' => esc_html__( 'Choose Image', 'kerapy-core' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'content',
                        'label' => esc_html__( 'Content', 'kerapy-core' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, We were happy that we found the best' , 'kerapy-core' ),
                        'rows' => 10,
                        'placeholder' => esc_html__( 'Type your text here', 'kerapy-core' ),
                    ],
					[
						'name' => 'author',
						'label' => esc_html__( 'Title', 'kerapy-core' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Amelia' , 'kerapy-core' ),
						'label_block' => true,
					],
					[
						'name' => 'designation',
						'label' => esc_html__( 'Title', 'kerapy-core' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Co-Founder, Elegant' , 'kerapy-core' ),
						'label_block' => true,
					],
				],
				'default' => [
					[
						'author' => esc_html__( 'Amelia', 'kerapy-core' ),
						'designation' => esc_html__( 'Co-Founder, Elegant', 'kerapy-core' ),
						'content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, We were happy that we found the best', 'kerapy-core' ),
					],
				],
				'title_field' => '{{{ author }}}',
			]
		);

        $this->end_controls_section();

    }
    protected function render(){
        $settings = $this->get_settings_for_display();
            if($settings['tmcard'] == 'testimonial1' ){
                ?>
                <div class="testimonial-slider">
                    <div class="bg-light p-4 mt-4 owl-testimonial-slider owl-carousel owl-theme">
                    <?php
                       foreach($settings['list'] as $item )
                        include( "all-testimonial/{$settings['tmcard']}.php" );
                    ?>
                    </div>
                </div>
                    
                <?php   
            }
            if($settings['tmcard'] == 'testimonial2' ){
                ?>
                    <div class="testimonial-box">
                        <div class="bg-light p-4 mt-4 owl-testimonial-slider owl-carousel owl-theme">
                        <?php
                            foreach($settings['list'] as $item )
                                include( "all-testimonial/{$settings['tmcard']}.php" );
                            ?>

                        </div>
                    </div>
                    
                <?php   
            }

        ?>
        
        <script>
            jQuery(document).ready(function($) {
                $(".owl-testimonial-slider").owlCarousel({
                    loop: true,
                    margin: 20,
                    autoplay: false,
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
    protected function content_template() {
        ?>
        <# if (settings.tmcard === 'testimonial1') { #>
            <div class="testimonial-slider">
                <div class="bg-light p-4 mt-4 owl-testimonial-slider owl-carousel owl-theme">
                    <# _.each(settings.list, function(item) { #>
                        <div class="text-center text-md-start">
                            <h5 class="text-black-50">
                                {{{ item.content }}}
                            </h5>
                            <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between mt-4">
                                <div class="testi-name">
                                    <h6 class="all-heading-color">
                                        {{{ item.author }}}
                                    </h6>
                                    <p>
                                        {{{ item.designation }}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    <# }); #>
                </div>
            </div>
        <# } else if (settings.tmcard === 'testimonial2') { #>
            <div class="testimonial-box">
                <div class="bg-light p-4 mt-4 owl-testimonial-slider owl-carousel owl-theme">
                    <# _.each(settings.list, function(item) { #>
                        <div class="row testimonial-section mx-auto bg-white p-1 p-md-5">
                            <div class="col-12 col-md-6">
                                <div>
                                    <div class="tesimonial2-icon pb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="m7 6l1-2H6C3.79 4 2 6.79 2 9v7h7V9H5c0-3 2-3 2-3m7 3c0-3 2-3 2-3l1-2h-2c-2.21 0-4 2.79-4 5v7h7V9z"/></svg>
                                    </div>
                                    <h5 class="text-black-50">
                                        {{{ item.content }}}
                                    </h5>
                                    <div class="d-flex justify-content-between">
                                        <div class="mt-2 mt-md-4 author-name">
                                            <h6 class="all-heading-color">
                                                {{{ item.author }}}
                                            </h6>
                                            <p>
                                                {{{ item.designation }}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pt-2 pt-md-0">
                                <# if (item.img && item.img.url) { #>
                                    <img class="img-fluid tesimonial2-img" src="{{ item.img.url }}" alt="{{ item.author }}">
                                <# } #>
                            </div>
                        </div>
                    <# }); #>
                </div>
            </div>
        <# } #>
        <script>
            jQuery(document).ready(function($) {
                $(".owl-testimonial-slider").owlCarousel({
                    loop: true,
                    margin: 20,
                    autoplay: false,
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