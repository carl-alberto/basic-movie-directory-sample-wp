<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://carl.alber2.com
 * @since      1.0.0
 *
 * @package    Cpt_Tester
 * @subpackage Cpt_Tester/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Cpt_Tester
 * @subpackage Cpt_Tester/includes
 * @author     carl alberto <cralberto11@gmail.com>
 */
class Cpt_Tester_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'cpt-tester',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
