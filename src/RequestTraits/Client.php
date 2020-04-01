<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits;


/**
 * Trait Client
 * @package DPRMC\ThomsonReutersDataScopeSelect\RequestTraits
 */
trait Client {

    /**
     * @var string The base URL where REST API calls are directed.
     */
    protected $baseUri = 'https://hosted.datascopeapi.reuters.com/RestApi/v1/';

    /**
     * @var float Two seconds is probably a little long.
     */
    protected $timeout = 10.0;

    /**
     * @var \GuzzleHttp\Client The GuzzleHttp Client object that will handle sending requests and receiving responses.
     */
    protected $guzzle;


    /**
     * @param bool $debug Set to true when creating the client to enable debug output.
     * @return \GuzzleHttp\Client
     */
    protected function getGuzzleClient( bool $debug = FALSE ): \GuzzleHttp\Client {

        $config = [
            'base_uri' => $this->baseUri,
            'timeout'  => $this->timeout,
        ];

        return new \GuzzleHttp\Client( $config );
    }


    protected function postRequest( string $relativeUrl, array $options = [] ) {
        $options = $this->mergeOptionsWithDefaults( $options );
        return $this->guzzle->request( 'POST', $relativeUrl, $options );
    }

    protected function getRequest( string $relativeUrl, array $options = [] ) {
        $options = $this->mergeOptionsWithDefaults( $options );
        return $this->guzzle->request( 'GET', $relativeUrl, $options );
    }

    protected function getDefaultOptions(): array {
        return [
            'headers' => [
                'Authorization' => 'Token ' . $this->token,
                'Prefer'        => 'respond-async',
            ],
            'version' => 1.1,
        ];
    }

    protected function mergeOptionsWithDefaults( array $options = [] ): array {
        $defaultOptions = $this->getDefaultOptions();
        return array_replace_recursive( $defaultOptions, $options );
    }


}