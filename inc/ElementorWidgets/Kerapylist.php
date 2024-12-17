<?php
namespace Kerapy\Core\ElementorWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class Kerapylist extends \Elementor\Widget_Base{
    public function get_name() {
		return 'kp-list';
	}
    public function get_title() {
		return esc_html__( 'Kerapy List', 'kerapy-core' );
	}
    public function get_icon() {
		return 'eicon-editor-list-ul';
	}
    public function get_categories() {
		return [ 'kerapy-elements' ];
	}
    public function get_keywords() {
		return [ 'list', 'kerapy-core' ];
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
			'choose_list',
			[
				'label' => esc_html__( 'Icon Card', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					
                    [
                        'name' => 'title',
                        'label' => esc_html__( 'Title', 'kerapy-core' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Kerapy list title', 'kerapy-core' ),
                        'label_block'   => true
                    ],
                    [
                        'name' => 'desc',
                        'label' => esc_html__( 'Description', 'kerapy-core' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'Type your description here', 'kerapy-core' ),
                    ],
                    [
                        'name' => 'icon',
                        'label' => esc_html__( 'Icon', 'kerapy-core' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'far fa-check-circle',
                            'library' => 'fa-regular',
                        ],
                    ],
					
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
			'text_color',
			[
				'label' => esc_html__( 'Heading Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .list-title ' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'list_title_typography',
                'label' => esc_html__( 'Heading Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .list-title',
            ]
        );
        $this->add_control(
			'desc_color',
			[
				'label' => esc_html__( 'Description Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .list-description' => 'color: {{VALUE}} ',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'list_content_typography',
                'label' => esc_html__( 'Description Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .list-description p',
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .list-icon' => 'color: {{VALUE}};', // Apply color to parent
                    '{{WRAPPER}} .list-icon svg' => 'fill: {{VALUE}};', // Explicitly set fill for SVG
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
					'size' => 16,
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
					'{{WRAPPER}} .list-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};', 
					'{{WRAPPER}} .list-icon i' => 'font-size: {{SIZE}}{{UNIT}};', 
				],
			]
		);
        $this->add_control(
            'gap_elements',
            [
                'label' => esc_html__( 'Gap Between Title and Designation', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [ 'unit' => 'px', 'size' => 15 ],
                'selectors' => [
                    '{{WRAPPER}} .list-content' => 'display: flex; flex-direction: column; gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <div class="">
            <ul class="list-unstyled lh-lg d-flex flex-column gap-2 gap-md-3">
            <?php 
                foreach( $settings['choose_list'] as $list){
            ?>
                <li class="d-flex gap-2 gap-md-3">
                    <?php 
                        if($list['icon']){
                    ?>
                    <div class="list-icon ">
                        <?php \Elementor\Icons_Manager::render_icon( $list['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </div>
                    <?php } ?>
                    <div class="list-content">
                        <?php 
                            if($list['title']){
                        ?>
                        <h6 class="list-title">
                            <?php echo esc_html($list['title']); ?>
                        </h6>
                        <?php } ?>
                        <?php 
                            if($list['desc']){
                        ?>
                        <div class="list-description">
                            <p class="" ><?php echo esc_html($list['desc']); ?></p> 
                        </div>
                        <?php } ?>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
        <?php
	}      
          
}