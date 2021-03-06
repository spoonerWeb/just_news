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

$frontendPrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:';
$languageFilePrefix = 'LLL:EXT:just_news/Resources/Private/Language/locallang_be.xlf:';
$newsDoktype = 12;

// Copy palette configuration from "title" to new "title_for_news"
$GLOBALS['TCA']['pages']['palettes']['title_news'] = $GLOBALS['TCA']['pages']['palettes']['title'];

// Add news_datetime to title_for_news palette
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'pages',
    'title_news',
    'lastUpdated;LLL:EXT:just_news/Resources/Private/Language/locallang_be.xlf:pages.lastUpdated',
    'after:title'
);

// Copy palette configuration from "editorial" to new "editorial_for_news"
// Remove lastUpdate from palette
$GLOBALS['TCA']['pages']['palettes']['editorial_news'] = $GLOBALS['TCA']['pages']['palettes']['editorial'];
$GLOBALS['TCA']['pages']['palettes']['editorial_news']['showitem'] = str_replace(
    ', lastUpdated;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.lastUpdated_formlabel',
    '',
    $GLOBALS['TCA']['pages']['palettes']['editorial_news']['showitem']
);

// Copy behaviour from standard page to news page
$GLOBALS['TCA']['pages']['types'][$newsDoktype]['showitem'] = $GLOBALS['TCA']['pages']['types'][1]['showitem'];
// Replace title area and add categories
$GLOBALS['TCA']['pages']['types'][$newsDoktype]['showitem'] = str_replace(
    ';title,',
    ';title_news,',
    $GLOBALS['TCA']['pages']['types'][$newsDoktype]['showitem']
);
// Replace editorial to remove lastUpdated
$GLOBALS['TCA']['pages']['types'][$newsDoktype]['showitem'] = str_replace(
    ';editorial,',
    ';editorial_news,',
    $GLOBALS['TCA']['pages']['types'][$newsDoktype]['showitem']
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'just_news',
    'Configuration/TypoScript/PageTS/News.tsconfig',
    'Restrict to news pages'
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
                        $newsDoktype => 'apps-pagetree-justnews',
                    ],
                ],
            ]
        );
    },
    $newsDoktype,
    'pages',
    $languageFilePrefix
);
