<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests\Extractions;

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
        print_r( $instrumentList );

        $instrumentListItems = $this->client->GetAllInstruments( $instrumentList->ListId );
        print_r( $instrumentListItems );


        $newInstrumentListItems   = [];
        $newInstrumentListItems[] = new InstrumentListItem( 'Cusip',
                                                            '00764MAK3',
                                                            '',
                                                            'EJV' );

        $result = $this->client->AppendIdentifiers( $instrumentList->ListId,
                                                    $newInstrumentListItems,
                                                    TRUE,
                                                    TRUE );

        print_r($result);


    }


}