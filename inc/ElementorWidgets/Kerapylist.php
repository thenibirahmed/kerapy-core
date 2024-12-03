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
			'text_color',
			[
				'label' => esc_html__( 'Heading Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .list-title ' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'desc_color',
			[
				'label' => esc_html__( 'Paragraph Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .list-description ' => 'color: {{VALUE}} ',
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
                    <div>
                        <?php 
                            if($list['title']){
                        ?>
                        <h6 class="mb-md-2 list-title">
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
    protected function content_template() {
        ?>
        <div class="">
            <ul class="list-unstyled lh-lg d-flex flex-column gap-2 gap-md-3">
                <# _.each( settings.choose_list, function( list ) { #>
                <li class="d-flex gap-2 gap-md-3">
                    <#
                        var iconHTML = elementor.helpers.renderIcon( view, list.icon, { 'aria-hidden': true }, 'i' , 'object' );
                    #>
                    <# if( list.icon ){ #>
                    <div class="list-icon ">
                        {{{ iconHTML.value }}}
                    </div>
                    <# } #>
                    <div>
                        <# if( list.title ){ #>
                        <h6 class="mb-md-2 list-title">
                            {{{ list.title }}}
                        </h6>
                        <# } #>
                        <# if( list.desc ){ #>
                        <div class="list-description">
                            <p class="" >{{{ list.desc }}}</p> 
                        </div>
                        <# } #>
                    </div>
                </li>
                <# }); #>
            </ul>
        </div>
        <?php
	}      
}