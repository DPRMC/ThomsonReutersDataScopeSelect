<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Users;


use DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\UserPreference\ContentSettings;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\UserPreference\UiSettings;

class UserPreference {

    /**
     * @var int
     */
    public $UserPreferenceId;


    public $ContentSettings;

    public $UiSettings;

    /**
     * User constructor.
     * @param array $response
     */
    public function __construct( array $response ) {
        $this->UserPreferenceId = $response[ 'UserPreferenceId' ];
        $this->ContentSettings  = new ContentSettings( $response[ 'ContentSettings' ] );
        $this->UiSettings       = new UiSettings( $response[ 'UiSettings' ] );
    }


}