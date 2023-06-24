<?php
declare(strict_types=1);

defined('TYPO3') || die();

$typolinkDoktype = 8;

// Allow backend users to drag and drop the new page type:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
    'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . $typolinkDoktype . ')'
);
