<?php

/**
 *   Copyright 2018 Vimeo
 *
 *   Licensed under the Apache License, Version 2.0 (the "License");
 *   you may not use this file except in compliance with the License.
 *   You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 *   Unless required by applicable law or agreed to in writing, software
 *   distributed under the License is distributed on an "AS IS" BASIS,
 *   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *   See the License for the specific language governing permissions and
 *   limitations under the License.
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Vimeo Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'client_id' => ENV('VIMEO_MAIN_CLIENT_ID'),
            'client_secret' => ENV('VIMEO_MAIN_CLIENT_SECRET'),
            'access_token' => ENV('VIMEO_MAIN_CLIENT_ACCESS_TOKEN'),
        ],

        'alternative' => [
            'client_id' => ENV('VIMEO_ALTERNATIVE_CLIENT_ID'),
            'client_secret' => ENV('VIMEO_ALTERNATIVE_CLIENT_SECRET'),
            'access_token' => ENV('VIMEO_ALTERNATIVE_CLIENT_ACCESS_TOKEN'),
        ],

    ],
];
