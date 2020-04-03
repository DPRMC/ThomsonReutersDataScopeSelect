<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions;

use Carbon\Carbon;

/**
 * Class InstrumentList
 * @package DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions
 * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Entity?ctx=Extractions&ent=InstrumentList&grp=Instrument%20List
 */
class InstrumentList {

    /**
     * @var string Ex: 0x070ac444a8887999
     */
    public $ListId;

    /**
     * @var string Ex: MY_INSTRUMENT_LIST
     */
    public $Name;

    /**
     * @var int The number of Instruments in this InstrumentList
     */
    public $Count;

    /**
     * @var Carbon When this InstrumentList was created.
     */
    public $Created;

    /**
     * @var Carbon When this InstrumentList was last modified.
     */
    public $Modified;


    public function __construct( string $ListId, string $Name, int $Count, string $Created, string $Modified ) {
        $this->ListId   = $ListId;
        $this->Name     = $Name;
        $this->Count    = $Count;
        $this->Created  = Carbon::parse( $Created );
        $this->Modified = Carbon::parse( $Modified );
    }


}