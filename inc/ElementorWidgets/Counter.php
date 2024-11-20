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
            'counter_list',
            [
                'label' => esc_html__( 'Conter List', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'item_title',
                        'label' => esc_html__( 'Item Title', 'kerapy-core' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Buildings Worldwide' , 'kerapy-core' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'max-num-of-count',
                        'label' => esc_html__( 'Price', 'kerapy-core' ),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 1000,
                        'step' => 0.1,
                        'default' => 400,
                    ],
                    [
                        'name' => 'item_icon',
                        'label' => esc_html__( 'Item Icon', 'kerapy-core' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( '+' , 'kerapy-core' ),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'item_title' => esc_html__( 'Buildings Worldwide', 'kerapy-core' ),
                        'max-num-of-count' => esc_html__( '400', 'kerapy-core' ),
                    ],
                    [
                        'item_title' => esc_html__( 'Years of Expertise', 'kerapy-core' ),
                        'max-num-of-count' => esc_html__( '10', 'kerapy-core' ),
                    ],
                ]
            ]
        );
      $this->end_controls_section();
    }
    protected function render() {
      $settings = $this->get_settings_for_display();
    ?>
        <div class="row">
            <?php foreach ($settings['counter_list'] as $counter) : ?>
                <div class="col-md-6 ">
                    <div class="bg-white p-4 text-cente mb-4 counter-sec">
                    <div class="counter-plus d-flex">
                        <div class="counter stat-number all-heading-color" ><?php echo esc_html($counter['max-num-of-count']); ?></div>
                        <span class="all-heading-color">+</span>
                    </div>
                    <p class="pt-3">
                        <?php echo esc_html($counter['item_title']);?>
                    </p>
                    </div>
                </div>
                <?php endforeach; ?>
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