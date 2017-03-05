tt_content {
    news_list =< lib.fluidContent
    news_list {
        templateName = NewsList
        dataProcessing {
            10 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
            10 {
                table = pages
                pidInList.field = pages
                recursive.field = recursive
                selectFields = pages.*
                max = {$plugin.tx_justnews.maxItems}
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
                    20 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
                    20 {
                        table = sys_category
                        selectFields = sys_category.title
                        pidInList.data = leveluid : 0
                        recursive = 99
                        leftjoin = sys_category_record_mm ON sys_category_record_mm.uid_local = sys_category.uid
                        where.field = uid
                        where.wrap = sys_category_record_mm.uid_foreign = |
                        begin = 0
                        as = newsCategories
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

[globalVar = GP:L>0]
    tt_content {
        news_list {
            dataProcessing {
                10 {
                    selectFields = pages.*, pages_language_overlay.title
                    leftjoin = pages_language_overlay ON pages_language_overlay.pid = pages.uid
                    where = NOT pages.hidden AND pages.doktype = 12 AND NOT pages_language_overlay.hidden
                }
            }
        }
    }
[global]
