<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Usage;


use Carbon\Carbon;
use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Authentication\Authenticate;
use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Client;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Usage\ExtractionUsageInstrumentSummaryResult;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\User;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\UserClaim;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\UserPreference;
use GuzzleHttp\Exception\ClientException;

trait Usage {

    use Client;
    use Authenticate;

    /**
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Usage&opn=GetExtractionUsageInstrumentSummary
     * @param Carbon $startDateTime
     * @param Carbon $endDateTime
     * @param bool $debug
     * @return array
     */
    public function GetExtractionUsageInstrumentSummary( Carbon $startDateTime, Carbon $endDateTime, bool $debug = FALSE ): array {
        $relativeUrl = 'Usage/GetExtractionUsageInstrumentSummary';

        $options = [
            'json'  => [
                'ExtractionUsageCriteria' => [
                    'EndDateTime'   => $endDateTime->toIso8601ZuluString( 'millisecond' ),
                    'StartDateTime' => $startDateTime->toIso8601ZuluString( 'millisecond' ), ],
            ],
            'debug' => $debug,
        ];

        $response = $this->postRequest( $relativeUrl, $options );
        $result   = json_decode( $response->getBody()->getContents(), TRUE );

        $records = [];

        foreach ( $result[ 'Records' ] as $data ):
            $records[] = new ExtractionUsageInstrumentSummaryResult( $data[ 'AssetClass' ],
                                                                     $data[ 'SubClass' ],
                                                                     $data[ 'ReportTemplate' ],
                                                                     $data[ 'SubTemplate' ],
                                                                     $data[ 'Count' ],
                                                                     $data[ 'FixedIncomeValuations' ],);
        endforeach;

        return $records;
    }


}