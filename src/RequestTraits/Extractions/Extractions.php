<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Extractions;

use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Authentication\Authenticate;
use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Client;

trait Extractions {

    use Client;
    use Authenticate;

    /**
     * TODO My user account doesn't have the permission to run this command.
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Extractions&opn=GetHistoricalFidDefinitions
     */
    public function GetHistoricalFidDefinitions(): array {
        $relativeUrl = 'Extractions/GetHistoricalFidDefinitions';

        $options = [
            'query' => [
                'ExtractionUsageCriteria' => 'HistoricalLookupEntry',
                'Code'                    => '',
                'Name'                    => '',
            ],
        ];

        $response = $this->getRequest( $relativeUrl, $options );
        $body     = json_decode( $response->getBody()->getContents(), TRUE );

        var_dump( $body );
        return [];
    }


}