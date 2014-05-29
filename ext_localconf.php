<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'IngoKasch.' . $_EXTKEY,
	'Category_list',
	array(
		'Category' => 'list',
	),
	// non-cacheable actions
	array(
		'Category' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'IngoKasch.' . $_EXTKEY,
	'Category_show',
	array(
		'Category' => 'show',
	),
	// non-cacheable actions
	array(
		'Category' => '',
		
	)
);
