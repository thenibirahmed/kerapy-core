<?php
namespace Kerapy\Core\ElementorWidgets;;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class ChooseUslist extends \Elementor\Widget_Base{
    public function get_name() {
		return 'chooseus-list';
	}
    public function get_title() {
		return esc_html__( 'Choose Us List', 'kerapy' );
	}
    public function get_icon() {
		return 'eicon-editor-list-ul';
	}
    public function get_categories() {
		return [ 'toffee_element' ];
	}
    public function get_keywords() {
		return [ 'card', 'kerapy', 'icon-card' ];
	}
    protected function register_controls() {
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'kerapy' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'choose_list',
			[
				'label' => esc_html__( 'Icon Card', 'kerapy' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
                        'name' => 'icon',
                        'label' => esc_html__( 'Icon', 'kerapy' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [],
                    ],
                    [
                        'name' => 'title',
                        'label' => esc_html__( 'Title', 'kerapy' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Awesome title', 'kerapy' ),
                        'label_block'   => true
                    ],
                    [
                        'name' => 'desc',
                        'label' => esc_html__( 'Description', 'kerapy' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'Type your description here', 'kerapy' ),
                    ]
					
				],
                'default' => [
					[
						'icon' => [],
						'title' => esc_html__( 'Title One', 'kerapy' ),
						'desc' => esc_html__( 'The card description goes here.', 'kerapy' ),
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
        <div class="col-12 col-md-8">
            <ul class="list-unstyled lh-lg">
            <?php 
                foreach( $settings['choose_list'] as $ichoncard){
            ?>
                <li class="d-flex gap-3 mb-4">
                    <div><i class="fa-regular fa-circle-check"></i></div>
                    <div>
                        <h6 class="mb-md-2">
                            <?php echo esc_html__($ichoncard['title']); ?>
                        </h6>
                        <p><?php echo esc_html__($ichoncard['desc']); ?></p>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
        <?php
	}      
}