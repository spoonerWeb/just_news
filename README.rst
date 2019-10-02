===========================================
Documentation for TYPO3 extension just_news
===========================================

Installation
============

Install via composer
--------------------

.. code-block:: shell

   composer require spooner-web/just_news

Install via Extension Manager
-----------------------------

1. Open Extension Manager in TYPO3 backend
2. Search for ``just_news``
3. Download and install it
4. You need to install and use extension ``fluid_styled_content``

Integrators Guide
=================

Integrate extension
-------------------

1. Include static template
2. Select a page to add news pages as children
3. [optional] Edit the page properties and add PageTS ``Restrict to news pages`` to make sure only news pages (or sys folders) will be created below
4. Create a content element and switch to ``News listing``
5. Add the parent page(s) of the news pages you want to list to ``Pages with news sub elements``
6. [optional] Change recursive level if more than 1 (default)
6. [optional] Change other settings

Pagination
----------

If you want to have pagination, use the configuration in TypoScript to activate and setup:

.. code-block:: typoscript

    # Activate pagination
    tt_content.NewsList.settings.paginate.activate = 1

    # Setup pagination
    tt_content.NewsList.settings.paginate.itemsPerPage = 5
    tt_content.NewsList.settings.paginate.insertAbove = 0
    tt_content.NewsList.settings.paginate.insertBelow = 1

Enhancing extension
-------------------

By adding template, partial and layout paths to ``lib.contentElement`` with their
subsections ``templateRootPaths``, ``partialRootPaths`` and ``layoutRootPaths`` you can
create own templates and override the original ones.

To change the markup of the news listing you can add this code into TypoScript setup:

.. code-block:: typoscript

    lib.contentElement {
        templateRootPaths {
            40 = EXT:my_ext/Resources/Private/Templates
        }
        partialRootPaths {
            40 = EXT:my_ext/Resources/Private/Partials
        }
        layoutRootPaths {
            40 = EXT:my_ext/Resources/Private/Layouts
        }
    }

Configuration
=============

Configuration is done via FlexForm in the news list content element.
It contains the settings for maximum items, starting point and recursion level.

Editors Guide
=============

Add a news article
------------------

1. Go to the parent page the news pages are children of
2. Create a news page below this page (the sorting is irrelevant as the news articles will be sorted by datetime in the listing)
3. Title and datetime are mandatory fields
4. You can add an image in resources tab and an abstract in main tab which will be shown in the listing
5. You can add a category to categorize the article
6. To create content, just add content elements to this page
7. You can set visibility settings as well as start- and endtime to either the news page or even the content elements

Frequently asked questions
==========================

Is there a possibility to add content elements to an article?
-------------------------------------------------------------
As you are using a page as article you only have the possibility to use content elements.
But think about the possibilities you have with the freedom of using any content element (and even plugins).

How can I use different layouts for an article?
-----------------------------------------------
As you are using a page as article you are free to use every layout (e.g. backend layouts) for your news article.

Is there a configuration for RealURL?
-------------------------------------
You don't need a configuration as you are free to create a speaking url by your sys folder and page structure.
If you set the sys folder named ``news`` below root page and add your articles into the sys folder you will have the url
``example.com/news/the-title-of-your-article``. And all without extra configuration. Cool, hm?

Is there something I need to know for using slugs in v9?
--------------------------------------------------------
No. Just use it like on your other pages.

I want to make a TYPO3 upgrade. Do I need to be careful?
--------------------------------------------------------
As long as you are using ``fluid_styled_content``, you don't have to care of anything when upgrading.
The extension is using TYPO3 core features and don't need any extra tables, Extbase models or repositories.

It is very confusing in the page tree if there are many articles.
-----------------------------------------------------------------
You can manage your articles in subfolders, e.g. the year of the article. So you have all 2016 articles in one folder and
the 2017 articles in another folder. RealUrl will handle that by adding the year into the url like
``example.com/news/2017/the-title-of-your-article``.
If you have too many articles per year, you can add more subfolders as months. Or you use a type of category instead of the date.
The good thing is, you are free to do what you want. It just works.

Wish list
=========

1. Include a page browser
1. Importer for tt_news and news

Migration
=========

From version 0.1.x to 1.x
-------------------------

Due to the change of the DB field for the datetime and the change of the plugin name, you need to to these two SQL queries:

.. code-block:: sql

    UPDATE pages SET lastUpdated = news_datetime;
    UPDATE tt_content SET CType = "NewsList" WHERE CType = "news_list";

Donate
======

If you want to contribute by donation, feel free to send me some money via `paypal`_.

.. _paypal: https://paypal.me/Tomalo

Contribute
==========

Feel free to contribute or test the extension!
Here you can get in contact:

* `GitLab project`_
* `GitHub project (just a mirror)`_
* `Slack channel`_

.. _GitLab project: https://git.spooner.io/spooner/just_news
.. _GitHub project (just a mirror): https://github.com/spoonerWeb/just_news
.. _Slack channel: https://typo3.slack.com/messages/ext-just_news/
