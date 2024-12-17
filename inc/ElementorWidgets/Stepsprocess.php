<?php
namespace Kerapy\Core\ElementorWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class Stepsprocess extends \Elementor\Widget_Base{
    public function get_name() {
		return 'kp-process';
	}
    public function get_title() {
		return esc_html__( 'Kerapy Steps Process', 'kerapy-core' );
	}
    public function get_icon() {
		return 'eicon-gallery-grid';
	}
    public function get_categories(){
        return [ 'kerapy-elements' ];
    }
    public function get_keywords() {
		return [ 'Steps process', 'kerapy-core', 'process' ];
	}
    protected function register_controls() {
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'kerapy-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'work_process',
			[
				'label' => esc_html__( 'Icon Card', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__( 'Title', 'kerapy-core' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Title', 'kerapy-core' ),
                        'label_block'   => true
                    ],
                    [
                        'name' => 'desc',
                        'label' => esc_html__( 'Description', 'kerapy-core' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'Type your description here', 'kerapy-core' ),
                    ]
					
				],
                'default' => [
					[
						'title' => esc_html__( 'Title', 'kerapy-core' ),
						'desc' => esc_html__( 'The card description goes here.', 'kerapy-core' ),
					]
					
				],
                'title_field' => '{{{ title }}}',
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
			'circle_color',
			[
				'label' => esc_html__( 'Number Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .circle' => 'color: {{VALUE}} ',
				],
                
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'circle_typography',
                'label' => esc_html__( 'Number Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .circle',
            ]
        );
		$this->add_control(
			'circle_bg_color',
			[
				'label' => esc_html__( 'Circle Background Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#0052A8',
				'selectors' => [
					'{{WRAPPER}} .circle' => 'background-color: {{VALUE}} ',
				],
                
			]
		);
		$this->add_control(
			'circle_divider_color',
			[
				'label' => esc_html__( 'Divider Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#0052A8',
				'selectors' => [
					'{{WRAPPER}} .box::before' => 'background-color: {{VALUE}} ',
				],
                
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sp_card_tilte' => 'color: {{VALUE}} ',
				],
                
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Title Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .sp_card_tilte',
            ]
        );
		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Description Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
				'selectors' => [
					'{{WRAPPER}} .sp-desc' => 'color: {{VALUE}} ',
				],
                
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__( 'Description Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .sp-desc',
            ]
        );
		$this->add_control(
            'circle_gap_elements',
            [
                'label' => esc_html__( 'Gap Between Circle Content', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [ 'unit' => 'px', 'size' => 30 ],
                'selectors' => [
                    '{{WRAPPER}} .box_content' => 'padding-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
            'content_gap_elements',
            [
                'label' => esc_html__( 'Gap Between Title Content', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [ 'unit' => 'px', 'size' => 4 ],
                'selectors' => [
                    '{{WRAPPER}} .box_content' => 'display: flex; flex-direction: column; gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
			'circle_width',
			[
				'label' => esc_html__( 'Circle Width', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'unit' => 'px',
					'size' => 80,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .circle' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
	
		// Height Control
		$this->add_control(
			'circle_height',
			[
				'label' => esc_html__( 'Circle Height', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'unit' => 'px',
					'size' => 80,  
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .circle' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();
    }
    protected function render() {
		$settings = $this->get_settings_for_display();
		?> 
        <div class="d-flex align-items-start w-100 justify-content-start increment sp-seciton">
            <?php 
                foreach( $settings['work_process'] as $process){
            ?>
            <div class="box">
                <div class="circle_divider">
					<div class="circle"></div>
				</div>
                <div class="box_content px-2">
					<h6 class="sp_card_tilte"><?php echo esc_html($process['title']);?></h6>
					<p class="sp-desc"><?php echo esc_html($process['desc']); ?></p>
				</div>
            </div>
            <?php } ?>
        </div>
        <?php
	}      
        
}