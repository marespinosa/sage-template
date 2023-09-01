<?php
/**
 * Plugin Name: [Forminator] Grants Full Access For Editor Role.
 * Plugin URI: https://premium.wpmudev.org/
 * Description: This plugin allows users with the editor role to have full access (view and save) to the Forminator administrative pages.
 * Author: Glauber Silva @ WPMUDEV
 * Author URI: https://premium.wpmudev.org/
 * Task: 0/11289012348292/1169742392170370
 * License: GPLv2 or later
 *
 * @package Forminator_Grants_Full_Acesses_For_Editor_Role
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WPMUDEV_Forminator_Editor_Access' ) ) {

	/**
	 * Main class of the plugin.
	 */
	class WPMUDEV_Forminator_Editor_Access {

		/**
		 * Stores the main instance of the class.
		 *
		 * @var Property
		 */
		private static $instance = null;

		/**
		 * Returns the main instance of the class.
		 *
		 * @return WPMUDEV_Forminator_Editor_Access
		 */
		public static function get_instance() {

			if ( is_null( self::$instance ) ) {
				self::$instance = new WPMUDEV_Forminator_Editor_Access();
			}

			return self::$instance;
		}

		/**
		 * Constructor of the class.
		 */
		private function __construct() {

			$this->init();
		}

		/**
		 * Loads the functions of the class in the apropriete hooks.
		 */
		public function init() {

			add_filter( 'forminator_admin_cap', array( $this, 'wpmudev_allows_editors_access_forminator_admin_pages' ) );
			add_filter( 'user_has_cap', array( $this, 'wpmudev_allows_editors_save_forminator_admin_pages' ), 10, 4 );
		}

		/**
		 * Changes the minimum capabilitie necessary to see the admin pages to one that editors has.
		 *
		 * @param  string $cap The current cap necessary to access admin pages of forminator.
		 *
		 * @return string $cap The modify cap necessary to access admin pages of forminator.
		 */
		public function wpmudev_allows_editors_access_forminator_admin_pages( $cap ) {

			if ( ! current_user_can( $cap ) ) {
				return 'edit_others_posts';
			}

			return $cap;
		}

		/**
		 * Dynamically filter a user's capabilities.
		 *
		 * @since 2.0.0
		 * @since 3.7.0 Added the `$user` parameter.
		 *
		 * @param bool[]   $allcaps Array of key/value pairs where keys represent a capability name and boolean values
		 *                          represent whether the user has that capability.
		 * @param string[] $caps    Required primitive capabilities for the requested capability.
		 * @param array    $args {
		 *     Arguments that accompany the requested capability check.
		 *
		 *     @type string    $0 Requested capability.
		 *     @type int       $1 Concerned user ID.
		 *     @type mixed  ...$2 Optional second and further parameters, typically object ID.
		 * }
		 * @param WP_User  $user    The user object.
		 */
		public function wpmudev_allows_editors_save_forminator_admin_pages( $allcaps, $caps, $args, $user ) {

			if ( ! isset( $_POST['forminator_export'] ) ) { // phpcs:ignore
				$is_export_action = false;
			} else {
				$is_export_action = true;
			}

			if ( ! isset( $_REQUEST['action'] ) || isset( $_REQUEST['action'] ) && strpos( $_REQUEST['action'], 'forminator' ) === false ) { // phpcs:ignore
				$is_allowed_ajax_actions = false;
			} else {
				$is_allowed_ajax_actions = true;
			}

			if ( ( $is_export_action || $is_allowed_ajax_actions ) && array_key_exists( 'edit_others_posts', $allcaps ) && ! array_key_exists( 'manage_options', $allcaps ) ) {
				$allcaps = array_merge( $allcaps, array( 'manage_options' => true ) );
			}

			return $allcaps;
		}
	}

	add_action(
		'plugins_loaded',
		function() {
			return WPMUDEV_Forminator_Editor_Access::get_instance();
		}
	);

}