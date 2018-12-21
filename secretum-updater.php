<?php
namespace SecretumUpdater;

/**
 * Plugin Name: Secretum Updater
 * Plugin URI: https://github.com/SecretumTheme/secretum-updater
 * Description: Updates the Secretum Theme & Secretum Plugins.
 * Version: 0.0.4
 * License: GNU GPLv3
 * Copyright (c) 2018 Secretum Theme
 * Author: SecretumTheme
 * Author URI: https://github.com/SecretumTheme
 * Text Domain: secretum-updater
 *
 * @package Secretum
 * @subpackage SecretumUpdater
 */


// Constants
define('SECRETUM_UPDATER_WP_MIN_VERSION', 	'3.8');
define('SECRETUM_UPDATER_PLUGIN_FILE',    	__FILE__);
define('SECRETUM_UPDATER_PLUGIN_DIR',     	dirname(SECRETUM_UPDATER_PLUGIN_FILE));
define('SECRETUM_UPDATER_PLUGIN_BASE',    	plugin_basename(SECRETUM_UPDATER_PLUGIN_FILE));
define('SECRETUM_UPDATER', 					SECRETUM_UPDATER_PLUGIN_DIR . '/puc/plugin-update-checker.php');


// Include Functions
require SECRETUM_UPDATER_PLUGIN_DIR . '/functions.php';


// Activate Plugin
register_activation_hook(SECRETUM_UPDATER_PLUGIN_FILE, '\SecretumUpdater\Functions\activate');


// Inject Links Into Plugin.php Admin
add_filter('plugin_row_meta', '\SecretumUpdater\Functions\links', 10, 2);


// Updater Action
add_action('secretum_updater', '\SecretumUpdater\Functions\update', 10, 3);


// Include Updater Class
if (!class_exists('Puc_v4p4_Autoloader')) {
	include_once(SECRETUM_UPDATER_PLUGIN_DIR . '/puc/plugin-update-checker.php');
}

// Update Plugin
if (class_exists('Puc_v4p4_Autoloader')) {
	$secretum_updater = \Puc_v4_Factory::buildUpdateChecker(
		'https://raw.githubusercontent.com/SecretumTheme/secretum-updater/master/updates.json',
		SECRETUM_UPDATER_PLUGIN_FILE,
		'secretum-updater'
	);
}
