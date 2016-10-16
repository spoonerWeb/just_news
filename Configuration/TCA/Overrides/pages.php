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

$languageFilePrefix = 'LLL:EXT:ts_news/Resources/Private/Language/locallang_be.xlf:';
$newsDoktype = 12;

$fields = [
    'news_datetime' => [
        'exclude' => 0,
        'label' => $languageFilePrefix . 'pages.news_datetime',
        'config' => [
            'type' => 'input',
            'size' => 13,
            'eval' => 'datetime,required',
            'default' => 0,
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'pages',
    $fields
);

// Copy behaviour from standard page to news page
$GLOBALS['TCA']['pages']['types'][$newsDoktype] = $GLOBALS['TCA']['pages']['types'][1];
// Copy palette configuration from "title" to new "title_for_news"
$GLOBALS['TCA']['pages']['palettes']['title_for_news'] = $GLOBALS['TCA']['pages']['palettes']['title'];

// Add news_datetime to title_for_news palette
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'pages',
    'title_for_news',
    'news_datetime',
    'after:title'
);

// Replace palette "title" with "title_for_news" in news page
$GLOBALS['TCA']['pages']['types'][$newsDoktype]['showitem'] = str_replace(
    ';title,',
    ';title_for_news,',
    $GLOBALS['TCA']['pages']['types'][$newsDoktype]['showitem']
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'ts_news',
    'Configuration/TypoScript/PageTS/news.ts',
    'News pages'
);

call_user_func(
    function ($newsDoktype, $table, $languageFilePrefix) {
        // Add new page type as possible select item:
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
            $table,
            'doktype',
            [
                $languageFilePrefix . 'news_page_type',
                $newsDoktype
            ],
            '6',
            'after'
        );

        // Add icon for new page type:
        \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
            $GLOBALS['TCA']['pages'],
            [
                'ctrl' => [
                    'typeicon_classes' => [
                        $newsDoktype => 'apps-pagetree-page-advanced',
                    ],
                ],
            ]
        );
    },
    $newsDoktype,
    'pages',
    $languageFilePrefix
);