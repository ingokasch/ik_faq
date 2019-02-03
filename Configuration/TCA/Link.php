<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}
$_EXTKEY = "ik_faq";

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
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Resources/Public/Icons/tx_ikfaq_domain_model_link.png'
    ),
	'interface' => array(
		'showRecordFieldList' =>
			'sys_language_uid, 
			l10n_parent, 
			l10n_diffsource, 
			hidden, 
			name, 
			href, 
			target',
			entries,
	),
	'types' => array(
		'1' => array('showitem' => '
			sys_language_uid;;;;1-1-1, 
			l10n_parent, 
			l10n_diffsource, 
			name, 
			href, 
			target,
			--div--;LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_link.tab.entries,
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
				'foreign_table' => 'tx_ikfaq_domain_model_link',
				'foreign_table_where' => 'AND tx_ikfaq_domain_model_link.pid=###CURRENT_PID### AND tx_ikfaq_domain_model_link.sys_language_uid IN (-1,0)',
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

		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_link.name',
			'config' => array(
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim, required'
			),
		),
		'href' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_link.href',
			'config' => array(
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim, required'
			),
		),
		'target' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_link.target',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'items' => array(
						array('_blank', '_blank'),
						array('_self', '_self'),
						array('_parent', '_parent'),
						array('_top', '_top'),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => 'trim, required'
			),
		),

		'entries' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ik_faq/Resources/Private/Language/locallang_db.xlf:tx_ikfaq_domain_model_link.entries',
			'config' => array(
				'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_ikfaq_domain_model_entry',
				'foreign_table_where' => 'ORDER BY tx_ikfaq_domain_model_entry.uid',
				'MM' => 'tx_ikfaq_entry_link_mm',
				'MM_opposite_field' => 'links',
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
