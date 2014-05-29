<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_ikfaq_domain_model_entry'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_ikfaq_domain_model_entry']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => '
			sys_language_uid, 
			l10n_parent, 
			l10n_diffsource, 
			hidden,
			title, 
			question, 
			question_images, 
			answere, 
			answere_images,
			links, 
			categories
		',
	),
	'types' => array(
		'1' => array('showitem' => '
			sys_language_uid;;;;1-1-1, 
			l10n_parent, 
			l10n_diffsource,
			title,
			--div--;LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_entry.tab.question, 
			question;;;richtext:rte_transform[mode=ts_links], 
			question_images, 
			--div--;LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_entry.tab.answere,
			answere;;;richtext:rte_transform[mode=ts_links], 
			answere_images,
			--div--;LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_entry.tab.links,
			links,
			--div--;LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_entry.tab.categories, 
			categories,
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
				'foreign_table' => 'tx_ikfaq_domain_model_entry',
				'foreign_table_where' => 'AND tx_ikfaq_domain_model_entry.pid=###CURRENT_PID### AND tx_ikfaq_domain_model_entry.sys_language_uid IN (-1,0)',
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
				'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_entry.title',
				'config' => array(
						'type' => 'input',
						'size' => 30,
						'eval' => 'trim, required'
				),
		),
		'question' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_entry.question',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'question_images' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_entry.question_images',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'questionImages',
				array(
						'maxitems' => 10,
						'multiple' => 1
				),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'answere' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_entry.answere',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'answere_images' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_entry.answere_images',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'answereImages',
				array(
						'maxitems' => 10,
						'multiple' => 1
				),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'categories' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_entry.categories',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ikfaq_domain_model_category',
				'foreign_table_where' => 'ORDER BY tx_ikfaq_domain_model_category.uid',
				'MM' => 'tx_ikfaq_category_entry_mm',
				'MM_opposite_field' => 'entries',
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
			
		'links' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_entry.links',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ikfaq_domain_model_link',
				'MM' => 'tx_ikfaq_entry_link_mm',
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
