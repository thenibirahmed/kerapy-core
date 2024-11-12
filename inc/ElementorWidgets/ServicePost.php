<?php
namespace Kerapy\Core\ElementorWidgets;

use Elementor\WP_Query;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class ServicePost  extends \Elementor\Widget_Base{
    public function get_name() {
		return 'service post';
	}
    public function get_title() {
		return esc_html__( 'Service Post', 'kerapy' );
	}
    public function get_icon() {
		return 'eicon-parallax';
	}
    public function get_categories() {
		return [ 'kerapy_element' ];
	}
    public function get_keywords() {
		return [ 'service', 'kerapy', 'post'];
	}
    protected function register_controls() {
        $this->start_controls_section(
			'content',
			[
				'label' => esc_html__( 'Content', 'kerapy' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'items_to_display',
			[
				'label' => esc_html__( 'Items to display', 'kerapy' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4
			]
		);
        $this->end_controls_section(); 
    } 
    protected function render() {
		$settings = $this->get_settings_for_display();
        $args = array(
            'post_type'     => 'service',
            'posts_per_page' => $settings[ 'items_to_display' ],
			'paged'			=> get_query_var('paged') ? get_query_var('paged') : 1
        );
        $custom_query = new \WP_Query($args);

        if( $custom_query -> have_posts() ) {
        ?>
            <div class="row service-carousel owl-carousel">
                <?php
                    while($custom_query -> have_posts()){
						$custom_query -> the_post();
                ?>
                <div class="col">
                    <div class="text-decoration-none">
                        <div class="card h-100 border-0">
                            <?php the_post_thumbnail('medium-large', array(
								'class' => 'card-img-top img-fluid rounded-0'
							));
							?>
                            <div class="card-body p-0">
                                <h5 class="card-title pt-4"><?php the_title();?></h5>
                                <p class="card-text"><?php the_content(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
					}
					wp_reset_postdata(); 
                ?>
            </div>
            <script>
            jQuery(document).ready(function ($) {
                $(".service-carousel").owlCarousel({
                    loop: true,
                    margin: 20,
                    autoplay: true,
                    autoplayTimeout: 2000,
                    autoplayHoverPause: true,
                    nav: false,
                    dots: true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:2
                        },
                        1000:{
                            items:3
                        }
                    }
                });
            });
        </script>
            <?php
        }
		
	}      
}