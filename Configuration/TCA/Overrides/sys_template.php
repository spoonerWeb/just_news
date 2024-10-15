<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addStaticFile(
    'just_news',
    'Configuration/TypoScript/',
    'News with TypoScript'
);
