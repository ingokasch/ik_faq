<?php
namespace IngoKasch\IkFaq\Domain\Repository;


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
 * The repository for Entries
 */
class EntryRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	/**
	 * Default order
	 */
	protected $defaultOrderings = array(
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
	);

	/**
	 * FindByCategory
	 * @param \IngoKasch\IkFaq\Domain\Model\Category $category
	 * @return Ambigous <\TYPO3\CMS\Extbase\Persistence\QueryResultInterface, multitype:>
	 */
	public function findByCategory(\IngoKasch\IkFaq\Domain\Model\Category $category) {
		$query 		= $this->createQuery();
		$query->matching($query->contains('categories', $category));
		$query->setOrderings(array('sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
		$entries 	= $query->execute();
		return $entries;
	}
	
}