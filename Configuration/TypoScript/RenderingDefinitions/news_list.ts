tt_content {
    news_list =< lib.fluidContent
    news_list {
        templateName = NewsList
        dataProcessing {
            10 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
            10 {
                table = pages
                pidInList.field = pages
                selectFields = pages.*
                where = NOT hidden AND doktype = 12
                languageField = sys_language_uid
                orderBy = news_datetime DESC
                as = news
                dataProcessing {
                    10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
                    10 {
                        references.fieldName = media
                        as = images
                    }
                }
            }
        }
        settings {
            list {
                dateFormat = d.m.Y
            }
        }
    }
}
