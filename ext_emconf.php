<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Pagetype typolink',
    'description' => 'Introduces a new page type "typolink" that can link to any target',
    'category' => 'plugin',
    'author' => 'Lina Wolf',
    'author_email' => '112@linawolf.de',
    'state' => 'beta',
    'version' => '0.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
