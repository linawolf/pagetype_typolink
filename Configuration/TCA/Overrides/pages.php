<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

(function ($extKey='pagetype_typolink', $table='pages') {
    $typolinkDoktype = 8;
    $ll = 'LLL:EXT:pagetype_typolink/Resources/Private/Language/locallang_db.xlf:';

    // Add new page type as possible select item:
    ExtensionManagementUtility::addTcaSelectItem(
        $table,
        'doktype',
        [
            'group' => 'link',
            'label' => $ll . 'typolink_page_type',
            'value' => $typolinkDoktype,
            'icon' => 'apps-pagetree-page-shortcut'
        ],
        '1',
        'after'
    );

    ArrayUtility::mergeRecursiveWithOverrule(
        $GLOBALS['TCA'][$table],
        [
            // add icon for new page type:
            'ctrl' => [
                'typeicon_classes' => [
                    $typolinkDoktype => 'apps-pagetree-page-shortcut',
                    $typolinkDoktype . '-root' => 'apps-pagetree-page-shortcut-root',
                    $typolinkDoktype . '-hideinmenu' => 'apps-pagetree-page-shortcut-hideinmenu',
                ],
            ],
            // add all page standard fields and tabs to your new page type
            'types' => [
                $typolinkDoktype => [
                    'showitem' => $GLOBALS['TCA'][$table]['types'][PageRepository::DOKTYPE_DEFAULT]['showitem']
                ]
            ]
        ]
    );

    $newColumns = [
        'typolink' => [
            'exclude' => true,
            'label' => $ll . 'pages.typolink',
            'config' => [
                'type' => 'link',
                'allowedTypes' => ['page', 'url', 'record'],
            ],
        ],
    ];
    ExtensionManagementUtility::addTCAcolumns($table, $newColumns);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        $table,
        'typolink',
        '8',
        'after:subtitle'
    );
})();
