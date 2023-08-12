<?php

return [
    'env' => env('UNDERDOG_API_MODE'),
    'key' => (env('UNDERDOG_API_KEY')),
    'url' => (env('UNDERDOG_API_MODE') == 'devnet') ? env('UNDERDOG_DEVNET_API') : env('UNDERDOG_MAINNET_API'),
    'project_id' => (env('UNDERDOG_PROJECT_ID')),
    'receiver_address' => (env('UNDERDOG_RECEIVER_ADDRESS')),
];
