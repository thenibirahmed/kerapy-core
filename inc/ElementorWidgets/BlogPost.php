<?php

namespace Kerapy\Core\ElementorWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\WP_Query;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class BlogPost extends Widget_Base{

    public function get_name(){
        return 'kp-blogpost';
    }

    public function get_title(){
        return 'Kerapy Blog Post';
    }

    public function get_icon(){
        return 'eicon-post';
    }

    public function get_categories(){
        return [ 'kerapy-elements' ];
    }

    public function get_keywords(){
        return [ 'blog', 'kerapy-core','post' ];
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
			'items_to_display',
			[
				'label' => esc_html__( 'Items to display', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 2,
			]
		);
        $this->add_control(
			'layout',
			[
				'label' => esc_html__( 'Blog Card Style', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'layout1',
				'options' => [
					'layout1' => esc_html__( 'Style One', 'kerapy-core' ),
					'layout2' => esc_html__( 'Style Two', 'kerapy-core' ),
				],
			]
		);
        $options = [];        
        $categories = get_categories([
            'hide_empty' => false, 
        ]);

        foreach ( $categories as $category ) {
            $options[$category->term_id] = $category->name; 
        }

        $this->add_control(
            'categoryid',
            [
                'label'       => __( 'Select Categories', 'kerapy-core' ),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => $options,
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
        // style one
        // style laft
        $this->add_control(
			'left_title1_color',
			[
				'label' => esc_html__( 'Left Title Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .blog-post-title1' => 'color: {{VALUE}} ',
				],
                'condition' => [
                    'layout' => 'layout1',
                ],
                
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'laft_title1_typography',
                'label' => esc_html__( 'Left Title Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .blog-post-title1',
                'condition' => [
                    'layout' => 'layout1',
                ],
            ]
        );
        $this->add_control(
			'post_meta_color',
			[
				'label' => esc_html__( 'Left Post Meta Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .blog-post-meta1' => 'color: {{VALUE}} ',
				],
                'condition' => [
                    'layout' => 'layout1',
                ],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'post_meta_typography',
                'label' => esc_html__( 'Left Post Meta Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .blog-post-meta1',
                'condition' => [
                    'layout' => 'layout1',
                ],
            ]
        );
        // right style
        $this->add_control(
			'right_title1_color',
			[
				'label' => esc_html__( 'Right Title Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-post-title2' => 'color: {{VALUE}} ',
				],
                'condition' => [
                    'layout' => 'layout1',
                ],
                
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'right_title1_typography',
                'label' => esc_html__( 'Right Title Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .blog-post-title2',
                'condition' => [
                    'layout' => 'layout1',
                ],
            ]
        );
        $this->add_control(
			'right_postmeta_color',
			[
				'label' => esc_html__( 'Right Post Meta Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
				'selectors' => [
					'{{WRAPPER}} .blog-post-meta2' => 'color: {{VALUE}} !important',
				],
                'condition' => [
                    'layout' => 'layout1',
                ],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'right_postmeta_typography',
                'label' => esc_html__( 'Right Post Meta Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .blog-post-meta2',
                'condition' => [
                    'layout' => 'layout1',
                ],
            ]
        );
       
        $this->add_control(
            'post1_img_width',
            [
                'label' => esc_html__( 'Image Width', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'range' => [
                    'px' => [ 'min' => 30, 'max' => 1000 ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .team--w-img' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'layout' => 'layout1',
                ],
            ]
        );
        $this->add_control(
            'post1_img_height',
            [
                'label' => esc_html__( 'Image Height', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team--w-img' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'layout' => 'layout1',
                ],
            ]
        );
        
        // style two
        $this->add_control(
			'postmeta2_color',
			[
				'label' => esc_html__( 'Post Meta Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
				'selectors' => [
					'{{WRAPPER}} .blog-post-meta' => 'color: {{VALUE}} ',
				],
                'condition' => [
                    'layout' => 'layout2',
                ],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'postmeta2_typography',
                'label' => esc_html__( 'Post Meta Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .blog-post-meta',
                'condition' => [
                    'layout' => 'layout2',
                ],
            ]
        );
        $this->add_control(
			'Title_color',
			[
				'label' => esc_html__( 'Title Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-post-title' => 'color: {{VALUE}} ',
				],
                'condition' => [
                    'layout' => 'layout2',
                ],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Title Typography', 'kerapy-core' ),
                'selector' => '{{WRAPPER}} .blog-post-title',
                'condition' => [
                    'layout' => 'layout2',
                ],
            ]
            
        );
        $this->add_control(
            'post_img_width',
            [
                'label' => esc_html__( 'Image Width', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'range' => [
                    'px' => [ 'min' => 30, 'max' => 1000 ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-w-img' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'layout' => 'layout2',
                ],
            ]
        );
        $this->add_control(
            'post_img_height',
            [
                'label' => esc_html__( 'Image Height', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ], 
                'default' => [
                    'unit' => '%', 
                    'size' => 100,  
                ],
                'range' => [
                    'px' => [ 'min' => 0, 'max' => 1000 ], 
                    '%' => [ 'min' => 0, 'max' => 200 ], 
                    'em' => [ 'min' => 0, 'max' => 100 ], 
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-img' => 'height: {{SIZE}}{{UNIT}};', 
                ],
                'condition' => [
                    'layout' => 'layout2', 
                ],
            ]
        );
        
        $this->add_control(
            'post_img_border_radius',
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
                    '{{WRAPPER}} .post-img-redius' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'post2_gap_elements',
            [
                'label' => esc_html__( 'Gap Between Images Author Title', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [ 'unit' => 'px', 'size' => 4 ],
                'selectors' => [
                    '{{WRAPPER}} .post-card-gap2' => 'display: flex; flex-direction: column; gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

    }
    protected function render(){
        $settings = $this->get_settings_for_display();
        $args = array(
            'post_type'     => 'post',
            'posts_per_page' => $settings[ 'items_to_display' ]
        );
        if ( !empty($settings['categoryid']) ) {
            $args['category__in'] = $settings['categoryid']; 
        }
        $blog = new \WP_Query($args);
        include( "blog/{$settings['layout']}.php" );
    }     
        
}