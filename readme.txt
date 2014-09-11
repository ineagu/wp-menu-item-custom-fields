=== Menu Item Custom Fields ===
Contributors: kucrut
Donate Link: http://kucrut.org/#coffee
Tags: menu, nav-menu, custom-fields, metadata
Requires at least: 3.8
Tested up to: 3.9
Stable tag: 0.3.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily add custom fields to nav menu items.


== Description ==
This is a *library* plugin. It doesn't do anything visible on its own. It was written to allow other plugins/themes to add custom fields to menu items *easily*. See **Installation**.

Development of this plugin is done on [GitHub](https://github.com/kucrut/wp-menu-item-custom-fields). **Pull requests welcome**. Please see [issues reported](https://github.com/kucrut/wp-menu-item-custom-fields/issues) there before going to the plugin forum.


== Installation ==

= As regular plugin =
1. Upload `menu-item-custom-fields` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

= As library in your plugin/theme =
Simply copy `menu-item-custom-fields` to your plugin directory and require the main plugin file, eg:
`
require_once dirname( __FILE__ ) . '/menu-item-custom-fields/menu-item-custom-fields.php';
`

= Usage =
Copy (and customize) and include the `menu-item-custom-fields-example.php` file found in the `doc/` directory of this plugin into your plugin/theme.


== Changelog ==
= 0.3.0 =
* Use `wp_nav_menu_item_custom_fields` as walker hook. See this [blog post](http://shazdeh.me/2014/06/25/custom-fields-nav-menu-items/).
* Update example plugin

= 0.2.1 =
* Update compatibility info

= 0.2.0 =
* Improve walker class loader

= 0.1.1 =
* Move custom fields up (before `<p.field-move />`)

= 0.1.0 =
* Initial public release
