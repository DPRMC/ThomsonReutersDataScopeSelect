<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests;

use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\Instrument;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList;

class ExtractionsTest extends AbstractBase {


    /**
     * @test
     * @group InstrumentList111
     */
    public function testCreateInstrumentListShouldReturnAnInstrumentListObject() {
        $instrumentListName = 'TEST_MY_INSTRUMENT_LIST';
        $instrumentList     = $this->client->CreateInstrumentList( $instrumentListName );
        $this->assertInstanceOf( InstrumentList::class, $instrumentList );


        $foundInstrumentList = $this->client->GetInstrumentListByName( $instrumentListName );
        $this->assertInstanceOf( InstrumentList::class, $foundInstrumentList );

        $deleted = $this->client->DeleteInstrumentList( $foundInstrumentList->ListId );
        $this->assertTrue( $deleted );
    }


    /**
     * @test
     * @group InstrumentList
     */
    public function testGetAllInstrumentListsShouldReturnAnArrayOfInstrumentListObjects() {
        $instrumentLists = $this->client->GetAllInstrumentLists();
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
        $instrumentLists = $this->client->GetAllInstrumentLists();

        /**
         * @var InstrumentList $firstInstrumentList
         */
        $firstInstrumentList = reset( $instrumentLists );

        $instrumentList = $this->client->GetInstrumentList( $firstInstrumentList->ListId );
        $this->assertInstanceOf( InstrumentList::class, $instrumentList );

        $instrumentListExists = $this->client->Exists( $firstInstrumentList->ListId );
        $this->assertTrue( $instrumentListExists );
    }


    /**
     * @test
     * @group InstrumentList
     */
    public function testExportCsvShouldReturnAnArrayOfInstrumentObjects() {
        // Call this so I don't have to hard code an Instrument List id.
        $instrumentLists = $this->client->GetAllInstrumentLists();

        /**
         * @var InstrumentList $firstInstrumentList
         */
        $firstInstrumentList = reset( $instrumentLists );

        // Parameters for this test.
        $instrumentListId = $firstInstrumentList->ListId;
        $format           = 'Csv';
        $includeSource    = TRUE;
        $instrumentList   = $this->client->Export( $instrumentListId, $format, $includeSource );
        $this->assertIsArray( $instrumentList );
        $firstInstrument = reset( $instrumentList );
        $this->assertInstanceOf( Instrument::class, $firstInstrument );

        $instrumentListId = $firstInstrumentList->ListId;
        $format           = 'Csv';
        $includeSource    = FALSE;
        $instrumentList   = $this->client->Export( $instrumentListId, $format, $includeSource );
        $this->assertIsArray( $instrumentList );
        $firstInstrument = reset( $instrumentList );
        $this->assertInstanceOf( Instrument::class, $firstInstrument );

        $instrumentListId = $firstInstrumentList->ListId;
        $format           = 'Xml';
        $includeSource    = TRUE;
        $instrumentList   = $this->client->Export( $instrumentListId, $format, $includeSource );
        $this->assertIsArray( $instrumentList );
        $firstInstrument = reset( $instrumentList );
        $this->assertInstanceOf( Instrument::class, $firstInstrument );

        $instrumentListId = $firstInstrumentList->ListId;
        $format           = 'Xml';
        $includeSource    = FALSE;
        $instrumentList   = $this->client->Export( $instrumentListId, $format, $includeSource );
        $this->assertIsArray( $instrumentList );
        $firstInstrument = reset( $instrumentList );
        $this->assertInstanceOf( Instrument::class, $firstInstrument );
    }


    /**
     * @test
     * @group InstrumentList
     */
    public function testGetMaxInstrumentsAllowedShouldReturnAnInteger() {
        // Call this so I don't have to hard code an Instrument List id.
        $instrumentLists = $this->client->GetAllInstrumentLists();

        /**
         * @var InstrumentList $firstInstrumentList
         */
        $firstInstrumentList   = reset( $instrumentLists );
        $maxInstrumentsAllowed = $this->client->GetMaxInstrumentsAllowed( $firstInstrumentList->ListId );
        $this->assertIsInt( $maxInstrumentsAllowed );
    }


    /**
     * @test
     * @group InstrumentList
     */
    public function testCopyShouldCreateDuplicateList() {
        // Call this so I don't have to hard code an Instrument List id.
        $instrumentLists = $this->client->GetAllInstrumentLists();

        /**
         * @var InstrumentList $firstInstrumentList
         */
        $firstInstrumentList = reset( $instrumentLists );

        $instrumentList = $this->client->Copy( $firstInstrumentList->ListId, "DELETE_ME_" . $firstInstrumentList->Name );
        $this->assertInstanceOf( InstrumentList::class, $instrumentList );
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