<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests\Extractions;

use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\Schedule\InstrumentAppendIdentifiers\InstrumentsAppendIdentifiersResult;
use DPRMC\ThomsonReutersDataScopeSelect\Tests\AbstractBase;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentListItem;


class ScheduleTest extends AbstractBase {


    /**
     * @test
     * @group house
     */
    public function testRunImmediateSchedule() {
        $instrumentListName = 'DELETE_ME_FULL_STS';
        $instrumentList     = $this->client->GetInstrumentListByName( $instrumentListName );


        $instrumentListItems = $this->client->GetAllInstruments( $instrumentList->ListId );


        $newInstrumentListItems   = [];
        $newInstrumentListItems[] = new InstrumentListItem( 'Cusip',
                                                            '00764MAK3',
                                                            '',
                                                            'EJV' );

        $InstrumentsAppendIdentifiersResult = $this->client->AppendIdentifiers( $instrumentList->ListId,
                                                  $newInstrumentListItems,
                                                  false,
                                                  false );

        print_r($InstrumentsAppendIdentifiersResult);

    }


}