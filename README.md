# Secretum Updater
* **Plugin Name:** Secretum Updater
* **Contributors:** SecretumTheme
* **Tags:** 
* **Requires at least:** 4.6
* **Tested up to:** 4.8.1
* **Stable tag:** 0.0.4
* **License:** GNU GPLv3
* **License URI:** https://github.com/SecretumTheme/secretum-updater/blob/master/LICENSE


Updates the Secretum Theme & Secretum Plugins.


## Description

Updates the Secretum Theme & Secretum Plugins.


## License

This is a freemium plugin. The Secretum Updater plugin is licensed under GNU GPLv3 under all conditions accept when the plugin is packaged and sold with other premium themes/plugins/services. More information coming soon about commercial licenses.

** This plugin can not packaged with themes within the WordPress repo.


## Using

Pending...

```
if (defined('SECRETUM_UPDATER') && file_exists(SECRETUM_UPDATER)) {
	include_once(ABSPATH . '/wp-content/plugins/secretum-updater/puc/plugin-update-checker.php');
	$secretum_updater = Puc_v4_Factory::buildUpdateChecker(
		'https://valid-url-to/updates.json',
		__FILE__,
		'slug-for-theme-or-plugin'
	);
}
```

themes: updates.json
```
 {
    "version": "0.0.x",
    "details_url": "https://domain.com/details",
    "download_url": "https://domain.com/download.zip"
 }
```

plugins: updates.json
```
{
	"name" : "Plugin Name",
	"version" : "0.0.x",
	"download_url" : "https://domain.com/download.zip",
	"sections" : {
		"description" : "About...."
	}
}
```

## Changelog

= 0.0.1 2018-12-11 =

Alpha Release - Ready For Public Use
