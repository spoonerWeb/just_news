<?php

(static function (): void {
    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        'just_news',
        'Configuration/TypoScript/',
        'News with TypoScript'
    );
})();
