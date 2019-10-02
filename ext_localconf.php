<?php
defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'just_news',
    'NewsList',
    [
        'JustNews' => 'list'
    ]
);