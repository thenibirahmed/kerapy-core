<?php

namespace Kerapy\Core\ElementorWidgets;

use Elementor\WP_Query;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Clientreviews extends Widget_Base{

    public function get_name(){
        return 'kp-clientreviews';
    }

    public function get_title() {
		return esc_html__( 'Kerapy Client Review', 'kerapy-core' );
	}

    public function get_icon(){
        return 'eicon-review';
    }

    public function get_categories(){
        return [ 'kerapy-elements' ];
    }
    public function get_keywords() {
		return [ 'client reviews', 'kerapy-core', 'review' ];
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
			'review_number',
			[
				'label' => esc_html__( 'Review Number', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '1050', 'kerapy-core' ),
				'placeholder' => esc_html__( 'Type your number here', 'kerapy-core' ),
			]
		);
        $this->add_control(
			'review_text',
			[
				'label' => esc_html__( 'Review text', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Reviews From Clients', 'kerapy-core' ),
				'placeholder' => esc_html__( 'Type your text here', 'kerapy-core' ),
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
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
                'title_field' => '{{{ image.url ? "Image Uploaded" : "No Image" }}}',
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
			'review_number_color',
			[
				'label' => esc_html__( 'Number Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review_number' => 'color: {{VALUE}} !important',
				],
                
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'label' => esc_html__( 'Number Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .review_number',
            ]
        );
        $this->add_control(
			'review_text_color',
			[
				'label' => esc_html__( 'Review Text Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review_text' => 'color: {{VALUE}}',
				],
                
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'review_text_typography',
                'label' => esc_html__( 'Review Text Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .review_text',
            ]
        );
        $this->add_control(
            'review _img_border_radius',
            [
                'label' => esc_html__( 'Image Border Radius', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
                'range' => [
                    'px' => [ 'min' => 0, 'max' => 100 ],
                    '%' => [ 'min' => 0, 'max' => 50 ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .review-img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

    }
    protected function render(){
        $settings = $this->get_settings_for_display();
		$image = $settings['img_list'];
		?>
        <div class="client-reviews-section">
            <div class="d-flex gap-4 align-items-center justify-content-start">
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
                <div class="">
                    <h6 class=""><span class="review_number"><?php echo esc_html($settings['review_number']);?>+ </span><span class="review_text"><?php echo esc_html($settings['review_text']);?></span></h6>
                </div>
            </div>
        </div>
		<?php
    }
    
}
