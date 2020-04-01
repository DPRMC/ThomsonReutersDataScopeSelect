<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Users;


class UserClaim {

    public $UserClaimId;
    public $UserId;
    public $Type;
    public $Subject;
    public $Value;

    /**
     * User constructor.
     * @param array $response
     */
    public function __construct( array $response ) {
        $this->UserClaimId = $response[ 'UserClaimId' ];
        $this->UserId      = $response[ 'UserId' ];
        $this->Type        = $response[ 'Type' ];
        $this->Subject     = $response[ 'Subject' ];
        $this->Value       = $response[ 'Value' ];

    }


}