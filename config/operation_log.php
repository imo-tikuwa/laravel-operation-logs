<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Exclude IPs
    |--------------------------------------------------------------------------
    | Enter the IP address you do not want to record in operation_logs.
    | Exclusion is performed by prefix search based on the IP address set here.
    |
    */

    'exclude_ips' => [
        // '172.30',
    ],

    /*
    |--------------------------------------------------------------------------
    | Exclude UserAgents
    |--------------------------------------------------------------------------
    | Enter the user agent you do not want to record in operation_logs.
    | Exclusion is performed by partial match search based on the user agent
    | set here.
    |
    */

    'exclude_user_agents' => [
        // 'Chrome',
    ],

    /*
    |--------------------------------------------------------------------------
    | Exclude Urls
    |--------------------------------------------------------------------------
    | Enter the URL you don't want to record in operation_logs.
    | Exclusion is performed by prefix search based on the URL set here.
    |
    */

    'exclude_urls' => [
        // '/admin',
    ],

];
