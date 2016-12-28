===========================================
Documentation for TYPO3 extension just_news
===========================================

Installation
============

Install via composer
--------------------

.. code-block::

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
2. Create a sysfolder
3. Add a page below the sysfolder to create a news article
4. Create a content element and switch to ``News listing``
5. Add the sysfolder to ``Pages with news sub elements``

Edit extension templates
------------------------

By adding template, partial and layout paths to ``lib.fluidContent`` with their
subsections ``templateRootPaths``, ``partialRootPaths`` and ``layoutRootPaths`` you can
create own templates and override the original ones.


Frequently asked questions
==========================

Is there a possibility to add content elements to an article?
-------------------------------------------------------------
As you are using a page as article you only have the possibility to use content elements.
But think about the possibilities you have with the freedom of using any content element.

How can I use different layouts for an article?
-----------------------------------------------
As you are using a page as article you are free to use every layout (e.g. backend layouts) for your news article.

Is there a configuration for RealURL?
-------------------------------------
You don't need a configuration as you are free to create a speaking url by your sysfolder and page structure.
If you set the sysfolder named ``news`` below root page and add your articles into the sysfolder you will have the url
``example.com/news/the-title-of-your-article``. And all without extra configuration. Cool, hm?

I want to make a TYPO3 upgrade. Do I need to be careful?
--------------------------------------------------------
As long as you are using ``fluid_styled_content``, you don't have to care of anything when upgrading.
The extension is using TYPO3 core features and don't need any extra tables, Extbase models or repositories.


