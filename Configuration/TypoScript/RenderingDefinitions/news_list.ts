tt_content {
    news_list < lib.fluidContent
    news_list = FLUIDTEMPLATE
    news_list {
        templateName = NewsList
        dataProcessing.10 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
        dataProcessing.10 {
            table = pages
            pidInList.field = pages
            selectFields = pages.*
            where = NOT hidden AND doktype = 12
            languageField = sys_language_uid
            orderBy = news_datetime DESC
            as = news
        }
        settings {
            list {
                dateFormat = d.m.Y
            }
        }
    }
}
