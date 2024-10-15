<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Just News - easy like bicycling',
    'description' => 'Easy, flexible and lightweight news extension. No extra tables needed, using pages for news articles.',
    'category' => 'fe',
    'version' => '4.0.0',
    'state' => 'stable',
    'author' => 'Thomas Löffler',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
            'fluid_styled_content' => ''
        ],
        'conflicts' => [],
        'suggests' => [
            'paginated_processor'
        ]
    ]
];
