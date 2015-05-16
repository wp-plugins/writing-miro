<?php
/**
 * Plugin Name: Writing Miro
 * Plugin URI: http://vdespa.de/
 * Description: Distraction free writing
 * Version: 1.0.2
 * Author: Valentin Despa
 * Author URI: http://vdespa.de
 * License: GPLv3 or later
 */

// Make available just in backend.
if (!is_admin())
{
	return;
}

/**
 * Test if requirements are meet.
 */
function writing_miro_activate()
{
	global $wp_version;
	$wpMin = '4.0.0';
	$phpMin = '5.3.10';
	$meetsRequirements = true;

	// Check PHP version
	if (version_compare(PHP_VERSION, $phpMin, '<'))
	{
		$meetsRequirements = false;
		$requirementName = 'PHP';
		$requirementVersion = $phpMin;
		$existingVersion = PHP_VERSION;
	}

	// Check WordPress version
	if (version_compare($wp_version, $wpMin, '<' ))
	{
		$meetsRequirements = false;
		$requirementName = 'WordPress';
		$requirementVersion = $wpMin;
		$existingVersion = $wp_version;
	}

	if ($meetsRequirements === false)
	{
		// Deactivate plugin
		deactivate_plugins(basename( __FILE__ ));

		// Show error message.
		$errorMessage = sprintf(
			'<p>The <strong>Writing Miro</strong> plugin requires %s version %s or greater.</p><p>You are running %s version %s</p>',
			$requirementName,
			$requirementVersion,
			$requirementName,
			$existingVersion
		);

		wp_die(
			$errorMessage,
			'Plugin Activation Error',
			array( 'response' => 200, 'back_link' => true)
		);
	}
}
register_activation_hook( __FILE__, 'writing_miro_activate' );

// Composer autoloader
$autoloaderPath = plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';
if (file_exists($autoloaderPath))
{
	require_once $autoloaderPath;
} else {
	throw new \Exception('Could not find the autoload.php at ' . $autoloaderPath, 1431255814);
}

// Create new app
$app = new Vdespa\WritingMiro\Application\WritingMiroApplication();
$app->runEditor();








