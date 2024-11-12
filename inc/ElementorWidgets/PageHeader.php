<?php
namespace Kerapy\Core\ElementorWidgets;

use Elementor\WP_Query;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class PageHeader extends \Elementor\Widget_Base{
    public function get_name() {
		return 'page-header';
	}
    public function get_title() {
		return esc_html__( 'Page Header', 'kerapy' );
	}
    public function get_icon() {
		return ' eicon-t-letter';
	}
    public function get_categories() {
		return [ 'kerapy_element' ];
	}
    public function get_keywords() {
		return [ 'page-header', 'kerapy' ];
	}
    protected function register_controls() {
        $this->start_controls_section(
			'content',
			[
				'label' => esc_html__( 'Content', 'kerapy' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );

        $this->end_controls_section(); 
    } 
    protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="page-header-inner text-left flex flex-col max-w-5xl gap-5 items-start pt-40 sm:pb-16 pb-12">
			<h1 class="text-4xl md:text-5xl font-semibold">
				<?php 
					if(get_field('page_title')){
						the_field('page_title');
					}else{
						the_title();
					}
				?>
			</h1>
			<div class="pt-3">
				<?php kerapy_breadcrumbs(); ?>
			</div>  
			<?php 
				if(get_field('page_desc')){
					echo '<p>'.get_field('page_desc').'</p>';
				}
				
				$link = get_field('page_btn');
				if( $link ){
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php
				}
			?>
		</div>
		<?php
	}      
}