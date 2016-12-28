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
        'news_list',
        'overlay-list'
    ],
    'uploads',
    'after'
);


$GLOBALS['TCA']['tt_content']['types']['news_list'] = [
    'showitem' => '
        --palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
        --palette--;' . $frontendLanguageFilePrefix . 'palette.header;header,
        pages;' . $languageFilePrefix . 'CType.news_list.records,
        --div--;' . $frontendLanguageFilePrefix . 'tabs.appearance,
        --palette--;' . $frontendLanguageFilePrefix . 'palette.frames;frames,
        --div--;' . $frontendLanguageFilePrefix . 'tabs.access,
        --palette--;' . $frontendLanguageFilePrefix . 'palette.visibility;visibility,
        --palette--;' . $frontendLanguageFilePrefix . 'palette.access;access,
        --div--;' . $frontendLanguageFilePrefix . 'tabs.extended,rowDescription,
        --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category,categories'
];