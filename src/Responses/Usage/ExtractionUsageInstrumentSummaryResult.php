<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Usage;


/**
 * Class ExtractionUsageInstrumentSummaryResult
 * @package DPRMC\ThomsonReutersDataScopeSelect\Responses\Usage
 * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Usage&opn=GetExtractionUsageInstrumentSummary
 */
class ExtractionUsageInstrumentSummaryResult {

    public $AssetClass;
    public $SubClass;
    public $ReportTemplate;
    public $SubTemplate;
    public $Count;
    public $EquityFairValue;
    public $FixedIncomeValuations;


    /**
     * ExtractionUsageInstrumentSummaryResult constructor.
     * @param string $AssetClass            Ex: BKLN
     * @param string $SubClass              Ex: LSTA
     * @param string $ReportTemplate        Ex: TPX
     * @param string $SubTemplate           Ex: NONE
     * @param int $Count                    Ex: 6
     * @param int $FixedIncomeValuations    Ex: 0
     */
    public function __construct( string $AssetClass,
                                 string $SubClass,
                                 string $ReportTemplate,
                                 string $SubTemplate,
                                 int $Count,
                                 int $FixedIncomeValuations ) {

        $this->AssetClass            = $AssetClass;
        $this->SubClass              = $SubClass;
        $this->ReportTemplate        = $ReportTemplate;
        $this->SubTemplate           = $SubTemplate;
        $this->Count                 = $Count;
        $this->FixedIncomeValuations = $FixedIncomeValuations;

    }


}