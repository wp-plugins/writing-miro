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

namespace Vdespa\WritingMiro\Application;

use Vdespa\WritingMiro\Domain\Model\Background;
use Vdespa\WritingMiro\Domain\Model\Editor;
use Vdespa\WritingMiro\Domain\Repository\BackgroundsRepository;
use Vdespa\WritingMiro\Service\WordPress\EditorService;
use Vdespa\WritingMiro\Service\WordPress\Settings;

class WritingMiroApplication {

	function __construct()
	{
		// do nothing.
	}

	public function runEditor()
	{
		// Load settings
		$settings = new Settings();

		if (self::isOnEditPage() === false)
		{
			return;
		}

		$backgroundRepository = new BackgroundsRepository();

		$editor = new Editor();
		$editor->setBackground($backgroundRepository->findCurrent());

		$editorService = new EditorService($editor);
		$editorService->renderEditor();


	}

	public static function isOnEditPage()
	{
		global $pagenow;

		return in_array($pagenow, array('post.php', 'post-new.php'));
	}


}