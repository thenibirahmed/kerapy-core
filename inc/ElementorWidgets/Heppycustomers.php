<?php

namespace Kerapy\Core\ElementorWidgets;

use Elementor\WP_Query;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Heppycustomers extends Widget_Base{

    public function get_name(){
        return 'kp-happycustomers';
    }

    public function get_title() {
		return esc_html__( 'Kerapy Happy Customers', 'kerapy-core' );
	}

    public function get_icon(){
        return 'eicon-heading';
    }

    public function get_categories(){
        return [ 'kerapy-elements' ];
    }
    public function get_keywords() {
		return [ 'happy customers', 'kerapy-core', 'customers' ];
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
			'title',
			[
				'label' => esc_html__( 'Heading Content', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Happy Customers', 'kerapy-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'kerapy-core' ),
			]
		);
        $this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Are you tired of battling stubborn breakouts and blemishes? Welcome to Therapy', 'kerapy-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'kerapy-core' ),
			]
		);

        $this->end_controls_section();
        $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Content', 'kerapy-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
            
		);
        $this->add_control(
			'border-color',
			[
				'label' => esc_html__( 'Border Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .happy-customers-desc ' => 'border-color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

    }
    protected function render(){
        $settings = $this->get_settings_for_display();
		?>
        <div class="mb-4 mb-lg-0">
            <div class="d-flex flex-column justify-content-center text-center text-md-start gap-md-2">
                <div class="happy-customers-content d-flex flex-column gap-2">
                <h3 class="all-heading-color"><?php echo $settings['title']; ?></h3>
                <p class="happy-customers-desc"><?php echo $settings['description']; ?></p>
                </div>
            </div>
        </div>
		<?php
    }
    protected function content_template() {
        ?>
        <div class="mb-4 mb-lg-0">
            <div class="d-flex flex-column justify-content-center text-center text-md-start gap-md-2">
                <div class="happy-customers-content d-flex flex-column gap-2">
                    <h3 class="all-heading-color">{{{ settings.title }}}</h3>
                    <p class="happy-customers-desc">{{{ settings.description }}}</p>
                </div>
            </div>
        </div>
        <?php 
    }
}
