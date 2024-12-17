<?php
namespace Kerapy\Core\ElementorWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Kerapyvideo extends \Elementor\Widget_Base {

    public function get_name() {
        return 'kp-video';
    }

    public function get_title() {
        return esc_html__( 'Kerapy Video', 'kerapy-core' );
    }

    public function get_icon() {
        return 'eicon-slider-video';
    }

    public function get_categories() {
        return [ 'kerapy-elements' ];
    }

    public function get_keywords() {
        return [ 'video', 'kerapy-core' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content',
            [
                'label' => esc_html__( 'Content', 'kerapy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'sec_icon',
			[
				'label' => esc_html__( 'Icon', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
                    'value' => 'fas fa-play', // Default icon (play icon)
                    'library' => 'fa-solid',
                ],
				'recommended' => [
					'fa-solid' => [
						'star',
						'star-half-alt',
						'star-of-david',
					],
					'fa-regular' => [
						'star',
						'star-half-alt',
						'star-of-david',
					],
				],
			]
		);
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
					// 'url' => get_template_directory_uri() . '/assets/images/About_v1_banner.jpg',
				],
			]
		);
        $this->add_control(
			'video',
			[
				'label' => esc_html__( 'Video', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Video link', 'kerapy-core' ),
			]
		);
        
        $this->end_controls_section(); 
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'kerapy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .play-btn .circle-overlay' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'icon_ho_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover .circle-overlay' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
					'em' => [
						'min' => 0,
						'max' => 15,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .circle-overlay svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};', 
					'{{WRAPPER}} .circle-overlay i' => 'font-size: {{SIZE}}{{UNIT}};', 
				],
			]
		);
        $this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Icon BG Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#8a8a8a1f',
				'selectors' => [
					'{{WRAPPER}} .play-btn' => 'background-color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'icon_bg_hover_color',
			[
				'label' => esc_html__( 'Icon BG Hover Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff4d',
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
            'aspect_ratio',
            [
                'label' => esc_html__( 'Aspect Ratio', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '5 / 2.3',
                'options' => [
                    '1/1' => esc_html__( '1:1', 'kerapy-core' ),
                    '3/2'  => esc_html__( '3:2', 'kerapy-core' ),
                    '4/3'  => esc_html__( '4:3', 'kerapy-core' ),
                    '16/9' => esc_html__( '16:9', 'kerapy-core' ),
                    '21/9' => esc_html__( '21:9', 'kerapy-core' ),
                    '9/16' => esc_html__( '9:16', 'kerapy-core' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .video-img' => 'aspect-ratio: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
			'circle_width',
			[
				'label' => esc_html__( 'Width', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .play-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
	
		// Height Control
		$this->add_control(
			'circle_height',
			[
				'label' => esc_html__( 'Height', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'unit' => 'px',
					'size' => 100,  
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .play-btn' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section(); 
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        // Get the image ID and URL from the media control data
        $img_id = isset($settings['image']['id']) ? $settings['image']['id'] : null;
        $img_url = isset($settings['image']['url']) ? $settings['image']['url'] : '';
        $video_url = isset($settings['video']) ? $settings['video'] : '';
        
        // Check if image ID exists before rendering
        if ($img_id) { 
            ?>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="video-wrapper position-relative">
                        <?php 
                            // Display the image using the attachment ID
                            echo wp_get_attachment_image( $img_id, 'medium_large', false, array(
                                'class' => 'img-fluid video-img '
                            ));
                        ?>
                        <a data-fslightbox="html5-youtube-videos" href="<?php echo esc_url($video_url); ?>" class="play-btn">
                            <div class="circle-overlay">
                                <?php \Elementor\Icons_Manager::render_icon( $settings['sec_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        } elseif ($img_url) { 
            // Fallback if image ID is not available, use the image URL instead
            ?>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="video-wrapper position-relative">
                        <img class="img-fluid video-img" src="<?php echo esc_url($img_url); ?>" alt="Video Thumbnail">
                        <a data-fslightbox="html5-youtube-videos" href="<?php echo esc_url($video_url); ?>" class="play-btn">
                            <div class="circle-overlay">
                                <?php \Elementor\Icons_Manager::render_icon( $settings['sec_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    
}