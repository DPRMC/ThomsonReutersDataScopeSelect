<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests;

use Carbon\Carbon;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Usage\ExtractionUsageInstrumentSummaryResult;

class UsageTest extends AbstractBase {

    /**
     * @test
     * @group Usage
     */
    public function testUsageGetExtractionUsageInstrumentSummaryShouldReturnData() {
        $startDateTime = Carbon::create( 2020, 1, 1, 0, 0, 0 );
        $endDateTime   = Carbon::create( 2020, 4, 1, 0, 0, 0 );

        $records = $this->client->GetExtractionUsageInstrumentSummary( $startDateTime, $endDateTime );

        $this->assertIsArray( $records );
        $firstRecord = reset( $records );
        $this->assertInstanceOf( ExtractionUsageInstrumentSummaryResult::class, $firstRecord );

    }


}