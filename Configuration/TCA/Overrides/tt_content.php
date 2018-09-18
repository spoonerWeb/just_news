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

$frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';
$languageFilePrefix = 'LLL:EXT:just_news/Resources/Private/Language/locallang_be.xlf:';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        $languageFilePrefix . 'CType.news_list',
        'NewsList',
        'apps-pagetree-justnews'
    ],
    'uploads',
    'after'
);

$GLOBALS['TCA']['tt_content']['types']['NewsList'] = [
    'showitem' => '
        --palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
        --palette--;' . $frontendLanguageFilePrefix . 'palette.header;header,
        pi_flexform;LLL:EXT:just_news/Resources/Private/Language/locallang_be.xlf:CType.NewsList.flexform_pi,
        --div--;' . $frontendLanguageFilePrefix . 'tabs.appearance,
        --palette--;' . $frontendLanguageFilePrefix . 'palette.frames;frames,
        --div--;' . $frontendLanguageFilePrefix . 'tabs.access,
        --palette--;' . $frontendLanguageFilePrefix . 'palette.visibility;visibility,
        --palette--;' . $frontendLanguageFilePrefix . 'palette.access;access,
        --div--;' . $frontendLanguageFilePrefix . 'tabs.extended,rowDescription,
        --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category,categories'
];

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['NewsList'] = 'apps-pagetree-justnews';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['NewsList'] = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['NewsList'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    '',
    'FILE:EXT:just_news/Configuration/FlexForm/NewsList.xml',
    'NewsList'
);

