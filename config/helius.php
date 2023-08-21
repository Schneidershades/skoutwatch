<?php

return [
    'env' => env('HELIUS_API_MODE'),
    'key' => (env('HELIUS_API_KEY')),
    'url' => (env('HELIUS_API_MODE') == 'devnet') ? env('HELIUS_DEVNET_API') : env('HELIUS_MAINNET_API'),
    'devnet_url' => env('HELIUS_DEVNET_API'),
    'mainnet_url' => env('HELIUS_MAINNET_API'),
    'project_id' => (env('HELIUS_PROJECT_ID')),
    'receiver_address' => (env('HELIUS_RECEIVER_ADDRESS')),
];
