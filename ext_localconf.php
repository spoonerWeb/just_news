<?php

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3_MODE') || defined('TYPO3') || die('Access denied.');

$newsDokType = 12;
// Allow backend users to drag and drop the new page type:
ExtensionManagementUtility::addUserTSConfig(
    'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . $newsDokType . ')'
);

// Adds page TypoScript for the news list content element
ExtensionManagementUtility::addPageTSConfig(
    '@import \'EXT:just_news/Configuration/TsConfig/Page/NewsList.tsconfig\''
);

// Provide icon for page tree, list view, ... :
GeneralUtility::makeInstance(IconRegistry::class)
    ->registerIcon(
        'apps-pagetree-justnews',
        SvgIconProvider::class,
        [
            'source' => 'EXT:just_news/Resources/Public/Icons/NewsArticle.svg',
        ]
    );
ExtensionUtility::configurePlugin(
    'just_news',
    'NewsList',
    [
        'JustNews' => 'list'
    ]
);
