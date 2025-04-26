<?php

return [
    'mode'                  => 'utf-8',
    'format'                => 'A4',
    'author'                => '',
    'subject'               => '',
    'keywords'              => '',
    'creator'               => 'Laravel Pdf',
    'display_mode'          => 'fullpage',
    'margin_left' => 0,
    'margin_right' => 0,
    'margin_top' => 20,
    'margin_bottom' => 40,
    'margin_header' => 0,
    'margin_footer' => 0,
    'tempDir'               => storage_path('app/pdf/temp/'),
    'font_path' => storage_path('app/pdf/font/'),
    'font_data' => [
        'irs' => [
            'R'  => 'IRANSans(FaNum).TTF',    // regular font
            'B'  => 'IRANSans(FaNum).ttf',       // optional: bold font
            'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
        ],
        'irsn' => [
            'R'  => 'IRANSans(FaNum).ttf',    // regular font
            'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
        ]
    ]
];
