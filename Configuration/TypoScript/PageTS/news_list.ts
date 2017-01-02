mod {
    wizards.newContentElement.wizardItems.special {
        elements {
            news_list {
                icon-identifier = content-special-menu
                title = LLL:EXT:just_news/Resources/Private/Language/locallang_be.xlf:wizard.title
                description = LLL:EXT:just_news/Resources/Private/Language/locallang_be.xlf:wizard.description
                tt_content_defValues {
                    CType = news_list
                }
            }
        }
        show := addToList(news_list)
    }
}