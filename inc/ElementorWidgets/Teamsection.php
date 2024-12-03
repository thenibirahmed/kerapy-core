<?php

namespace Kerapy\Core\ElementorWidgets;

use Elementor\WP_Query;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Teamsection extends Widget_Base{

    public function get_name(){
        return 'kp-team';
    }

	public function get_title() {
		return esc_html__( 'Kerapy Team', 'kerapy-core' );
	}

    public function get_icon(){
        return 'eicon-posts-grid';
    }

    public function get_categories(){
        return [ 'kerapy-elements' ];
    }
    public function get_keywords() {
		return [ 'team', 'kerapy-core', '' ];
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
			'team_list',
			[
				'label' => esc_html__( 'Our Team', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name'	=> 'image',
						'label'	=> esc_html__( 'Image', 'kerapy-core' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
						'name'	=> 'author',
						'label'	=> esc_html__( 'Name', 'kerapy-core' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Author Name', 'kerapy-core' ),
						'placeholder' => esc_html__( 'Name', 'kerapy-core' ),
					],
                    [
						'name'	=> 'disi',
						'label'	=> esc_html__( 'Designation', 'kerapy-core' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Designation', 'kerapy-core' ),
						'placeholder' => esc_html__( 'designation', 'kerapy-core' ),
					],
				],
				'default' => [
					[
						'image' => esc_html__( 'Image', 'kerapy-core' ),
						'author' => esc_html__( 'Author Name.', 'kerapy-core' ),
						'desc' => esc_html__( 'Designation', 'kerapy-core' ),
					]
				],
				'title_field' => '{{{ author }}}',
			]
		);

        $this->end_controls_section();

    }
    protected function render(){
        $settings = $this->get_settings_for_display();
		$list = $settings['team_list'];
		?>
        <div class="row gx-3 gy-4 justify-content-center">
			<?php 
				foreach($list as $item){
			?>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="p-2 p-md-3 p-lg-4 text-center d-flex flex-column align-items-center justify-content-center w-full">
                    <?php  
                        $id = $item['image']['id']; 
                        $url = $item['image']['url'];
                        if($id){
                            echo wp_get_attachment_image( $id, 'medium_large', false, array(
                                'class' => 'img-fluid team-img'
                            ));
                        }else{
                            echo '<img class="img-fluid team-img" src="'.$url.'">';
                        } 
                    ?> 
                    <h5 class="mt-3 all-heading-color">
						<?php echo esc_html($item['author']);?>
					</h5>
                    <p>
						<?php echo esc_html($item['disi']); ?>
					</p>
                </div>
            </div>
				<?php } ?>
        </div>
		<?php
    }
    protected function content_template() {
        ?>
        <#
        var teamList = settings.team_list;
        #>
        <div class="row gx-3 gy-4 justify-content-center">
            <# _.each( teamList, function( item ) { #>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="p-2 p-md-3 p-lg-4 text-center d-flex flex-column align-items-center justify-content-center w-full">
                        <# if ( item.image.url ) { #>
                            <img class="img-fluid team-img" src="{{ item.image.url }}" alt="{{ item.author }}" />
                        <# } else { #>
                            <img class="img-fluid team-img" src="{{ item.image.url }}" alt="{{ item.author }}" />
                        <# } #>
                        <h5 class="mt-3 all-heading-color">
                            {{{ item.author }}}
                        </h5>
                        <p>
                            {{{ item.disi }}}
                        </p>
                    </div>
                </div>
            <# }); #>
        </div>
        <?php
    }
}
