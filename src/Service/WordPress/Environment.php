<?php
/**
 * @package        WritingMiro
 *
 * @copyright      Copyright (c) 2015, Valentin Despa. All rights reserved.
 * @author         Valentin Despa - info@vdespa.de
 * @link           http://www.vdespa.de
 *
 * @license        GNU General Public License version 3. See LICENSE.txt or http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Vdespa\WritingMiro\Service\WordPress;


class Environment {
	/**
	 * @return string
	 */
	public static function getPluginDirectory()
	{
		$currentDir = plugin_dir_path( __FILE__ );
		$pluginDir = strstr($currentDir, 'src', true);
		return $pluginDir;
	}

	/**
	 * @return string
	 */
	public static function getPluginBackgroundDirectory()
	{
		return self::getPluginDirectory() . '/resources/public/Backgrounds/';
	}

	public static function getPluginURI()
	{
		return plugins_url('', dirname(dirname(dirname(__FILE__))));
	}

	/**
	 * @return string
	 */
	public static function getPluginBackgroundURI()
	{
		return self::getPluginURI() . '/resources/public/Backgrounds/';
	}

}