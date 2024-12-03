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
			'item_title',
			[
				'label' => esc_html__( 'Item Title', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Years of Experience' , 'kerapy-core' ),
                'label_block' => true,
			]
		);
        $this->add_control(
			'max-num-of-count',
			[
				'label' => esc_html__( 'Price', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 1000,
                'step' => 0.1,
                'default' => 12,
			]
		);
        $this->add_control(
			'item_title2',
			[
				'label' => esc_html__( 'Item Title', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Happy Customers' , 'kerapy-core' ),
                'label_block' => true,
			]
		);
        $this->add_control(
			'max-num-of-count2',
			[
				'label' => esc_html__( 'Price', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 1000,
                'step' => 0.1,
                'default' => 1500,
			]
		);
        $this->add_control(
			'item_title3',
			[
				'label' => esc_html__( 'Item Title', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Certified Therapy' , 'kerapy-core' ),
                'label_block' => true,
			]
		);
        $this->add_control(
			'max-num-of-count3',
			[
				'label' => esc_html__( 'Price', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 1000,
                'step' => 0.1,
                'default' => 20,
			]
		);
        $this->add_control(
			'item_title4',
			[
				'label' => esc_html__( 'Item Title', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Therapy Sessions' , 'kerapy-core' ),
                'label_block' => true,
			]
		);
        $this->add_control(
			'max-num-of-count4',
			[
				'label' => esc_html__( 'Price', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 12000,
                'step' => 0.1,
                'default' => 400,
			]
		);
        
      $this->end_controls_section();
    }
    protected function render() {
      $settings = $this->get_settings_for_display();
    ?>
            <div class="row">
                <?php if ( !empty($settings['max-num-of-count']) && !empty($settings['item_title']) ) : ?>
                <div class="col-md-6 ">
                    <div class="bg-white p-4 text-cente mb-4 counter-sec">
                    <div class="counter-plus d-flex">
                        <div class="counter stat-number all-heading-color" ><?php echo esc_html($settings['max-num-of-count']); ?></div>
                        <span class="all-heading-color">+</span>
                    </div>
                    <p class="pt-3">
                        <?php echo esc_html($settings['item_title']);?>
                    </p>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( !empty($settings['max-num-of-count2']) && !empty($settings['item_title2']) ) : ?>
                <div class="col-md-6 ">
                    <div class="bg-white p-4 text-cente mb-4 counter-sec">
                    <div class="counter-plus d-flex">
                        <div class="counter stat-number all-heading-color" ><?php echo esc_html($settings['max-num-of-count2']); ?></div>
                        <span class="all-heading-color">+</span>
                    </div>
                    <p class="pt-3">
                        <?php echo esc_html($settings['item_title2']);?>
                    </p>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( !empty($settings['max-num-of-count3']) && !empty($settings['item_title3']) ) : ?>
                <div class="col-md-6 ">
                    <div class="bg-white p-4 text-cente mb-4 counter-sec">
                    <div class="counter-plus d-flex">
                        <div class="counter stat-number all-heading-color" ><?php echo esc_html($settings['max-num-of-count3']); ?></div>
                        <span class="all-heading-color">+</span>
                    </div>
                    <p class="pt-3">
                        <?php echo esc_html($settings['item_title3']);?>
                    </p>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( !empty($settings['max-num-of-count4']) && !empty($settings['item_title4']) ) : ?>
                <div class="col-md-6 ">
                    <div class="bg-white p-4 text-cente mb-4 counter-sec">
                    <div class="counter-plus d-flex">
                        <div class="counter stat-number all-heading-color" ><?php echo esc_html($settings['max-num-of-count4']); ?></div>
                        <span class="all-heading-color">+</span>
                    </div>
                    <p class="pt-3">
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
    protected function content_template() {
        ?>
        <div class="row">
            <# if ( settings['max-num-of-count'] && settings['item_title'] ) { #>
            <div class="col-md-6">
                <div class="bg-white p-4 text-center mb-4 counter-sec">
                    <div class="counter-plus d-flex">
                        <div class="counter stat-number all-heading-color">{{{ settings['max-num-of-count'] }}}</div>
                        <span class="all-heading-color">+</span>
                    </div>
                    <p class="pt-3">
                        {{{ settings['item_title'] }}}
                    </p>
                </div>
            </div>
            <# } #>
            <# if ( settings['max-num-of-count2'] && settings['item_title2'] ) { #>
            <div class="col-md-6">
                <div class="bg-white p-4 text-center mb-4 counter-sec">
                    <div class="counter-plus d-flex">
                        <div class="counter stat-number all-heading-color">{{{ settings['max-num-of-count2'] }}}</div>
                        <span class="all-heading-color">+</span>
                    </div>
                    <p class="pt-3">
                        {{{ settings['item_title2'] }}}
                    </p>
                </div>
            </div>
            <# } #>
            <# if ( settings['max-num-of-count3'] && settings['item_title3'] ) { #>
            <div class="col-md-6">
                <div class="bg-white p-4 text-center mb-4 counter-sec">
                    <div class="counter-plus d-flex">
                        <div class="counter stat-number all-heading-color">{{{ settings['max-num-of-count3'] }}}</div>
                        <span class="all-heading-color">+</span>
                    </div>
                    <p class="pt-3">
                        {{{ settings['item_title3'] }}}
                    </p>
                </div>
            </div>
            <# } #>
            <# if ( settings['max-num-of-count4'] && settings['item_title4'] ) { #>
            <div class="col-md-6">
                <div class="bg-white p-4 text-center mb-4 counter-sec">
                    <div class="counter-plus d-flex">
                        <div class="counter stat-number all-heading-color">{{{ settings['max-num-of-count4'] }}}</div>
                        <span class="all-heading-color">+</span>
                    </div>
                    <p class="pt-3">
                        {{{ settings['item_title4'] }}}
                    </p>
                </div>
            </div>
            <# } #>
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