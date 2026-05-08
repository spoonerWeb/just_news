<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\DataHandling\PageDoktypeRegistry;

if (!defined('TYPO3') && !defined('TYPO3')) {
    die ('Access denied.');
}
$newsDokType = 12;

// Add new page type:
GeneralUtility::makeInstance(PageDoktypeRegistry::class)
    ->add(
        $newsDokType,
        [
        'type' => 'web',
        'allowedTables' => '*',
        ]
    );
