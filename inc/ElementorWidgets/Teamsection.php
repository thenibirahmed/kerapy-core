<?php

namespace Kerapy\Core\ElementorWidgets;

use Elementor\WP_Query;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;

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
                        'dynamic' => [
                            'active' => true,
                        ],
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
        $this->add_responsive_control(
            'columns',
            [
                'label' => esc_html__('Columns', 'kerapy-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => esc_html__('1 Column', 'kerapy-core'),
                    '2' => esc_html__('2 Columns', 'kerapy-core'),
                    '3' => esc_html__('3 Columns', 'kerapy-core'),
                    '4' => esc_html__('4 Columns', 'kerapy-core'),
                ],
                'default' => '3',
                'frontend_available' => true, 
            ]
        );
        $this->end_controls_section();

        // Start Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'kerapy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
       
        $this->add_control(
			'title-color',
			[
				'label' => esc_html__( 'Author Name Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-title ' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'team_title_typography',
                'label' => esc_html__( 'Author Name Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .team-title',
            ]
        );
        $this->add_control(
			'designation-color',
			[
				'label' => esc_html__( 'Designation Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#666666',
				'selectors' => [
					'{{WRAPPER}} .team-content' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'team_designation_typography',
                'label' => esc_html__( 'Designation Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .team-content',
            ]
        );
        $this->add_control(
            'team_img_border_radius',
            [
                'label' => esc_html__( 'Image Border Radius', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'range' => [
                    'px' => [ 'min' => 0, 'max' => 100 ],
                    '%' => [ 'min' => 0, 'max' => 50 ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-w-img img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gap_elements',
            [
                'label' => esc_html__( 'Gap Between Images Name and Designation', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [ 'unit' => 'px', 'size' => 15 ],
                'selectors' => [
                    '{{WRAPPER}} .team-all-card' => 'gap: {{SIZE}}{{UNIT}};', 
                ],
            ]
        );
        $this->add_control(
            'team_title_alignment',
            [
                'label' => esc_html__( 'Content Alignment', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'kerapy-core' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'kerapy-core' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'kerapy-core' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center', 
                'selectors' => [
                    '{{WRAPPER}} .team-all-card' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gap',
            [
                'label' => esc_html__('Column Gap', 'kerapy-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '0' => esc_html__('No Gap', 'kerapy-core'),
                    '2' => esc_html__('Small Gap', 'kerapy-core'),
                    '4' => esc_html__('Medium Gap', 'kerapy-core'),
                    '5' => esc_html__('Large Gap', 'kerapy-core'),
                ],
                'default' => '4', // Default gap size (Small Gap)
                'frontend_available' => true,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size', 
                'default' => 'large',
                'label' => esc_html__( 'Image Size', 'kerapy-core' ),
                'description' => esc_html__( 'Set the size of the image.', 'kerapy-core' ),
            ]
        );
        
        $this->end_controls_section();
    }
    protected function render(){
        $settings = $this->get_settings_for_display();
        $columns = !empty($settings['columns']) ? intval($settings['columns']) : 2;
        $col_class = 'col-md-' . (12 / $columns);
		$list = $settings['team_list'];
		?>
        <div class="row <?php echo esc_attr($settings['gap'] === '0' ? 'g-0' : 'g-' . $settings['gap']); ?> justify-content-start">
			<?php 
				foreach($list as $item){
			?>
            <div class="<?php echo esc_attr($col_class); ?>">
                <div class="w-full team-all-card bg-white">
                    <div class="team-w-img pb-2">
                        <?php  
                            $id = $item['image']['id']; 
                            $url = $item['image']['url'];
                            if($id){
                                $image_url = Group_Control_Image_Size::get_attachment_image_src( $id, 'image_size', $settings );
                            }else{
                                $image_url = $url;
                            }
                            
                        ?> 
                        <img src="<?php echo esc_url($image_url); ?>" alt="">
                    </div>
                    <h5 class="team-title">
						<?php echo esc_html($item['author']);?>
					</h5>
                    <p class="team-content">
						<?php echo esc_html($item['disi']); ?>
					</p>
                </div>
            </div>
				<?php } ?>
        </div>
		<?php
    }
    
}
