<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://carl.alber2.com
 * @since      1.0.0
 *
 * @package    Cpt_Tester
 * @subpackage Cpt_Tester/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Cpt_Tester
 * @subpackage Cpt_Tester/public
 * @author     carl alberto <cralberto11@gmail.com>
 */
class Cpt_Tester_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cpt_Tester_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cpt_Tester_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cpt-tester-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cpt_Tester_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cpt_Tester_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cpt-tester-public.js', array( 'jquery' ), $this->version, false );

	}


	public function display_metafields() {
		echo __( 'DIRECTOR: ', 'text_domain' ) . esc_html( get_post_meta( get_the_ID(), 'director', true ) ) . '<br />';

		echo __( 'RUNTIME: ', 'text_domain' ) . esc_html( get_post_meta( get_the_ID(), 'run_time', true ) ) . '<br />';

		echo get_the_date() ;

		echo sprintf( '<img src="%1s"/>', esc_url( wp_get_attachment_url( get_post_meta( get_the_ID(), 'image', true ) ) ) );

	}


function order_movies_byname( $query ){
    if( ! $query->is_main_query() ) //If its not the main query return
        return;

			//Apply only for 'movies' post types
    if( 'movies' != $query->get( 'post_type' ) )
        return;

    $query->set( 'order', 'asc' );
    $query->set( 'orderby', 'title' );
    //$query->set( 'meta_key', 'price' );
}

function order_movies_bydirector( $query ){
    if( ! $query->is_main_query() ) //If its not the main query return
        return;

			//Apply only for 'movies' post types
    if( 'movies' != $query->get( 'post_type' ) )
        return;

    $query->set( 'order', 'desc' );
    $query->set( 'orderby', 'meta_value' );
    $query->set( 'meta_key', 'director' );
		$query->set( 'post_per_page', '2' );
}

function order_movies_bydate( $query ){
    if( ! $query->is_main_query() ) //If its not the main query return
        return;

			//Apply only for 'movies' post types
    if( 'movies' != $query->get( 'post_type' ) )
        return;

    $query->set( 'order', 'desc' );
    $query->set( 'orderby', 'post_date' );

}



}
