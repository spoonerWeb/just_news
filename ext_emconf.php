<?php
/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'Just News - easy like bicycling',
    'description' => 'Easy, flexible and lightweight news extension. No extra tables needed, using pages for news articles.',
    'category' => 'fe',
    'version' => '1.0.2',
    'state' => 'stable',
    'author' => 'Thomas Löffler',
    'constraints' => [
        'depends' => [
            'typo3' => '9.4.0-9.5.99',
            'fluid_styled_content' => ''
        ],
        'conflicts' => [],
        'suggests' => []
    ]
];
