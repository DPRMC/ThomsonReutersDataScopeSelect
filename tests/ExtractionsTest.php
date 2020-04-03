<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests;

use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList;

class ExtractionsTest extends AbstractBase {


    /**
     * @test
     * @group InstrumentList
     */
    public function testCreateInstrumentListShouldReturnAnInstrumentListObject() {

//        $instrumentListName = 'TEST_MY_INSTRUMENT_LIST';
//        $instrumentList     = $this->client->Create( $instrumentListName );
//        $this->assertInstanceOf( InstrumentList::class, $instrumentList );
    }


    /**
     * @test
     * @group InstrumentList
     */
    public function testGetAllInstrumentListsShouldReturnAnArrayOfInstrumentListObjects() {
        $instrumentLists = $this->client->GetAll();
        $this->assertIsArray( $instrumentLists );
        $firstInstrumentList = reset( $instrumentLists );
        $this->assertInstanceOf( InstrumentList::class, $firstInstrumentList );
    }


    /**
     * @test
     * @group InstrumentList
     */
    public function testGetShouldReturnAnInstrumentListObject() {
        // Call this so I don't have to hard code an Instrument List id.
        $instrumentLists = $this->client->GetAll();

        /**
         * @var InstrumentList $firstInstrumentList
         */
        $firstInstrumentList = reset( $instrumentLists );

        $instrumentList = $this->client->Get( $firstInstrumentList->ListId );

        $this->assertInstanceOf( InstrumentList::class, $instrumentList );

        $instrumentListExists = $this->client->Exists( $firstInstrumentList->ListId );
    }


    /**
     * @test
     * @group InstrumentList2
     */
    public function testExportCsvShouldReturnSomething() {
        // Call this so I don't have to hard code an Instrument List id.
        $instrumentLists = $this->client->GetAll();

        /**
         * @var InstrumentList $firstInstrumentList
         */
        $firstInstrumentList = reset( $instrumentLists );

        // Parameters for this test.
        $instrumentListId = $firstInstrumentList->ListId;
        $format           = 'Csv';
        $includeSource    = TRUE;
        $data             = $this->client->Export( $instrumentListId, $format, $includeSource );
//        $hexFile = $data['value'];
//        var_dump($hexFile);
//        $bString = utf8_decode($hexFile);
//        var_dump( $bString );


    }

//    /**
//     * @test
//     * @group Extractions
//     */
//    public function testUserShouldReturnArrayOfUserData() {
//        $client = TRDSSClient::instantiate( $this->userName, $this->password, self::DEBUG );
//        $users  = $client->GetHistoricalFidDefinitions();
//
//    }
//
//
//    public function testAppendIdentifiersShouldAppendIdentifiers(){
//
//        $instrumentListId = 'asdf';
//        $identifiers[] = new Identifier('00764MAK3','CUSIP','my_id_AABST_2003_2_B');
//        $client = TRDSSClient::instantiate( $this->userName, $this->password, self::DEBUG );
//        $client->AppendIdentifiers($instrumentListId, $identifiers);
//    }
//


}