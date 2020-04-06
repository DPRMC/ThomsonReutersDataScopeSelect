<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Extractions\ExtractWithNotesResult;

use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Authentication\Authenticate;
use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Client;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\Instrument;

trait ExtractWithNotesResult {

    use Client;
    use Authenticate;


    /**
     * @param array $fields An array of fields to retrieve. Ex: ['CUSIP', 'Ask Price', 'Bid Price']
     * @param array $instruments An array of Instrument models representing the securities you want to pull.
     * @param bool $debug
     * @return array
     */
    public function EndOfDayPricingExtractionRequest( array $fields, array $instruments, bool $debug = false ): array {
        $relativeUrl = 'Extractions/ExtractWithNotes';



        $instrumentsForExtract = [];
        /**
         * @var Instrument $instrument
         */
        foreach ( $instruments as $instrument ):
            $instrumentsForExtract[] = $instrument->toArrayForExtract();
        endforeach;

        $options = [
            'json'      => [
                'ExtractionRequest'                      => [
                    '@odata.type'       => '#ThomsonReuters.Dss.Api.Extractions.ExtractionRequests.EndOfDayPricingExtractionRequest',
                    'ContentFieldNames' => $fields,
                ],
                'IdentifierList'                         => [
                    '@odata.type'           => '#ThomsonReuters.Dss.Api.Extractions.ExtractionRequests.InstrumentIdentifierList',
                    'InstrumentIdentifiers' => $instrumentsForExtract,
                    'ValidationOptions'                      => NULL,
                    'UseUserPreferencesForValidationOptions' => FALSE,
                ],
                'Condition' => NULL,
            ],
            'debug' => $debug
        ];

        $response = $this->postRequest( $relativeUrl, $options );
        $body     = json_decode( $response->getBody()->getContents(), TRUE );

        var_dump( $body );
        return [];
    }


}