<?php
namespace IngoKasch\IkFaq\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Ingo Kasch <ingo@loom-consulting.com>, LOOM Consulting
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class IngoKasch\IkFaq\Controller\EntryController.
 *
 * @author Ingo Kasch <ingo@loom-consulting.com>
 */
class EntryControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \IngoKasch\IkFaq\Controller\EntryController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('IngoKasch\\IkFaq\\Controller\\EntryController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllEntriesFromRepositoryAndAssignsThemToView() {

		$allEntries = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$entryRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$entryRepository->expects($this->once())->method('findAll')->will($this->returnValue($allEntries));
		$this->inject($this->subject, 'entryRepository', $entryRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('entries', $allEntries);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenEntryToView() {
		$entry = new \IngoKasch\IkFaq\Domain\Model\Entry();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('entry', $entry);

		$this->subject->showAction($entry);
	}
}
