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
                        'label_block'   => true
                    ],
                    [
						'name' => 'content',
						'label' => esc_html__( 'Content', 'kerapy-core' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Description' , 'kerapy-core' ),
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
    } 
    protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <div class="">
            <div class="accordion">
            <?php 
                foreach( $settings['accordion'] as $index => $accordion){
            ?>
                <div class="accordion-item border-0 mb-3 ">
                    <h2 class="accordion-header">
                        <button class="accordion-button bg-light all-heading-color" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo esc_html($index);?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?php echo esc_html($index);?>">
                        <?php echo esc_html($accordion['title']);?>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse<?php echo esc_html($index);?>" class="accordion-collapse collapse <?php if($index==0){ echo 'show';}?>">
                        <div class="accordion-body bg-light">
                            <?php echo wp_kses_post($accordion['content']) ; ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php
	}      
}