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


class Background {

	protected $displayName;

	protected $fileName;

	protected $id;

	/**
	 * @return mixed
	 */
	public function getDisplayName()
	{
		return $this->displayName;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return (int) $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @param mixed $displayName
	 */
	public function setDisplayName($displayName)
	{
		$this->displayName = $displayName;
	}

	/**
	 * @return mixed
	 */
	public function getFileName()
	{
		return $this->fileName;
	}

	/**
	 * @param mixed $fileName
	 */
	public function setFileName($fileName)
	{
		$this->fileName = $fileName;
	}

	public function hasImage()
	{
		return ($this->fileName !== null);
	}

}