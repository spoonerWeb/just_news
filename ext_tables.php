<?php
/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

defined('TYPO3_MODE') || defined('TYPO3') || die ('Access denied.');

(static function(): void {
    $newsDokType = 12;

    // Add new page type:
    $GLOBALS['PAGES_TYPES'][$newsDokType] = [
        'type' => 'web',
        'allowedTables' => '*',
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '@import "EXT:just_news/Configuration/TsConfig/mod/Wizard.tsconfig"' . LF .
        '<INCLUDE_TYPOSCRIPT: source="FILE:just_news/Configuration/TsConfig/mod/Wizard.tsconfig">'
    );
})();
