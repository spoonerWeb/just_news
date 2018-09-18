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

// Copy palette configuration from "editorial" to new "editorial_for_news"
// Remove lastUpdate from palette
$GLOBALS['TCA']['pages']['palettes']['editorial_news'] = \TYPO3\CMS\Core\Utility\GeneralUtility::rmFromList(
    'lastUpdated;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.lastUpdated_formlabel',
    $GLOBALS['TCA']['pages']['palettes']['editorial']
);

// Add news_datetime to title_for_news palette
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'pages',
    'title_news',
    'lastUpdated;LLL:EXT:just_news/Resources/Private/Language/locallang_be.xlf:pages.lastUpdated',
    'after:title'
);

// Copy behaviour from standard page to news page
$GLOBALS['TCA']['pages']['types'][$newsDoktype]['showitem'] =
    '--palette--;' . $frontendPrefix . 'pages.palettes.standard;standard,
    --palette--;' . $frontendPrefix . 'pages.palettes.title;title_news,
    categories,
    --palette--;' . $frontendPrefix . 'pages.palettes.abstract;abstract,
    --palette--;' . $frontendPrefix . 'pages.palettes.metatags;metatags,
    --palette--;' . $frontendPrefix . 'pages.palettes.editorial;editorial_news,
    --div--;' . $frontendPrefix . 'pages.tabs.resources,
    --palette--;' . $frontendPrefix . 'pages.palettes.media;media,
    --div--;' . $frontendPrefix . 'pages.tabs.appearance,
    --palette--;' . $frontendPrefix . 'pages.palettes.layout;layout,
    --palette--;' . $frontendPrefix . 'pages.palettes.replace;replace,
    --div--;' . $frontendPrefix . 'pages.tabs.behaviour,
    --palette--;' . $frontendPrefix . 'pages.palettes.links;links,
    --palette--;' . $frontendPrefix . 'pages.palettes.caching;caching,
    --palette--;' . $frontendPrefix . 'pages.palettes.language;language,
    --palette--;' . $frontendPrefix . 'pages.palettes.miscellaneous;miscellaneous,
    --palette--;' . $frontendPrefix . 'pages.palettes.module;module,
    --div--;' . $frontendPrefix . 'pages.tabs.access,
    --palette--;' . $frontendPrefix . 'pages.palettes.visibility;visibility,
    --palette--;' . $frontendPrefix . 'pages.palettes.access;access'
;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'just_news',
    'Configuration/TypoScript/PageTS/news.ts',
    'News pages (sys folder)'
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
