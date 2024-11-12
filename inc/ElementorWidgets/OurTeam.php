<?php

namespace Kerapy\Core\ElementorWidgets;

use Elementor\WP_Query;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class OurTeam extends Widget_Base{

    public function get_name(){
        return 'technology';
    }

    public function get_title(){
        return 'OurTeam';
    }

    public function get_icon(){
        return 'eicon-posts-grid';
    }

    public function get_categories(){
        return [ 'kerapy-elements' ];
    }
    public function get_keywords() {
		return [ 'our team', 'kerapy', 'team' ];
	}

    protected function _register_controls(){

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'kerapy' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'team_list',
			[
				'label' => esc_html__( 'Our Team', 'kerapy' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name'	=> 'image',
						'label'	=> esc_html__( 'Image', 'kerapy' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
						'name'	=> 'author',
						'label'	=> esc_html__( 'Name', 'kerapy' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Name', 'kerapy' ),
					],
                    [
						'name'	=> 'disi',
						'label'	=> esc_html__( 'Designation', 'kerapy' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'designation', 'kerapy' ),
					],
					[
						'name'	=> 'filelink',
						'label' => esc_html__( 'File Link', 'kerapy' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => esc_html__( 'https://your-link.com', 'kerapy' ),
						'options' => [ 'url', 'is_external', 'nofollow' ],
						'default' => [
							'url' => '#',
							'is_external' => true,
							'nofollow' => true,
						],
					]
				],
				'default'		=> [
					[
						'cardcontent'	=> 'Newborn eBook',
						'filelink'		=> '#'
					]
				],
				'title_field' => '{{{ cardcontent }}}',
			]
		);

        $this->end_controls_section();

    }


    protected function render(){
        $settings = $this->get_settings_for_display();
		$list = $settings['team_list'];
		?>
        <div class="row gx-3 gy-4">
			<?php 
				foreach($list as $item){
			?>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="p-4 text-center d-flex flex-column align-items-center justify-content-center">
                    <img src="images/Hero_v2_team.jpg" alt="" class="img-fluid">
                    <?php  
                        $id = $item['image']['id'];
                        $url = $item['image']['url'];
                        if($id){
                            echo wp_get_attachment_image( $id, 'medium_large', false, array(
                                'class' => 'img-fluid'
                            ));
                        }else{
                            echo '<img class="w-full" src="'.$url.'">';
                        } 
                    ?> 
                    <h5 class="my-3">Darlene Robertson</h5>
                    <p>Chrono therapist</p>
                </div>
            </div>
				<?php } ?>
        </div>
		<?php
    }
}
