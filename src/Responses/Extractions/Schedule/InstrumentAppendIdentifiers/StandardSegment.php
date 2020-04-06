<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\Schedule\InstrumentAppendIdentifiers;


class StandardSegment {


    /**
     * @var string Ex: T
     */
    public $Code;

    /**
     * @var string Ex: CMO Tranche
     */
    public $Description;

    /**
     * @var int Ex: 1
     */
    public $Count;


    public function __construct( string $Code, string $Description, int $Count ) {
        $this->Code        = $Code;
        $this->Description = $Description;
        $this->Count       = $Count;
    }


}