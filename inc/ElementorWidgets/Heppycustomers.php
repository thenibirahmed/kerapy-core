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
		// style tab
        $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Content', 'kerapy-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
            
		);
		$this->add_control(
			'happy_title_color',
			[
				'label' => esc_html__( 'Heading Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .happy_tilte' => 'color: {{VALUE}} !important',
				],
                
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'happy_title_typography',
                'label' => esc_html__( 'Heading Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .happy_tilte',
            ]
        );
		$this->add_control(
			'happy_desc_color',
			[
				'label' => esc_html__( 'Description Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#666666',
				'selectors' => [
					'{{WRAPPER}} .happy-customers-desc' => 'color: {{VALUE}} !important',
				],
                
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'happy_desc_typography',
                'label' => esc_html__( 'Description Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .happy-customers-desc',
            ]
        );
        
		$this->add_control(
			'border-color',
			[
				'label' => esc_html__( 'Border Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#5fc4be',
				'selectors' => [
					'{{WRAPPER}} .happy-customers-desc' => 'border-color: {{VALUE}} !important',
				],
			]
		);
		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'top' => '6',
					'right' => '0',
					'bottom' => '6',
					'left' => '16',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .happy-customers-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'widget_width',
			[
				'label' => esc_html__( 'Width', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'unit' => 'px',
					'size' => 2,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .happy-customers-desc' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
        $this->end_controls_section();

    }
    protected function render(){
        $settings = $this->get_settings_for_display();
		?>
        <div class="mb-4 mb-lg-0">
            <div class="">
                <div class="happy-customers-content d-flex flex-column gap-2">
					<h3 class="happy_tilte"><?php echo $settings['title']; ?></h3>
					<p class="happy-customers-desc"><?php echo $settings['description']; ?></p>	
                </div>
            </div>
        </div>
		<?php
    }
    
}
