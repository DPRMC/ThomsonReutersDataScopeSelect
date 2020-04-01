<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Authentication;

use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Client;

trait Authenticate {

    use Client;

    /**
     * @var string The authentication token set in the authentication() method used by every following request.
     */
    protected $token;



    protected function authenticate(string $userName, string $password) {
        $relativeUrl = 'Authentication/RequestToken';

        $headers = [
            'Prefer'       => 'respond-async',
            'Content-Type' => 'application/json; odata=minimalmetadata',
        ];

        $json   = [
            'Credentials' => [
                'Username' => $userName,
                'Password' => $password,
            ],
        ];
        $params = [
            'headers' => $headers,
            'json'    => $json,
        ];

        $response    = $this->postRequest( $relativeUrl, $params );
        $body        = json_decode( $response->getBody()->getContents(), TRUE );
        $this->token = $body[ 'value' ];
    }


}