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


use Vdespa\WritingMiro\View\ConfigurationView;

class Settings
{

	function __construct()
	{
		add_action('admin_init', array($this, 'admin_init'));
		add_action('admin_menu', array($this, 'add_page'));
	}

	public function addAdminMenu()
	{

		add_options_page('Writing Miro', 'Writing Miro', 'manage_options', 'writing_miro', 'writing_miro_options_page');

	}

	public function admin_init()
	{
		//register_setting('todo_list_options', $this->option_name, array($this, 'validate'));
		register_setting('pluginPage', 'writingmiro_settings');


		add_settings_field(
			'writingmiro_background',
			__( 'Background for the editor', 'writing-miro' ),
			null, // No callback for the moment
			'pluginPage',
			'writingmiro_pluginPage_section'
		);
	}

	public function add_page()
	{
		add_options_page('Writing Miro', 'Writing Miro', 'manage_options', 'writing_miro', array($this, 'writing_miro_options_page'));
	}

	function writing_miro_options_page()
	{
		$options = get_option( 'writingmiro_settings' );
		$view = new ConfigurationView($options);
		$view->display();
	}
}