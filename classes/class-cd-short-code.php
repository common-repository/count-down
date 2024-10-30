<?php
if ( ! class_exists( 'CountDownShortcodePage') ) {

	/**
	 * Responsible for setting up builder constants, classes and includes.
	 *
	 * @since 1.0
	 */
	class CountDownShortcodePage {

		/**
		 * Class instance.
		 *
		 * @access private
		 * @var $instance Class instance.
		 */
		private static $instance;

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

			add_action( 'wp_enqueue_scripts', array( $this, 'cd_enqueue_script' ),100 );

			add_shortcode( 'cd_countdown_shortcode', array( $this, 'get_shortcode' ) );
			wp_enqueue_style( 'style-countdown', cd_CountDown_URL . 'css/countdown.css' );
		}
		/**
		 * Register Short Code .
		 *
		 * @since 1.0
		 * @return void
		 */
		public function get_shortcode() { 
			$data = self::get_data_format();
			?>
			<div class="cd-countdown-main" data-format=<?php echo $data; ?> >
				<div class="cd-countdown-wrap">
						<ul class="cd-countdown">
						  <li><h3 class="days">00</h3><h3 class="days_text">Days</h3></li>
							<li class="cd-countdown-seperator"><h3>:</h3></li>
							<li><h3 class="hours">00</h3><h3 class="hours_text">Hours</h3></li>
							<li class="cd-countdown-seperator"><h3>:</h3></li>
							<li><h3 class="minutes">00</h3><h3 class="minutes_text">Minutes</h3></li>
							<li class="cd-countdown-seperator"><h3>:</h3></li>
							<li><h3 class="seconds">00</h3><h3 class="seconds_text">Seconds</h3></li>
					</ul>
				</div>
			</div>
		<?php
		}
		/**
		 * Register enqueue Script .
		 *
		 * @since 1.0
		 * @return void
		 */
		public function cd_enqueue_script() {  
    		wp_enqueue_script( 'cd_script', cd_CountDown_URL . 'js/jquery.plugin.js' );
    		wp_enqueue_script( 'cd_countdown_js_script', cd_CountDown_URL . 'js/jquery.countdown.js' );
    		wp_enqueue_script( 'cd_countdown_script', cd_CountDown_URL . 'js/countdown.js' );
		}
		/**
		 * Get Settings page data .
		 *
		 * @since 1.0
		 * @return void
		 */
		public static function get_data_format() {

			$cd_name 	= get_option( 'cd_name' );
			$cd_year 	= get_option( 'cd_year' );
			$cd_day 	= get_option( 'cd_day' );
			$cd_month 	= get_option( 'cd_month' );
			$cd_hours 	= get_option( 'cd_hours' );
			$cd_mintues = get_option( 'cd_mintues' );
			$cd_seconds = get_option( 'cd_seconds' );

			$data = array(
				'year'		=> $cd_year,
				'day'		=> $cd_day,
				'month'		=> $cd_month,
				'hours'		=> $cd_hours,
				'mintues' 	=> $cd_mintues,
				'seconds' 	=> $cd_seconds,
			);
			$data = json_encode( $data );
			return $data ;
		}
	}
}
CountDownShortcodePage::get_instance();
