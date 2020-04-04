<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions;

class InstrumentListItem extends Instrument {

    public $ListId;
    public $UserDefinedIdentifier;
    public $UserDefinedIdentifier2;
    public $UserDefinedIdentifier3;
    public $UserDefinedIdentifier4;
    public $UserDefinedIdentifier5;
    public $UserDefinedIdentifier6;
    public $Order;
    public $InstrumentListItemKey;
    public $InstrumentKey;


    /**
     * InstrumentListItem constructor.
     * @param string $IdentifierType
     * @param string $Identifier
     * @param string $Description
     * @param string $Exchange This is referred to as 'Source' from TRDSS.
     * @param string $ListId
     * @param string $UserDefinedIdentifier
     * @param string $UserDefinedIdentifier2
     * @param string $UserDefinedIdentifier3
     * @param string $UserDefinedIdentifier4
     * @param string $UserDefinedIdentifier5
     * @param string $UserDefinedIdentifier6
     * @param string|NULL $Order
     * @param string $InstrumentListItemKey
     * @param string $InstrumentKey
     */
    public function __construct( $IdentifierType = '',
                                 $Identifier = '',
                                 $Description = '',
                                 $Exchange = '',
                                 string $ListId = '',
                                 string $UserDefinedIdentifier = '',
                                 string $UserDefinedIdentifier2 = '',
                                 string $UserDefinedIdentifier3 = '',
                                 string $UserDefinedIdentifier4 = '',
                                 string $UserDefinedIdentifier5 = '',
                                 string $UserDefinedIdentifier6 = '',
                                 string $Order = NULL,
                                 string $InstrumentListItemKey = '',
                                 string $InstrumentKey = '' ) {
        parent::__construct( $IdentifierType, $Identifier, $Description, $Exchange );

        $this->ListId                 = $ListId;
        $this->UserDefinedIdentifier  = $UserDefinedIdentifier;
        $this->UserDefinedIdentifier2 = $UserDefinedIdentifier2;
        $this->UserDefinedIdentifier3 = $UserDefinedIdentifier3;
        $this->UserDefinedIdentifier4 = $UserDefinedIdentifier4;
        $this->UserDefinedIdentifier5 = $UserDefinedIdentifier5;
        $this->UserDefinedIdentifier6 = $UserDefinedIdentifier6;
        $this->Order                  = $Order;
        $this->InstrumentListItemKey  = $InstrumentListItemKey;
        $this->InstrumentKey          = $InstrumentKey;
    }


    public function toArray(): array {
        return [
            'Identifier'            => $this->Identifier,
            'IdentifierType'        => $this->IdentifierType,
            'UserDefinedIdentifier' => $this->UserDefinedIdentifier,
        ];
    }


}