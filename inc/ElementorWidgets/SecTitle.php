<?php
namespace Kerapy\Core\ElementorWidgets;

use Elementor\WP_Query;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class SecTitle extends \Elementor\Widget_Base{
    public function get_name() {
		return 'sec-title';
	}
    public function get_title() {
		return esc_html__( 'Section Title', 'kerapy' );
	}
    public function get_icon() {
		return 'eicon-heading';
	}
    public function get_categories() {
		return [ 'kerapy_element' ];
	}
    public function get_keywords() {
		return [ 'heading', 'kerapy', 'title','section-title' ];
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
			'tmcard',
			[
				'label' => esc_html__( 'Testimonial Card Style', 'kerapy' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'testimonial1',
				'options' => [
					'testimonial1' => esc_html__( 'Style One', 'kerapy' ),
					'testimonial2' => esc_html__( 'Style Two', 'kerapy' ),
				],
			]
		);
		$this->add_control(
			'sec_icon',
			[
				'label' => esc_html__( 'Icon', 'kerapy' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => esc_html__( 'Sub Heading', 'kerapy' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Section title', 'kerapy' ),
				'placeholder' => esc_html__( 'Type your title here', 'kerapy' ),
			]
		);
		
        $this->end_controls_section(); 
    } 
    protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<?php if($settings['tmcard'] == 'testimonial1' ){ ?>
		 <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2">
			<div class="my-icon-wrapper">
				<?php \Elementor\Icons_Manager::render_icon( $settings['sec_icon'], [ 'aria-hidden' => 'true' ] ); ?>
			</div>
			<div class="divider"></div>
			<?php 
				if($settings['section_title']){
			?>
			<h6 class="sub-head mb-0 text-uppercase">
				<?php echo esc_html($settings['section_title']); ?>
			</h6>
			<?php } ?>
		</div>
		<?php } ?>
		<?php if($settings['tmcard'] == 'testimonial2' ){ ?>
			<div class="d-flex align-items-center gap-2">
				<div>
					<?php \Elementor\Icons_Manager::render_icon( $settings['sec_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<div class="divider"></div>
				<div>
					<h6 class="sub-head">
						<?php echo esc_html($settings['section_title']); ?>
					</h6>
				</div>
				<div class="divider"></div>
				<div>
					<?php \Elementor\Icons_Manager::render_icon( $settings['sec_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
			</div>
		<?php } ?>
		<?php
	}      
}