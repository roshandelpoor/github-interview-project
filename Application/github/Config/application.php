<?php
return [
    'NAME'                         => 'GitHub_Interview',
    'VERSION'                      => '1.1.0',
    'LOG_PATH'                     => __DIR__ . '/../Resources/logs',
    'GITHUB_ACCOUNT_USERNAME'      => $_ENV['GITHUB_ACCOUNT_USERNAME'],
    'GITHUB_ACCOUNT_CLASSIC_TOKEN' => $_ENV['GITHUB_ACCOUNT_CLASSIC_TOKEN']
];
