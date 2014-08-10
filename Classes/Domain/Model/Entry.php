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
 * Entry
 */
class Entry extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * question
	 *
	 * @var string
	 */
	protected $question = '';

	/**
	 * questionImages
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $questionImages = NULL;

	/**
	 * answere
	 *
	 * @var string
	 */
	protected $answere = '';

	/**
	 * answereImages
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $answereImages = NULL;

	/**
	 * categories
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\IngoKasch\IkFaq\Domain\Model\Category>
	 */
	protected $categories = NULL;

	/**
	 * links
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\IngoKasch\IkFaq\Domain\Model\Link>
	 */
	protected $links = NULL;

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
		$this->categories 		= new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->answereImages 	= new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->questionImages = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->links			 		= new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the question
	 *
	 * @return string $question
	 */
	public function getQuestion() {
		return $this->question;
	}

	/**
	 * Sets the question
	 *
	 * @param string $question
	 * @return void
	 */
	public function setQuestion($question) {
		$this->question = $question;
	}

	/**
	 * Returns the questionImages
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $questionImages
	 */
	public function getQuestionImages() {
		return $this->questionImages;
	}

	/**
	 * Sets the questionImages
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $questionImages
	 * @return void
	 */
	public function setQuestionImages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $questionImages) {
		$this->questionImages = $questionImages;
	}
	
	/**
	 * Adds a QuestionImages
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $questionImage
	 * @return void
	 */
	public function addQuestionImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $questionImage) {
		$this->questionImages->attach($questionImage);
	}
	
	/**
	 * Removes a QuestionImages
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $questionImagesToRemove The QuestionImages to be removed
	 * @return void
	 */
	public function removeQuestionImages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $questionImagesToRemove) {
		$this->questionImages->detach($questionImagesToRemove);
	}

	/**
	 * Returns the answere
	 *
	 * @return string $answere
	 */
	public function getAnswere() {
		return $this->answere;
	}

	/**
	 * Sets the answere
	 *
	 * @param string $answere
	 * @return void
	 */
	public function setAnswere($answere) {
		$this->answere = $answere;
	}

	/**
	 * Returns the answereImages
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $answereImages
	 */
	public function getAnswereImages() {
		return $this->answereImages;
	}

	/**
	 * Sets the answereImages
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $answereImages
	 * @return void
	 */
	public function setAnswereImages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $answereImages) {
		$this->answereImages = $answereImages;
	}
	
	/**
	 * Adds a AnswereImages
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $answereImage
	 * @return void
	 */
	public function addAnswereImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $answereImage) {
		$this->answereImages->attach($answereImage);
	}
	
	/**
	 * Removes a AnswereImages
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $answereImagesToRemove The AnswereImages to be removed
	 * @return void
	 */
	public function removeAnwereImages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $answereImagesToRemove) {
		$this->answereImages->detach($answereImagesToRemove);
	}

	/**
	 * Adds a Category
	 *
	 * @param \IngoKasch\IkFaq\Domain\Model\Category $category
	 * @return void
	 */
	public function addCategory(\IngoKasch\IkFaq\Domain\Model\Category $category) {
		$this->categories->attach($category);
	}

	/**
	 * Removes a Category
	 *
	 * @param \IngoKasch\IkFaq\Domain\Model\Category $categoryToRemove The Category to be removed
	 * @return void
	 */
	public function removeCategory(\IngoKasch\IkFaq\Domain\Model\Category $categoryToRemove) {
		$this->categories->detach($categoryToRemove);
	}

	/**
	 * Returns the categories
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\IngoKasch\IkFaq\Domain\Model\Category> $categories
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * Sets the categories
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\IngoKasch\IkFaq\Domain\Model\Category> $categories
	 * @return void
	 */
	public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories) {
		$this->categories = $categories;
	}

	/**
	 * Adds a Link
	 *
	 * @param \IngoKasch\IkFaq\Domain\Model\Link $link
	 * @return void
	 */
	public function addLink(\IngoKasch\IkFaq\Domain\Model\Link $link) {
		$this->links->attach($link);
	}

	/**
	 * Removes a Link
	 *
	 * @param \IngoKasch\IkFaq\Domain\Model\Link $linkToRemove The Link to be removed
	 * @return void
	 */
	public function removeLink(\IngoKasch\IkFaq\Domain\Model\Link $linkToRemove) {
		$this->links->detach($linkToRemove);
	}

	/**
	 * Returns the links
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\IngoKasch\IkFaq\Domain\Model\Link> $links
	 */
	public function getLinks() {
		return $this->links;
	}

	/**
	 * Sets the links
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\IngoKasch\IkFaq\Domain\Model\Link> $links
	 * @return void
	 */
	public function setLinks(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $links) {
		$this->links = $links;
	}

}