<?php
namespace Kerapy\Core\ElementorWidgets;
use Elementor\WP_Query;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class Counter extends \Elementor\Widget_Base {
    public function get_name() {
        return 'kp-counter';
    }
    public function get_title() {
        return esc_html__( 'Kerapy Counter', 'kerapy-core' );
    }
    public function get_icon() {
        return 'eicon-counter';
    }
    public function get_categories() {
        return [ 'kerapy-elements' ];
    }
    public function get_keywords() {
        return [ 'kerapy-core', 'counter', 'card' ];
    }
    protected function register_controls() {
        $this->start_controls_section(
            'content',
            [
                'label' => esc_html__( 'Content', 'kerapy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
			'max-num-of-count',
			[
				'label' => esc_html__( 'Counter Title', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 1000,
                'step' => 0.1,
                'default' => 12,
			]
		);
        $this->add_control(
			'item_title',
			[
				'label' => esc_html__( 'Counter Subtitle', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Years of Experience' , 'kerapy-core' ),
                'label_block' => true,
			]
		);
        $this->add_control(
			'max-num-of-count2',
			[
				'label' => esc_html__( 'Counter Title', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 1000,
                'step' => 0.1,
                'default' => 1500,
			]
		);
        $this->add_control(
			'item_title2',
			[
				'label' => esc_html__( 'Counter Subtitle', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Happy Customers' , 'kerapy-core' ),
                'label_block' => true,
			]
		);
        $this->add_control(
			'max-num-of-count3',
			[
				'label' => esc_html__( 'Counter Title', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 1000,
                'step' => 0.1,
                'default' => 20,
			]
		);
        $this->add_control(
			'item_title3',
			[
				'label' => esc_html__( 'Counter Subtitle', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Certified Therapy' , 'kerapy-core' ),
                'label_block' => true,
			]
		);
        $this->add_control(
			'max-num-of-count4',
			[
				'label' => esc_html__( 'Counter Title', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 1000,
                'step' => 0.1,
                'default' => 1200,
			]
		);
        $this->add_control(
			'item_title4',
			[
				'label' => esc_html__( 'Counter Subtitle', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Therapy Sessions' , 'kerapy-core' ),
                'label_block' => true,
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
			'title_color',
			[
				'label' => esc_html__( 'Heading Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#212529',
				'selectors' => [
					'{{WRAPPER}} .counter' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
                'label' => __( 'Heading Typography', 'kerapy-core' ),
				'selector' => '{{WRAPPER}} .counter',
			]
		);
        $this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__( 'Subtitle Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#666666',
				'selectors' => [
					'{{WRAPPER}} .counter-subtitle' => 'color: {{VALUE}} !important;',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
                'label' => __( 'Subtitle Typography', 'kerapy-core' ),
				'selector' => '{{WRAPPER}} .counter-subtitle',
			]
		);
        $this->add_control(
            'counter_padding',
            [
                'label' => esc_html__( 'Padding', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => '24',
                    'right' => '24',
                    'bottom' => '24',
                    'left' => '24',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter-sec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                'default' => '2',
                'frontend_available' => true, 
            ]
        );
        
        $this->add_control(
            'team_title_alignment',
            [
                'label' => esc_html__( 'Content Alignment', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__( 'Top', 'kerapy-core' ), 
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'kerapy-core' ), 
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Bottom', 'kerapy-core' ), 
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .counter-sec' => 'display: flex; align-items: {{VALUE}};', 
                ],
            ]
        );
        $this->add_control(
			'counter_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .counter-sec' => 'background-color: {{VALUE}};',
				],
			]
		);
      $this->end_controls_section();
    }
    protected function render() {
      $settings = $this->get_settings_for_display();
      $columns = !empty($settings['columns']) ? intval($settings['columns']) : 2;
      $col_class = 'col-md-' . (12 / $columns);
    ?>
            <div class="row">
                <?php if ( !empty($settings['max-num-of-count']) && !empty($settings['item_title']) ) : ?>
                <div class="<?php echo esc_attr($col_class); ?>">
                    <div class="text-cente  mb-4 counter-sec">
                    <div class="counter-plus d-flex">
                        <div class="counter stat-number" ><?php echo esc_html($settings['max-num-of-count']); ?></div>
                        <span class="counter">+</span>
                    </div>
                    <p class="pt-3 counter-subtitle text-center">
                        <?php echo esc_html($settings['item_title']);?>
                    </p>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( !empty($settings['max-num-of-count2']) && !empty($settings['item_title2']) ) : ?>
                <div class="<?php echo esc_attr($col_class); ?>">
                    <div class="text-cente mb-4 counter-sec">
                    <div class="counter-plus d-flex">
                        <div class="counter stat-number" ><?php echo esc_html($settings['max-num-of-count2']); ?></div>
                        <span class="counter">+</span>
                    </div>
                    <p class="pt-3 counter-subtitle text-center">
                        <?php echo esc_html($settings['item_title2']);?>
                    </p>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( !empty($settings['max-num-of-count3']) && !empty($settings['item_title3']) ) : ?>
                <div class="<?php echo esc_attr($col_class); ?>">
                    <div class="text-cente mb-4 counter-sec">
                    <div class="counter-plus d-flex">
                        <div class="counter stat-number" ><?php echo esc_html($settings['max-num-of-count3']); ?></div>
                        <span class="counter">+</span>
                    </div>
                    <p class="pt-3 counter-subtitle text-center">
                        <?php echo esc_html($settings['item_title3']);?>
                    </p>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( !empty($settings['max-num-of-count4']) && !empty($settings['item_title4']) ) : ?>
                <div class="<?php echo esc_attr($col_class); ?>">
                    <div class="text-cente mb-4 counter-sec">
                    <div class="counter-plus d-flex">
                        <div class="counter stat-number" ><?php echo esc_html($settings['max-num-of-count4']); ?></div>
                        <span class="counter">+</span>
                    </div>
                    <p class="pt-3 counter-subtitle text-center">
                        <?php echo esc_html($settings['item_title4']);?>
                    </p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <script>
            // Function to animate the counter
            jQuery(document).ready(function($){
                $('.stat-number').each(function () {
                    var size = $(this).text().split(".")[1] ? $(this).text().split(".")[1].length : 0;
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 5000,
                        step: function (func) {
                            $(this).text(parseFloat(func).toFixed(size));
                        }
                    });
                });
            });
        </script>
    <?php
    }
    
}
?>