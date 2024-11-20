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
				'label' => esc_html__( 'Sub Heading', 'kerapy-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Section title', 'kerapy-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'kerapy-core' ),
			]
		);
		
        $this->end_controls_section(); 
    } 
    protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<?php if($settings['seccard'] == 'section1' ){ ?>
		 <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2">
			<div class="my-icon-wrapper sectionicon">
				<?php \Elementor\Icons_Manager::render_icon( $settings['sec_icon'], [ 'aria-hidden' => 'true' ] ); ?>
			</div>
			<div class="divider"></div>
			<?php 
				if($settings['section_title']){
			?>
			<h6 class="sub-head mb-0">
				<?php echo esc_html($settings['section_title']); ?>
			</h6>
			<?php } ?>
		</div>
		<?php } ?>
		<?php if($settings['seccard'] == 'section2' ){ ?>
			<div class="d-flex align-items-center gap-2">
				<div class="my-icon-wrapper sectionicon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['sec_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<div class="divider"></div>
				<div>
					<h6 class="sub-head">
						<?php echo esc_html($settings['section_title']); ?>
					</h6>
				</div>
				<div class="divider"></div>
				<div class="my-icon-wrapper sectionicon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['sec_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
			</div>
		<?php } ?>
		<?php
	}      
}