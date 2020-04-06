<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests\Extractions;

use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\Instrument;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\Schedule\InstrumentAppendIdentifiers\InstrumentsAppendIdentifiersResult;
use DPRMC\ThomsonReutersDataScopeSelect\Tests\AbstractBase;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentListItem;


class ImmediateExtractTest extends AbstractBase {


    /**
     * @test
     * @group immediate
     */
    public function testEndOfDayPricingExtractionRequest() {
        $cusipList = [
            '222386AA2',
            '222384AA7',
            '23244BAA1',
        ];

        $fields      = [ "CUSIP", "Universal Bid Ask Date", "Ask Price", "Bid Price" ];
        $instruments = [];

        foreach ( $cusipList as $cusip ):
            $instruments[] = new Instrument( 'CSP', $cusip, '', 'EJV' );
        endforeach;


        try {
            $result = $this->client->EndOfDayPricingExtractionRequest( $fields, $instruments, TRUE );
        } catch ( \GuzzleHttp\Exception\ClientException $e ) {

            var_dump( $e->getResponse()->getBody()->getContents() );
        }


    }
}