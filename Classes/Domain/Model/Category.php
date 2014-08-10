<?php
namespace IngoKasch\IkFaq\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Ingo Kasch <ingo@loom-consulting.com>, LOOM Consulting
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Category
 */
class Category extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * images
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $images = NULL;

	/**
	 * entries
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\IngoKasch\IkFaq\Domain\Model\Entry>
	 */
	protected $entries = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->entries = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the images
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
	 */
	public function getImages() {
		return $this->images;
	}

	/**
	 * Sets the images
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
	 * @return void
	 */
	public function setImages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $images) {
		$this->images = $images;
	}

	/**
	 * Adds a Image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 * @return void
	 */
	public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
		$this->images->attach($image);
	}

	/**
	 * Removes a Image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove The Image to be removed
	 * @return void
	 */
	public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove) {
		$this->images->detach($imageToRemove);
	}

	/**
	 * Adds a Entry
	 *
	 * @param \IngoKasch\IkFaq\Domain\Model\Entry $entry
	 * @return void
	 */
	public function addEntry(\IngoKasch\IkFaq\Domain\Model\Entry $entry) {
		$this->entries->attach($entry);
	}

	/**
	 * Removes a Entry
	 *
	 * @param \IngoKasch\IkFaq\Domain\Model\Entry $entryToRemove The Entry to be removed
	 * @return void
	 */
	public function removeEntry(\IngoKasch\IkFaq\Domain\Model\Entry $entryToRemove) {
		$this->entries->detach($entryToRemove);
	}

	/**
	 * Returns the entries
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\IngoKasch\IkFaq\Domain\Model\Entry> $entries
	 */
	public function getEntries() {
		return $this->entries;
	}

	/**
	 * Sets the entries
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\IngoKasch\IkFaq\Domain\Model\Entry> $entries
	 * @return void
	 */
	public function setEntries(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $entries) {
		$this->entries = $entries;
	}

}