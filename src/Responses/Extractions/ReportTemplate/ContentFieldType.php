<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\ReportTemplate;

/**
 * Class ContentFieldType
 * @package DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\ReportTemplate
 * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Extractions&opn=GetValidContentFieldTypes&sce=On%20Demand%20Extractions%20-%20Create%20-%20Standard%20Events%20(Corporate%20Actions).primary&stp=1&tab=2
 */
class ContentFieldType {

    /**
     * @var string Ex: ET2.7 Day Compound Yield
     */
    public $Code;

    /**
     * @var string 7 Day Compound Yield
     */
    public $Name;

    /**
     * @var string Instrument's calculated 7-day yield that assumes coupon payme...
     */
    public $Description;

    /**
     * @var string Ex: Number
     */
    public $FormatType;

    /**
     * @var string
     */
    public $FieldGroup;


    /**
     * ContentFieldType constructor.
     * @param string $Code
     * @param string $Name
     * @param string $Description
     * @param string $FormatType
     * @param string $FieldGroup
     */
    public function __construct( string $Code, string $Name, string $Description, string $FormatType, string $FieldGroup ) {
        $this->Code        = $Code;
        $this->Name        = $Name;
        $this->Description = $Description;
        $this->FormatType  = $FormatType;
        $this->FieldGroup  = $FieldGroup;

    }


}