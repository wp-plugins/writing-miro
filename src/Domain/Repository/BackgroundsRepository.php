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

namespace Vdespa\WritingMiro\Domain\Repository;

use Vdespa\WritingMiro\Domain\Model\Background;

class BackgroundsRepository extends \ArrayIterator {

	protected $backgrounds = array();

	public function findCurrent()
	{
		// FIXME
		if (empty($this->backgrounds))
		{
			$this->fill();
		}

		// FIXME Should be moved somewhere else.
		$options = get_option( 'writingmiro_settings' );

		return $this->findById($options['writingmiro_background']);
	}

	public function add(Background $background)
	{
		//$this->append($background);
		array_push($this->backgrounds, $background);
	}

	public function findById($backgroundId)
	{
		$backgroundId = (int) $backgroundId;

		/** @var Background $background */
		foreach ($this->backgrounds as $background)
		{
			if ($background->getId() === $backgroundId)
			{
				return $background;
			}
		}

		throw new \Exception('Could not find the background with id: ' . $backgroundId);
	}

	protected function fill()
	{
		$background = new Background();
		$background->setId(0);
		$background->setDisplayName('White');
		$background->setFileName(null);
		$this->add($background);

		$background = new Background();
		$background->setId(1);
		$background->setDisplayName('White');
		$background->setFileName(null);
		$this->add($background);

		$background = new Background();
		$background->setId(2);
		$background->setDisplayName('Pink Love');
		$background->setFileName('pink1.jpg');
		$this->add($background);
	}
}