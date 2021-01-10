<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Proxmox API Credentials
    |--------------------------------------------------------------------------
    |
    | The credentials for the Proxmox API are automatically fetched from
    | the .env file. This will allow the application to authorize all requests
    | to your Proxmox panel.
    |
    */

    'config' => [
        'hostname' => env('PROXMOX_HOSTNAME', null),
        'username' => env('PROXMOX_USERNAME', null),
        'password' => env('PROXMOX_PASSWORD', null),
        'authType' => env('PROXMOX_AUTHTYPE', 'pam'),
        'port'     => env('PROXMOX_PORT', 8006)
    ]
];