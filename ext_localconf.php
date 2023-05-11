<?php

defined('TYPO3_MODE') || defined('TYPO3') || die('Access denied.');

(static function (): void {
    $newsDokType = 12;
    // Allow backend users to drag and drop the new page type:
    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
        'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . $newsDokType . ')'
    );

    // Adds page TypoScript for the news list content element
    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '@import \'EXT:just_news/Configuration/PageTS/NewsList.tsconfig\''
    );

    // Provide icon for page tree, list view, ... :
    \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class)
        ->registerIcon(
            'apps-pagetree-justnews',
            TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            [
                'source' => 'EXT:just_news/Resources/Public/Icons/NewsArticle.svg',
            ]
        );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'just_news',
        'NewsList',
        [
            'JustNews' => 'list'
        ]
    );
})();
