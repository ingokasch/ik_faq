<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}
$_EXTKEY = "ik_faq";

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
	'interface' => array(
		'showRecordFieldList' => 
			'sys_language_uid, 
			l10n_parent, 
			l10n_diffsource, 
			hidden, 
			title, 
			images, 
			entries
		',
	),
	'types' => array(
		'1' => array('showitem' => '
			sys_language_uid;;;;1-1-1, 
			l10n_parent, 
			l10n_diffsource, 
			title, 
			images,
			--div--;LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_category.tab.entries,
			entries, 
			--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
			hidden;;1,  
			starttime, 
			endtime
		'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_ikfaq_domain_model_category',
				'foreign_table_where' => 'AND tx_ikfaq_domain_model_category.pid=###CURRENT_PID### AND tx_ikfaq_domain_model_category.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_category.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim, required'
			),
		),
		'images' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_category.images',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'images',
				array(
						'maxitems' => 10,
						'multiple' => 1
				),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'entries' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_category.entries',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ikfaq_domain_model_entry',
				'MM' => 'tx_ikfaq_category_entry_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 1,
				'wizards' => array(
					'_POSITION' => 'top',
					'suggest' => array(
						'type' => 'suggest'
					),
				),
			),
		),
		
	),
);
