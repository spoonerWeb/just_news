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

defined('TYPO3_MODE') || die ('Access denied.');

$boot = function ($packageKey) {
    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        $packageKey,
        'Configuration/TypoScript/',
        'News with TypoScript'
    );

    $newsDokType = 12;

    // Add new page type:
    $GLOBALS['PAGES_TYPES'][$newsDokType] = [
        'type' => 'web',
        'allowedTables' => '*',
    ];

    // Provide icon for page tree, list view, ... :
    \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class)
        ->registerIcon(
            'apps-pagetree-justnews',
            TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            [
                'source' => 'EXT:' . $packageKey . '/Resources/Public/Icons/NewsArticle.svg',
            ]
        );


    // Allow backend users to drag and drop the new page type:
    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
        'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . $newsDokType . ')'
    );

    // Adds page TypoScript for the news list content element
    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:just_news/Configuration/TypoScript/PageTS/NewsList" extensions="typoscript">'
    );
};

$boot($_EXTKEY);
unset($boot);
