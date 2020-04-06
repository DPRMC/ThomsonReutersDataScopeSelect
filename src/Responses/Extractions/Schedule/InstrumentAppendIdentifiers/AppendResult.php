<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\Schedule\InstrumentAppendIdentifiers;

/**
 * Class AppendResult
 * @package DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\Schedule\InstrumentAppendIdentifiers
 */
class AppendResult {


    /**
     * @var int $AppendInstrumentCount
     */
    public $AppendInstrumentCount;


    /**
     * @var array $AppendDuplicates
     */
    public $AppendDuplicates = [];


    /**
     * AppendResult constructor.
     * @param int $AppendInstrumentCount
     * @param array $AppendDuplicates
     */
    public function __construct( int $AppendInstrumentCount = 0, array $AppendDuplicates = [] ) {
        $this->AppendInstrumentCount = $AppendInstrumentCount;
        $this->AppendDuplicates      = $AppendDuplicates;
    }


    /**
     * @TODO Through testing, I have not encountered data in the AppendDuplicates array. This needs to be added once I see some data.
     * @param array $data
     * @return AppendResult
     */
    public static function createFromData( array $data ): AppendResult {
        return new self( $data[ 'AppendedInstrumentCount' ], $data[ 'AppendDuplicates' ] );
    }

}