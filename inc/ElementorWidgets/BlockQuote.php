<?php 

namespace Kerapy\Core\ElementorWidgets;

class BlockQuote extends \Elementor\Widget_Base {

    public function get_name() {
        return 'BlockQuote';
    }

    public function get_title() {
        return __('Block Quote', 'kerapy-core');
    }

    public function get_icon() {
        return 'eicon-blockquote';
    }

    public function get_categories() {
        return [ 'kerapy-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'kerapy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'quote_text',
            [
                'label' => __( 'Quote Text', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'placeholder' => __( 'Enter your quote', 'kerapy-core' ),
            ]
        );

        $this->add_control(
            'quote_author',
            [
                'label' => __( 'Author', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __( 'Enter the author name', 'kerapy-core' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $quote_text = $settings['quote_text'];
        $quote_author = $settings['quote_author'];

        ?>
        <div class="block-quote">
            <blockquote>
                <p><?php echo esc_html( $quote_text ); ?></p>
                <cite><?php echo esc_html( $quote_author ); ?></cite>
            </blockquote>
        </div>
        <?php
    }

    protected function _content_template() {
        ?>
        <div class="block-quote">
            <blockquote>
                <p>{{{ settings.quote_text }}}</p>
                <cite>{{{ settings.quote_author }}}</cite>
            </blockquote>
        </div>
        <?php
    }

}