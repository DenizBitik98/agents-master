<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'dcts' => [
        'dcts_server_url' => env('dcts_server_url'),
        'idp_server_url' => env('idp_server_url'),
        'idp_login' => env('idp_login'),
        'idp_password' => env('idp_password'),
        'idp_get_token_url' => env('idp_get_token_url', ''),
        'dcts_machine_key' => env('dcts_machine_key', ''),
        'dcts_terminal' => env('dcts_terminal'),
        'dcts_uri_auth' => env('dcts_uri_auth'),
        'dcts_uri_session_open' => env('dcts_uri_session_open'),
        'idp_cookie_storage_name' => env('idp_cookie_storage_name'),
        'dcts_uri_station_data' => env('dcts_uri_station_data'),
        'dcts_uri_search_trains' => env('dcts_uri_search_trains', ''),
        'dcts_uri_search_cars' => env('dcts_uri_search_cars', ''),
        'dcts_cookie_storage_name' => env('dcts_cookie_storage_name'),
        'dcts_uri_ticket_reserve' => env('dcts_uri_ticket_reserve'),
        'dcts_uri_ticket_confirmation' => env('dcts_uri_ticket_confirmation'),
        'dcts_uri_session_close' => env('dcts_uri_session_close'),
        'dcts_uri_trains_route' => env('dcts_uri_trains_route'),
        'dcts_uri_confirm_signature' => env('dcts_uri_confirm_signature'),
        'dcts_uri_ticket_inquiry' => env('dcts_uri_ticket_inquiry'),
        'dcts_uri_ticket_cancel' => env('dcts_uri_ticket_cancel'),
        'dcts_uri_order_return_status' => env('dcts_uri_order_return_status'),
        'dcts_uri_apply_success_return' => env('dcts_uri_apply_success_return'),
        'dcts_uri_apply_fail_return' => env('dcts_uri_apply_fail_return'),
    ],

    'ssl' => [
        'private_key_file' => storage_path().'/ktj/'.env('private_key_file'),
        'private_key_password' => env('private_key_password'),
    ],

];
