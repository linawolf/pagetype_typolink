<?php
declare(strict_types=1);

defined('TYPO3') || die();

$typolinkDoktype = 8;

// Add new page type:
$GLOBALS['PAGES_TYPES'][$typolinkDoktype] = [
    'type' => 'web',
    'allowedTables' => '*',
];
