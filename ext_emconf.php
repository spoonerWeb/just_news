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
    'title' => 'News by TypoScript',
    'description' => 'A news system built by core features. No additional tables or PHP code',
    'category' => 'fe',
    'version' => '0.0.2',
    'state' => 'beta',
    'author' => 'Thomas Löffler',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.99.99',
            'fluid_styled_content' => '7.6.0'
        ],
        'conflicts' => [],
        'suggests' => []
    ]
];