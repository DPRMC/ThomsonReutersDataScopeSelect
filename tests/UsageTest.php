<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests;


use DPRMC\ThomsonReutersDataScopeSelect\TRDSSClient;

class UsageTest extends AbstractBase {

    /**
     * @test
     * @group Usage
     */
    public function testUsageGetExtractionUsageInstrumentSummaryShouldReturnData() {
        $client = TRDSSClient::instantiate( $this->userName, $this->password, self::DEBUG );
        $client->GetExtractionUsageInstrumentSummary();

    }




}