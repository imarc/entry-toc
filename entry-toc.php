<?php

return [
    'pluginName' => 'Entry TOC',

    'fieldsToIndex' => [
        [
            'fieldHandle' => 'neoContentDesigner', 
            'fieldTitles' => ['sectionHeading']
        ],
        [
            'fieldHandle' => 'designedContent',
            'fieldTitles' => ['sectionHeader', 'subHeadline']
        ]
    ]
];