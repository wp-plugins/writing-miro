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

/**
 * This settings have been adapted after a StackExchange answerr. Thanks @gmazzap (Giuseppe Mazzapica)
 * @link  http://wordpress.stackexchange.com/a/175254/23216.
 * @link https://gist.github.com/Giuseppe-Mazzapica/c081ce03a68b00d983d5
 */

namespace Vdespa\WritingMiro\Service\WordPress;

use Vdespa\WritingMiro\Domain\Model\Editor;

class EditorService
{

	/**
	 * @var Editor
	 */
	protected $editor;

	function __construct(Editor $editor)
	{
		$this->editor = $editor;
	}

	public function renderEditor()
	{
		$this->overrideSettings();
		if ($this->editor->hasBackground() === true)
		{
			$this->overrideBackground();
		}
	}

	protected function overrideSettings()
	{
		add_filter('wp_editor_settings', array($this, 'editorSettings'), 0, 2);
		add_filter('mce_buttons', array($this, 'buttons'), 30, 2);
		add_filter('teeny_mce_buttons', array($this, 'buttons'), 30, 2);
		add_filter('teeny_mce_plugins', array($this, 'plugins'));
		add_filter('tiny_mce_plugins', array($this, 'plugins'));
	}

	/**
	 * @param array $settings
	 * @param       $editor_id
	 *
	 * @return array
	 */
	public function editorSettings($settings, $editor_id) {
		if ($this->isModeVisible($editor_id)) {
			$settings['_content_editor_dfw'] = false;
		}
		return $settings;
	}

	/**
	 * @param $buttons
	 * @param $editor_id
	 *
	 * @return array
	 */
	public function buttons($buttons, $editor_id) {
		return $this->isModeVisible($editor_id)
			? array_diff(array_merge((array) $buttons, array('wp_fullscreen')), array('dfw'))
			: $buttons;
	}

	/**
	 * @param $plugins
	 *
	 * @return array
	 */
	public function plugins($plugins) {
		return $this->isModeVisible()
			? array_diff(array_merge((array) $plugins, array('wpfullscreen')), array('fullscreen'))
			: $plugins;
	}

	/**
	 * @param string $editor_id
	 *
	 * @return bool
	 */
	protected function isModeVisible($editor_id = 'content') {
		return (version_compare($GLOBALS['wp_version'], '4.1') >= 0)
		&& in_array($GLOBALS['pagenow'], array('post.php','post-new.php'))
		&& $editor_id === 'content';
	}

	/**
	 * Override the default background
	 *
	 * @return void
	 */
	protected function overrideBackground()
	{
		// Register style
		wp_register_style(
			'writing-miro', // handle name
			Environment::getPluginURI() . '/resources/private/writing-miro.css', // the URL of the stylesheet
			array(), // an array of dependent styles
			'201505161709', // version number
			'screen' // CSS media type
		);

		// Custom CSS fule to include the dynamic background
		$backgroundFile = Environment::getPluginBackgroundURI() . $this->editor->getBackground()->getFileName();
		$custom_css = ".fullscreen-overlay { background-image: url($backgroundFile) !important;}";
		wp_add_inline_style('writing-miro', $custom_css);

		// Enqueue the CSS stylesheet
		wp_enqueue_style('writing-miro');
	}
}