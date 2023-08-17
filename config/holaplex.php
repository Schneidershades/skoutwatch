<?php

return [
    'env' => env('HOLAPLEX_API_MODE'),
    'key' => (env('HOLAPLEX_API_KEY')),
    'url' => (env('HOLAPLEX_API_MODE') == 'devnet') ? env('HOLAPLEX_DEVNET_API') : env('HOLAPLEX_MAINNET_API'),
    'project_id' => (env('HOLAPLEX_PROJECT_ID')),
    'receiver_address' => (env('HOLAPLEX_RECEIVER_ADDRESS')),
];
