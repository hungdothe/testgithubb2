<?php
/*
	Plugin Name: OneTone Companion
	Description: OneTone theme options.
	Author: MageeWP
	Author URI: https://www.mageewp.com/
	Version: 1.0.1
	Text Domain: onetone-companion
	Domain Path: /languages
	License: GPL v2 or later
*/

if ( !defined('ABSPATH') ) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}

if(!class_exists('OnetoneCompanion')){
	
	class OnetoneCompanion{
	
		public function __construct() {
			// create custom plugin settings menu
			add_action('admin_menu', array(&$this,'create_menu'));
			add_action( 'admin_enqueue_scripts',  array($this,'admin_scripts' ));
		}
		
		function admin_scripts() {
	    	//wp_enqueue_style( 'wp-color-picker' );
        	//wp_enqueue_script( 'onetone-companion-admin-js',  plugins_url( 'assets/js/admin.js',__FILE__ ), array( 'jquery','wp-color-picker' ),'', true );
			if(isset($_GET['page']) && $_GET['page']=='onetone-companion/onetone-companion.php' )
				wp_enqueue_style( 'onetone-companion-admin-css',  plugins_url( 'assets/css/admin.css',__FILE__ ), '','', false );
		}
		
		function create_menu() {
		
			//create new top-level menu
			add_menu_page( __('OneTone Companion','onetone-companion'), __('OneTone Companion','onetone-companion'), 'administrator', __FILE__, array(&$this,'settings_page'),'dashicons-admin-generic');
		
			//call register settings function
			add_action( 'admin_init', array(&$this,'register_mysettings') );
		}
		
		
	public static function default_options(){

			$return = array(
				'onetone_homepage_sections' => '',
				'onetone_homepage_options' => '',
				'onetone_slideshow' => '',
				'onetone_general_option'  => '',
				'onetone_header' => '',
				'onetone_page_title_bar' => '',
				'onetone_styling' => '',
				'onetone_sidebar' =>'',
				'onetone_footer' => '',

			);
			
			return $return;
			
			}
			
		function text_validate($input)
		{
			
			$default_options = array(
				'onetone_homepage_sections' => '',
				'onetone_homepage_options' => '',
				'onetone_slideshow' => '',
				'onetone_general_option'  => '',
				'onetone_header' => '',
				'onetone_page_title_bar' => '',
				'onetone_styling' => '',
				'onetone_sidebar' =>'',
				'onetone_footer' => '',

			);
			$input = wp_parse_args($input,$default_options);
			
			$input['onetone_homepage_sections'] = sanitize_text_field($input['onetone_homepage_sections']);
			$input['onetone_homepage_options'] = sanitize_text_field($input['onetone_homepage_options']);
			$input['onetone_slideshow'] = sanitize_text_field($input['onetone_slideshow']);
			$input['onetone_general_option'] = sanitize_text_field($input['onetone_general_option']);
			$input['onetone_header'] = sanitize_text_field($input['onetone_header']);
			$input['onetone_page_title_bar'] = sanitize_text_field($input['onetone_page_title_bar']);
			$input['onetone_styling'] = sanitize_text_field($input['onetone_styling']);
			$input['onetone_sidebar'] = sanitize_text_field($input['onetone_sidebar']);
			$input['onetone_footer'] = sanitize_text_field($input['onetone_footer']);
			
			return $input;
		}
		
		function register_mysettings() {
			//register settings
			register_setting( 'onetone-settings-group', 'onetone_companion_options', array(&$this,'text_validate') );
		}
		
		function settings_page() {
			
			$tabs = array('customizer-sections'   => esc_html__( 'Customizer Panels', 'onetone-companion' ),);
	$current = 'customizer-sections';
	if(isset($_GET['tab']))
		$current = $_GET['tab'];
		
		$html = '<h2 class="nav-tab-wrapper">';
		foreach( $tabs as $tab => $name ){
			$class = ( $tab == $current ) ? 'nav-tab-active' : '';
			$html .= '<a class="nav-tab ' . $class . '" href="?page=onetone-companion/onetone-companion.php&tab=' . $tab . '">' . $name . '</a>';
		}
		$html .= '</h2>';
		
			?>
			<div class="wrap">
			<?php echo $html;?>
			
			<form method="post" action="options.php">
				<?php
				
				settings_fields( 'onetone-settings-group' );
				$options     = get_option('onetone_companion_options',OnetoneCompanion::default_options());
				$onetone_companion_options = wp_parse_args($options,OnetoneCompanion::default_options());
				?>
                
                <div class="oc-customizer-sections">
                <div class="oc-description"><?php _e('Disable the customizer panels that you do not have or need anymore to load it quickly.Your settings are saved, so do not worry.','onetone-companion');?></div>
  <div class="row">
    <span><?php _e('Home Page Sections','onetone-companion');?> <input name="onetone_companion_options[onetone_homepage_sections]" type="checkbox"  <?php if($onetone_companion_options['onetone_homepage_sections']==1 ){ ?>checked="checked"<?php }?> value="1" /></span>
    <span><?php _e('Home Page Options','onetone-companion');?> <input name="onetone_companion_options[onetone_homepage_options]" type="checkbox"  <?php if($onetone_companion_options['onetone_homepage_options']==1 ){ ?>checked="checked"<?php }?> value="1" /></span>
    <span><?php _e('Slideshow','onetone-companion');?> <input name="onetone_companion_options[onetone_slideshow]" type="checkbox"  <?php if($onetone_companion_options['onetone_slideshow']==1 ){ ?>checked="checked"<?php }?> value="1" /></span>
  </div>
  
 <div class="row">
    <span><?php _e('General Opions','onetone-companion');?> <input name="onetone_companion_options[onetone_general_option]" type="checkbox"  <?php if($onetone_companion_options['onetone_general_option']==1 ){ ?>checked="checked"<?php }?> value="1" /></span>
    <span><?php _e('Header','onetone-companion');?> <input name="onetone_companion_options[onetone_header]" type="checkbox"  <?php if($onetone_companion_options['onetone_header']==1 ){ ?>checked="checked"<?php }?> value="1" /></span>
    <span><?php _e('Page Title Bar','onetone-companion');?> <input name="onetone_companion_options[onetone_page_title_bar]" type="checkbox"  <?php if($onetone_companion_options['onetone_page_title_bar']==1 ){ ?>checked="checked"<?php }?> value="1" /></span>
  </div>
  
  <div class="row">
    <span><?php _e('Styling','onetone-companion');?> <input name="onetone_companion_options[onetone_styling]" type="checkbox"  <?php if($onetone_companion_options['onetone_styling']==1 ){ ?>checked="checked"<?php }?> value="1" /></span>
    <span><?php _e('Sidebar','onetone-companion');?> <input name="onetone_companion_options[onetone_sidebar]" type="checkbox"  <?php if($onetone_companion_options['onetone_sidebar']==1 ){ ?>checked="checked"<?php }?> value="1" /></span>
    <span><?php _e('Footer','onetone-companion');?> <input name="onetone_companion_options[onetone_footer]" type="checkbox"  <?php if($onetone_companion_options['onetone_footer']==1 ){ ?>checked="checked"<?php }?> value="1" /></span>
  </div>

	<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes','onetone-companion') ?>" />
				</p>			
</div>	
				
			
			</form>
			</div>
		<?php 
		
		}
	  
	  }
	
}

new OnetoneCompanion();