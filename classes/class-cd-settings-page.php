<?php
if ( ! class_exists( 'CountDownSettingsPage') ) {

	/**
	 * Responsible for setting up builder constants, classes and includes.
	 *
	 * @since 1.0
	 */
	class CountDownSettingsPage {

		/**
		 * Class instance.
		 *
		 * @access private
		 * @var $instance Class instance.
		 */
		private static $instance;
		public $customers_obj;
		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
		/**
		 *  Constructor
		 */
		public function __construct() {

			add_action( 'admin_menu', array ( $this, 'admin_menu_register_setting' ) );

			add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( $this, 'add_action_links' ) );
			
			add_action( 'admin_init', array ( $this, 'cd_register_save_setting' ) );
		}
		/**
		 * Register Sub Menu .
		 *
		 * @since 1.0
		 * @return void
		 */
		public function admin_menu_register_setting() {
			add_menu_page( __( 'Custom Post Types', 'custom-post-type-ui' ), __( 'Count Down', 'custom-post-type-ui' ), 'manage_options', 'cdui_main_menu');

			add_submenu_page( 'cdui_main_menu', __( 'Add/Edit CountDown', 'custom-post-type-ui' ), __( 'Add/Edit CountDown', 'custom-post-type-ui' ), 'manage_options', 'cdui_manage_post_types', array ($this,'setting_page_menu') );
			remove_submenu_page( 'cdui_main_menu', 'cdui_main_menu');
		}
		/**
		 * Register Settings page .
		 *
		 * @since 1.0
		 * @return void
		 */
		public function setting_page_menu() { ?>
			<div class="wrap cptui-new">
				<h1>Add/Edit Count Down</h1>
				<h2 class="nav-tab-wrapper">
					<a class="nav-tab nav-tab-active" href="#" aria-selected="true">Add New Count Down</a>
				</h2>
			</div>
			<div class="wrap">
				<h1> Count Down </h1>
				<form method="post" action="options.php">
					<?php settings_fields( 'cd-plugin-settings-group' ); ?>
    				<?php do_settings_sections( 'cd-plugin-settings-group' ); ?>
					<table class="form-table">
						<tr>
							<th><label> Name</label></th>
							<td>
								<input type="text" name="cd_name" value="" placeholder="First CountDown" class="regular-text">
							</td>
						</tr>
						<tr>
							<th><label>Year</label></th>
							<td>
							<select name="cd_year">
								<option value="Year">Year</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>								
							</select> 
							</td>
						</tr>
						<tr>
							<th><label>Day</label></th>
							<td>
							<select name="cd_day">
								<option value="Day">Day</option>
								<?php for( $i=1; $i<=31; $i++ ) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>								
							</select> 
							</td>
						</tr>
						<tr>
							<th><label>Month</label></th>
							<td>
							<select name="cd_month">
								<option value="Month">Month</option>
								<?php for( $i=1; $i<=12; $i++ ) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>								
							</select> 
							</td>
						</tr>
						<tr>
							<th><label>Hours</label></th>
							<td>
							<select name="cd_hours">
								<option value="Hours">Hours</option>
								<?php for( $i=1; $i<=12; $i++ ) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>								
							</select> 
							</td>
						</tr>
						<tr>
							<th><label>Mintues</label></th>
							<td>
							<select name="cd_mintues">
								<option value="Mintues">Mintues</option>
								<?php for( $i=1; $i<=60; $i++ ) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>								
							</select> 
							</td>
						</tr>
						<tr>
							<th><label>Seconds</label></th>
							<td>
							<select name="cd_seconds">
								<option value="Seconds">Seconds</option>
								<?php for( $i=1; $i<=60; $i++ ) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>								
							</select> 
							</td>
						</tr>
					</table>
					<?php submit_button(); ?>
				</form>
			</div>
		<?php
		}
		/**
		 * Register Settings page data .
		 *
		 * @since 1.0
		 * @return void
		 */
		public function cd_register_save_setting(){
			
			register_setting( 'cd-plugin-settings-group', 'cd_name' );
			register_setting( 'cd-plugin-settings-group', 'cd_day' );
			register_setting( 'cd-plugin-settings-group', 'cd_year' );
			register_setting( 'cd-plugin-settings-group', 'cd_month' );
			register_setting( 'cd-plugin-settings-group', 'cd_hours' );
			register_setting( 'cd-plugin-settings-group', 'cd_mintues' );
			register_setting( 'cd-plugin-settings-group', 'cd_seconds' );
		} 
	}
}

CountDownSettingsPage::get_instance();