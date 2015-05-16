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

namespace Vdespa\WritingMiro\View;

use Vdespa\WritingMiro\Service\WordPress\Environment;

class ConfigurationView
{

	/**
	 * @var array
	 */
	protected $options;

	/**
	 * @param boolean | array $options
	 */
	function __construct($options)
	{
		if (is_array($options) === false)
		{
			$this->initializeDefaultOptions();
		} else {
			$this->options = $options;
		}
	}

	/**
	 * Display the page.
	 */
	public function display()
	{

		require_once Environment::getPluginDirectory() . 'src/Template/configuration.php';
	}

	/**
	 * Initialize default options.
	 *
	 * return void
	 */
	protected function initializeDefaultOptions()
	{
		$this->options = array();
		$this->options['writingmiro_background'] = 1;
	}

}