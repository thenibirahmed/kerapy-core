<?php
namespace Kerapy\Core\ElementorWidgets;;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class Accordion extends \Elementor\Widget_Base{
    public function get_name() {
		return 'kerapy-accordion';
	}
    public function get_title() {
		return esc_html__( 'Kerapy Accordion', 'kerapy-core' );
	}
    public function get_icon() {
		return 'eicon-accordion';
	}
    public function get_categories(){
        return [ 'kerapy-elements' ];
    }
    public function get_keywords() {
		return [ 'accordion', 'kerapy-core' ];
	}
    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'kerapy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'accordion',
            [
                'label' => esc_html__( 'Accordion', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__( 'Title', 'kerapy-core' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Awesome title', 'kerapy-core' ),
                        'label_block' => true
                    ],
                    [
                        'name' => 'content',
                        'label' => esc_html__( 'Content', 'kerapy-core' ),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'default' => esc_html__( 'Description', 'kerapy-core' ),
                        'show_label' => false,
                    ],
                ],
                'default' => [
                    [
                        'title' => esc_html__( 'Title One', 'kerapy-core' ),
                        'desc' => esc_html__( 'The card description goes here.', 'kerapy-core' ),
                    ]
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'kerapy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'accordion_title_typography',
                'label' => esc_html__( 'Title Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .accordion-button.accordion-title-bg',
            ]
        );
        $this->add_control(
            'accordion_title_color',
            [
                'label' => esc_html__( 'Title Text Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'accordion_content_typography',
                'label' => esc_html__( 'Content Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .accordion-content-ty p',
            ]
        );
        $this->add_control(
            'accordion_content_color',
            [
                'label' => esc_html__( 'Content Text Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-content-ty p' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'accordion_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-title-bg' => 'background: {{VALUE}} !important;',
                ],
            ]
        );
        
        $this->add_control(
            'accordion_padding',
            [
                'label' => esc_html__( 'Padding', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="">
            <div class="accordion">
                <?php 
                    foreach( $settings['accordion'] as $index => $accordion){
                ?>
                    <div class="accordion-item border-0 mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button accordion-title-bg" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo esc_html($index);?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?php echo esc_html($index);?>">
                            <?php echo esc_html($accordion['title']);?>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapse<?php echo esc_html($index);?>" class="accordion-collapse collapse <?php if($index==0){ echo 'show';}?>">
                            <div class="accordion-body accordion-title-bg accordion-content-ty">
                                <?php echo wp_kses_post($accordion['content']); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
    }    
    // protected function content_template() {
    //     <div class="">
    //         <div class="accordion">
    //             <# _.each( settings.accordion, function( accordion, index ) { #>
    //             <div class="accordion-item border-0 mb-3">
    //                 <h2 class="accordion-header">
    //                     <button class="accordion-button bg-light all-heading-color" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{ index }}" aria-expanded="{{ index === 0 ? 'true' : 'false' }}" aria-controls="panelsStayOpen-collapse{{ index }}">
    //                     {{{ accordion.title }}}
    //                     </button>
    //                 </h2>
    //                 <div id="panelsStayOpen-collapse{{ index }}" class="accordion-collapse collapse <# if ( index === 0 ) { #>show<# } #>">
    //                     <div class="accordion-body bg-light">
    //                         {{{ accordion.content }}}
    //                     </div>
    //                 </div>
    //             </div>
    //             <# }); #>
    //         </div>
    //     </div>
    //     <?php      
}