<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\Schedule\InstrumentAppendIdentifiers;

class InstrumentsAppendIdentifiersResult {


    /**
     * @var ValidationResult $ValidationResult
     */
    public $ValidationResult;

    /**
     * @var AppendResult $AppendResult
     */
    public $AppendResult;


    /**
     * InstrumentsAppendIdentifiersResult constructor.
     * @param ValidationResult $ValidationResult
     * @param AppendResult $AppendResult
     */
    public function __construct( ValidationResult $ValidationResult, AppendResult $AppendResult ) {
        $this->ValidationResult = $ValidationResult;
        $this->AppendResult     = $AppendResult;
    }

    public static function createFromData( $data ) {
        $validationResult = ValidationResult::createFromData( $data[ 'ValidationResult' ] );
        $appendResult     = AppendResult::createFromData( $data[ 'AppendResult' ] );
        return new self( $validationResult, $appendResult );
    }


}