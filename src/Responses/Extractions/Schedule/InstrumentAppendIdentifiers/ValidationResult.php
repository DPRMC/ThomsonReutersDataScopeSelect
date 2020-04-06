<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\Schedule\InstrumentAppendIdentifiers;

class ValidationResult {


    /**
     * @var int $ValidInstrumentCount
     */
    public $ValidInstrumentCount;

    /**
     * @var array $OpenAccessSegments
     */
    public $OpenAccessSegments = [];

    /**
     * @var array $StandardSegments
     */
    public $StandardSegments = [];

    /**
     * @var array $ValidationDuplicates
     */
    public $ValidationDuplicates = [];

    /**
     * @var array $Messages
     */
    public $Messages = [];


    public function __construct( int $ValidInstrumentCount = 0,
                                 array $OpenAccessSegments = [],
                                 array $StandardSegments = [],
                                 array $ValidationDuplicates = [],
                                 array $Messages = [] ) {
        $this->ValidInstrumentCount = $ValidInstrumentCount;
        $this->OpenAccessSegments   = $OpenAccessSegments;
        $this->StandardSegments     = $StandardSegments;
        $this->ValidationDuplicates = $ValidationDuplicates;
        $this->Messages             = $Messages;
    }

    /**
     * @TODO Through testing I haven't encountered data in the OpenAccessSegments, ValidationDuplicates, and Messages arrays. Those need to be added.
     * @param array $data
     * @return ValidationResult
     */
    public static function createFromData( array $data ) {

        $standardSegments = [];
        foreach ( $data[ 'StandardSegments' ] as $standardSegmentData ):
            $standardSegments[] = new StandardSegment( $standardSegmentData[ 'Code' ],
                                                       $standardSegmentData[ 'Description' ],
                                                       $standardSegmentData[ 'Count' ] );
        endforeach;

        return new self( $data[ 'ValidInstrumentCount' ],
                         $data[ 'OpenAccessSegments' ],
                         $standardSegments,
                         $data[ 'ValidationDuplicates' ],
                         $data[ 'Messages' ],);
    }


}