<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://carl.alber2.com
 * @since      1.0.0
 *
 * @package    Cpt_Tester
 * @subpackage Cpt_Tester/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cpt_Tester
 * @subpackage Cpt_Tester/admin
 * @author     carl alberto <cralberto11@gmail.com>
 */
class Cpt_Tester_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cpt-tester-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cpt-tester-admin.js', array( 'jquery' ), $this->version, false );

	}
	/**
	 * [reg_custom_post_type description]
	 * @return [type] [description]
	 */
	public function reg_custom_post_type() {

		$labels = array(
			"name" => __( "movies", "bootstrapfastchild" ),
			"singular_name" => __( "movie", "bootstrapfastchild" ),
		);

		$args = array(
			"label" => __( "movies", "bootstrapfastchild" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			"has_archive" => "movies",
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "movie", "with_front" => true ),
			"query_var" => true,
			"supports" => array( "title", "editor", "thumbnail" ),
		);
		register_post_type( "movies", $args );

		$labels = array(
				"name" => __( "genre", "bootstrapfastchild" ),
				"singular_name" => __( "genre", "bootstrapfastchild" ),
			);

		$args = array(
				"label" => __( "genre", "bootstrapfastchild" ),
				"labels" => $labels,
				"public" => true,
				"hierarchical" => true,
				"label" => "genre",
				"show_ui" => true,
				"show_in_menu" => true,
				"show_in_nav_menus" => true,
				"query_var" => true,
				"rewrite" => array( 'slug' => 'genre', 'with_front' => true, ),
				"show_admin_column" => false,
				"show_in_rest" => true,
				"rest_base" => "",
				"show_in_quick_edit" => true,
			);
			register_taxonomy( "genre", array( "movies" ), $args );

	}

	public function reg_custom_post_type_books() {

		$labels = array(
			'name'                  => _x( 'Books', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Book', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Book Types', 'text_domain' ),
			'name_admin_bar'        => __( 'Book Type', 'text_domain' ),
			'archives'              => __( 'Book Archives', 'text_domain' ),
			'attributes'            => __( 'Book Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Book:', 'text_domain' ),
			'all_items'             => __( 'All Book', 'text_domain' ),
			'add_new_item'          => __( 'Add New Book', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Book', 'text_domain' ),
			'edit_item'             => __( 'Edit Book', 'text_domain' ),
			'update_item'           => __( 'Update Book', 'text_domain' ),
			'view_item'             => __( 'View Book', 'text_domain' ),
			'view_items'            => __( 'View Book', 'text_domain' ),
			'search_items'          => __( 'Search Book', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Book', 'text_domain' ),
			'description'           => __( 'book Type Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor' ),
			'taxonomies'            => array( 'book_category' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'book', $args );

	}
}
