<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\UserPreference;


class ContentSettings {

    public $FiGlobalSnapshotPricesForPpxUs3Pm4PmEnabled;
    public $IgnoreFinr;
    public $ImportOfDuplicateInstrumentsAllowed;
    public $ImportOfDuplicateLegalEntitiesAllowed;
    public $ImportOfExpiredInstrumentsAllowed;
    public $ImportOfOpenAccessRicsAllowed;
    public $ImportOfUnsupportedInstrumentAllowed;
    public $IncludeDelistedRicsForFileCodeExpansion;
    public $PartialEmbargoedReportsEnabled;
    public $IntermediateReportsEnabled;
    public $DeltaReportsEnabled;
    public $ReturnLastTradingDayPriceOnNonTradingDays;
    public $ReturnNullCodeValuesInExtractionPricingFields;
    public $RicMaintenanceReportsEnabled;
    public $PreferredIdentifier;
    public $UseDseOverLipper;
    public $DefaultToUsExchange;
    public $UseConsolidatedQuoteSourceForUsa;
    public $UseConsolidatedQuoteSourceForCanada;
    public $AllowHistoricalInstruments;
    public $AllowLimitedTermInstruments;
    public $UseDebtOverEquity;
    public $UseOtcPqSource;
    public $RequireOfferingCodeMatch;
    public $AllowSubclassImport;
    public $AllowUnmanagedOrUnverifiedEntities;

    /**
     * User constructor.
     * @param array $response
     */
    public function __construct( array $response ) {
        $this->FiGlobalSnapshotPricesForPpxUs3Pm4PmEnabled   = $response[ 'FiGlobalSnapshotPricesForPpxUs3Pm4PmEnabled' ];
        $this->IgnoreFinr                                    = $response[ 'IgnoreFinr' ];
        $this->ImportOfDuplicateInstrumentsAllowed           = $response[ 'ImportOfDuplicateInstrumentsAllowed' ];
        $this->ImportOfDuplicateLegalEntitiesAllowed         = $response[ 'ImportOfDuplicateLegalEntitiesAllowed' ];
        $this->ImportOfExpiredInstrumentsAllowed             = $response[ 'ImportOfExpiredInstrumentsAllowed' ];
        $this->ImportOfOpenAccessRicsAllowed                 = $response[ 'ImportOfOpenAccessRicsAllowed' ];
        $this->ImportOfUnsupportedInstrumentAllowed          = $response[ 'ImportOfUnsupportedInstrumentAllowed' ];
        $this->IncludeDelistedRicsForFileCodeExpansion       = $response[ 'IncludeDelistedRicsForFileCodeExpansion' ];
        $this->PartialEmbargoedReportsEnabled                = $response[ 'PartialEmbargoedReportsEnabled' ];
        $this->IntermediateReportsEnabled                    = $response[ 'IntermediateReportsEnabled' ];
        $this->DeltaReportsEnabled                           = $response[ 'DeltaReportsEnabled' ];
        $this->ReturnLastTradingDayPriceOnNonTradingDays     = $response[ 'ReturnLastTradingDayPriceOnNonTradingDays' ];
        $this->ReturnNullCodeValuesInExtractionPricingFields = $response[ 'ReturnNullCodeValuesInExtractionPricingFields' ];
        $this->RicMaintenanceReportsEnabled                  = $response[ 'RicMaintenanceReportsEnabled' ];
        $this->PreferredIdentifier                           = $response[ 'PreferredIdentifier' ];
        $this->UseDseOverLipper                              = $response[ 'UseDseOverLipper' ];
        $this->DefaultToUsExchange                           = $response[ 'DefaultToUsExchange' ];
        $this->UseConsolidatedQuoteSourceForUsa              = $response[ 'UseConsolidatedQuoteSourceForUsa' ];
        $this->UseConsolidatedQuoteSourceForCanada           = $response[ 'UseConsolidatedQuoteSourceForCanada' ];
        $this->AllowHistoricalInstruments                    = $response[ 'AllowHistoricalInstruments' ];
        $this->AllowLimitedTermInstruments                   = $response[ 'AllowLimitedTermInstruments' ];
        $this->UseDebtOverEquity                             = $response[ 'UseDebtOverEquity' ];
        $this->UseOtcPqSource                                = $response[ 'UseOtcPqSource' ];
        $this->RequireOfferingCodeMatch                      = $response[ 'RequireOfferingCodeMatch' ];
        $this->AllowSubclassImport                           = $response[ 'AllowSubclassImport' ];
        $this->AllowUnmanagedOrUnverifiedEntities            = $response[ 'AllowUnmanagedOrUnverifiedEntities' ];

    }


}