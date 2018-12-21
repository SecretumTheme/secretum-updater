<?php
/**
 * Plugin Functions
 *
 * @package Secretum
 * @subpackage SecretumUpdater
 */


namespace SecretumUpdater\Functions {
    /**
     * Check For Updates
     * @source https://github.com/YahnisElsts/plugin-update-checker
     */
	function update($json_url, $file, $slug) {
		if (isset($json_url) && isset($file) && isset($slug)) {
			// Theme Update Checker
			include_once(SECRETUM_UPDATER);

			// Build Check
			$update = \Puc_v4_Factory::buildUpdateChecker(
				esc_url_raw($json_url),
				sanitize_file_name($file),
				sanitize_key($slug)
			);
		}
	}


    /**
     * Activate Plugin
     */
    function activate() {
        // Wordpress Version Check
        global $wp_version;

        // Version Check
        if(version_compare($wp_version, SECRETUM_UPDATER_WP_MIN_VERSION, "<")) {
            wp_die(__('Activation Failed: The ' . SECRETUM_UPDATER_PAGE_NAME . ' plugin requires WordPress version ' . SECRETUM_UPDATER_WP_MIN_VERSION . ' or higher. Please Upgrade Wordpress, then try activating this plugin again.', 'secretum-updater'));
        }
    }


    /**
     * Add Links
     *
     * @param array $links Default links for this plugin
     * @param string $file The name of the plugin being displayed
     * @return array $links The links to inject
     */
    function links($links, $file) {
        // Get Current URL
        $request_uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);

        // Only this plugin and on plugins.php page
        if ($file == SECRETUM_UPDATER_PLUGIN_BASE && strpos($request_uri, "plugins.php") !== false) {
            // Links To Inject
            $links[] = '<a href="https://github.com/SecretumTheme/secretum-updater/issues" target="_blank">'. __('Report Issues', 'secretum-updater') .'</a>';
        }

        return $links;
    }
}
