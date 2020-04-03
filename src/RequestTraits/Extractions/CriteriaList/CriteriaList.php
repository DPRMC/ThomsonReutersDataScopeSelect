<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Extractions\CriteriaList;

use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Authentication\Authenticate;
use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Client;

trait CriteriaList {

    use Client;
    use Authenticate;

    /**
     *
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Extractions&ent=CriteriaList&opn=Create
     */
    public function Create(array $filters): array {
        $relativeUrl = 'Extractions/CriteriaListCreate';

        $options = [
            'headers' => [
                'Content-Type' => 'application/json; odata=minimalmetadata'
            ],
            'json' => [
                'ListName' => 'CommoditiesCriteriaList',
                'Type' => 'Commodities',
                'Filters' => $filters
            ]
        ];

        $response = $this->postRequest( $relativeUrl, $options );
        $body     = json_decode( $response->getBody()->getContents(), TRUE );

        var_dump( $body );
        return [];
    }


}