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

        $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Content', 'kerapy-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
            
		);
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} p, h6 ' => 'color: {{VALUE}}',
				],
			]
		);
        $this->end_controls_section();
    }
    protected function render() {
		$settings = $this->get_settings_for_display();
		?> 
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 g-sm-3 g-md-4 g-lg-5 justify-content-center increment">
            <?php 
                foreach( $settings['work_process'] as $process){
            ?>
            <div class="box">
                <div class="circle"></div>
                <h6 class="py-md-3 all-heading-color"><?php echo esc_html($process['title']);?></h6>
                <p><?php echo esc_html($process['desc']); ?></p>
            </div>
            <?php } ?>
        </div>
        <?php
	}      
    protected function content_template() {
		?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 g-sm-3 g-md-4 g-lg-5 justify-content-center increment">
            <# _.each( settings.work_process, function( process ) { #>
            <div class="box">
                <div class="circle"></div>
                <h6 class="py-md-3 all-heading-color">{{{ process.title }}}</h6>
                <p>{{{ process.desc }}}</p>
            </div>
            <# }); #>
        </div>
        <?php
	}     
}