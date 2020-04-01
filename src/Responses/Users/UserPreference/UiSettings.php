<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\UserPreference;


class UiSettings {

    public $LongTimeFormatString;
    public $ShortTimeFormatString;
    public $LongDateFormatString;
    public $ShortDateFormatString;
    public $DateSeparator;
    public $TimeSeparator;
    public $DecimalSeparator;
    public $GroupSeparator;
    public $TimeZone;

    /**
     * User constructor.
     * @param array $response
     */
    public function __construct( array $response ) {
        $this->LongTimeFormatString  = $response[ 'LongTimeFormatString' ];
        $this->ShortTimeFormatString = $response[ 'ShortTimeFormatString' ];
        $this->LongDateFormatString  = $response[ 'LongDateFormatString' ];
        $this->ShortDateFormatString = $response[ 'ShortDateFormatString' ];
        $this->DateSeparator         = $response[ 'DateSeparator' ];
        $this->TimeSeparator         = $response[ 'TimeSeparator' ];
        $this->DecimalSeparator      = $response[ 'DecimalSeparator' ];
        $this->GroupSeparator        = $response[ 'GroupSeparator' ];
        $this->TimeZone              = $response[ 'TimeZone' ];

    }


}