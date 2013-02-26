<?php
/*
Plugin Name: Admin Restriction
Plugin URI: http://www.barrykooij.com/admin-restriction/
Description: Disables updating the WordPress Core plus plugin and theme installation, updating and removal.
Version: 1.1.2
Author: Barry Kooij
Author URI: http://www.barrykooij.com/
*/
require_once('ARHooks.php');
class AdminRestriction 
{
  public function __construct()
  {
    $this->setup();
  }
  
  public static function setup()
  {
    add_action('admin_menu', array(ARHooks::get_instance(), 'disallow_editor'));
    add_filter('pre_site_transient_update_core', array(ARHooks::get_instance(), 'disallow_core_update'));
    add_filter('plugin_action_links', array(ARHooks::get_instance(), 'hide_plugin_controls'), 10, 4);
    add_filter('user_has_cap', array(ARHooks::get_instance(), 'catch_plugin_cap'), 10, 3);
  }
  
}

new AdminRestriction();
?>