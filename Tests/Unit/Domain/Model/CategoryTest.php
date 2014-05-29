<?php

namespace IngoKasch\IkFaq\Tests\Unit\Domain\Model;

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
 * Test case for class \IngoKasch\IkFaq\Domain\Model\Category.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Ingo Kasch <ingo@loom-consulting.com>
 */
class CategoryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \IngoKasch\IkFaq\Domain\Model\Category
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \IngoKasch\IkFaq\Domain\Model\Category();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() {
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForFileReferenceSetsImage() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'image',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEntriesReturnsInitialValueForEntry() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getEntries()
		);
	}

	/**
	 * @test
	 */
	public function setEntriesForObjectStorageContainingEntrySetsEntries() {
		$entry = new \IngoKasch\IkFaq\Domain\Model\Entry();
		$objectStorageHoldingExactlyOneEntries = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneEntries->attach($entry);
		$this->subject->setEntries($objectStorageHoldingExactlyOneEntries);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneEntries,
			'entries',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addEntryToObjectStorageHoldingEntries() {
		$entry = new \IngoKasch\IkFaq\Domain\Model\Entry();
		$entriesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$entriesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($entry));
		$this->inject($this->subject, 'entries', $entriesObjectStorageMock);

		$this->subject->addEntry($entry);
	}

	/**
	 * @test
	 */
	public function removeEntryFromObjectStorageHoldingEntries() {
		$entry = new \IngoKasch\IkFaq\Domain\Model\Entry();
		$entriesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$entriesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($entry));
		$this->inject($this->subject, 'entries', $entriesObjectStorageMock);

		$this->subject->removeEntry($entry);

	}
}
