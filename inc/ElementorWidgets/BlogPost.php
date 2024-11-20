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

        $this->end_controls_section();

    }
    protected function render(){
        $settings = $this->get_settings_for_display();
        include( "blog/{$settings['layout']}.php" );
    }     
}