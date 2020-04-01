<?php

namespace DPRMC\ThomsonReutersDataScopeSelect;

class TRDSSClient {

    use \DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Client;
    use \DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Authentication\Authenticate;
    use \DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Users\Users;

    protected $userName;
    protected $password;

    protected function __construct( string $userName, string $password, bool $debug = FALSE ) {
        $this->userName = $userName;
        $this->password = $password;
        $this->guzzle   = $this->getGuzzleClient( $debug );
    }

    public static function instantiate( string $userName, string $password, bool $debug = FALSE ): TRDSSClient {
        $client = new self( $userName, $password, $debug );
        $client->authenticate( $userName, $password );
        return $client;
    }





//
//
//    /**
//     * TODO Current user account does not have permission to request this data.
//     */
//    public function getHistoricalFidDefinitions() {
//        $relativeUrl = 'Extractions/GetHistoricalFidDefinitions';
//        $headers     = [
//            'Authorization' => 'Token ' . $this->token,
//        ];
//
//        $params   = [
//            'headers' => $headers,
//        ];
//        $response = $this->getRequest( $relativeUrl, $params );
//        $body     = json_decode( $response->getBody()->getContents(), TRUE );
//        print_r( $body );
//    }
//
//
//    /**
//     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Usage&opn=GetExtractionUsageInstrumentSummary
//     */
//    public function Usage_GetExtractionUsageInstrumentSummary() {
//        $relativeUrl = 'Usage/GetExtractionUsageInstrumentSummary';
//        $headers     = [
//            'Authorization' => 'Token ' . $this->token,
//        ];
//
//        $params   = [
//            'headers' => $headers,
//        ];
//        $response = $this->getRequest( $relativeUrl, $params );
//        $body     = json_decode( $response->getBody()->getContents(), TRUE );
//        print_r( $body );
//    }


}