<?php
namespace Kerapy\Core\ElementorWidgets;

use Elementor\WP_Query;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class SectionTitle extends \Elementor\Widget_Base{
    public function get_name() {
		return 'kp-sec-title';
	}
    public function get_title() {
		return esc_html__( 'Kerapy Section Title', 'kerapy-core' );
	}
    public function get_icon() {
		return 'eicon-heading';
	}
    public function get_categories() {
		return [ 'kerapy-elements' ];
	}
    public function get_keywords() {
		return [ 'heading', 'kerapy-core', 'title','section-title' ];
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
			'seccard',
			[
				'label' => esc_html__( 'Section Title Style', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'section1',
				'options' => [
					'section1' => esc_html__( 'Style One', 'kerapy-core' ),
					'section2' => esc_html__( 'Style Two', 'kerapy-core' ),
				],
			]
		);
		$this->add_control(
			'sec_icon',
			[
				'label' => esc_html__( 'Icon', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star', // Default icon (star)
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'star',
						'star-half-alt',
						'star-of-david',
					],
					'fa-regular' => [
						'star',
						'star-half-alt',
						'star-of-david',
					],
				],
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => esc_html__( 'Sub Heading', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Section title', 'kerapy-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'kerapy-core' ),
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
		// Icon Color Control
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#0052A8',
				'selectors' => [
					'{{WRAPPER}} .sectionicon' => 'color: {{VALUE}};',
				],
			]
		);
		// Icon Size Control
		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 200,
					],
					'em' => [
						'min' => 1,
						'max' => 15,
					],
					'%' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sectionicon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};', 
					'{{WRAPPER}} .sectionicon i' => 'font-size: {{SIZE}}{{UNIT}};', 
				],
			]
		);

		// text color
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#0052A8',
				'selectors' => [
					'{{WRAPPER}} .section-title-text ' => 'color: {{VALUE}};',
				],
			]
		);
		// Typography Control (you already have this)
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .section-title-text',
			]
		);
		$this->add_control(
			'divider_color',
			[
				'label' => esc_html__( 'Divider Color', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .divider' => 'background-color: {{VALUE}};',
				],
			]
		);
		// Width Control
		$this->add_control(
			'widget_width',
			[
				'label' => esc_html__( 'Width', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 1000,
					],
					'%' => [
						'min' => 20,
						'max' => 100,
					],
					'em' => [
						'min' => 10,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .divider' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
	
		// Height Control
		
		
		$this->end_controls_section();
	}
	
    protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<?php if($settings['seccard'] == 'section1' ){ ?>
		 <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2">
			<!-- <div class="sectionicon">
				<?php \Elementor\Icons_Manager::render_icon( $settings['sec_icon'], [ 'aria-hidden' => 'true' ] ); ?>
			</div> -->
			<div class="sectionicon">
				<?php \Elementor\Icons_Manager::render_icon( $settings['sec_icon'], [ 'aria-hidden' => 'true' ] ); ?>
			</div>
			<div class="divider"></div>
			<h6 class="section-title-text mb-0">
				<?php echo esc_html($settings['section_title']); ?>
			</h6>
		</div>
		<?php } ?>
		<?php if($settings['seccard'] == 'section2' ){ ?>
			<div class="d-flex align-items-center gap-2">
				<div class="sectionicon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['sec_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<div class="divider"></div>
				<div>
					<h6 class="section-title-text">
						<?php echo esc_html($settings['section_title']); ?>
					</h6>
				</div>
				<div class="divider"></div>
				<div class="sectionicon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['sec_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
			</div>
		<?php } ?>
		<?php
	}      
    protected function content_template() {
		?>
		<#
		var sectionStyle = settings.seccard;
		var icon = settings.sec_icon;
		var title = settings.section_title;
		#>
	
		<# if (sectionStyle === 'section1') { #>
			<div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2">
				<div class="sectionicon">
					<# 
					if (icon) {
						var iconHTML = elementor.helpers.renderIcon(view, icon, { 'aria-hidden': true }, 'i', 'object');
						if (iconHTML.rendered) {
							print(iconHTML.value);
						}
					} 
					#>
				</div>
				<div class="divider"></div>
				<# if (title) { #>
					<h6 class="section-title-text mb-0">
						{{{ title }}}
					</h6>
				<# } #>
			</div>
		<# } #>
	
		<# if (sectionStyle === 'section2') { #>
			<div class="d-flex align-items-center gap-2">
				<div class="sectionicon">
					<# 
					if (icon) {
						var iconHTML = elementor.helpers.renderIcon(view, icon, { 'aria-hidden': true }, 'i', 'object');
						if (iconHTML.rendered) {
							print(iconHTML.value);
						}
					} 
					#>
				</div>
				<div class="divider"></div>
				<div>
					<h6 class="section-title-text">
						{{{ title }}}
					</h6>
				</div>
				<div class="divider"></div>
				<div class="sectionicon">
					<# 
					if (icon) {
						var iconHTML = elementor.helpers.renderIcon(view, icon, { 'aria-hidden': true }, 'i', 'object');
						if (iconHTML.rendered) {
							print(iconHTML.value);
						}
					} 
					#>
				</div>
			</div>
		<# } #>
		<?php
	}
		
}