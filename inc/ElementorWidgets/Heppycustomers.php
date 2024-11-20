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
        return 'eicon-review';
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
			'content',
			[
				'label' => esc_html__( 'Content', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( 'Type your content here', 'kerapy-core' ),
			]
		);
        
		$this->add_control(
			'img_list',
			[
				'label' => esc_html__( 'Image', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name'	=> 'image',
						'label'	=> esc_html__( 'Image', 'kerapy-core' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ]
                    
				],
                'default' => [
					[
						'image' => 'url',
					],
				],
				'title_field' => '{{{ image }}}',
			]
		);
        $this->add_control(
			'number',
			[
				'label' => esc_html__( 'Number', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '1050+', 'kerapy-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'kerapy-core' ),
			]
		);
        $this->add_control(
			'review',
			[
				'label' => esc_html__( 'Review Text', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Reviews From Clients', 'kerapy-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'kerapy-core' ),
			]
		);

        $this->end_controls_section();

    }
    protected function render(){
        $settings = $this->get_settings_for_display();
		$image = $settings['img_list'];
		?>
        <div class="mb-4 mb-lg-0">
            <div class="d-flex flex-column justify-content-center text-center text-md-start gap-md-2">
                    <div class="pb-2 d-flex flex-column gap-2">
                        <?php echo wp_kses_post($settings['content']) ; ?>
                    </div>
                <div class="d-flex gap-2 gap-xl-4 align-items-center justify-content-center justify-content-md-start">
                    <div class="d-flex align-items-center">
                    <?php foreach( $image as $img){ ?>
                        <?php  
                        $id = $img['image']['id']; 
                        $url = $img['image']['url'];
                        if($id){
                            echo wp_get_attachment_image( $id, 'thumbnail', false, array(
                                'class' => 'img-fluid review-img '
                            ));
                        }else{
                            echo '<img class="img-fluid review-img" src="'.$url.'">';
                        } 
                    ?>
                        <?php } ?>
                    </div>
                    <div>
                        <h6 class="d-flex flex-row gap-1 review-text all-heading-color">
                        <span class="hero-head">
                            <?php echo esc_html($settings['number']);?>
                        </span>
                        <?php echo esc_html($settings['review']);?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
		<?php
    }
}
