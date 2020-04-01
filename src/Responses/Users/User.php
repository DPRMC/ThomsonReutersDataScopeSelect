<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses;


class User {

    public $UserId;
    public $UserName;
    public $Email;
    public $Phone;

    /**
     * User constructor.
     * @param array $response
     */
    public function __construct( array $response ) {
        $this->UserId   = $response[ 'UserId' ];
        $this->UserName = $response[ 'UserName' ];
        $this->Email    = $response[ 'Email' ];
        $this->Phone    = $response[ 'Phone' ];

    }


}