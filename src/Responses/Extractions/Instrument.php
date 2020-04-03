<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions;

class Instrument {

    /**
     * @var string Ex: CSP (for CUSIP)
     */
    public $IdentifierType;

    /**
     * @var string Ex: 07326BAB3
     */
    public $Identifier;

    /**
     * @var string I think Users can save their own identifier for these securities.
     */
    public $Description;

    /**
     * @var string Ex: EJV seems to be their default source.
     */
    public $Exchange;


    /**
     * Instrument constructor.
     * @param string $IdentifierType
     * @param string $Identifier
     * @param string $Description
     * @param string $Exchange
     */
    public function __construct( $IdentifierType = '', $Identifier = '', $Description = '', $Exchange = '' ) {
        $this->IdentifierType = $IdentifierType;
        $this->Identifier     = $Identifier;
        $this->Description    = $Description;
        $this->Exchange       = $Exchange;
    }


}