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
        $this->add_control(
			'content',
			[
				'label' => esc_html__( 'Review Content', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '<h6>' . esc_html__( '1050+ Reviews From Clients', 'kerapy-core' ) . '</h6>',
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
                <div class="review-text all-heading-color">
                    <?php echo wp_kses_post($settings['content']) ; ?>
                </div>
            </div>
        </div>
		<?php
    }
    protected function content_template() {
        ?>
        <#
        var images = settings.img_list;
        var content = settings.content;
        #>
        <div class="client-reviews-section">
            <div class="d-flex gap-4 align-items-center justify-content-start">
                <div class="d-flex align-items-center">
                    <# _.each( images, function( img ) { #>
                        <# 
                        var imageUrl = img.image.url;
                        var imageId = img.image.id;
                        if ( imageId ) { 
                            var imageUrl = elementor.imagesManager.getImageUrl( imageId ); 
                        } 
                        #>
                        <img class="img-fluid review-img" src="{{ imageUrl }}" />
                    <# }); #>
                </div>
                <div class="review-text all-heading-color">
                    {{{ content }}}
                </div>
            </div>
        </div>
        <?php
    }
}
