<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Category_list',
	'FAQ - Category navigation'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Category_show',
	'FAQ - Show category entries'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'FAQ');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ikfaq_domain_model_category', 'EXT:ik_faq/Resources/Private/Language/locallang_csh_tx_ikfaq_domain_model_category.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ikfaq_domain_model_category');
$GLOBALS['TCA']['tx_ikfaq_domain_model_category'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_category',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'sortby' => 'sorting',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,image,entries,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Category.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ikfaq_domain_model_category.png'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ikfaq_domain_model_entry', 'EXT:ik_faq/Resources/Private/Language/locallang_csh_tx_ikfaq_domain_model_entry.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ikfaq_domain_model_entry');
$GLOBALS['TCA']['tx_ikfaq_domain_model_entry'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_entry',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'sortby' => 'sorting',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title, question,question_image,answere,answere_image,categories,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Entry.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ikfaq_domain_model_entry.png'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ikfaq_domain_model_link', 'EXT:ik_faq/Resources/Private/Language/locallang_csh_tx_ikfaq_domain_model_link.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ikfaq_domain_model_link');
$GLOBALS['TCA']['tx_ikfaq_domain_model_link'] = array(
		'ctrl' => array(
				'title'	=> 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_link',
				'label' => 'name',
				'label_alt' => 'href',
				'label_alt_force' => TRUE,
				'tstamp' => 'tstamp',
				'sortby' => 'sorting',
				'crdate' => 'crdate',
				'cruser_id' => 'cruser_id',
				'dividers2tabs' => TRUE,

				'versioningWS' => 2,
				'versioning_followPages' => TRUE,

				'languageField' => 'sys_language_uid',
				'transOrigPointerField' => 'l10n_parent',
				'transOrigDiffSourceField' => 'l10n_diffsource',
				'delete' => 'deleted',
				'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
				),
				'searchFields' => 'name, href, target,',
				'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Link.php',
				'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ikfaq_domain_model_link.png'
		),
);

/********************************************************************************
 * Include default stylesheet and javascript files (you might want to remove these)
 ********************************************************************************/
$GLOBALS['TSFE']->additionalHeaderData[$_EXTKEY.'css'] = '<link rel="stylesheet" type="text/css" href="' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/css/ik_faq.min.css"/>';
$GLOBALS['TSFE']->additionalHeaderData[$_EXTKEY.'js'] = '<script type="text/javascript" src="' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/js/ik_faq.js"></script>';