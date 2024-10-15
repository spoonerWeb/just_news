<?php

defined('TYPO3_MODE') || defined('TYPO3') || die ('Access denied.');

$newsDokType = 12;

// Add new page type:
$GLOBALS['PAGES_TYPES'][$newsDokType] = [
    'type' => 'web',
    'allowedTables' => '*',
];
