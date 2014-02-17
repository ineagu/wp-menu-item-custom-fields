<?php
/**
 * Menu item custom fields example
 *
 * Copy this file into your wp-content/mu-plugins directory.
 *
 * @package Menu_Item_Custom_Fields
 * @version 0.1.0
 * @author Dzikri Aziz <kvcrvt@gmail.com>
 *
 *
 * Plugin name: Menu Item Custom Fields Example
 * Plugin URI: https://github.com/kucrut/wp-menu-item-custom-fields
 * Description: Example usage of Menu Item Custom Fields in plugins/themes
 * Version: 0.1.0
 * Author: Dzikri Aziz
 * Author URI: http://kucrut.org/
 * License: GPL v2
 * Text Domain: my-plugin
 */


/**
 * Sample menu item metadata
 *
 * This class demonstrate the usage of Menu Item Custom Fields in plugins/themes.
 *
 * @since 0.1.0
 */
class Menu_Item_Custom_Fields_Example {

	/**
	 * Initialize plugin
	 */
	public static function init() {
		add_action( 'menu_item_custom_fields', array( __CLASS__, '_fields' ), 10, 3 );
		add_action( 'wp_update_nav_menu_item', array( __CLASS__, '_save' ), 10, 3 );
		add_filter( 'manage_nav-menus_columns', array( __CLASS__, '_columns' ), 99 );
	}


	/**
	 * Save custom field value
	 *
	 * @wp_hook action wp_update_nav_menu_item
	 *
	 * @param int   $menu_id         Nav menu ID
	 * @param int   $menu_item_db_id Menu item ID
	 * @param array $menu_item_args  Menu item data
	 */
	public static function _save( $menu_id, $menu_item_db_id, $menu_item_args ) {
		check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );

		// Sanitize
		if ( ! empty( $_POST['menu-item-custom-field'][ $menu_item_db_id ] ) ) {
			// Do some checks here...
			$value = $_POST['menu-item-custom-field'][ $menu_item_db_id ];
		}
		else {
			$value = '';
		}

		// Update
		if ( ! empty( $value ) ) {
			update_post_meta( $menu_item_db_id, 'menu-item-custom-field', $value );
		}
		else {
			delete_post_meta( $menu_item_db_id, 'menu-item-custom-field' );
		}
	}


	/**
	 * Print field
	 *
	 * @param object $item  Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args  Menu item args.
	 * @param int    $id    Nav menu ID.
	 *
	 * @return string Form fields
	 */
	public static function _fields( $item, $depth, $args = array(), $id = 0 ) {
		?>
			<p class="field-custom description description-wide">
				<label for="edit-menu-item-custom-field-<?php echo esc_attr( $item->ID ) ?>"><?php _e( 'Custom Field', 'my-plugin' ) ?><br />
					<?php printf(
						'<input type="text" value="%1$s" name="menu-item-custom-field[%2$d]" class="widefat code edit-menu-item-custom-field" id="edit-menu-item-custom-field-%2$d">',
						esc_attr( get_post_meta( $item->ID, 'menu-item-custom-field', true ) ),
						$item->ID
					) ?>
				</label>
			</p>
		<?php
	}


	/**
	 * Add our field to the screen options toggle
	 *
	 * To make this work, the field wrapper must have the class 'field-custom'
	 *
	 * @param array $columns Menu item columns
	 * @return array
	 */
	public static function _columns( $columns ) {
		$columns['custom'] = __( 'Custom Field', 'my-plugin' );

		return $columns;
	}
}
Menu_Item_Custom_Fields_Example::init();
