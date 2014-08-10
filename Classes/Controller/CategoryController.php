<?php
namespace IngoKasch\IkFaq\Controller;


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
 * CategoryController
 */
class CategoryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * categoryRepository
	 *
	 * @var \IngoKasch\IkFaq\Domain\Repository\CategoryRepository
	 * @inject
	*/
	protected $categoryRepository = NULL;

	/**
	 * entryRepository
	 *
	 * @var \IngoKasch\IkFaq\Domain\Repository\EntryRepository
	 * @inject
	 */
	protected $entryRepository = NULL;
	
	/**
	 * injectEntryRepository
	 *
	 * @param \IngoKasch\IkFaq\Domain\Repository\EntryRepository $entryRepository
	 * @return void
	 */
	public function injectEntryRepository(\IngoKasch\IkFaq\Domain\Repository\EntryRepository $entryRepository) {
		$this->entryRepository = $entryRepository;
	}
	
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$categories = $this->categoryRepository->findAll();
		$this->view->assign('categories', $categories);
	}

	/**
	 * action show
	 *
	 * @param \IngoKasch\IkFaq\Domain\Model\Category $category
	 * @param \IngoKasch\IkFaq\Domain\Model\Entry $selectEntry
	 * @return void
	 */
	public function showAction(\IngoKasch\IkFaq\Domain\Model\Category $category = NULL, \IngoKasch\IkFaq\Domain\Model\Entry $selectEntry = NULL) {
		$entries		= NULL;
		
		// If no category is given > get the first one
		if(!$category instanceof \IngoKasch\IkFaq\Domain\Model\Category) {
			$category	= $this->categoryRepository->findAll()->getFirst();
		}
		
		if($category instanceof \IngoKasch\IkFaq\Domain\Model\Category) {
			$entries	= $this->entryRepository->findByCategory($category);
		}
		
		$this->view->assignMultiple(array(
				'category'				=> $category,
				'entries'					=> $entries,
				'selectEntry'			=> $selectEntry
		));
	}

}