<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Usage;


use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Authentication\Authenticate;
use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Client;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\User;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\UserClaim;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\UserPreference;
use GuzzleHttp\Exception\ClientException;

trait Usage {

    use Client;
    use Authenticate;

    /**
     * TODO This method does not work yet. I need info on the parameters it expects.
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Usage&opn=GetExtractionUsageInstrumentSummary
     */
    public function GetExtractionUsageInstrumentSummary(): array {
        $relativeUrl = 'Usage/GetExtractionUsageInstrumentSummary';

        $options = [
            'form_params' => [
                'ExtractionUsageCriteria' => 'ExtractionUsageInstrumentSummaryCriteria',
                'EndDateTime'             => '04 01, 2020 12:00:00 AM',
                'StartDateTime'           => '03 01, 2020 12:00:00 AM',
            ],
        ];
        try {


            $response = $this->postRequest( $relativeUrl, $options );
            $body     = json_decode( $response->getBody()->getContents(), TRUE );
            print_r( $body );
        } catch ( ClientException $exception ) {
            var_dump( $exception->getResponse()->getBody()->getContents() );
        }

    }


}