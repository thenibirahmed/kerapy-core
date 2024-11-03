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
            'quote_heading',
            [
                'label' => __( 'Heading', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __( 'Happy Customers', 'kerapy-core' ),
                'placeholder' => __( 'Enter the heading', 'kerapy-core' ),
            ]
        );

        $this->add_control(
            'quote_text',
            [
                'label' => __( 'Quote Text', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'default' => __('Are you tired of battling stubborn breakouts and blemishes? Welcome to Therapy', 'kerapy-core'),
                'placeholder' => __( 'Enter your quote', 'kerapy-core' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_blockquote_heading',
            [
                'label' => __( 'BlockQuote Heading', 'kerapy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .kerapy-blockquote h3',
			]
		);

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Heading Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .kerapy-blockquote h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_blockquote_content',
            [
                'label' => __( 'BlockQuote Content', 'kerapy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .kerapy-blockquote p',
			]
		);

        $this->add_control(
            'content_color',
            [
                'label' => __( 'Content Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .kerapy-blockquote p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'quote_border_color',
            [
                'label' => __( 'Border Color', 'kerapy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .kerapy-blockquote p' => 'border-left: 2px solid {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $quote_text = $settings['quote_text'];
        $quote_heading = $settings['quote_heading'];

        ?>
            <div class="kerapy-blockquote">
                <h3><?php echo esc_html($quote_heading) ?></h3>
                <p><?php echo esc_html( $quote_text); ?></p>
            </div>
        <?php
    }

    protected function _content_template() {
        ?>
            <div class="kerapy-blockquote">
                <h3>{{{ settings.quote_heading }}}</h3>
                <p>{{{ settings.quote_text }}}</p>
            </div>
        <?php
    }

}