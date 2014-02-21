<?php

/**
 * Menu Item Custom Fields
 *
 * @package Menu_Item_Custom_Fields
 * @version 0.1.1
 * @author Dzikri Aziz <kvcrvt@gmail.com>
 *
 * Plugin name: Menu Item Custom Fields
 * Plugin URI: https://github.com/kucrut/wp-menu-item-custom-fields
 * Description: Easily add custom fields to nav menu items
 * Version: 0.1.1
 * Author: Dzikri Aziz
 * Author URI: http://kucrut.org/
 * License: GPLv2
 * Text Domain: menu-item-custom-fields
 */

/* Nothing to do on the front-end */
if ( ! is_admin() ) {
	return;
}

if ( ! function_exists( '_menu_item_custom_fields_walker' ) ) {

	/**
	 * Replace default menu editor walker with ours
	 *
	 * We don't actually replace the default walker. We're still using it and
	 * only injecting some HTMLs.
	 *
	 * @since   0.1.0
	 * @access  private
	 * @wp_hook filter wp_edit_nav_menu_walker
	 * @param   string $walker Walker class name
	 * @return  string Walker class name
	 */
	function _menu_item_custom_fields_walker( $walker ) {
		require_once dirname( __FILE__ ) . '/walker-nav-menu-edit.php';
		return 'Menu_Item_Custom_Fields_Walker';
	}

	add_filter( 'wp_edit_nav_menu_walker', '_menu_item_custom_fields_walker' );
}
