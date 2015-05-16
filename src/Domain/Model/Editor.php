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

namespace Vdespa\WritingMiro\Domain\Model;

class Editor {

	protected $hasBackground = false;

	/**
	 * @var Background
	 */
	protected $background;

	/**
	 * @return Background
	 */
	public function getBackground()
	{
		return $this->background;
	}

	/**
	 * @param Background $background
	 */
	public function setBackground(Background $background)
	{
		$this->background = $background;
	}

	/**
	 * @return bool
	 */
	public function hasBackground()
	{
		return ($this->background instanceof Background);
	}
}