<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Responses\Users;


class User {

    public $UserId;
    public $UserName;
    public $Email;
    public $Phone;


    public function __construct( string $UserId, string $UserName, string $Email, string $Phone ) {
        $this->UserId   = $UserId;
        $this->UserName = $UserName;
        $this->Email    = $Email;
        $this->Phone    = $Phone;
    }


}