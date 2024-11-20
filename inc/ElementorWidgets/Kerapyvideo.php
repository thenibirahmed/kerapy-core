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
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
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
                                'class' => 'img-fluid video-img'
                            ));
                        ?>
                        <a href="<?php echo esc_url($video_url); ?>" class="play-btn" target="_blank">
                            <div class="circle-overlay">
                                <i class="fas fa-play play-icon"></i>
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
                        <a href="<?php echo esc_url($video_url); ?>" class="play-btn" target="_blank">
                            <div class="circle-overlay">
                                <i class="fas fa-play play-icon"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}