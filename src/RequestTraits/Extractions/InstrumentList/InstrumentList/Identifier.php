<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Extractions\InstrumentList\InstrumentList;

/**
 * Class Identifier
 * @package DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Extractions\InstrumentList\InstrumentList
 * @link https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Extractions&ent=InstrumentList&opn=AppendIdentifiers
 */
class Identifier {

    /**
     * @var string Ex: IBM.N
     */
    public $Identifier;

    /**
     * @var string Ex: Ric
     */
    public $IdentifierType;

    /**
     * @var string Ex: UserIdent4A
     */
    public $UserDefinedIdentifier;


    /**
     * Identifier constructor.
     * @param string $Identifier
     * @param string $IdentifierType
     * @param string $UserDefinedIdentifier
     */
    public function __construct( string $Identifier = '', string $IdentifierType = '', string $UserDefinedIdentifier = '' ) {
        $this->Identifier            = $Identifier;
        $this->IdentifierType        = $IdentifierType;
        $this->UserDefinedIdentifier = $UserDefinedIdentifier;
    }


    /**
     * @return array
     */
    public function toArray(): array {
        return [
            'Identifier'            => $this->Identifier,
            'IdentifierType'        => $this->IdentifierType,
            'UserDefinedIdentifier' => $this->UserDefinedIdentifier,
        ];
    }
}
