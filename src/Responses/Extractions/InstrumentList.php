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


    /**
     * User constructor.
     * @param array $response
     */
    public function __construct( array $response ) {
        $this->ListId       = $response[ 'ListId' ];
        $this->Name         = $response[ 'Name' ];
        $this->Count        = $response[ 'Count' ];
        $this->Created      = Carbon::parse( $response[ 'Created' ] );
        $this->Modified     = Carbon::parse( $response[ 'Modified' ] );
    }


}