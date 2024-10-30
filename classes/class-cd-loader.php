<?php

if ( ! class_exists( 'CoundDownLoader') ) {

	/**
	 * Responsible for setting up builder constants, classes and includes.
	 *
	 * @since 1.0
	 */
	final class CoundDownLoader {

		/**
		 * Load the builder if it's not already loaded, otherwise
		 * show an admin notice.
		 *
		 * @since 1.0
		 * @return void
		 */
		static public function init() {

			self::define_constants();
			self::load_files();
		}

		/**
		 * Define plugin constants.
		 *
		 * @since 1.0
		 * @return void
		 */
		static private function define_constants() {

			define( 'cd_CountDown_VERSION', '1.0' );
			define( 'cd_CountDown_FILE', trailingslashit( dirname( dirname( __FILE__ ) ) ) . 'cd-count-down.php' );
			define( 'cd_CountDown_DIR', plugin_dir_path( cd_CountDown_FILE ) );
			define( 'cd_CountDown_URL', plugins_url( '/', cd_CountDown_FILE ) );
		}
		/**
		 * Loads classes and includes.
		 *
		 * @since 1.0
		 * @return void
		 */
		static private function load_files() {

			/* Classes */
			require_once cd_CountDown_DIR . 'classes/class-cd-settings-page.php';
			require_once cd_CountDown_DIR . 'classes/class-cd-short-code.php';
		}
		
	}
}
CoundDownLoader::init();